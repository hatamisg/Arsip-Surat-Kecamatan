<!--
=========================================================
* Soft UI Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/soft-ui-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/assets/img/yok3.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/assets/img/yok3.png') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <title>
        Arsip Surat
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/assets/css/soft-ui-dashboard.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('admin.templates.partials.side')
    <main class="main-content mt-1 border-radius-lg">
        <!-- Navbar -->
        @include('admin.templates.partials.navbar')
        <!-- End Navbar -->
        @yield('content')
    </main>

    <!--   Core JS Files   -->
    @include('admin.templates.partials.scripts')
</body>

</html>
