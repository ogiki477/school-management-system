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
                                <th>Action</th>

                            </thead>
                            <tbody>
                                @foreach ($getRecord as $getRecord)
                                    <tr>
                                        <td>{{ $getRecord->id}}</td>
                                        <td>{{ $getRecord->name}}</td>
                                        <td>{{ $getRecord->email}}</td>
                                        <td>{{ date('d-m-Y',strtotime($getRecord->created_at))}}</td>
                                        <td>
                                            <a href="{{ url('admin/edit/'.$getRecord->id)}}" class="btn btn-primary"> <i class="bi bi-pencil-square"></i></a>
                                            <a href="{{ url('admin/delete/'.$getRecord->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want delete?')"><i class="bi bi-trash"></i></a>
                                            {{-- <a href="" class="btn btn-warning"><i class="bi bi-eye"></i></a> --}}
                                        </td>
                                    </tr>
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
