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

                    {{-- Filter Dropdown --}}
                    <div class="mb-3">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter Search
                            </button>
                            <div class="dropdown-menu p-4 shadow" style="min-width: 300px;" aria-labelledby="filterDropdown">
                                <form action="{{ url('admin/list') }}" method="GET">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" value="{{ Request::get('name') }}" class="form-control" placeholder="Enter name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" value="{{ Request::get('email') }}" class="form-control" placeholder="Enter email">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <a href="{{ url('admin/list') }}" class="btn btn-secondary">Reset</a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Registered Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/edit/'.$value->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{ url('admin/delete/'.$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Pagination Links --}}
                        <div>
                            {!! $getRecord->appends(request()->except('page'))->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
