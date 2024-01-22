@extends('layouts.admin')

@section('title')
    <title>list product</title>
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
                        <a href="{{ route('create-products') }}">
                            <input type="submit" value="Add" class="btn btn-lg btn-primary">
                        </a>
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
                                    <tr>
                                        <td>1</td>
                                        <td>Iphone 8 plus</td>
                                        <td>4000000</td>
                                        <td>3500000</td>
                                        <td>
                                            <img src="" alt="">
                                        </td>
                                        <td>Dien thoai</td>
                                        <td>
                                            <a href="" class="btn btn-primary">Edit</a>
                                            <form action="" class="d-inline-block" id="form-delete" method="post">
                                                @csrf
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-alert">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
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
