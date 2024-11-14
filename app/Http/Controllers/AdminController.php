<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function list(Request $request){
        $data['meta_title'] = "admin_list";
        return view('admin.admin_list.list',$data);
    }

    public function add(Request $request){
        $data['meta_title'] = "add_admin";
        return view('admin.admin_list.add',$data);
    }
}
