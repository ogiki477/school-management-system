<?php

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



//Dashboard
Route::get('admin/dashboard',[DashboardController::class,'admin_dashboard']);
