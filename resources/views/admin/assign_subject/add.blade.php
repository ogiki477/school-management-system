@extends('admin.layouts._app')

@section("content")

<div class="content-wrapper pt-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-16">
                    <h1>Assign Subject To Class</h1>

                        <div class="card card-primary card-outline mb-4"> 
                            
                            <form action="{{ url('admin/add')}}" method="post"> 
                                {{ csrf_field() }}
                                <div class="card-body">


                                    
                                   <div class="mb-3"> 
                                    <label  class="form-label">Class Name<span style="color: red">*</span></label> 
                                    <select name="type" class="form-control">
                                        <option value="">Select Class</option>
                                        @foreach($getClass as $class)
                                        <option value="{{ $class->id }}">{{ $class->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    </div>


                                    <div class="mb-3"> 
                                        <label  class="form-label">Subject<span style="color: red">*</span></label> 
                                        <select name="type" class="form-control">
                                            <option value="">Select Subject</option>
                                            @foreach($getSubjectList as $subject)
                                            <option value="{{ $subject->id }}">{{$subject->name}}</option>
                                            @endforeach
                                            
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
