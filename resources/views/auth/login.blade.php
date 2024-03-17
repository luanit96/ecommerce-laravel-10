@extends('layouts.auth')

@section('title')
    <title>Đăng nhập</title>
@endsection

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Đăng nhập</b></a>
        </div>
        <!-- end login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Nhập email" name="email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control password @error('password') is-invalid @enderror"
                            name="password" value="{{ old('password') }}" placeholder="Nhập mật khẩu"
                            autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- end col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- Hoặc -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Đăng nhập bằng Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fas fa-envelope mr-2"></i> Đăng nhập bằng Gmail
                    </a>
                </div>
                <!--end social-auth-links -->
                {{-- @if (Route::has('password.request'))
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                    </p>
                @endif --}}
                <p class="mb-1">
                    <a href="{{ route('register') }}" class="text-center">Đăng kí tài khoản</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('home') }}" class="text-center">Quay lại trang chủ</a>
                </p>
            </div>
            <!-- end login-card-body -->
        </div>
        <!--end card-->
    </div>
@endsection

@section('js')
    <script src="{{ asset('fe/js/app.js') }}"></script>
@endsection
