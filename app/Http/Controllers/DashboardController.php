<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request){

        if(Auth::user()->is_role == 1){
            
            $data['meta_title'] = 'admin_dashboard';
            return view('admin.dashboard.dashboard',$data);

        }else if(Auth::user()->is_role == 2){
            $data['meta_title'] = 'teacher_dashboard';
        
            return view('teacher.dashboard',$data);
        } else if(Auth::user()->is_role == 3){
            $data['meta_title'] = 'student_dashboard';
            return view('student.dashboard',$data);
        }else if(Auth::user()->is_role == 4){
            $data['meta_title'] = 'parent_dashboard';
            return view('parent.dashboard',$data);
        }
    }    
}
