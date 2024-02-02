@extends('layouts.auth')

@section('title')
    <title>Login</title>
@endsection

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Login</b></a>
        </div>
        <!-- end login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control password" name="password" placeholder="Password" required
                            autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- end col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!--end social-auth-links -->
                @if (Route::has('password.request'))
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                    </p>
                @endif
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Register</a>
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
