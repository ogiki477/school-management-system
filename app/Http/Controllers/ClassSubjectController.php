<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // dd("Yooo");

       $data['meta_title'] = 'assign_subject';
       $data['getRecord'] = ClassSubjectModel::get();
       return view('admin/assign_subject/list',$data);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd("Yoo");
        $data['getClass'] = ClassModel::getClass();
        $data['getSubjectList'] = SubjectModel::getSubjectList();
        $data['meta_title'] = 'Add_Assign Subject';
        return view('admin/assign_subject/add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd("YOOO");
        if(!empty($request->subject_id)){

            foreach($request->subject_id as $subject_id){

                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id,$request->subject_id);
                if(!empty($getAlreadyFirst)){

                    $getAlreadyFirst->status = trim($request->status);
                    $getAlreadyFirst->save();

                }else{

                    
                $data = new ClassSubjectModel();
                $data->class_id   = $request->class_id;
                $data->subject_id = $subject_id;
                $data->status     = trim($request->status);
                $data->created_by = Auth::user()->id;
                $data->save();

                }

                

            }

            return redirect('admin/assign_subject/list')->with('success','Subject Successfully Assigned');

        }else{
            return redirect()->back()->with('error','An error occurred');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
