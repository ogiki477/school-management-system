@extends('admin.layouts._app')

@section("content")

<div class="content-wrapper pt-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-16">
                    <h1>Edit Class</h1>


                    

                        <div class="card card-primary card-outline mb-4"> 
                            
                            <form action="{{ url('admin/class/edit/'.$getRecord->id)}}" method="post"> 
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="mb-3"> 
                                        <label  class="form-label">Class Name <span style="color: red">*</span></label> 
                                        <input type="text" name="name" value="{{ $getRecord->name}}"  class="form-control" placeholder="Enter class name" required>
                                    </div>
                                    <div class="mb-3"> 
                                        <label  class="form-label">Status<span style="color: red">*</span></label> 
                                        <select name="status" class="form-control">
                                            <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">Active</option>
                                            <option {{ $getRecord->status == 1 ? 'selected' : '' }} value="1">Inactive</option>
                                        </select>
                                   </div>
                                <div class="card-footer"> 
                                    <button type="submit" class="btn btn-primary">Update</button> 
                                </div> 
                            </form>   
                        </div>
            
                </div>         
    </section>
</div>

@endsection
