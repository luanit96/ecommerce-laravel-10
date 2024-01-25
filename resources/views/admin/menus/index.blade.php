@extends('layouts.admin')

@section('title')
    <title>list menu</title>
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Menu</h1>
                        <a href="{{ route('create-menus') }}">
                            <input type="submit" value="Add" class="btn btn-lg btn-primary">
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Menus</li>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td>{{ $menu->id }}</td>
                                            <td>{{ $menu->name }}</td>
                                            <td>
                                                <a href="{{ route('edit-menus', ['id' => $menu->id]) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ route('delete-menus', ['id' => $menu->id]) }}"
                                                    class="btn btn-danger btnDelete">Delete</a>
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

@section('js')
    <script src="{{ asset('assets/vendors/sweetalert2@11.js') }}"></script>
@endsection
