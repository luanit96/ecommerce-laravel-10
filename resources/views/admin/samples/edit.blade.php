@extends('layouts.admin')

@section('title')
    <title>edit sample</title>
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
                        <h1>Sample Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @can('list-sample')
                                <li class="breadcrumb-item"><a href="{{ route('list-samples') }}">Samples</a></li>
                            @endcan
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- end container-fluid -->
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <form action="{{ route('update-samples', ['id' => $sample->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Sample name(*)</label>
                                    <input type="text" name="name" value="{{ $sample->name }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter sample name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Image(*)</label>
                                    <input type="file" name="image_path" value="{{ $sample->image_path }}"
                                        class="form-control-file @error('image_path') is-invalid @enderror" id="fileUpload">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img id="outputFileUpload" src="{{ $sample->image_path }}" class="img-style"
                                                accept=".png, .jpg, .jpeg">
                                        </div>
                                    </div>
                                    @error('image_path')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" min="0" value="{{ $sample->quantity }}"
                                        class="form-control @error('quantity') is-invalid @enderror">
                                    @error('quantity')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
    <script src="{{ asset('assets/admin/js/loadFile.js') }}"></script>
@endsection
