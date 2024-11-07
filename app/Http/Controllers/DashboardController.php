<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_dashboard(Request $request){
        $data['meta_title'] = 'admin_dashboard';
        return view('admin.dashboard.dashboard',$data);
    }
}
