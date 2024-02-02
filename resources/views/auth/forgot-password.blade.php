@extends('layouts.auth')

@section('title')
    <title>forgot password</title>
@endsection

@section('content')
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Forgot your password? No problem. Just let us know your email address and we will
                    email you a password reset link that will allow you to choose a new one.</p>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="{{ route('password.email') }}" method="POST">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Enter email" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Email Password Reset Link</button>
                        </div>
                        <!-- end col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('login') }}">Login</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Register</a>
                </p>
            </div>
            <!-- end login-card-body -->
        </div>
    </div>
@endsection
