@extends('layouts.master')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4 feature-item">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4 feature-item">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Miễn phí vận chuyển</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4 feature-item">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hoản trả trong 14 ngày</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4 feature-item">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <p class="text-right">{{ $category->products->count() }} Sản phẩm</p>
                        <a href="{{ route('category-product', ['slug' => $category->slug, 'id' => $category->id]) }}"
                            class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="{{ $category->image_path }}" alt="{{ $category->name }}">
                        </a>
                        <h5 class="font-weight-semi-bold m-0 text-center">{{ $category->name }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="{{ asset('fe/img/offer-1.png') }}" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">Giảm 20% cho tất cả đơn hàng</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Phụ kiện thời trang</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Xem</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="{{ asset('fe/img/offer-2.png') }}" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">Giảm 20% cho tất cả đơn hàng</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Thời trang nữ</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Xem</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm mới nhất</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($newProducts as $newProduct)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <a href="{{ route('product-detail', ['id' => $newProduct->id]) }}"
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
                            <a href="{{ route('product-detail', ['id' => $newProduct->id]) }}"
                                class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi
                                tiết</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm nổi bật</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($favouriteProducts as $favouriteProduct)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <a href="{{ route('product-detail', ['id' => $favouriteProduct->id]) }}"
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
                                <h6 class="text-muted ml-2"><del>{{ number_format($favouriteProduct->price) }} đ</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('product-detail', ['id' => $favouriteProduct->id]) }}"
                                class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi
                                tiết</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-3 text-center">
            <a href="{{ route('all-product') }}" class="py-2 px-3 all-product">Xem tất cả sản phẩm</a>
        </div>
    </div>
    <!-- Products End -->
@endsection
