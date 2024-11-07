<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        //dd("Yoo");
        if(!empty(Auth::check())){
            if(Auth::user()->is_role == 1){

                return redirect('admin/dashboard');

            }else if(Auth::user()->is_role == 2){
                return redirect('teacher/dashboard');
            } else if(Auth::user()->is_role == 3){
                return redirect('student/dashboard');
            }else if(Auth::user()->is_role == 4){
                return redirect('parent/dashboard');
            }
        }
        $data['meta_title'] = 'login';
        return view('auth.login',$data);
    }


    public function register(Request $request){
        $data['meta_title'] = 'register';
        return view('auth.register',$data);
    }

    public function forgot(Request $request){
        $data['meta_title'] = 'forgot';
        return view('auth.forgot',$data);
    }

    public function register_insert(Request $request){
       dd($request->all());

    }


    public function login_insert(Request $request){

        //dd("Yooo");
        //creating a hashed password
        // $pass = '1234';
        // $hashedpass = Hash::make($pass);
        // dd($hashedpass);
        // die();

        //dd($request->all());
        $remember = !empty($request->remember) ? true : false;

        if(Auth::attempt(['email' => $request->email,'password' => $request->password],$remember)){

            if(Auth::user()->is_role == 1){

                return redirect('admin/dashboard');

            }else if(Auth::user()->is_role == 2){
                return redirect('teacher/dashboard');
            } else if(Auth::user()->is_role == 3){
                return redirect('student/dashboard');
            }else if(Auth::user()->is_role == 4){
                return redirect('parent/dashboard');
            }
        } else {
         
            return redirect('')->with('error','Wrong Credentials');
        }

    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

}
