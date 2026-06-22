<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="mc" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <!-- <title>@yield('title')</title> -->
    <title>Food Tech Mate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Food Tech Mate | Dashboard" name="description" />
    <meta content="Food Tech Mate" name="author" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- jQuery must load early so page scripts can use $ -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <!-- App favicon -->
    <link
      rel="stylesheet"
      href="https://fonts.cdnfonts.com/css/quicksand" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/adminlte.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/buttons.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/all.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/dropzone.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/dropzone.css') }}" type="text/css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
</head>

@section('body')
    @include('layouts.body')
@show
    <!-- Begin page -->
    <div class="app-wrapper">
        @include('layouts.topbar')
        @if(session()->has('impersonator_id'))
          @php $impersonator = \App\Models\User::find(session('impersonator_id')); @endphp
          <div class="alert alert-warning text-center mb-0">
            You are impersonating <strong>{{ auth()->user()->name }}</strong>.
            <form method="POST" action="{{ route('admin.impersonate.stop') }}" style="display:inline">
              @csrf
              <button class="btn btn-sm btn-danger ms-3" type="submit">Stop impersonation</button>
            </form>
            @if($impersonator)
              <small class="d-block">Original admin: {{ $impersonator->name }} (ID: {{ $impersonator->id }})</small>
            @endif
          </div>
        @endif
        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <main class="app-main">
        <!--begin::App Content Header-->
            <div class="app-content-header">
          <!--begin::Container-->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            {{-- @include('layouts.footer-admin') --}}
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
            integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
    {{-- Bootstrap 5 bundle (includes Popper) — single load, avoids separate-Popper conflicts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('assets/js/adminlte.js') }}"></script>
    <script>
      // Initialise OverlayScrollbars on the sidebar wrapper (AdminLTE 4 feature)
      document.addEventListener('DOMContentLoaded', function () {
        var sidebarWrapper = document.querySelector('.sidebar-wrapper');
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: { theme: 'os-theme-light', autoHide: 'leave', clickScroll: true }
          });
        }

        // Explicitly init every Bootstrap 5 dropdown — prevents any element being missed
        document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(function (el) {
          bootstrap.Dropdown.getOrCreateInstance(el);
        });
      });
    </script>

</body>

</html>
