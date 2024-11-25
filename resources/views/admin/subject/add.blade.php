@extends('admin.layouts._app')

@section("content")

<div class="content-wrapper pt-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-16">
                    <h1>Add New Subject</h1>

                        <div class="card card-primary card-outline mb-4"> 
                            
                            <form action="{{ url('admin/subject/add')}}" method="post"> 
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="mb-3"> 
                                        <label  class="form-label">Subject Name <span style="color: red">*</span></label> 
                                        <input type="text" name="name"  class="form-control" placeholder="Enter Subject name" required>
                                    </div>
                                    <div class="mb-3"> 
                                        <label  class="form-label">Subject Type<span style="color: red">*</span></label> 
                                        <select name="type" class="form-control">
                                            <option value="">Select Subject Type</option>
                                            <option value="Sciences">Sciences</option>
                                            <option value="Arts">Arts</option>
                                        </select>
                                   </div>
                                    <div class="mb-3"> 
                                        <label  class="form-label">Status<span style="color: red">*</span></label> 
                                        <select name="status" class="form-control">
                                            <option value="0">Active</option>
                                            <option value="1">Inactive</option>
                                        </select>
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
