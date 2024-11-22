<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list(Request $request){
        $data['getRecord'] = User::getAdmin();  
        $data['meta_title'] = "admin_list";
        return view('admin.admin_list.list',$data);
    }

    public function add(Request $request){
        $data['meta_title'] = "add_admin";
        return view('admin.admin_list.add',$data);
    }

    public function insert_add(Request $request){
        //dd($request->all());
        $data = $request->validate([
            'email' => 'required|email|unique:users',

        ]);
        $data = new User();
        $data->name = trim($request->name);
        $data->email = trim($request->email);
        $data->password = Hash::make($request->password);
        $data->is_role = 1;

        $data->save();

        return redirect('admin/list')->with('success','The Admin User has been created Successfully');

    }

    public function edit(Request $request,$id){
       // dd("Yooo");
       $data['getRecord'] = User::find($id);
       if(!empty($data['getRecord'] )){

        $data['meta_title'] = 'edit_admin';
        return view('admin.admin_list.edit',$data);

       }else{
        abort(404);
       }
      
    }

    public function edit_insert(Request $request,$id){
        //dd("Yooo");
        $data = $request->validate([
            'email' => 'required|email|unique:users,email,'. $id

        ]);
        $data = User::find($id);

        $data->name = trim($request->name);
        
        $data->email = trim($request->email);

        if(!empty($request->password)){
            $data->password = Hash::make($request->password);
        }
        $data->save();

        return redirect('admin/list')->with('success','The Admin User has been Updated Successfully');
    }

    public function delete(Request $request,$id){
        //dd('yOO');

        $data = User::find($id);

        $data->delete();

        return redirect()->back()->with('error','The user has been Deleted');
    }
}
