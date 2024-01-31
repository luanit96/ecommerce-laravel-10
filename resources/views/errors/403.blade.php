@extends('layouts.error')

@section('title')
    <title>403 error</title>
@endsection

@section('content')
    <div class="container error-container">
        <div class="row  d-flex align-items-center justify-content-center">
            <div class="col-md-12 text-center">
                <h1 class="big-text">Oops!</h1>
                <h2 class="small-text">403</h2>
            </div>
            <div class="col-md-6  text-center">
                <a href="{{ route('home') }}" class="button button-dark-blue iq-mt-15 text-center">Back To Home</a>
            </div>
        </div>
    </div>
@endsection
