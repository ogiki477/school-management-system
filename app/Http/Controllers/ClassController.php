<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['meta_title'] = 'class_list';
        $data['getRecord'] = ClassModel::getSingleClass();
        return view('admin.class.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd("Yooo");
        $data['meta_title'] = 'add_class';
        return view('admin.class.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $data = new ClassModel();

        $data->name = trim($request->name);

        $data->status = trim($request->status);

        $data->created_by = Auth::user()->id;

        $data->save();

        return redirect('admin/class/list')->with('success','Class has been created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd("Yooo");
        $data['getRecord'] = ClassModel::findSingle($id);
        if(!empty($data['getRecord'])){

            $data['meta_title'] = "Edit_class";
            return view('admin.class.edit',$data);

        }else {
            abort(404);
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd("Yooo");
        $data = ClassModel::find($id);
        $data->name = trim($request->name);
        $data->status = trim($request->status);
        $data->save();

        return redirect("admin/class/list")->with('success','Class has been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ClassModel::find($id);
        $data->delete();
        return redirect()->back()->with('error',"Class deleted Successfully");
    }
}
