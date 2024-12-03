<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Auth 
Route::get('/',[AuthController::class,'login']);
Route::post('login',[AuthController::class,'login_insert']);
Route::get('register',[AuthController::class,'register']);
Route::post('register',[AuthController::class,'register_insert']);
Route::get('forgot',[AuthController::class,'forgot']);
Route::post('forgot',[AuthController::class,'forgot_post']);
Route::get('reset/{token}',[AuthController::class,'reset_password']);
Route::post('reset/{token}',[AuthController::class,'post_reset_password']);
Route::get('logout',[AuthController::class,'logout']);






//Admin Middleware
Route::group(['middleware' => 'admin'], function(){

    //Admin Dashboard
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
    Route::get('admin/list',[AdminController::class,'list']);
    Route::get('admin/add',[AdminController::class,'add']);
    Route::post('admin/add',[AdminController::class,'insert_add']);
    Route::get('admin/edit/{id}',[AdminController::class,'edit']);
    Route::post('admin/edit/{id}',[AdminController::class,'edit_insert']);
    Route::get('admin/delete/{id}',[AdminController::class,'delete']);
    
    //class
    Route::get('admin/class/list',[ClassController::class,'index']);
    Route::get('admin/class/add',[ClassController::class,'create']);
    Route::post('admin/class/add',[ClassController::class,'store']);
    Route::get('admin/class/edit/{id}',[ClassController::class,'edit']);
    Route::post('admin/class/edit/{id}',[ClassController::class,'update']);
    Route::get('admin/class/delete/{id}',[ClassController::class,'destroy']);


    //Subject

    Route::get('admin/subject/list',[SubjectController::class,'index']);
    Route::get('admin/subject/add',[SubjectController::class,'create']);
    Route::post('admin/subject/add',[SubjectController::class,'store']);
    Route::get('admin/subject/edit/{id}',[SubjectController::class,'edit']);
    Route::post('admin/subject/edit/{id}',[SubjectController::class,'update']);
    Route::get('admin/subject/delete/{id}',[SubjectController::class,'destroy']);

    //Assign Subject

    Route::get('admin/assign_subject/list',[ClassSubjectController::class,'index']);
    Route::get('admin/assign_subject/add',[ClassSubjectController::class,'create']);
    Route::post('admin/assign_subject/add',[ClassSubjectController::class,'store']);
    Route::get('admin/assign_subject/edit/{id}',[ClassSubjectController::class,'edit']);
    Route::post('admin/assign_subject/edit/{id}',[ClassSubjectController::class,'update']);
    Route::get('admin/assign_subject/delete/{id}',[ClassSubjectController::class,'destroy']);



});

//Student Middleware
Route::group(['middleware' => 'student'],function(){

    //Student Dashboard
    Route::get('student/dashboard',[DashboardController::class,'dashboard']);


});

//Teacher Middleware
Route::group(['middleware' => 'teacher'],function(){

    //Teacher Dashboard
    
    Route::get('teacher/dashboard',[DashboardController::class,'dashboard']);

});


Route::group(['middleware' => 'parent'],function(){

    //Parent Dashboard
    Route::get('parent/dashboard',[DashboardController::class,'dashboard']);

});


