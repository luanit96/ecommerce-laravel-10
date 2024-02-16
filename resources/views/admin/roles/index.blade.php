@extends('layouts.admin')

@section('title')
    <title>list role</title>
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Role</h1>
                        @can('add-role')
                            <a href="{{ route('create-roles') }}">
                                <input type="submit" value="Add" class="btn btn-lg btn-primary">
                            </a>
                        @endcan
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="list-datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Permission</th>
                                        <th>Depscription</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @foreach ($role->permissions as $rolePermission)
                                                    <div>{{ $rolePermission->name }}</div>
                                                @endforeach
                                            </td>
                                            <td>{{ $role->display_name }}</td>
                                            <td>
                                                @can('edit-role')
                                                    <a href="{{ route('edit-roles', ['id' => $role->id]) }}" class="pr-2"
                                                        title="Edit"><i class="fas fa-edit"></i></a>
                                                @endcan
                                                @can('delete-role')
                                                    <a href="{{ route('delete-roles', ['id' => $role->id]) }}"
                                                        class="pr-2 text-danger btnDelete"><i class="fas fa-trash-alt"></i></a>
                                                @endcan
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
        <!-- end Main content -->
    </div>
    <!-- end content-wrapper -->
@endsection
