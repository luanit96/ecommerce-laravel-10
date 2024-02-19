@extends('layouts.master')

@section('title')
    <title>Tin tức</title>
@endsection

@section('content')
    <!-- Page Header Start -->
    @include('home.components.banner-page', ['titlePage' => 'Tin tức']);
    <!-- Page Header End -->
@endsection
