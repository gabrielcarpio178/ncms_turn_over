<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Parents;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\PusherBroadcast;
use App\Models\Programs;

class StudentsController extends Controller
{
    public function registerStudent(Request $request){

        $data = $request->validate([ //data validation
           "course"=> 'required',
           'lname'=> 'required',
           'fname'=> 'required',
           'mname'=> 'required',
           'suffix'=> 'required',
           'number-street'=> 'required',
           'region'=> 'required',
           'province'=> 'required',
           'city-municipality'=> 'required',
           'district'=>'required',
           'zip'=> 'required|numeric',
           'pnumber-street'=> 'required',
           'pregion'=> 'required',
           'pprovince'=> 'required',
           'pcity-municipality'=> 'required',
           'pdistrict'=>'required',
           'pzip'=> 'required|numeric',
            'nationality'=> 'required',
            'contact-number'=> 'required|numeric|digits:11',
            'email'=> 'required|email',
            'gender'=> 'required',
            'civil-status'=> 'required',
            'employement'=> 'required',
            'birthdate'=> 'required|before:today|date',
            'birthplace-region'=> 'required',
            'birthplace-province'=> 'required',
            'birthplace-pcity-municipality'=> 'required',
            'trainee'=> 'required',
            'plname'=> 'required',
            'pfname'=> 'required',
            'pmname'=> 'required',
            'psname'=> 'required',
            'pcontact'=> 'required|numeric|digits:11',
            'classification'=> 'required|array|min:1',
        ]);
        $programs = Programs::all();
        return view('students.register_review',['data'=> $data, 'programs'=>$programs]);
    }

    public function submit_data(Request $request){
        $data = $request->validate([
            "course"=> 'required|numeric',
            'lname'=> 'required',
            'fname'=> 'required',
            'mname'=> 'required',
            'suffix'=> 'required',
            'number-street'=> 'required',
            'region'=> 'required',
            'province'=> 'required',
            'city-municipality'=> 'required',
            'district'=>'required',
            'zip'=> 'required|numeric',
            'pnumber-street'=> 'required',
            'pregion'=> 'required',
            'pprovince'=> 'required',
            'pcity-municipality'=> 'required',
            'pdistrict'=>'required',
            'pzip'=> 'required|numeric',
             'nationality'=> 'required',
             'contact-number'=> 'required|numeric|digits:11',
             'email'=> 'required|email',
             'gender'=> 'required',
             'civil-status'=> 'required',
             'employement'=> 'required',
             'birthdate'=> 'required|before:today|date',
             'birthplace-region'=> 'required',
             'birthplace-province'=> 'required',
             'birthplace-pcity-municipality'=> 'required',
             'trainee'=> 'required',
             'plname'=> 'required',
             'pfname'=> 'required',
             'pmname'=> 'required',
             'psname'=> 'required',
             'pcontact'=> 'required|numeric|digits:11',
             'classification'=> 'required|array|min:1',
         ]);

        $student = ['id_course'=>(int)$data['course'],'fname'=> strtolower($data['fname']),'lname'=>strtolower($data['lname']), 'mname'=>strtolower($data['mname']), 'sname'=>strtolower($data['suffix']), 'street_number'=>$data['number-street'], 'city'=>$data['city-municipality'],'district'=>$data['district'],'zipcode'=>$data['zip'], 'email'=> $data['email'], 'gender'=>$data['gender'], 'civil_status'=>$data['civil-status'], 'employment'=>$data['employement'], 'birthdate'=>$data['birthdate'], 'nationality'=>$data['nationality'], 'contact_number'=>$data['contact-number'], 'birthplace'=>$data['birthplace-pcity-municipality'], 'education'=>$data['trainee'], 'region'=>$data['region'], 'province'=>$data['province']];

        Students::create($student);
        $lastest_id = DB::table('students')->latest('updated_at')->first();
        $parents = ['students_id'=>$lastest_id->id,'plname'=>$data['plname'], 'pfname'=>$data['pfname'], 'pmname'=>$data['pmname'],'psname'=>$data['psname'],'pcontact_number'=>$data['pcontact'], 'pstreet_number'=>$data['pnumber-street'], 'pmunicipality'=>$data['pcity-municipality'], 'pdistrict'=>$data['pdistrict'], 'pzipcode'=>$data['zip']];
        Parents::create($parents);
        foreach($data['classification'] as $classification){
            $classification_data = ['students_id'=>$lastest_id->id, 'classification_data'=>$classification];
            Classification::create($classification_data);
        }
        event(new PusherBroadcast('Applicant name: '.$student['fname']));
        return redirect("/thank_you");
     }
}
