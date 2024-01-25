<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @yield('title')

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .info ul {
            list-style-type: none;
            padding: 0;
        }

        .info ul li {
            padding: 0 5px;
        }

        .info ul li a {
            cursor: pointer;
        }
    </style>

    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <!-- start wrapper -->
    <div class="wrapper">

        @include('partials.header')

        @include('partials.sidebar')

        @yield('content')

        @include('partials.footer')

        @include('partials.modal-alert')

    </div>
    <!-- end wrapper -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

    @yield('js')

    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
</body>

</html>
