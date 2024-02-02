@extends('layouts.admin')

@section('title')
    <title>edit category</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/category/app.css') }}">
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @can('list-category')
                                <li class="breadcrumb-item"><a href="{{ route('list-categories') }}">Categories</a></li>
                            @endcan
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('update-categories', ['id' => $category->id]) }}" method="post">
                        @csrf
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $category->name }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter category name">
                                    @error('name')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Parent</label>
                                    <select class="form-control category_select2_init" name="parent_id">
                                        <option value="0">--Select parent category--</option>
                                        {!! $htmlOptions !!}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Update" class="btn btn-lg btn-success float-left">
                    </form>
                </div>
            </div>
        </section>
        <!-- end Main content -->
    </div>
    <!-- end content-wrapper -->
@endsection

@section('js')
    <script src="{{ asset('assets/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/category/app.js') }}"></script>
@endsection
