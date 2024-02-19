@extends('layouts.master')

@section('title')
    <title>Giới thiệu</title>
@endsection

@section('content')
    <!-- Page Header Start -->
    @include('home.components.banner-page', ['titlePage' => 'Giới thiệu']);
    <!-- Page Header End -->
@endsection
