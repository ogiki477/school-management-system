<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd("yOOO");
        $data['getRecord'] = SubjectModel::getSingleSubject();
        
        $data['meta_title'] = "Subject_List";
      return view("admin.subject.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // dd("Yoooo");
       $data['meta_title'] = 'add_subjects';

       return view('admin.subject.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());

       $data = new SubjectModel();

       $data->name = trim($request->name);
       $data->type = trim($request->type);
       $data->status = trim($request->status);
       $data->created_by = Auth::user()->id;

       $data->save();

       return redirect("admin/subject/list")->with('success','Subject has been created Successfully');
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
        $data['getRecord'] =  SubjectModel::find($id);

        $data['meta_title'] = 'edit_subject';

        return view('admin/subject/edit',$data);
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd("Yooo");

        $data = SubjectModel::find($id);

        $data->name = trim($request->name);
        $data->type = trim($request->type);
        $data->status = trim($request->status);

        $data->save();

        return  redirect('admin/subject/list')->with('success','Subject Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = SubjectModel::find($id);
        $data->delete();
        return redirect()->back()->with('error','Deleted Successfully');
    }
}
