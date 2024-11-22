@extends('admin.layouts._app')

@section("content")

<div class="content-wrapper pt-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-16">
                    <h1>Edit Admin</h1>

                        <div class="card card-primary card-outline mb-4"> 
                            
                            <form action="{{ url('admin/edit/'.$getRecord->id)}}" method="post"> 
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="mb-3"> 
                                        <label  class="form-label">Name</label> 
                                        <input type="text" name="name" class="form-control" value="{{ old('name',$getRecord->name)}}">
                                    </div>
                                    <div class="mb-3"> 
                                        <label  class="form-label">Email</label> 
                                        <input type="email" name="email" class="form-control"   value="{{ old('email',$getRecord->email)}}">
                                        <span style="color: red">{{ $errors->first('email') }}</span>
                        
                                      
                                    </div>
                                    <div class="mb-3"> 
                                        <label class="form-label">Password</label> 
                                        <input type="password" name="password" class="form-control"> 
                                        <div> <p>Leave it blank if you do not want to change Password!!</p> </div>
                                    </div>
                                    
                                   
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
