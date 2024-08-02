<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Partners;
use App\Models\Programs;
use App\Models\ScoreCard;
use Illuminate\Http\Request;

class NolitcController extends Controller
{

    function register_student(){
        $programs = Programs::all();
        return view("students.register", ["programs"=>$programs]);
    }
    public function welcome(){
        $data_welcome = Images::first();
        $score_card = ScoreCard::first();
        return view("welcome", [
            'datas'=>$data_welcome,
            'scoreCard'=>$score_card
        ]);
    }
    public function tesda_qual(){
        $data_content = Programs::all();
        return view("tesda_qual", ["datas"=> $data_content]);
    }
    public function see_more($id){
        $data_content = Programs::find($id);
        return view("see_more", ["datas"=> $data_content]);
    }
    public function know_more(){
        return view("about");
    }
    public function thank_page(){
        return view("thank_you");
    }
}
