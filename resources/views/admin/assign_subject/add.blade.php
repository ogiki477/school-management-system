@extends('admin.layouts._app')

@section("content")

<div class="content-wrapper pt-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-16">
                    <h1>Assign Subject To Class</h1>

                        <div class="card card-primary card-outline mb-4"> 
                            
                            <form action="{{ url('admin/assign_subject/add')}}" method="post"> 
                                {{ csrf_field() }}
                                <div class="card-body">


                                    
                                   <div class="mb-3"> 
                                    <label  class="form-label">Class Name<span style="color: red">*</span></label> 
                                    <select name="class_id" class="form-control" required>
                                        <option value="">Select Class</option>
                                        @foreach($getClass as $class)
                                        <option value="{{ $class->id }}">{{ $class->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    </div>


                                    <div class="mb-3"> 
                                            <label>Subject name</label>
                                            @foreach($getSubjectList as $subject)
                                            <div>
                                                <label style="font-weight: normal;">
                                                    <input type="checkbox" name="subject_id[]" value="{{ $subject->id}}">
                                                    {{ $subject->name }}
                                                </label>
                                            </div>
                                            @endforeach     
                                   </div>


                                   <div class="form-group">
                                    <label for="">Status</label>
                                    <select class="form-control" name="status" id="">
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                   </div>

                                    
                                    
                                   
                                </div>
                                <div class="card-footer"> 
                                    <button type="submit" class="btn btn-primary">Submit</button> 
                                </div> 
                            </form>   
                        </div>
            
                </div>         
    </section>
</div>

@endsection
