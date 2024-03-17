@extends('layouts.admin')

@section('title')
    <title>list permission role</title>
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Permission Role</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Permission Role</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content bg-white p-3">
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="list-datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Role ID</th>
                                <th>Permission ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissionRoles as $permissionRole)
                                <tr>
                                    <td>{{ $permissionRole->id }}</td>
                                    <td>{{ $permissionRole->role_id }}</td>
                                    <td>{{ $permissionRole->permission_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- end Main content -->
    </div>
    <!-- end content-wrapper -->
@endsection
