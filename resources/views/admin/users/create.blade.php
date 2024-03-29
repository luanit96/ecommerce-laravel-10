@extends('layouts.admin')

@section('title')
    <title>add user</title>
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
                        <h1>User Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @can('list-user')
                                <li class="breadcrumb-item"><a href="{{ route('list-users') }}">Users</a></li>
                            @endcan
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- end container-fluid -->
        </section>
        <!-- end content-header -->

        <!-- start main content -->
        <section class="content">
            <form action="{{ route('post-users') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>User name(*)</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter user name">
                                    @error('name')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email(*)</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                                    @error('email')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password(*)</label>
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password(*)</label>
                                    <input type="password" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}"
                                        class="form-control confirm-password @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Confirm password">
                                    @error('password_confirmation')
                                        <div class="alert text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role_id[]" class="form-control role_select2" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="submit" value="Add" class="btn btn-lg btn-success float-left">
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
