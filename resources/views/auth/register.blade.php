@extends('layouts.auth')

@section('title')
    <title>Đăng kí</title>
@endsection

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href=""><b>Đăng kí</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email">
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
                        <input type="password" name="password" value="{{ old('password') }}"
                            class="form-control password @error('password') is-invalid @enderror"
                            placeholder="Nhập mật khẩu" autocomplete="new-password">
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
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" value="{{ old('password') }}"
                            class="form-control confirm-password" placeholder="Nhập lại mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-fw fa-eye field-icon toggle-confirm-password"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Đăng kí</button>
                        </div>
                        <!-- end col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- Hoặc -</p>
                    <a href="" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Đăng nhập bằng Facebook
                    </a>
                    <a href="" class="btn btn-block btn-danger">
                        <i class="fas fa-envelope mr-2"></i>
                        Đăng nhập bằng Gmail
                    </a>
                </div>
                <p class="mb-1"><a href="{{ route('login') }}" class="text-left">Đăng nhập</a></p>
                <p class="mb-0"><a href="{{ route('home') }}" class="text-left">Quay lại trang chủ</a></p>
            </div>
            <!-- end form-box -->
        </div><!-- end card -->
    </div>
    <!-- end register-box -->
@endsection

@section('js')
    <script src="{{ asset('fe/js/app.js') }}"></script>
@endsection
