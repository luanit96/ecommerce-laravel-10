@extends('layouts.admin')

@section('title')
    <title>edit size</title>
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Size Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @can('list-size')
                                <li class="breadcrumb-item"><a href="{{ route('list-sizes') }}">Sizes</a></li>
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
                    <form action="{{ route('update-sizes', ['id' => $size->id]) }}" method="POST">
                        @csrf
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Size name(*)</label>
                                    <input type="text" name="name" value="{{ $size->name }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter size name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" min="0" value="{{ $size->quantity }}"
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
