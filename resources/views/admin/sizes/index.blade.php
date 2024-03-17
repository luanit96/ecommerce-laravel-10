@extends('layouts.admin')

@section('title')
    <title>list size</title>
@endsection

@section('css')
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Size</h1>
                        @can('add-size')
                            <a href="{{ route('create-sizes') }}">
                                <input type="submit" value="Add" class="btn btn-lg btn-primary">
                            </a>
                        @endcan
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sizes</li>
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
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $size)
                                <tr>
                                    <td>{{ $size->id }}</td>
                                    <td>{{ $size->name }}</td>
                                    <td>{{ $size->quantity }}</td>
                                    <td>
                                        @can('edit-size')
                                            <a href="{{ route('edit-sizes', ['id' => $size->id]) }}" class="pr-2"
                                                title="Edit">
                                                <i class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('delete-size')
                                            <a href="{{ route('delete-sizes', ['id' => $size->id]) }}"
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
