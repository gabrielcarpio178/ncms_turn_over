<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User_info;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use App\Mail\Sendemail;
use App\Models\Benefits;
use App\Models\Classification;
use App\Models\Competencies;
use App\Models\Contents;
use App\Models\Images;
use App\Models\Programs;
use App\Models\Qualifications;
use App\Models\ScoreCard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Exports\StudentsExport;
use App\Exports\FilterExport;
use App\Models\Partners;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;




class AdminController extends Controller
{
    //goto setting pages
    public function settings(){
        $id = auth()->user()->id;
        $adminData = User_info::find($id);
        return view("pages.adminSetting", ["dataAdmin"=> $adminData]);
    }

    //goto resgister student

    public function register_student(){
        $students = Students::orderBy('id', 'desc')->paginate(10);
        $programs = Programs::all();
        return view("pages.adminRegisterStudent", ['students'=>$students, 'programs'=>$programs, 'isAll'=>true]);
    }



    //filter student data list

    public function filter(Request $request){
        $filter = $request->validate([
            'course'=>['required'],
            'status'=>['required'],
            'start_date'=>['required','date'],
            'end_date'=>['required', 'date']
        ]);
        $start_date = date('Y-m-d H:i:s',strtotime($filter['start_date']));
        $end_date = date('Y-m-d H:i:s',strtotime($filter['end_date']));
        $students = Students::where('id_course','=',$filter['course'])->where('status','=',(bool)$filter['status'])->whereBetween('created_at',[$start_date, $end_date])->paginate(10);
        $programs = Programs::all();
        return view("pages.adminRegisterStudent", ['students'=>$students, 'programs'=>$programs, 'isAll'=>false, 'filter'=>['id_course'=>$filter['course'], 'status'=>$filter['status'], 'start_date'=> $filter['start_date'], 'end_date'=>$filter['end_date']]]);
    }

    //export all student datalist in excel file

    function export(Request $request){

        $start_date = date('Y-m-d H:i:s',strtotime($request->start_date));
        $end_date = date('Y-m-d H:i:s',strtotime($request->end_date));
        $fileExt = 'xls';
        $exportFormat = \Maatwebsite\Excel\Excel::XLS;
        $filename = "nolitc-exported-data".date('d-m-Y').".".$fileExt;

        return Excel::download(new FilterExport($request->course, $request->status, $start_date, $end_date), $filename, $exportFormat);
    }

    //export filter student datalist in excel file

    function export_excel(){
        $fileExt = 'xls';
        $exportFormat = \Maatwebsite\Excel\Excel::XLS;
        $filename = "nolitc-exported-data".date('d-m-Y').".".$fileExt;
        return Excel::download(new StudentsExport, $filename, $exportFormat);
    }

    //update account settings

    public function update(Request $request, $id){
        $data = $request->validate([
            "fname"=> ['required'],
            "lname"=> ['required'],
            "email"=> ['required', 'email', Rule::unique('users')->ignore($id)],
            "username"=> ["required"],
            "password"=> 'required|confirmed',
        ]);
        $adminData = User_info::find($id);
        $adminData->fname = $data['fname'];
        $adminData->lname = $data['lname'];
        $adminData->email = $data['email'];
        $adminData->username = $data['username'];
        $adminData->decrypt = $data['password'];
        $adminData->password = bcrypt($data['password']);

        $adminData->save();
        return redirect()->back()->with('success','Update success');
    }

    //goto student applicant profile

    public function student_profile($id){
        $student = Students::find($id);
        $student['birthdate'] = date("M-d-Y", strtotime($student['birthdate']));
        return view('pages.adminuser_profile', ['student'=>$student]);
    }

