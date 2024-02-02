@extends('layouts.auth')

@section('title')
    <title>Register</title>
@endsection

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href=""><b>Register</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Full name" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control password" placeholder="Password" required
                            autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control confirm-password"
                            placeholder="Confirm password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-fw fa-eye field-icon toggle-confirm-password"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- end col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div>

                <a href="{{ route('login') }}" class="text-center">Already registered?</a>
            </div>
            <!-- end form-box -->
        </div><!-- end card -->
    </div>
    <!-- end register-box -->
@endsection

@section('js')
    <script src="{{ asset('fe/js/app.js') }}"></script>
@endsection
