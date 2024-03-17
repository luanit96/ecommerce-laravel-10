@extends('layouts.admin')

@section('title')
    <title>list color</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/color/app.css') }}">
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Color</h1>
                        @can('add-color')
                            <a href="{{ route('create-colors') }}">
                                <input type="submit" value="Add" class="btn btn-lg btn-primary">
                            </a>
                        @endcan
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Colors</li>
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
                                <th>Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                                <tr>
                                    <td>{{ $color->id }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>
                                        <img src="{{ $color->image_path }}" alt="{{ $color->name }}" class="color_img">
                                    </td>
                                    <td>{{ $color->quantity }}</td>
                                    <td>
                                        @can('edit-color')
                                            <a href="{{ route('edit-colors', ['id' => $color->id]) }}" class="pr-2"
                                                title="Edit">
                                                <i class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('delete-color')
                                            <a href="{{ route('delete-colors', ['id' => $color->id]) }}"
                                                class="pr-2 text-danger btnDelete" title="Delete"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        @endcan
                                    </td>
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
