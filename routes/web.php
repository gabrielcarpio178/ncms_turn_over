<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthUser;
use App\Http\Controllers\NolitcController;
use App\Http\Controllers\PhpmailerController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Drivers\Gd\Modifiers\RotateModifier;

Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get("/settings", "settings")->name("settings"); //goto account settings
        Route::put("/settings/{id}","update")->name("update"); //update account user settings
        // Route::post('/search/applicant','search_applicant')->name('search.applicant');
        // Route::post('/search/register','search_register')->name('search.registers');
        Route::get('/student_profile/{id}','student_profile')->name('student_profile'); //goto student profile info
        // Route::get('/filter/applicant/{course}','filter_applicant')->name('filter_applicant');
        Route::post('/delete-aplicant','deleteApplicant')->name('delete.applicant'); //delete student applicant data
        Route::put('/accept-aplicant','acceptApplicant')->name('accept.applicant'); //accept student applicant data
        Route::get('/printpdf/{id}','downloadPdf')->name('print.pdf'); //print student profile to pdf
        Route::get('/upload-welcome/','upload_welcome')->name('upload-welcome'); //goto update welcome page
        Route::put('/upload-cover/','upload_cover')->name('upload_cover'); //request update cover photo
        Route::get('/program-management','program_management')->name('program_management'); //goto Program Managemant
        Route::get('/program-management/form','program_management_form')->name('programs'); //goto TESDA QUALIFICATIONS content
        Route::get('/program-management/addform','programs_addform')->name('programs_addform'); //goto add TESDA QUALIFICATIONS  form
        Route::post('/program-addQualification','addTesdaQualification')->name('addTesdaQualification'); //request to send NEW TESDA QUALIFICATIONS in database
        Route::get('/program/program/content/{id}','program_qualification')->name('see_more_program'); //goto see more content by TESDA QUALIFICATIONS id
        Route::get('/program/program/upadate.content/{id}','update_program')->name('updateContent'); //goto to update TESDA QUALIFICATIONS data 
        Route::post('/program/program/upadate.content/{id}','updateContent_program')->name('updateContent_program'); //send request to submit updated data TESDA QUALIFICATIONS
        Route::delete('/program/delete','delete_program')->name('delete.programs'); //delete TESDA QUALIFICATIONS
        Route::get('/scorecards','showScoreCard')->name('showScoreCard'); //goto update score cards
        Route::post('/export','export')->name('export'); //export all data in excel file
        Route::get('/export', 'export_excel')->name('export_excel'); //export filter data in excel file
        Route::get('/register-student', 'register_student')->name('register_admin'); //goto register student
        Route::post('/register-student', 'filter')->name('filter'); //filter data list
        Route::get('/students/{id}', 'filter_show')->name('students.show'); //goto student applicant profiles
        Route::put('/updateScoreCards/{id}', 'updateScoreCards')->name('updateScoreCards'); //update score cards
        Route::get('/managePartners', 'managePartners')->name('managePartners'); //goto manage partners page
        Route::post('/add_partners', 'add_partners')->name('add_partners'); //send add partner in database
        Route::delete('/delete_partners', 'delete_partners')->name('delete_partners'); //delete partner in database
    });
});

Route::controller(AuthUser::class)->group(function(){
    Route::get('/login-user', 'index')->name('login'); //goto login page
    Route::post('/loginAction','loginAction')->name('loginAction'); //execute request for login
    //user identification
    Route::get('/staff','staff')->name('staff')->middleware('auth'); 
    Route::get('/admin','admin')->name('admin')->middleware('auth');
    Route::get('/officer','officer')->name('officer')->middleware('auth');
    Route::post('/signoutAction', 'signoutAction')->name('signoutAction');
});


Route::controller(StudentsController::class)->group(function () {
    Route::post("/registerStudent","registerStudent")->name("register_student"); //send request for review applicant data
    Route::post("/registerStudent_submit","submit_data")->name("register_student_submit"); //send request to database
});


Route::controller(NolitcController::class)->group(function () {
    Route::get("/","welcome")->name("welcome"); //homepage for website
    Route::get("/tesda_qual","tesda_qual")->name("tesda_qual"); //goto TESDA Qualifications page
    Route::get("/see_more/{id}","see_more")->name("see-more"); //goto TESDA Qualifications page see more button
    //goto by name of function
    Route::get("/know-more","know_more")->name("know_more");
    Route::get("/register", "register_student")->name("register.student");
    Route::get("/thank_you", "thank_page")->name("thank_page.student");
});




