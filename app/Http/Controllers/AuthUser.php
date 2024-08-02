<?php

namespace App\Http\Controllers;

use App\Models\Programs;
use App\Models\Students;
use App\Models\User_info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthUser extends Controller
{
    public function index(){
        return view("login");
    }

    //logic for login function
    public function loginAction(Request $request){
        $data = $request->validate([
            "username"=> ["required"],
            "password"=> ["required"]
        ]);
        $user = User_info::where("username", $data["username"])->first();
        if(auth()->attempt($data)||Hash::check($data["password"], $user->password)){ //check if the send login data is valid
            $request->session()->regenerate();
            //goto respective pages by user
            if(auth()->user()->usertype == "staff"){
                return redirect()->route('staff')->with('success','welcome staff');
            }else if(auth()->user()->usertype == 'admin'){
                return redirect()->route('admin')->with('success','welcome admin');
            }else if(auth()->user()->usertype == 'officer'){
                return redirect()->route('officer')->with('success','welcome officer');
            }
        }else{
            return back()->with('invalid','Invalid Credentials!');
        }
    }
    public function admin(){
        //bar
        $total_student = Students::count();
        $totalNewStudent = Students::whereBetween('updated_at', [Carbon::now()->subDay(7),'NOW()'])->count();
        $total_pending = Students::where('status','=',false)->count();

        $data = Students::groupBy('id_course')->select(DB::raw('id_course, count(*) as total_count'))->where('status','=',true)->whereMonth('created_at', Carbon::today()->month)->get();
        //separate data label course and value
        $labels_course = array();
        $values_course = array();

        foreach($data as $id_course){
            $program = Programs::where('id','=',$id_course->id_course)->first();
            $values_course[] = $id_course->total_count;
            $labels_course[] = $program->name;
        }
        $programs = Programs::all();
        foreach($programs as $program){
            if(!in_array($program->name, $labels_course)){
                $labels_course[] =  $program->name;
                $values_course[] = 0;
            }
        }

        //doughnut
        $genders = Students::groupBy('gender')->select(DB::raw('gender, count(*) as total_gender'))->get();
        $labels_gender = array('Male', 'Female');
        $values_gender = array(0, 0);
        foreach($genders as $gender){
            if($gender->gender==='Male'){
                $values_gender[0] = $gender->total_gender;
            }elseif($gender->gender === 'Female'){
                $values_gender[1] = $gender->total_gender;
            }
        }

        //horizontal-bar
        $age_datas = Students::select(DB::raw("birthdate"))->get();
        $labels_age = array();
        foreach($age_datas as $age_data){
            $labels_age[] = $this->get_age($age_data->birthdate);
        }
        $values_age_array = array_count_values($labels_age);
        $values_age = array();
        foreach($values_age_array as $value_age_array){
            $values_age[] = $value_age_array;
        }
        $labels_age_key = array_keys($values_age_array);

        //line
        $data_months = Students::groupBy('created_month')->select(DB::raw('count(*) as total_applicant, extract(MONTH from created_at) as created_month'))->orderBy("created_month",'ASC')->get();
        $months = array(
            'Jan.',
            'Feb.',
            'March',
            'Apr.',
            'May',
            'June',
            'July',
            'Aug.',
            'Sept.',
            'Oct.',
            'Nov.',
            'Dec.',
        );

        $data_month_labels = array();
        $data_month_values = array();
        foreach($data_months as $data_month){
            $data_month_labels[] = $months[$data_month->created_month-1];
            $data_month_values[] = $data_month->total_applicant;
        }

        return view('pages.admin', [
            'total_student'=>$total_student,
            'totalNewStudent'=>$totalNewStudent,
            'total_pending'=>$total_pending,
            'values_course'=>$values_course,
            'labels_course'=>$labels_course,
            'labels_gender'=>$labels_gender,
            'values_gender'=>$values_gender,
            'values_age'=>$values_age,
            'labels_age'=>$labels_age_key,
            'data_month_labels'=>$data_month_labels,
            'data_month_values'=>$data_month_values
        ]);
    }
    //get the age by the birthdate in current date
    public function get_age($birthdate){
        $date=date_create($birthdate);
        $birthdate = date_format($date,"m/d/Y");
        $birthDate = explode("/", $birthdate);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
        return $age;
    }

    //graph for staff dashboard
    public function staff(){

        $total_student = Students::count(); //total of all student
        $totalNewStudent = Students::whereBetween('updated_at', [Carbon::now()->subDay(7),'NOW()'])->count(); //get all new user
        $total_pending = Students::where('status','=',false)->count(); //total of pending student
        $data_graphs = Students::groupBy('id_course')->select(DB::raw('id_course, count(*) as total_course'))->get(); //get total count by course
        $data_labels = array();
        $data_values = array();
        foreach($data_graphs as $data_graph){
            $data_labels[] = $data_graph->program->name;
            $data_values[] = $data_graph->total_course;
        }
        return view('pages.officer', [
            'total_student'=>$total_student,
            'totalNewStudent'=>$totalNewStudent,
            'total_pending'=>$total_pending,
            'data_labels'=>$data_labels,
            'data_values'=>$data_values
        ])->with('success','Welcome Officer');

    }
    //goto officer content
    public function officer(){
        return redirect('/upload-welcome/')->with('success','Welcome Officer');
    }
    //logout session
    public function signoutAction(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login-user')->with('logout','Logout Success');
    }

}
