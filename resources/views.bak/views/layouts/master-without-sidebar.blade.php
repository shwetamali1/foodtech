<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="horizontal" data-layout-style="" data-layout-position="fixed"  data-topbar="light">

<head>
    <meta charset="utf-8" />
    <title>McCormacks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="McCormacks" name="description" />
    <meta content="McCormacks" name="author" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/logos/favicon/ms-icon-310x310.png')}}">
    @include('layouts.head-css')
</head>
<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar" class="navbar-header">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{URL::asset('build/images/logos/MSM_Logo_Horizontal_Screen_RGB.png') }}" class="card-logo card-logo-dark" alt="logo" height="35">
                </a>
            </div>
        </header>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content" style="margin-top: 30px;">
                <!-- Start content -->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- content -->
            </div>

            @include('layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    @include('layouts.vendor-scripts')
</body>
</html>