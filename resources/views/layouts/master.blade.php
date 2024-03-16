<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    @yield('title')

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="GQStore - Shop ban hang uy tin, chat luong, gia re nhat thi truong" name="keywords">
    <meta content="GQStore - Shop ban hang uy tin, chat luong, gia re nhat thi truong" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('fe/img/favicon/favicon.webp') }}" type="image/x-icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:wght@100&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}"
        rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('fe/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('fe/css/style.css') }}" rel="stylesheet">
    <!-- Jquery UI --->
    <link rel="stylesheet" href="{{ asset('fe/css/jquery-ui.css') }}">
</head>

<body>

    @include('home.components.header')


    @yield('content')


    @include('home.components.footer')


    <!-- JavaScript Libraries -->
    <script src="{{ asset('fe/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('fe/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('fe/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('fe/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('fe/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    @yield('js')
    <!-- Template Javascript -->
    <script src="{{ asset('fe/js/main.js') }}"></script>
</body>

</html>
