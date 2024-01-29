@extends('layouts.admin')

@section('title')
    <title>edit role</title>
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
                            <li class="breadcrumb-item"><a href="{{ route('list-roles') }}">Roles</a></li>
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
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Role name(*)</label>
                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control"
                                        placeholder="Enter role name" required>
                                </div>
                                <div class="form-group">
                                    <label>Description(*)</label>
                                    <textarea class="form-control" name="display_name" rows="3">{{ $role->display_name }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Permission</label>
                                            <select multiple class="custom-select" name="permission_id[]"
                                                style="min-height: 200px;">
                                                @foreach ($permissions as $permission)
                                                    <option value="{{ $permission->id }}"
                                                        {{ $roleOfPermissions->contains('id', $permission->id) ? 'selected' : '' }}>
                                                        {{ $permission->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-12">
                        <input type="submit" value="Update" class="btn btn-lg btn-success float-left">
                    </div><!--end col-->
                </div>
            </form>
        </section>
        <!-- end main content -->
    </div>
    <!-- end content-wrapper -->
@endsection
