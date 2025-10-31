<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-topbar="light" data-sidebar-image="none">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title') | McCormacks</title>
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('build/images/logos/MCM-flaticon-small.png')}}">
            @include('layouts.forms-head-css')
    </head>

    <body data-bs-target="#navbar-example" style="max-width: 100%; overflow-x: hidden;">

        <!-- Begin page -->
        <div class="landing">
            <nav class="navbar navbar-expand-lg navbar-landing fixed-top job-navbar" id="navbar">
                <div class="container-fluid custom-container">
                    <a class="navbar-brand" href="#">
                        <img src="{{URL::asset('build/images/logos/MSM_Logo_Horizontal_Screen_RGB.png') }}" class="card-logo card-logo-dark" alt="logo" height="35">
                    </a>
                </div>
            </nav>
            <!-- end navbar -->

            @yield('content')

            <!-- Start footer -->
            <footer class="footer bg-dark w-100" style="left:0;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 text-white">
                            <script>document.write(new Date().getFullYear())</script> © McCormacks Strata Management
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block"></div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end footer -->

            <!--start back-to-top-->
            <button onclick="topFunction()" class="btn btn-info btn-icon landing-back-top" id="back-to-top">
                <i class="ri-arrow-up-line"></i>
            </button>
            <!--end back-to-top-->

        </div>
        <!-- end layout wrapper -->

    @include('layouts.forms-scripts')
    </body>
</html>
