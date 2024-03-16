@extends('layouts.admin')

@section('title')
    <title>list sample</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/sample/app.css') }}">
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Sample</h1>
                        @can('add-sample')
                            <a href="{{ route('create-samples') }}">
                                <input type="submit" value="Add" class="btn btn-lg btn-primary">
                            </a>
                        @endcan
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Samples</li>
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
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($samples as $sample)
                                        <tr>
                                            <td>{{ $sample->id }}</td>
                                            <td>{{ $sample->name }}</td>
                                            <td>
                                                <img src="{{ $sample->image_path }}" alt="{{ $sample->name }}"
                                                    class="sample_img">
                                            </td>
                                            <td>{{ $sample->quantity }}</td>
                                            <td>
                                                @can('edit-sample')
                                                    <a href="{{ route('edit-samples', ['id' => $sample->id]) }}" class="pr-2"
                                                        title="Edit">
                                                        <i class="fas fa-edit"></i></a>
                                                @endcan
                                                @can('delete-sample')
                                                    <a href="{{ route('delete-samples', ['id' => $sample->id]) }}"
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
