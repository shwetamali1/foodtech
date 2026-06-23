@extends('layouts.master')

<style>
  html { scroll-behavior: smooth; }

  .stat-card {
    border-radius: 12px; border: none; color: #fff;
    padding: 1.4rem 1.6rem; display: flex; align-items: center; gap: 1rem;
    box-shadow: 0 4px 15px rgba(0,0,0,.12);
    cursor: pointer; text-decoration: none;
    transition: transform .15s, box-shadow .15s;
  }
  .stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,.18); }
  .stat-card .stat-icon {
    width: 56px; height: 56px; border-radius: 50%;
    background: rgba(255,255,255,.22);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem; flex-shrink: 0;
  }
  .stat-card .stat-label { font-size: .8rem; opacity: .85; text-transform: uppercase; letter-spacing: .06em; }
  .stat-card .stat-value { font-size: 2rem; font-weight: 700; line-height: 1; }

  .bg-grad-blue   { background: linear-gradient(135deg,#022B50,#0a4a8c); }
  .bg-grad-yellow { background: linear-gradient(135deg,#ffd200,#f59e0b); color:#022B50 !important; }
  .bg-grad-navy2  { background: linear-gradient(135deg,#022B50,#1a5276); }
  .bg-grad-gold   { background: linear-gradient(135deg,#ffd200,#ffb300); color:#022B50 !important; }

  .stat-card.bg-grad-yellow .stat-icon,
  .stat-card.bg-grad-gold   .stat-icon { background: rgba(2,43,80,.18); }

  .section-card { border: none; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,.07); margin-bottom: 1.5rem; }
  .section-card .card-header {
    background: #022B50; color: #ffd200;
    border-radius: 12px 12px 0 0; padding: .9rem 1.2rem;
    font-weight: 600; font-size: .95rem;
  }

  .badge-success { background:#d1fae5; color:#065f46; border-radius:20px; padding:3px 10px; font-size:.75rem; }
  .badge-pending { background:#fef3c7; color:#92400e; border-radius:20px; padding:3px 10px; font-size:.75rem; }
  .badge-failed  { background:#fee2e2; color:#991b1b; border-radius:20px; padding:3px 10px; font-size:.75rem; }

  table td, table th { vertical-align: middle; font-size: .875rem; }
</style>

@section('content')

<!-- Page header -->
<div class="row mb-3">
  <div class="col-sm-6">
    <h4 class="mb-0 fw-bold" style="color:#022B50;">Super Admin Dashboard</h4>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-end mb-0">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </div>
</div>
</div></div>

<div class="app-content">
  <div class="container-fluid">

    <!-- ── Stat cards (click → scroll to section) ──────────────────── -->
    <div class="row g-3 mb-4">
      <div class="col-6 col-md-3">
        <a href="#users-section" class="stat-card bg-grad-blue d-flex" style="color:#fff;text-decoration:none;">
          <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
          <div>
            <div class="stat-label">Total Users</div>
            <div class="stat-value">{{ count($userList) }}</div>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-3">
        <a href="#admins-section" class="stat-card bg-grad-yellow d-flex" style="color:#022B50;text-decoration:none;">
          <div class="stat-icon"><i class="bi bi-person-badge-fill"></i></div>
          <div>
            <div class="stat-label">Admins</div>
            <div class="stat-value">{{ count($adminList) }}</div>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-3">
        <a href="#orders-section" class="stat-card bg-grad-navy2 d-flex" style="color:#fff;text-decoration:none;">
          <div class="stat-icon"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
          <div>
            <div class="stat-label">Business Plans</div>
            <div class="stat-value">{{ count($reportList) }}</div>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-3">
        <a href="#orders-section" class="stat-card bg-grad-gold d-flex" style="color:#022B50;text-decoration:none;">
          <div class="stat-icon"><i class="bi bi-receipt-cutoff"></i></div>
          <div>
            <div class="stat-label">Total Orders</div>
            <div class="stat-value">{{ count($subscriberecords) }}</div>
          </div>
        </a>
      </div>
    </div>

    <!-- ── Live Sales Chart ─────────────────────────────────────────── -->
    <div class="section-card card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <span><i class="bi bi-bar-chart-line me-2"></i>Monthly Overview – {{ $selectedYear }}</span>
        <span style="font-size:.8rem;opacity:.8;">Revenue: ₹{{ number_format($totalRevenue, 2) }}</span>
      </div>

      {{-- Filter bar --}}
      <div class="card-body border-bottom pb-3 pt-3">
        <form method="GET" action="" id="chart-filter-form" class="d-flex flex-wrap align-items-center gap-3">
          {{-- Year picker --}}
          <div class="d-flex align-items-center gap-2">
            <label class="fw-semibold mb-0" style="font-size:.85rem;color:#022B50;">Year</label>
            <select name="year" class="form-select form-select-sm" style="width:auto;min-width:90px;" onchange="document.getElementById('chart-filter-form').submit()">
              @foreach($paymentYears as $yr)
                <option value="{{ $yr }}" {{ $yr == $selectedYear ? 'selected' : '' }}>{{ $yr }}</option>
              @endforeach
            </select>
          </div>

          {{-- View toggle --}}
          <div class="d-flex align-items-center gap-2">
            <label class="fw-semibold mb-0" style="font-size:.85rem;color:#022B50;">Show</label>
            <div class="btn-group btn-group-sm" role="group">
              <input type="radio" class="btn-check" name="chart_view" id="view-both"    value="both"    {{ $selectedView=='both'    ? 'checked' : '' }} onchange="this.form.submit()">
              <label class="btn btn-outline-primary" for="view-both">Both</label>

              <input type="radio" class="btn-check" name="chart_view" id="view-revenue" value="revenue" {{ $selectedView=='revenue' ? 'checked' : '' }} onchange="this.form.submit()">
              <label class="btn btn-outline-primary" for="view-revenue">Revenue</label>

              <input type="radio" class="btn-check" name="chart_view" id="view-orders"  value="orders"  {{ $selectedView=='orders'  ? 'checked' : '' }} onchange="this.form.submit()">
              <label class="btn btn-outline-primary" for="view-orders">Orders</label>
            </div>
          </div>
        </form>
      </div>

      <div class="card-body pb-1">
        <div id="sales-chart"></div>
      </div>
      <div class="card-footer bg-white border-top">
        <div class="row text-center">
          <div class="col-6 col-md-3 border-end">
            <div class="fw-bold text-success" style="font-size:1.1rem;">₹{{ number_format($totalRevenue, 0) }}</div>
            <small class="text-muted text-uppercase">{{ $selectedYear }} Revenue</small>
          </div>
          <div class="col-6 col-md-3 border-end">
            <div class="fw-bold" style="font-size:1.1rem;color:#022B50;">{{ array_sum($chartOrders) }}</div>
            <small class="text-muted text-uppercase">{{ $selectedYear }} Orders</small>
          </div>
          <div class="col-6 col-md-3 border-end">
            <div class="fw-bold" style="font-size:1.1rem;color:#022B50;">{{ count($userList) }}</div>
            <small class="text-muted text-uppercase">Registered Users</small>
          </div>
          <div class="col-6 col-md-3">
            <div class="fw-bold" style="font-size:1.1rem;color:#022B50;">{{ count($reportList) }}</div>
            <small class="text-muted text-uppercase">Business Plans</small>
          </div>
        </div>
      </div>
    </div>

    <!-- ── All Orders table ──────────────────────────────────────────── -->
    <div id="orders-section" class="section-card card mb-4">
      <div class="card-header">
        <i class="bi bi-receipt me-2"></i>All Orders
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table id="orders-table" class="table table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Plan Type</th>
                <th>Plan Title</th>
                <th>Payment ID</th>
                <th>Method</th>
                <th>Amount (₹)</th>
                <th>Status</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 1; @endphp
              @foreach($subscriberecords as $record)
                @php
                  $title = !empty($record->subscription_name) ? $record->subscription_name : $record->report_title;
                  $price = number_format((float)str_replace('RS','',$record->amount));
                  $badge = $record->p_status == 'success' ? 'badge-success' : ($record->p_status == 'failed' ? 'badge-failed' : 'badge-pending');
                  $isPlan = $record->payment_plan == 'report';
                @endphp
                <tr>
                  <td>{{ $i++ }}</td>
                  <td class="fw-medium">{{ $record->first_name }} {{ $record->last_name }}</td>
                  <td>{{ $record->user_email }}</td>
                  <td>{{ $record->user_phone }}</td>
                  <td>
                    @if($isPlan)
                      <span style="background:#eff6ff;color:#1e40af;border-radius:20px;padding:3px 10px;font-size:.75rem;">Business Plan</span>
                    @else
                      <span style="background:#f0fdf4;color:#15803d;border-radius:20px;padding:3px 10px;font-size:.75rem;">Subscription</span>
                    @endif
                  </td>
                  <td>{{ $title }}</td>
                  <td class="text-muted" style="font-size:.8rem;">{{ $record->r_payment_id }}</td>
                  <td>{{ $record->payment_method }}/{{ $record->method }}</td>
                  <td class="fw-semibold">{{ $price }}</td>
                  <td><span class="{{ $badge }}">{{ ucfirst($record->p_status) }}</span></td>
                  <td>{{ \Carbon\Carbon::parse($record->payment_date)->format('d M Y') }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- ── Registered Users table ────────────────────────────────────── -->
    <div id="users-section" class="section-card card mb-4">
      <div class="card-header">
        <i class="bi bi-people-fill me-2"></i>Registered Users
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table id="users-table" class="table table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Registered On</th>
              </tr>
            </thead>
            <tbody>
              @php $j = 1; @endphp
              @foreach($userList as $user)
                <tr>
                  <td>{{ $j++ }}</td>
                  <td class="fw-medium">{{ $user->first_name }} {{ $user->last_name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->mobile ?? '—' }}</td>
                  <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- ── Admins table ──────────────────────────────────────────────── -->
    <div id="admins-section" class="section-card card mb-4">
      <div class="card-header">
        <i class="bi bi-person-badge-fill me-2"></i>Admins
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table id="admins-table" class="table table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Registered On</th>
              </tr>
            </thead>
            <tbody>
              @php $k = 1; @endphp
              @foreach($adminList as $admin)
                <tr>
                  <td>{{ $k++ }}</td>
                  <td class="fw-medium">{{ $admin->first_name }} {{ $admin->last_name }}</td>
                  <td>{{ $admin->email }}</td>
                  <td>{{ $admin->mobile ?? '—' }}</td>
                  <td>{{ \Carbon\Carbon::parse($admin->created_at)->format('d M Y') }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

</main></div>

<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"></script>
<script>
$(function(){
  // ── DataTables ─────────────────────────────────────
  var dtOpts = { paging:true, lengthChange:true, searching:true, ordering:true, info:true, autoWidth:false, responsive:true };
  $('#orders-table').DataTable($.extend({}, dtOpts, { order:[[10,'desc']] }));
  $('#users-table').DataTable($.extend({}, dtOpts, { order:[[4,'desc']] }));
  $('#admins-table').DataTable($.extend({}, dtOpts, { order:[[4,'desc']] }));

  // ── Live chart from DB ──────────────────────────────
  var months      = @json($chartMonths);
  var revenue     = @json($chartRevenue);
  var orders      = @json($chartOrders);
  var chartView   = @json($selectedView);
  var selYear     = @json($selectedYear);

  // Build series based on selected view
  var series = [];
  if (chartView === 'revenue' || chartView === 'both') {
    series.push({ name: 'Revenue (₹)', data: revenue, type: 'area' });
  }
  if (chartView === 'orders' || chartView === 'both') {
    series.push({ name: 'Orders', data: orders, type: 'bar' });
  }

  // Dual yaxis only when showing both
  var yaxisOpts = chartView === 'both'
    ? [
        { title: { text: 'Revenue (₹)' }, labels: { formatter: function(v){ return '₹' + Number(v).toLocaleString(); } } },
        { opposite: true, title: { text: 'Orders' }, labels: { formatter: function(v){ return Math.round(v); } } }
      ]
    : chartView === 'revenue'
      ? { title: { text: 'Revenue (₹)' }, labels: { formatter: function(v){ return '₹' + Number(v).toLocaleString(); } } }
      : { title: { text: 'Orders' }, labels: { formatter: function(v){ return Math.round(v); } } };

  new ApexCharts(document.querySelector('#sales-chart'), {
    series: series,
    chart: {
      height: 260,
      type: 'line',
      toolbar: { show: false },
      zoom: { enabled: false }
    },
    colors: ['#022B50', '#ffd200'],
    fill: { type: ['gradient', 'solid'], gradient: { opacityFrom: .4, opacityTo: .05 } },
    dataLabels: { enabled: false },
    stroke: { curve: 'smooth', width: [3, 0] },
    xaxis: {
      type: 'category',
      categories: months,
      labels: { style: { fontSize: '12px' } }
    },
    yaxis: yaxisOpts,
    tooltip: {
      shared: true,
      intersect: false,
      y: {
        formatter: function(val, opts) {
          var name = opts && opts.seriesIndex !== undefined && series[opts.seriesIndex]
            ? series[opts.seriesIndex].name : '';
          if (name.indexOf('Revenue') !== -1) return '₹' + Number(val).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2});
          return Math.round(val);
        }
      }
    },
    legend: { position: 'top' },
    grid: { borderColor: '#f0f0f0' }
  }).render();
});
</script>
@endsection
