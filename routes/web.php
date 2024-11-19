<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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


