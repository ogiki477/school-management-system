<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function forgot_post(Request $request){
       // dd("yooo");
       $count = User::where('email','=',$request->email)->count();
       if($count > 0){
        $data = User::where('email','=',$request->email)->first();

        $random_pass = rand(111111,999999);
        $data->password = Hash::make($random_pass);
        $data->save();

        Mail::to($data->email)->send( new ForgotPasswordMail($data));

        return redirect()->back()-with('success','Your new Password has been sent to your email');

       }else{
        return redirect()->back()->with('error','Email Not Found');
       }
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
