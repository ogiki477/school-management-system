<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_dashboard(Request $request){
        return view('admin.dashboard.dashboard');
    }
}
