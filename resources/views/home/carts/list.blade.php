@extends('layouts.master')

@section('title')
    <title>Giỏ hàng</title>
@endsection

@section('content')
    <!-- Page Header Start -->
    @include('home.components.banner-page', ['titlePage' => 'Giỏ hàng'])
    <!-- Page Header End -->

    @include('home.components.alert-message')

    <!-- Cart Start -->
    <div class="container-fluid">
        <form method="POST">
            @csrf
            <div class="row px-xl-5">
                @if (count($products) !== 0)
                    @php
                        $total = 0;
                    @endphp
                    <div class="col-lg-12 table-responsive mb-5">
                        <table class="table table-bordered text-center mb-0">
                            <thead class="bg-secondary text-dark">
                                <tr>
                                    <th>Tên</th>
                                    <th>Hình ảnh</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th colspan="2">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @foreach ($products as $product)
                                    @php
                                        $quantity = (int) $carts[$product->id];
                                        $price = $product->discount ? $product->discount : $product->price;
                                        $totalPrice = $price * $quantity;
                                        $total += $totalPrice;
                                    @endphp
                                    <tr>
                                        <td class="align-middle">{{ $product->name }}</td>
                                        <td><img src="{{ $product->feature_image_path }}" alt="{{ $product->name }}"
                                                style="height: 150px;"></td>
                                        <td class="align-middle">
                                            {{ number_format($price) }}đ
                                        </td>
                                        <td class="align-middle">
                                            <div class="input-group quantity mx-auto" style="width: 130px;">
                                                <div class="sp-quantity @error('num_product.*') is-invalid @enderror">
                                                    <div class="sp-minus"><span class="btn-quantity">-</span>
                                                    </div>
                                                    <div class="sp-input">
                                                        <input type="text" name="num_product[{{ $product->id }}]"
                                                            class="quantity-input" value="{{ $quantity }}" />
                                                    </div>
                                                    <div class="sp-plus"><span class="btn-quantity">+</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            {{ number_format($totalPrice) }}đ
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn btn-sm text-danger">
                                                <a href="{{ route('cart-delete', ['id' => $product->id]) }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            @error('num_product.*')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-block btn-success my-3 py-3 cart-update"
                                formaction="{{ route('update-cart') }}">Cập nhật giỏ
                                hàng</button>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-7">
                        <div class="card-header bg-secondary border-0 mb-3">
                            <h4 class="font-weight-semi-bold mb-4">Thông tin khách hàng</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Tên khách hàng (*)</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" type="text" placeholder="Tên khách hàng">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Số điện thoại (*)</label>
                                <input class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" type="text" placeholder="Số điện thoại">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{ old('email') }}" type="email"
                                    placeholder="Email liên hệ">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Địa chỉ giao hàng (*)</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="5">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Ghi chú</label>
                                <textarea class="form-control" name="note" rows="5">{{ old('note') }}</textarea>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-5">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Chi tiết đơn hàng</h4>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Tổng tiền</h5>
                                    <h5 class="font-weight-bold">{{ number_format($total) }}đ</h5>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="font-weight-bold text-danger">Chưa bao gồm phí vận chuyển</span>
                                </div>
                            </div>
                        </div>
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <h5 class="">Thanh toán khi nhận hàng (COD)</h5>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3"
                                    formaction="{{ route('orders') }}">Đặt
                                    hàng</button>
                            </div>
                        </div>
                    </div><!--end col-->
                @else
                    <div class="col-lg-12">
                        <h2 class="text-center">Giỏ hàng trống</h2>
                        <div class="mb-3 text-center">
                            <a href="{{ route('all-product') }}" class="py-2 px-3 all-product">Đi tới mua hàng</a>
                        </div>
                    </div><!--end col-->
                @endif
            </div><!--end row-->
        </form>
    </div>
    <!-- Cart End -->
@endsection
