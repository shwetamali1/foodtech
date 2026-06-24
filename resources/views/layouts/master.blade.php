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
    <!-- FoodTech Mate — Brand Design System -->
    <style>
      /* ═══════════════════════════════════════════════════════
         BRAND TOKENS
      ═══════════════════════════════════════════════════════ */
      :root {
        --ft-navy:       #022B50;
        --ft-navy-mid:   #0a4a8a;
        --ft-navy-soft:  #e8f0f9;
        --ft-gold:       #FFD21B;
        --ft-gold-dark:  #e6b800;
        --ft-gold-pale:  #fffbdc;
        --ft-text:       #1e293b;
        --ft-muted:      #64748b;
        --ft-border:     #dde5f0;
        --ft-radius:     14px;
        --ft-shadow:     0 4px 24px rgba(2,43,80,.09);
        --ft-shadow-sm:  0 1px 8px  rgba(2,43,80,.07);
      }

      /* ═══════════════════════════════════════════════════════
         PAGE HEADER BANNER
      ═══════════════════════════════════════════════════════ */
      .app-content-header {
        background: linear-gradient(120deg, var(--ft-navy) 0%, var(--ft-navy-mid) 100%);
        padding: 20px 0 22px;
        margin-bottom: 0;
        position: relative;
        overflow: hidden;
      }
      .app-content-header::after {
        content: '';
        position: absolute;
        right: -60px; bottom: -60px;
        width: 200px; height: 200px;
        border-radius: 50%;
        background: rgba(255,210,27,.06);
        pointer-events: none;
      }
      .app-content-header h3,
      .app-content-header h4 {
        color: #fff !important;
        font-weight: 700;
        letter-spacing: -.3px;
        margin: 0;
      }
      .app-content-header .breadcrumb { margin: 0; background: transparent; padding: 0; }
      .app-content-header .breadcrumb-item a {
        color: rgba(255,255,255,.6); font-size:.82rem; text-decoration: none;
        transition: color .2s;
      }
      .app-content-header .breadcrumb-item a:hover { color: var(--ft-gold); }
      .app-content-header .breadcrumb-item.active { color: var(--ft-gold); font-size:.82rem; font-weight:600; }
      .app-content-header .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,.3); }

      /* ═══════════════════════════════════════════════════════
         CARDS
      ═══════════════════════════════════════════════════════ */
      .card {
        border: none !important;
        border-radius: var(--ft-radius) !important;
        box-shadow: var(--ft-shadow);
        overflow: hidden;
        margin-bottom: 1.5rem;
      }
      .card-header {
        background: linear-gradient(135deg, var(--ft-navy) 0%, var(--ft-navy-mid) 100%) !important;
        color: #fff !important;
        border-radius: 0 !important;
        font-weight: 700;
        font-size: .95rem;
        padding: 1rem 1.4rem;
        display: flex !important;
        align-items: center;
        justify-content: space-between;
        border-bottom: none !important;
        position: relative;
      }
      .card-header::before {
        content: '';
        position: absolute;
        left: 0; top: 0; bottom: 0;
        width: 4px;
        background: var(--ft-gold);
        border-radius: 0;
      }
      .card-header .card-title { color: #fff; margin: 0; font-weight: 700; }
      .card-header i { color: var(--ft-gold); }

      /* Add/action button inside card header */
      .card-header .btn-add {
        background: var(--ft-gold);
        border: none;
        color: var(--ft-navy);
        font-weight: 700;
        border-radius: 8px;
        padding: 7px 18px;
        font-size: .82rem;
        transition: all .2s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        text-decoration: none;
      }
      .card-header .btn-add:hover {
        background: var(--ft-gold-dark);
        color: var(--ft-navy);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(255,210,27,.4);
      }

      .card-body { padding: 0; }
      .card-body.padded { padding: 1.5rem; }
      .card-footer {
        background: #f8fafc !important;
        border-top: 1px solid var(--ft-border) !important;
        padding: 1rem 1.4rem;
      }

      /* ═══════════════════════════════════════════════════════
         TABLES
      ═══════════════════════════════════════════════════════ */
      .ft-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
        font-size: .875rem;
        color: var(--ft-text);
      }

      /* Header */
      .ft-table thead tr {
        background: linear-gradient(90deg, #f0f5fb 0%, #e8f0f9 100%);
      }
      .ft-table thead th {
        padding: 13px 14px;
        font-weight: 700;
        font-size: .73rem;
        text-transform: uppercase;
        letter-spacing: .07em;
        color: var(--ft-navy);
        border-bottom: 2px solid var(--ft-border);
        border-top: none;
        white-space: nowrap;
        background: transparent;
      }
      .ft-table thead th:first-child {
        border-left: 4px solid var(--ft-gold);
      }

      /* Body rows */
      .ft-table tbody tr {
        transition: background .15s, box-shadow .15s;
        border-bottom: 1px solid #f0f4fa;
      }
      .ft-table tbody tr:last-child { border-bottom: none; }
      .ft-table tbody tr:nth-child(even) { background: #f9fbff; }
      .ft-table tbody tr:nth-child(odd)  { background: #fff; }
      .ft-table tbody tr:hover {
        background: #eef5ff !important;
        box-shadow: inset 3px 0 0 var(--ft-gold);
      }
      .ft-table td {
        padding: 12px 14px;
        vertical-align: middle;
        border: none;
        color: var(--ft-text);
      }
      .ft-table td:first-child {
        font-weight: 700;
        color: var(--ft-navy);
        font-size: .8rem;
        width: 50px;
      }

      /* DataTable overrides */
      .dataTables_wrapper .dataTables_length select,
      .dataTables_wrapper .dataTables_filter input {
        border-radius: 8px !important;
        border: 1.5px solid var(--ft-border) !important;
        padding: 5px 10px !important;
        font-size: .83rem !important;
        color: var(--ft-text);
      }
      .dataTables_wrapper .dataTables_filter input:focus {
        border-color: var(--ft-navy) !important;
        box-shadow: 0 0 0 3px rgba(2,43,80,.1) !important;
        outline: none;
      }
      .dataTables_wrapper .dataTables_paginate .paginate_button.current,
      .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: var(--ft-navy) !important;
        border-color: var(--ft-navy) !important;
        color: #fff !important;
        border-radius: 6px;
      }
      .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: var(--ft-navy-soft) !important;
        border-color: var(--ft-border) !important;
        color: var(--ft-navy) !important;
        border-radius: 6px;
      }
      .dataTables_wrapper .dataTables_info { color: var(--ft-muted); font-size:.82rem; }
      table.dataTable thead th { border-bottom: 2px solid var(--ft-border) !important; }

      /* ═══════════════════════════════════════════════════════
         ACTION ICON BUTTONS
      ═══════════════════════════════════════════════════════ */
      .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px; height: 32px;
        border-radius: 8px;
        border: none;
        font-size: 15px;
        transition: all .2s;
        text-decoration: none;
        cursor: pointer;
        margin: 0 2px;
      }
      .btn-icon-edit  { background: #e8f0f9; color: var(--ft-navy); }
      .btn-icon-edit:hover  { background: var(--ft-navy); color: #fff; transform: translateY(-1px); }
      .btn-icon-delete { background: #fef2f2; color: #dc2626; }
      .btn-icon-delete:hover { background: #dc2626; color: #fff; transform: translateY(-1px); }
      .btn-icon-view  { background: #f0fdf4; color: #16a34a; }
      .btn-icon-view:hover  { background: #16a34a; color: #fff; transform: translateY(-1px); }
      .btn-icon-download { background: var(--ft-gold-pale); color: var(--ft-navy); }
      .btn-icon-download:hover { background: var(--ft-gold); color: var(--ft-navy); transform: translateY(-1px); }

      /* Legacy action link — override */
      .icon-circle-list {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px; height: 32px;
        border-radius: 8px;
        background: #e8f0f9;
        color: var(--ft-navy) !important;
        font-size: 15px;
        transition: all .2s;
        text-decoration: none;
        margin: 0 2px;
        vertical-align: middle;
      }
      .icon-circle-list:hover { background: var(--ft-navy); color: #fff !important; transform: translateY(-1px); }
      .icon-circle-list.text-success { background:#f0fdf4; color:#16a34a !important; }
      .icon-circle-list.text-success:hover { background:#16a34a; color:#fff !important; }
      .icon-circle-list.text-secondary { background:#fef2f2; color:#dc2626 !important; }
      .icon-circle-list.text-secondary:hover { background:#dc2626; color:#fff !important; }

      /* ═══════════════════════════════════════════════════════
         BADGES
      ═══════════════════════════════════════════════════════ */
      .badge-ft {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .03em;
        text-transform: uppercase;
      }
      .badge-active   { background: #dcfce7; color: #166534; }
      .badge-inactive { background: #fee2e2; color: #991b1b; }
      .badge-pending  { background: #fef9c3; color: #854d0e; }
      .badge-approved { background: #dbeafe; color: #1e40af; }
      .badge-read     { background: #f0fdf4; color: #166534; }
      .badge-unread   { background: #fffbdc;  color: #92400e; }
      .badge-plan     { background: #ede9fe;  color: #5b21b6; }
      .badge-sub      { background: #ecfdf5;  color: #065f46; }

      /* ═══════════════════════════════════════════════════════
         BUTTONS
      ═══════════════════════════════════════════════════════ */
      .btn { border-radius: 9px !important; font-weight: 600; font-size: .86rem; transition: all .2s; }

      .btn-primary {
        background: linear-gradient(135deg, var(--ft-navy), var(--ft-navy-mid)) !important;
        border-color: var(--ft-navy) !important;
        color: #fff !important;
      }
      .btn-primary:hover {
        background: linear-gradient(135deg, var(--ft-navy-mid), var(--ft-navy)) !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(2,43,80,.3);
      }
      .btn-warning {
        background: var(--ft-gold) !important;
        border-color: var(--ft-gold-dark) !important;
        color: var(--ft-navy) !important;
        font-weight: 700;
      }
      .btn-warning:hover { background: var(--ft-gold-dark) !important; transform: translateY(-1px); }
      .btn-danger { background: #dc2626 !important; border-color: #b91c1c !important; }
      .btn-danger:hover { background: #b91c1c !important; transform: translateY(-1px); }
      .btn-success { background: #16a34a !important; border-color: #15803d !important; }
      .btn-outline-secondary { border-color: var(--ft-border) !important; color: var(--ft-muted) !important; }
      .btn-outline-secondary:hover { background: #f1f5f9 !important; }

      /* ═══════════════════════════════════════════════════════
         FORMS
      ═══════════════════════════════════════════════════════ */
      .form-control, .form-select, textarea.form-control {
        border-radius: 10px !important;
        border: 1.5px solid var(--ft-border) !important;
        font-size: .875rem;
        color: var(--ft-text);
        background: #fff;
        transition: border .2s, box-shadow .2s;
        padding: .5rem .85rem;
      }
      .form-control:focus, .form-select:focus, textarea.form-control:focus {
        border-color: var(--ft-navy) !important;
        box-shadow: 0 0 0 3px rgba(2,43,80,.1) !important;
        outline: none;
      }
      .form-label {
        font-weight: 700;
        color: var(--ft-navy);
        font-size: .82rem;
        text-transform: uppercase;
        letter-spacing: .04em;
        margin-bottom: 6px;
      }
      .form-group { margin-bottom: 0; }

      /* Form card */
      .form-card {
        border: none;
        border-radius: var(--ft-radius);
        box-shadow: var(--ft-shadow);
        overflow: hidden;
      }
      .form-card .form-card-header {
        background: linear-gradient(135deg, var(--ft-navy) 0%, var(--ft-navy-mid) 100%);
        padding: 1.1rem 1.5rem;
        display: flex;
        align-items: center;
        gap: .75rem;
        position: relative;
      }
      .form-card .form-card-header::before {
        content: '';
        position: absolute;
        left: 0; top: 0; bottom: 0;
        width: 4px;
        background: var(--ft-gold);
      }
      .form-card .form-card-header .icon-box {
        width: 40px; height: 40px;
        background: rgba(255,210,27,.18);
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
        color: var(--ft-gold);
        flex-shrink: 0;
      }
      .form-card .form-card-header h5 {
        margin: 0;
        color: #fff;
        font-weight: 700;
        font-size: 1rem;
      }
      .form-card .form-card-header p {
        margin: 2px 0 0;
        color: rgba(255,255,255,.6);
        font-size: .78rem;
      }
      .form-card .form-body {
        padding: 1.8rem 1.5rem;
        background: #fff;
      }
      .form-card .form-footer {
        background: #f8fafc;
        border-top: 1px solid var(--ft-border);
        padding: 1rem 1.5rem;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: .75rem;
      }

      /* Field group label section */
      .field-section-label {
        font-size: .7rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .1em;
        color: var(--ft-gold-dark);
        border-bottom: 2px solid var(--ft-gold);
        padding-bottom: 4px;
        margin-bottom: 14px;
        display: block;
      }

      /* ═══════════════════════════════════════════════════════
         DROPZONE
      ═══════════════════════════════════════════════════════ */
      .dz-message, .dropzone .dz-message {
        font-size: .9rem;
        color: var(--ft-muted);
        font-weight: 500;
      }
      .dropzone {
        border: 2px dashed var(--ft-border) !important;
        border-radius: 12px !important;
        background: var(--ft-navy-soft) !important;
        transition: border-color .2s, background .2s;
        min-height: 100px;
        padding: 20px;
      }
      .dropzone:hover, .dropzone.dz-drag-hover {
        border-color: var(--ft-gold) !important;
        background: var(--ft-gold-pale) !important;
      }
      .dropzone .dz-preview .dz-progress { background: var(--ft-navy-soft); }
      .dropzone .dz-preview .dz-progress .dz-upload { background: var(--ft-navy); }

      /* ═══════════════════════════════════════════════════════
         ALERTS
      ═══════════════════════════════════════════════════════ */
      .alert { border-radius: 12px; border: none; display: flex; align-items: flex-start; gap: 10px; font-size: .875rem; }
      .alert-success { background: #f0fdf4; color: #166534; border-left: 4px solid #16a34a; }
      .alert-danger  { background: #fef2f2; color: #991b1b; border-left: 4px solid #dc2626; }
      .alert-warning { background: #fefce8; color: #854d0e; border-left: 4px solid #facc15; }
      .alert-info    { background: #eff6ff; color: #1e40af; border-left: 4px solid #3b82f6; }

      /* ═══════════════════════════════════════════════════════
         SIDEBAR OVERRIDES
      ═══════════════════════════════════════════════════════ */
      .nav-sidebar .nav-link.active,
      .nav-sidebar .nav-link.active:hover {
        background: rgba(255,210,27,.12) !important;
        color: var(--ft-gold) !important;
        border-left: 3px solid var(--ft-gold);
        font-weight: 700;
      }
      .nav-sidebar .nav-link:hover { color: var(--ft-gold) !important; }

      /* ═══════════════════════════════════════════════════════
         PAGE-LEVEL HEADER ROW (non-app-content-header)
      ═══════════════════════════════════════════════════════ */
      .page-header-row {
        background: linear-gradient(120deg, var(--ft-navy) 0%, var(--ft-navy-mid) 100%);
        padding: 20px 28px 22px;
        margin-bottom: 24px;
        position: relative;
        overflow: hidden;
      }
      .page-header-row::after {
        content:''; position:absolute;
        right:-50px; bottom:-50px;
        width:180px; height:180px;
        border-radius:50%;
        background:rgba(255,210,27,.07);
        pointer-events:none;
      }
      .page-header-row h3 { color:#fff !important; font-weight:700; margin:0; }
      .page-header-row .breadcrumb { margin:0; background:transparent; padding:0; }
      .page-header-row .breadcrumb-item a { color:rgba(255,255,255,.6); font-size:.82rem; text-decoration:none; }
      .page-header-row .breadcrumb-item.active { color:var(--ft-gold); font-size:.82rem; font-weight:600; }
      .page-header-row .breadcrumb-item+.breadcrumb-item::before { color:rgba(255,255,255,.3); }

      /* ═══════════════════════════════════════════════════════
         UTILITY
      ═══════════════════════════════════════════════════════ */
      .text-navy { color: var(--ft-navy) !important; }
      .text-gold  { color: var(--ft-gold) !important; }
      .bg-navy    { background: var(--ft-navy) !important; }
      .bg-gold    { background: var(--ft-gold) !important; }

      /* Ensure app-content has breathing room */
      .app-content { padding: 1.5rem; }
    </style>
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
            @yield('content')
        </main>
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
