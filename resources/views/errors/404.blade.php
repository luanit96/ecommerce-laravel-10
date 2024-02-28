@extends('layouts.error')

@section('title')
    <title>404 error</title>
@endsection

@section('content')
    <div class="container error-container">
        <div class="row  d-flex align-items-center justify-content-center">
            <div class="col-md-12 text-center">
                <h1 class="big-text">Oops!</h1>
                <h2 class="small-text">Không tìm thấy trang</h2>
            </div>
            <div class="col-md-6  text-center">
                <a href="{{ route('home') }}" class="button button-dark-blue iq-mt-15 text-center">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
@endsection
