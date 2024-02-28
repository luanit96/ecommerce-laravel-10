@extends('layouts.master')

@section('title')
    <title>Tất cả sản phẩm</title>
@endsection

@section('content')
    <!-- Page Header Start -->
    @include('home.components.banner-page', ['titlePage' => 'Sản phẩm'])
    <!-- Page Header End -->

    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sắp xếp
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                    <a class="dropdown-item {{ request()->name == 'asc' ? 'active' : '' }}"
                                        href="{{ route('product-orderby', ['name' => 'asc']) }}">Tên từ
                                        a->z</a>
                                    <a class="dropdown-item {{ request()->name == 'desc' ? 'active' : '' }}"
                                        href="{{ route('product-orderby', ['name' => 'desc']) }}">Tên
                                        từ z->a</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($productAll as $productItem)
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <a href="{{ route('product-detail', ['slug' => $productItem->slug]) }}"
                                        title="{{ $productItem->name }}">
                                        <img class="img-fluid w-100" src="{{ $productItem->feature_image_path }}"
                                            alt="{{ $productItem->name }}">
                                    </a>
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 role="button" class="text-truncate mb-3 ml-2 mr-2"
                                        title="{{ $productItem->name }}">
                                        {{ $productItem->name }}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>{{ number_format($productItem->discount) }} đ</h6>
                                        <h6 class="text-muted ml-2"><del>{{ number_format($productItem->price) }} đ</del>
                                        </h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('product-detail', ['slug' => $productItem->slug]) }}"
                                        class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi
                                        tiết</a>
                                    <a href="{{ route('carts') }}" class="btn btn-sm text-dark p-0">
                                        <i class="fas fa-shopping-cart text-primary mr-1"></i>Xem giỏ hàng
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 pt-5">
                        {{ $productAll->links() }}
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection
