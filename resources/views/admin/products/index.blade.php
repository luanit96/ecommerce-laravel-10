@extends('layouts.admin')

@section('title')
    <title>list product</title>
@endsection

@section('css')
    <link href="{{ asset('assets/admin/product/app.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Product</h1>
                        @can('add-product')
                            <a href="{{ route('create-products') }}">
                                <input type="submit" value="Add" class="btn btn-lg btn-primary">
                            </a>
                        @endcan
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ number_format($product->price) }}</td>
                                            <td>{{ number_format($product->discount) }}</td>
                                            <td>
                                                <img class="feature_product_img" src="{{ $product->feature_image_path }}"
                                                    alt="">
                                            </td>
                                            <td>{{ optional($product->category)->name }}</td>
                                            <td>
                                                @can('edit-product')
                                                    <a href="{{ route('edit-products', ['id' => $product->id]) }}"
                                                        class="btn btn-primary">Edit</a>
                                                @endcan
                                                @can('delete-product')
                                                    <a href="{{ route('delete-products', ['id' => $product->id]) }}"
                                                        class="btn btn-danger btnDelete">Delete</a>
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
