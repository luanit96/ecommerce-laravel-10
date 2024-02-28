@extends('layouts.master')

@section('title')
    <title>Tìm kiếm</title>
@endsection

@section('content')
    <!-- Page Header Start -->
    @include('home.components.banner-page', ['titlePage' => 'Tìm kiếm'])
    <!-- Page Header End -->

    <!-- Products Start -->
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2 text-uppercase">Kết quả tìm kiếm</span></h2>
            <p class="mb-0 text-primary font-weight-bold">Tìm thấy {{ $productSearch->count() }} sản phẩm </p>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($productSearch as $productSearchItem)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <a href="{{ route('product-detail', ['slug' => $productSearchItem->slug]) }}"
                                title="{{ $productSearchItem->name }}">
                                <img class="img-fluid w-100" src="{{ $productSearchItem->feature_image_path }}"
                                    alt="{{ $productSearchItem->name }}">
                            </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 role="button" class="text-truncate mb-3 ml-2 mr-2" title="{{ $productSearchItem->name }}">
                                {{ $productSearchItem->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ number_format($productSearchItem->discount) }} đ</h6>
                                <h6 class="text-muted ml-2"><del>{{ number_format($productSearchItem->price) }} đ</del>
                                </h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('product-detail', ['slug' => $productSearchItem->slug]) }}"
                                class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi
                                tiết</a>
                            <a href="{{ route('carts') }}" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>Xem giỏ hàng
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->

    <!-- Categories Start -->
    @include('home.components.categories')
    <!-- Categories End -->

    <!-- Products New Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2 text-uppercase">Sản phẩm mới nhất</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($newProducts as $newProduct)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <a href="{{ route('product-detail', ['slug' => $newProduct->slug]) }}"
                                title="{{ $newProduct->name }}">
                                <img class="img-fluid w-100" src="{{ $newProduct->feature_image_path }}"
                                    alt="{{ $newProduct->name }}">
                            </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 role="button" class="text-truncate mb-3 ml-2 mr-2" title="{{ $newProduct->name }}">
                                {{ $newProduct->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ number_format($newProduct->discount) }} đ</h6>
                                <h6 class="text-muted ml-2"><del>{{ number_format($newProduct->price) }} đ</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('product-detail', ['slug' => $newProduct->slug]) }}"
                                class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi
                                tiết</a>
                            <a href="{{ route('carts') }}" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>Xem giỏ hàng
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products New End -->

    <!-- Products Favourite Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2 text-uppercase">Sản phẩm nổi bật</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($favouriteProducts as $favouriteProduct)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <a href="{{ route('product-detail', ['slug' => $favouriteProduct->slug]) }}"
                                title="{{ $favouriteProduct->name }}">
                                <img class="img-fluid w-100" src="{{ $favouriteProduct->feature_image_path }}"
                                    alt="{{ $favouriteProduct->name }}">
                            </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 role="button" class="text-truncate mb-3 ml-2 mr-2" title="{{ $favouriteProduct->name }}">
                                {{ $favouriteProduct->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ number_format($favouriteProduct->discount) }} đ</h6>
                                <h6 class="text-muted ml-2"><del>{{ number_format($favouriteProduct->price) }} đ</del>
                                </h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('product-detail', ['slug' => $favouriteProduct->slug]) }}"
                                class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi
                                tiết</a>
                            <a href="{{ route('carts') }}" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>Xem giỏ hàng
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-3 text-center">
            <a href="{{ route('all-product') }}" class="py-2 px-3 all-product">Xem tất cả sản phẩm</a>
        </div>
    </div>
    <!-- Products Favourite End -->
@endsection
