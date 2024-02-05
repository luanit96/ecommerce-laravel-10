@extends('layouts.admin')

@section('title')
    <title>add menu</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/menu/app.css') }}">
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Menu Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @can('list-menu')
                                <li class="breadcrumb-item"><a href="{{ route('list-menus') }}">Menus</a></li>
                            @endcan
                            <li class="breadcrumb-item active">Add</li>
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
                    <form action="{{ route('post-menus') }}" method="POST">
                        @csrf
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Menu name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter menu name">
                                    @error('name')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Parent</label>
                                    <select class="form-control menu_select2_init" name="parent_id">
                                        <option value="0">--Select parent menu--</option>
                                        {!! $htmlOptions !!}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Add" class="btn btn-lg btn-success float-left">
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
    <script src="{{ asset('assets/admin/menu/app.js') }}"></script>
@endsection