    //delete student applicant
    public function deleteApplicant(Request $request){

        //message for delete student applicant
        $data = array(
            'message'=> '
            Thank you for your interest in the Negros Occidental Language and Information Technology Center (NOLITC). We appreciate the time you took to complete the registration form.'."
            \n".
            'After careful consideration, we regret to inform you that we are unable to offer you a place in the course at this time. The selection process was highly competitive, and we received many strong registrations.'."
            \n".
            'We encourage you to apply again in the future and wish you the best in your educational and professional endeavors. If you have any questions, please feel free to contact us at:'."
            \n",
            'telephone' => "(034) 435 6092",
            'email'=> "nolitc@gmail.com"
        );
        $student = Students::find($request->student_id);
        //send message in email
        Mail::to($student->email)->send(new Sendemail($data));
        $student->delete();
        return redirect()->route('register_admin');
    }
    //accept student applicant
    public function acceptApplicant(Request $request){
        $user_id = $request->student_id;
        $student = Students::find($user_id);
        //message for accept student applicant
        $data = array(
            //$student->program->exam_link this variable hold the exam link for tesda qualification
            'message'=> '
            We are pleased to inform you that your registration form has been approved, and you are now eligible to take the examination via the provided link '.$student->program->exam_link.' . The outcome of this examination will play a significant role in determining your acceptance into Negros Occidental Language and Information Technology Center (NOLITC).'."
            \n".
            'We look forward to your participation in the course and are confident that you will find it both challenging and rewarding.'."
            \n".
            'If you have any questions or need further information, do not hesitate to contact us at:'."
            \n",
            'telephone' => "(034) 435 6092",
            'email'=> "nolitc@gmail.com"
        );

        //update status to true means accepted
        Mail::to($student->email)->send(new Sendemail($data));
        $student['status'] = true;
        $student->save();
        return redirect()->route('register_admin');
    }


    //download pdf for student profile
    public function downloadPdf($id){
        $student = Students::find($id);
        //convent date format
        $student['birthdate'] = date("M-d-Y", strtotime($student['birthdate']));
        $data = [
            'title' => 'student profile',
            'student' =>  $student
        ];
        //download pdf
        $pdf = Pdf::loadView('pdf.downloadPdf', ['data'=>$data])->setPaper('a4', 'portrait');
        return $pdf->download($student->fname." ".$student->lname.".pdf");
    }

    //goto update welcome
    public function upload_welcome(){
        
        $content = Contents::find(1);
        //if the image column in database is null the image display to default
        if($content!=null){
            return view("pages.adminwelcome", ['image'=>$content->images['0']]);
        }else{
            return view("pages.adminwelcome", ['image'=>'default.jpg']);
        }
    }

    //update photo for welcome page to database 
    public function upload_cover(Request $request){
        $filename = '';
        
        if($request->hasFile("image_upload")){ //validation if the input file tag is not empty
            $request->validate([ //required if the file is image and file size of image
                'image_upload'=>'mimes:jpeg,png,bmp,tiff |max:4094',
            ]);
            //make unique name for image by using the date uploaded
            $database = time().'.'.$request->image_upload->extension() ;
            $filename = $request->getSchemeAndHttpHost(). '/assets/img/'.$database;
            $request->image_upload->move(public_path('/assets/img/'), $filename);
            //update data image in database
            $content = Images::where('contents_id','=','1')->first();
            $content['image'] = $database;
            $content->save();
            return redirect()->back()->with('success','Update cover photo success');
        }
    }

    //goto program management page
    public function program_management(){
        return view('pages.adminprogrammanagemant');
    }

    //goto program management form

    public function program_management_form(){
        $programs = Programs::orderBy('id', 'DESC')->get();
        return view('pages.adminprogramsform', ['programs'=>$programs]);
    }

    //goto program form
    public function programs_addform(){
        return view('pages.adminprogramsinsertform');
    }

    //add tesda qualification logic
    public function addTesdaQualification(Request $request){
        $data = $request->validate([ //data validation
            'course_name'=> 'required',
            'hours'=> 'required|numeric',
            'exampleLink'=>'required',
            'course_caption'=> 'required',
            'qualification'=> 'required|array',
            'benefits'=> 'required|array',
            'competencies'=> 'required|array',
            'image'=>'mimes:jpeg,png,bmp,tiff |max:4094',
        ]);
        //create name for image uploaded
        $database = time().'.'.$data['image']->extension() ;
        $filename = $request->getSchemeAndHttpHost(). '/assets/img/'.$database;
        $data['image']->move(public_path('/assets/img/'), $filename);

        //get latest data in database
        $lastest_id = DB::table('programs')->latest('created_at')->first();

        //send to database in program table
       Programs::create([
        'id'=>$lastest_id->id+1,
        'name'=> $data['course_name'],
        'exam_link'=> $data['exampleLink'],
        'hours'=> $data['hours'],
        'caption'=> $data['course_caption'],
        'img_name' => $database,
       ]);

       $lastest_id = DB::table('programs')->latest('updated_at')->first(); //get the id of sent data

       //send to database all qualification to qualification table
       foreach($data['qualification'] as $qualification){
            Qualifications::create([
                'programs_id'=>$lastest_id->id,
                'qualification'=>$qualification
            ]);
       }
    //send to database all benefits to benefits table
       foreach($data['benefits'] as $benefit){
            Benefits::create([
                'programs_id'=>$lastest_id->id,
                'benefit'=>$benefit
            ]);
       }

       //send to database all competencies to competencies table
       foreach($data['competencies'] as $competencies){
            Competencies::create([
                'programs_id'=>$lastest_id->id,
                'competencie'=>$competencies
            ]);
       }

       return redirect('program-management/form')->with('success','Add Success');

    }
    //goto program content by id
    public function program_qualification($id){
        $program = Programs::find($id);
        return view('pages.adminprogramsContent', ['program'=>$program]);
    }
    //goto update program form by id
    public function update_program($id){
        $program = Programs::find($id);
        return view('pages.adminprogramsupdateform', ['program'=>$program]);
    }

