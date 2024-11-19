@extends('admin.layouts._app')

@section("content")

<div class="content-wrapper pt-3"> <!-- Added padding-top to create space -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-12 text-end">
                    <a href="{{ url('admin/add')}}" class="btn btn-primary">Add New Admin</a>
                </div>
                <div class="col-sm-12">
                    @include('message')
                    <h1>Admin List</h1>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registered Date</th>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $getRecord)
                                    
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>

@endsection
