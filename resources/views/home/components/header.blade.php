<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-8 d-none d-lg-block">
            <div class="d-inline-flex align-items-center p-2">
                <a class="text-dark pr-3" href="">
                    <i class="fas fa-phone text-primary"></i>
                    {{ getConfigValueSettingTable('phone') }}
                </a>
                <a class="text-dark" href=""><i class="fas fa-envelope-open text-primary"></i>
                    {{ getConfigValueSettingTable('email') }}</a>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="{{ getConfigValueSettingTable('facebook_link') }}">
                    <img src="{{ asset('fe/img/social/facebook.png') }}" alt="facebook-icon" class="img-social-icon">
                </a>
                <a class="text-dark px-2" href="{{ getConfigValueSettingTable('tiktok_link') }}">
                    <img src="{{ asset('fe/img/social/tiktok.png') }}" alt="tiktok-icon" class="img-social-icon">
                </a>
                <a class="text-dark px-2" href="{{ getConfigValueSettingTable('shopee_link') }}">
                    <img src="{{ asset('fe/img/social/shopee.png') }}" alt="shopee-icon" class="img-social-icon">
                </a>
                <a class="text-dark px-2" href="{{ getConfigValueSettingTable('lazada_link') }}">
                    <img src="{{ asset('fe/img/social/lazada.jpg') }}" alt="lazada-icon" class="img-social-icon">
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{ route('home') }}" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span
                        class="text-primary font-weight-bold border px-3 mr-1">G&Q</span>Store</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="{{ route('search-product') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="keySearch" id="search-product" class="form-control"
                        placeholder="Tìm kiếm sản phẩm..." required>
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="{{ route('carts') }}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">{{ is_null(Session::get('carts')) ? 0 : count(Session::get('carts')) }}</span>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0 text-uppercase">Danh mục sản phẩm</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse @if (Route::getCurrentRoute()->uri() == '/') show @endif @if (Route::getCurrentRoute()->uri() != '/') position-absolute bg-light @endif navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                id="navbar-vertical"
                @if (Route::getCurrentRoute()->uri() != '/') style="width: calc(100% - 30px); z-index: 1;" @endif>
                {!! $listCategory !!}
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">G&Q</span>Store</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    {!! $menus !!}
                    <div class="navbar-nav ml-auto py-0">
                        @auth
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle text-capitalize"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @can('dashboard')
                                        <a href="{{ route('dashboard') }}" class="text-decoration-none"><span role="button"
                                                class="dropdown-item">Trang quản
                                                trị</span></a>
                                    @endcan
                                    <form action="{{ route('logout') }}" method="POST" class="formLogout">
                                        @csrf
                                        <span role="button" class="dropdown-item btnLogout">Đăng xuất</span>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link">Đăng nhập</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-item nav-link">Đăng kí</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </nav>
            @if (Route::getCurrentRoute()->uri() == '/')
                <!-- Slider Start-->
                @include('home.components.slider')
                <!-- Slider End-->
            @endif
        </div>
    </div>
</div>
<!-- Navbar End -->
