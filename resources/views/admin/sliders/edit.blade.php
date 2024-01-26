@extends('layouts.admin')

@section('title')
    <title>edit slider</title>
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
                        <h1>Slider Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('list-sliders') }}">Sliders</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- end container-fluid -->
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <form action="{{ route('update-sliders', ['id' => $slider->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Slider name(*)</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter slider name" value="{{ $slider->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="image_path">Image</label>
                                    <input type="file" name="image_path" class="form-control-file" id="fileUpload">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img id="outputFileUpload" src="{{ $slider->image_path }}" class="img-style"
                                                accept=".png, .jpg, .jpeg">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Link(*)</label>
                                    <input type="text" name="link" class="form-control" placeholder="Enter link"
                                        value="{{ $slider->link }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Description(*)</label>
                                    <textarea class="form-control" name="description" rows="5">{{ $slider->description }}</textarea>
                                </div>
                                <input type="submit" value="Update" class="btn btn-lg btn-success float-left">
                            </div>
                        </div>
                    </div><!--end col-->
                </div>
            </form>
        </section>
        <!-- end main content -->
    </div>
    <!-- end content-wrapper -->
@endsection

@section('js')
    <script src="{{ asset('assets/admin/js/loadFile.js') }}"></script>
@endsection