    //send updated program content logic
    public function updateContent_program(Request $request, $id){
        $data = $request->validate([
            'course_name'=> 'required',
            'hours'=> 'required|numeric',
            'exampleLink'=>'required',
            'course_caption'=> 'required',
            'qualification'=> 'required|array',
            'benefits'=> 'required|array',
            'competencies'=> 'required|array',
            'image'=>'mimes:jpeg,png,bmp,tiff |max:4094',
        ]);

        $program = Programs::find($id);
        $program->exam_link = $data['exampleLink'];
        $program->name = $data['course_name'];
        $program->hours = $data['hours'];
        $program->caption = $data['course_caption'];
        
        if($request->image!==null){ //validate if the file input is not empty
            if($data['image']!==null){
                $database = time().'.'.$data['image']->extension() ;
                $filename = $request->getSchemeAndHttpHost(). '/assets/img/'.$database;
                $data['image']->move(public_path('/assets/img/'), $filename);
                $program->img_name = $database;
            }
        }
        $program->save();
        //delete the old data
        Qualifications::where('programs_id','=',$id)->delete();
        Competencies::where('programs_id','=',$id)->delete();
        Benefits::where('programs_id','=',$id)->delete();

        //insert the updated data
        foreach ($data['qualification'] as $qualification){
            Qualifications::create([
                'programs_id'=>$id,
                'qualification'=>$qualification
            ]);
        }

        foreach ($data['competencies'] as $competencies){
            Competencies::create([
                'programs_id'=>$id,
                'competencie'=>$competencies
            ]);
        }

        foreach ($data['benefits'] as $benefits){
            Benefits::create([
                'programs_id'=>$id,
                'benefit'=>$benefits
            ]);
        }

        return redirect()->back()->with('success','Update success');

    }


    //delete program
    public function delete_program(Request $request){
       Programs::where('id','=',$request->delete_id)->delete();
       return redirect('program-management/form')->with('success','Add Success');
    }

    //goto score card
    public function showScoreCard()
    {
        $scoreCard = ScoreCard::first(); // Fetch all score cards
        return view('pages.score_card', ['scoreCard' => $scoreCard]); // Pass the score cards to the view
    }
    //update score cards in database
    public function updateScoreCards(Request $request, $id){
        $data = $request->validate([
            'number_of_graduates'=> 'required|numeric',
            'number_of_employed'=> 'required|numeric',
            'employment_rate'=> 'required|numeric'
        ]);
        $scoreCards = ScoreCard::find($id);
        $scoreCards->number_of_graduates = $data['number_of_graduates'];
        $scoreCards->number_of_employed = $data['number_of_employed'];
        $scoreCards->employment_rate = $data['employment_rate'];
        $scoreCards->save();
        return redirect()->back()->with('success','Update success');
    }


    //goto manage partners page
    public function managePartners(){
        $partners = Partners::orderBy('id', 'ASC')->paginate(10);
        return view('pages.adminManagePartner', ['partners'=>$partners]);
    }

    //add partners data in database
    public function add_partners(Request $request){
        $data = $request->validate([
            'image'=> 'mimes:jpeg,png,bmp,tiff |max:4094',
            'link'=> 'required'
        ]);

        $database = time().'.'.$data['image']->extension() ;
        $filename = $request->getSchemeAndHttpHost(). 'assets/partners_logo/'.$database;
        $data['image']->move(public_path('assets/partners_logo/'), $filename);
        Partners::create([
            'logo'=>$database,
            'link'=>$data['link']
        ]);

        return redirect()->back()->with('success','Add success');
    }

    //delete partners in database
    public function delete_partners(Request $request){
        DB::table('partners')->where('id', '=', $request->partners_id)->delete();
        return redirect()->back()->with('success','Delete success');
    }



}

