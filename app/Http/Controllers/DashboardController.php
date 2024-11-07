<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_dashboard(Request $request){
        $data['meta_title'] = 'admin_dashboard';
        return view('admin.dashboard.dashboard',$data);
    }
    public function teacher_dashboard(Request $request){
        dd('Teacher Dashboard');
    }
    public function student_dashboard(Request $request){
        dd('Student Dashboard');
    }
    public function parent_dashboard(Request $request){
        dd('Parent Dashboard');
    }
    
}
