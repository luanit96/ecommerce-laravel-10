@extends('layouts.master')

@section('title')
    <title>Liên hệ</title>
@endsection

@section('content')
    <!-- Page Header Start -->
    @include('home.components.banner-page', ['titlePage' => 'Liên hệ']);
    <!-- Page Header End -->
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Liên hệ với chúng tôi</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form action="" method="POST" name="sentMessage">
                        @csrf
                        <div class="control-group">
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" name="email" placeholder="Nhập email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" name="content" placeholder="Nhập nội dung"></textarea>
                            <p class="help-block text-danger"></p>
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
