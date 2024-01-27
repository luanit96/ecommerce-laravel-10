@extends('layouts.admin')

@section('title')
    <title>edit user</title>
@endsection

@section('css')
    <link href="{{ asset('assets/vendors/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/user/app.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- start content wrapper -->
    <div class="content-wrapper">
        <!-- start content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('list-users') }}">Users</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- end container-fluid -->
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <form action="{{ route('update-users', ['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>User name(*)</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                        placeholder="Enter user name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email(*)</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                        placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password(*)</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter password"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role_id[]" class="form-control role_select2" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $userOfRoles->contains('id', $role->id) ? 'selected' : '' }}>
                                                {{ $role->name }}</option>
                                        @endforeach
                                    </select>
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
    <script src="{{ asset('assets/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/user/app.js') }}"></script>
@endsection
