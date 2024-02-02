<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    @yield('title')
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('fe/images/favicon.webp') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('fe/images/apple-touch-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('fe/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('fe/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('fe/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('fe/css/custom.css') }}">

</head>

<body>

    @include('partials.header-fe')


    @yield('content')


    @include('partials.footer-fe')

    <!-- ALL JS FILES -->
    <script src="{{ asset('fe/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('fe/js/popper.min.js') }}"></script>
    <script src="{{ asset('fe/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('fe/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('fe/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('fe/js/inewsticker.js') }}"></script>
    <script src="{{ asset('fe/js/bootsnav.js') }}"></script>
    <script src="{{ asset('fe/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('fe/js/isotope.min.js') }}"></script>
    <script src="{{ asset('fe/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('fe/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('fe/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('fe/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('fe/js/custom.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2@11.js') }}"></script>

    <script>
        $(() => {
            $('.btnLogout').click(function() {
                $('.formLogout').submit();
            });
        });
    </script>
</body>

</html>
