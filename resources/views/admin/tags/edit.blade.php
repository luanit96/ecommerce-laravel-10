@extends('layouts.admin')

@section('title')
    <title>edit tag</title>
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tag Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @can('list-tag')
                                <li class="breadcrumb-item"><a href="{{ route('list-tags') }}">Tags</a></li>
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
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <form action="{{ route('update-tags', ['id' => $tag->id]) }}" method="POST">
                        @csrf
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tag name(*)</label>
                                    <input type="text" name="name" value="{{ $tag->name }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter tag name">
                                    @error('name')
                                        <div class="alert text-error">{{ $message }}</div>
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
