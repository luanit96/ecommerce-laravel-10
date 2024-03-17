@extends('layouts.admin')

@section('title')
    <title>edit role</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/role/app.css') }}">
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Role Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @can('list-role')
                                <li class="breadcrumb-item"><a href="{{ route('list-roles') }}">Roles</a></li>
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
            <form action="{{ route('update-roles', ['id' => $role->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Role name(*)</label>
                                    <input type="text" name="name" value="{{ $role->name }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter role name">
                                    @error('name')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="display_name" rows="3">{{ $role->display_name }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-12">
                        <label class="text-capitalize title-checkbox title-checkall text-"><input type="checkbox"
                                class="checkboxAllPermission">
                            permissions</label>
                    </div><!--end col-->
                    <div class="col-md-12">
                        @foreach ($permissionParents as $permissionParent)
                            <div class="card">
                                <div class="card-header card-header-custom">
                                    <input type="checkbox" class="checkboxWrapper">
                                    <span class="text-capitalize title-checkbox">
                                        {{ $permissionParent->name }}</span>
                                </div>
                                <div class="row">
                                    @foreach ($permissionParent->permissionChildrent as $permissionItem)
                                        <div class="col-md-3">
                                            <div class="card-body">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label text-capitalize">
                                                        <input type="checkbox" class="form-check-input checkboxChildrent"
                                                            name="permission_id[]" value="{{ $permissionItem->id }}"
                                                            {{ $roleOfPermissions->contains('id', $permissionItem->id) ? 'checked' : '' }}>
                                                        {{ $permissionItem->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!--end card-->
                        @endforeach
                    </div><!--end col-->
                    <div class="col-md-12">
                        <input type="submit" value="Update" class="btn btn-lg btn-success float-left mb-3">
                    </div><!--end col-->
                </div>
            </form>
        </section>
        <!-- end main content -->
    </div>
    <!-- end content-wrapper -->
@endsection

@section('js')
    <script src="{{ asset('assets/admin/role/app.js') }}"></script>
@endsection
