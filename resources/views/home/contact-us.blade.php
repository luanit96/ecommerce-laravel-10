@extends('layouts.master')

@section('title')
    <title>Liên hệ</title>
@endsection

@section('content')
    <!-- Page Header Start -->
    @include('home.components.banner-page', ['titlePage' => 'Liên hệ'])
    <!-- Page Header End -->
    @include('home.components.alert-message')
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Liên hệ với chúng tôi</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <form action="{{ route('add-contact') }}" method="POST">
                        @csrf
                        <div class="control-group pb-3">
                            <label>Tên(*)</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nhập tên" />
                            @error('name')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group pb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Nhập email" />
                        </div>
                        <div class="control-group pb-3">
                            <label>Số điện thoại(*)</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                placeholder="Nhập số điện thoại" />
                            @error('phone')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group pb-3">
                            <label>Nội dung liên hệ(*)</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" rows="6" name="content"
                                placeholder="Nhập nội dung liên hệ"></textarea>
                            @error('content')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">G&Q Store</h5>
                <p>Cảm ơn bạn luôn đồng hành và tin tưởng shop, chúc bạn mua sắm vui vẻ.</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Địa chỉ</h5>
                    <p class="mb-2"><i
                            class="fa fa-map-marker-alt text-primary mr-3"></i>{{ getConfigValueSettingTable('address') }}
                    </p>
                    <p class="mb-2"><i
                            class="fa fa-envelope text-primary mr-3"></i>{{ getConfigValueSettingTable('email') }}</p>
                    <p class="mb-2"><i
                            class="fa fa-phone-alt text-primary mr-3"></i>{{ getConfigValueSettingTable('phone') }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
