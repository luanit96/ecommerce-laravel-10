@extends('layouts.admin')

@section('title')
    <title>list slider</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/slider/app.css') }}">
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Slider</h1>
                        @can('add-slider')
                            <a href="{{ route('create-sliders') }}">
                                <input type="submit" value="Add" class="btn btn-lg btn-primary">
                            </a>
                        @endcan
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sliders</li>
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
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td>{{ $slider->name }}</td>
                                            <td>
                                                <img class="slider_img" src="{{ $slider->image_path }}"
                                                    alt="{{ $slider->name }}">
                                            </td>
                                            <td>
                                                @can('edit-slider')
                                                    <a href="{{ route('edit-sliders', ['id' => $slider->id]) }}" class="pr-2"
                                                        title="Edit"><i class="fas fa-edit"></i></a>
                                                @endcan
                                                @can('delete-slider')
                                                    <a href="{{ route('delete-sliders', ['id' => $slider->id]) }}"
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
                </div>
            </div>
        </section>
        <!-- end Main content -->
    </div>
    <!-- end content-wrapper -->
@endsection
