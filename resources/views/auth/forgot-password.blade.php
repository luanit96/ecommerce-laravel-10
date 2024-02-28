@extends('layouts.auth')

@section('title')
    <title>Quên mật khẩu</title>
@endsection

@section('content')
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Vui lòng nhập địa chỉ email của bạn. Để chúng tối gửi email cho bạn liên kết đặt lại
                    mật khẩu mới.</p>
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" placeholder="Enter email" autofocus>
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
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Liên kết đặt lại mật khẩu</button>
                        </div>
                        <!-- end col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('login') }}">Đăng nhập</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Đăng kí tài khoản</a>
                </p>
            </div>
            <!-- end login-card-body -->
        </div>
    </div>
@endsection
