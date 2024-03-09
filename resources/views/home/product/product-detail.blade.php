@extends('layouts.master')

@section('title')
    <title>Chi tiết sản phẩm</title>
@endsection

@section('content')
    <!-- Page Header Start -->
    @include('home.components.banner-page', ['titlePage' => 'Chi tiết sản phẩm'])
    <!-- Page Header End -->
    @include('home.components.alert-message')
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
                <form action="{{ route('add-cart') }}" method="POST">
                    @csrf
                    <h3 class="font-weight-semi-bold">{{ $productDetail->name }}</h3>
                    <h3 class="font-weight-semi-bold d-inline">{{ number_format($productDetail->discount) }}đ </h3>
                    <h3 class="font-weight-semi-bold d-inline"><del>{{ number_format($productDetail->price) }}đ </del></h3>

                    @if (count($productDetail->sizes) !== 0)
                        <div class="d-flex mb-3 mt-3">
                            <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                            <span>
                                @foreach ($productDetail->sizes as $keySize => $productSizeItem)
                                    @if ($productSizeItem->quantity > 0)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="size-{{ $keySize }}"
                                                name="size" value="{{ $productSizeItem->id }}"
                                                {{ $keySize === 0 ? 'checked' : '' }}>
                                            <label for="size-{{ $keySize }}"
                                                class="custom-control-label">{{ $productSizeItem->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </span>
                        </div>
                    @endif
                    @if (count($productDetail->colors) !== 0)
                        <div class="d-flex mb-3 mt-3">
                            <p class="text-dark font-weight-medium mb-0 mr-3">Màu:</p>
                            <span>
                                @foreach ($productDetail->colors as $keyColor => $productColorItem)
                                    @if ($productColorItem->quantity > 0)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input"
                                                id="color-{{ $keyColor }}" name="color"
                                                value="{{ $productColorItem->id }}"
                                                {{ $keyColor === 0 ? 'checked' : '' }}>
                                            <label for="color-{{ $keyColor }}"
                                                class="custom-control-label">{{ $productColorItem->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </span>
                        </div>
                    @endif
                    @if (count($productDetail->samples) !== 0)
                        <div class="d-flex mb-3 mt-3">
                            <p class="text-dark font-weight-medium mb-0 mr-3">Mẫu:</p>
                            <span>
                                @foreach ($productDetail->samples as $keySample => $productSampleItem)
                                    @if ($productSampleItem->quantity > 0)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input"
                                                id="sample-{{ $keySample }}" name="sample"
                                                value="{{ $productSampleItem->id }}"
                                                {{ $keySample === 0 ? 'checked' : '' }}>
                                            <label for="sample-{{ $keySample }}"
                                                class="custom-control-label">{{ $productSampleItem->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </span>
                        </div>
                    @endif
                    @if ($productDetail->quantity > 0)
                        <div class="d-flex align-items-center mb-4 pt-4">
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
                            <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>
                                Thêm
                                vào
                                giỏ
                                hàng</button>
                            <input type="hidden" name="product_id" value="{{ $productDetail->id }}">
                            <span class="text-danger m-3">Còn {{ $productDetail->quantity }} sản phẩm</span>
                        </div>
                    @else
                        <div class="d-flex align-items-center mb-4 pt-4">
                            <span class="text-danger">Hết hàng</span>
                        </div>
                    @endif
                    @error('num_product')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="product-content-detail pt-2 pb-2">
                        {!! $productDetail->content !!}
                    </div>
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
