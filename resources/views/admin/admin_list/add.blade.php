@extends('admin.layouts._app')

@section("content")

<div class="content-wrapper pt-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-16">
                    <h1>Add New Admin</h1>

                        <div class="card card-primary card-outline mb-4"> 
                            
                            <form action="{{ url('admin/add')}}" method="post"> 
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="mb-3"> 
                                        <label  class="form-label">Name <span style="color: red">*</span></label> 
                                        <input type="text" name="name" value="{{ old('name')}}" class="form-control" placeholder="Enter name" required>
                                    </div>
                                    <div class="mb-3"> 
                                        <label  class="form-label">Email <span style="color: red">*</span></label> 
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"  placeholder="Enter email" required>
                                        <span style="color: red">{{ $errors->first('email') }}</span>
                                      
                                    </div>
                                    <div class="mb-3"> 
                                        <label class="form-label">Password <span style="color: red">*</span></label> 
                                        <input type="password" name="password" class="form-control" placeholder="password"> 
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
