@extends('layouts.master')

@section('title')
    <title>Chi tiết sản phẩm</title>
@endsection

@section('content')
    <!-- Page Header Start -->
    @include('home.components.banner-page', ['titlePage' => 'Chi tiết sản phẩm'])
    <!-- Page Header End -->
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ $productDetail->feature_image_path }}"
                                alt="{{ $productDetail->name }}">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{ $productDetail->feature_image_path }}"
                                alt="{{ $productDetail->name }}">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
                <!-- Product Image Start -->
                <div class="owl-carousel related-carousel">
                    @foreach ($productImageByProduct as $productImageByProductItem)
                        <div class="card product-item border-0">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{ $productImageByProductItem->image_path }}"
                                    alt="product-detail">
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Product Image End -->
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $productDetail->name }}</h3>
                <h3 class="font-weight-semi-bold d-inline">{{ number_format($productDetail->discount) }}đ </h3>
                <h3 class="font-weight-semi-bold d-inline"><del>{{ number_format($productDetail->price) }}đ </del></h3>
                <div class="product-content-detail pt-2 pb-2">
                    {!! $productDetail->content !!}
                </div>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-1" name="size">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                            <label class="custom-control-label" for="color-1">Black</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                            <label class="custom-control-label" for="color-2">White</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                            <label class="custom-control-label" for="color-3">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                            <label class="custom-control-label" for="color-4">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                            <label class="custom-control-label" for="color-5">Green</label>
                        </div>
                    </form>
                </div>
                <form action="{{ route('add-cart') }}" method="POST">
                    @csrf
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="sp-quantity @error('num_product') is-invalid @enderror">
                                <div class="sp-minus"><span class="btn-quantity">-</span>
                                </div>
                                <div class="sp-input">
                                    <input type="text" name="num_product" class="quantity-input" value="1" />
                                </div>
                                <div class="sp-plus"><span class="btn-quantity">+</span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm
                            vào
                            giỏ
                            hàng</button>
                        <input type="hidden" name="product_id" value="{{ $productDetail->id }}">
                    </div>
                    @error('num_product')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </form>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Relate Start -->
    @if (!$relateProduct->isEmpty())
        <div class="container-fluid">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2 text-uppercase">Sản phẩm liên quan</span></h2>
            </div>
            <div class="row px-xl-5 pb-3">
                @foreach ($relateProduct as $relateProductItem)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <a href="{{ route('product-detail', ['slug' => $relateProductItem->slug]) }}"
                                    title="{{ $relateProductItem->name }}">
                                    <img class="img-fluid w-100" src="{{ $relateProductItem->feature_image_path }}"
                                        alt="{{ $relateProductItem->name }}">
                                </a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 role="button" class="text-truncate mb-3 ml-2 mr-2"
                                    title="{{ $relateProductItem->name }}">
                                    {{ $relateProductItem->name }}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{ number_format($relateProductItem->discount) }} đ</h6>
                                    <h6 class="text-muted ml-2"><del>{{ number_format($relateProductItem->price) }}
                                            đ</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{ route('product-detail', ['slug' => $relateProductItem->slug]) }}"
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
    @endif
    <!-- Products Relate End -->
@endsection
