@extends('layouts.master')

@section('content')

<style>
  /* ── Subscriptions Page ─────────────────────────────── */
  .sub-section-card {
    background: #fff; border-radius: 16px;
    box-shadow: 0 4px 24px rgba(2,43,80,.09);
    border: 1px solid #e8f0f9; overflow: hidden;
  }
  .sub-section-header {
    background: linear-gradient(135deg, #022B50 0%, #0a4a8c 100%);
    padding: 1rem 1.4rem;
    display: flex; align-items: center; justify-content: space-between;
    position: relative;
  }
  .sub-section-header::before {
    content: ''; position: absolute; left: 0; top: 0; bottom: 0;
    width: 4px; background: #ffd200;
  }
  .sub-section-title {
    color: #fff; font-weight: 700; font-size: .95rem;
    display: flex; align-items: center; gap: .5rem;
  }
  .sub-section-title i { color: #ffd200; }

  /* Table */
  #liecense_table th {
    background: #f8fafc !important; color: #022B50;
    font-weight: 700; font-size: .72rem;
    text-transform: uppercase; letter-spacing: .06em;
    white-space: nowrap;
  }
  #liecense_table td { vertical-align: middle; font-size: .85rem; }

  /* Plan type badges */
  .type-plan { background: #ede9fe; color: #6d28d9; border-radius: 50px; padding: 3px 10px; font-size: .72rem; font-weight: 700; display: inline-block; }
  .type-sub  { background: #dcfce7; color: #15803d; border-radius: 50px; padding: 3px 10px; font-size: .72rem; font-weight: 700; display: inline-block; }

  /* Status badges */
  .status-success { background: #dcfce7; color: #15803d; border-radius: 50px; padding: 3px 11px; font-size: .72rem; font-weight: 700; display: inline-block; }
  .status-pending { background: #fef9c3; color: #854d0e; border-radius: 50px; padding: 3px 11px; font-size: .72rem; font-weight: 700; display: inline-block; }
  .status-failed  { background: #fee2e2; color: #991b1b; border-radius: 50px; padding: 3px 11px; font-size: .72rem; font-weight: 700; display: inline-block; }

  /* Quick stat row */
  .sub-stat {
    background: #fff; border-radius: 14px;
    box-shadow: 0 2px 12px rgba(2,43,80,.07);
    border: 1px solid #e8f0f9;
    padding: 1.1rem 1.3rem;
    display: flex; align-items: center; gap: .9rem;
  }
  .sub-stat-icon {
    width: 46px; height: 46px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem; flex-shrink: 0;
  }
  .sub-stat-label { font-size: .72rem; color: #64748b; text-transform: uppercase; letter-spacing: .05em; font-weight: 600; }
  .sub-stat-value { font-size: 1.5rem; font-weight: 800; color: #022B50; line-height: 1; }
</style>

<!-- Page Header -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6">
        <h4 class="mb-0">User Subscriptions</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end mb-0">
          <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Subscriptions</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="container-fluid">

    @php
      $totalRevenue = $records->sum(fn($r) => (float)str_replace('RS','',$r->amount));
      $successCount = $records->where('p_status','success')->count();
      $planCount    = $records->where('payment_plan','report')->count();
      $subCount     = $records->where('payment_plan','!=','report')->count();
    @endphp

    <!-- Quick stats -->
    <div class="row g-3 mb-4">
      <div class="col-6 col-md-3">
        <div class="sub-stat">
          <div class="sub-stat-icon" style="background:#e8f0f9;color:#022B50;">
            <i class="bi bi-receipt-cutoff"></i>
          </div>
          <div>
            <div class="sub-stat-label">Total Orders</div>
            <div class="sub-stat-value">{{ $records->count() }}</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="sub-stat">
          <div class="sub-stat-icon" style="background:#dcfce7;color:#15803d;">
            <i class="bi bi-check-circle-fill"></i>
          </div>
          <div>
            <div class="sub-stat-label">Successful</div>
            <div class="sub-stat-value">{{ $successCount }}</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="sub-stat">
          <div class="sub-stat-icon" style="background:#ede9fe;color:#6d28d9;">
            <i class="bi bi-file-earmark-bar-graph-fill"></i>
          </div>
          <div>
            <div class="sub-stat-label">Business Plans</div>
            <div class="sub-stat-value">{{ $planCount }}</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="sub-stat">
          <div class="sub-stat-icon" style="background:#fef9c3;color:#854d0e;">
            <i class="bi bi-currency-rupee"></i>
          </div>
          <div>
            <div class="sub-stat-label">Total Revenue</div>
            <div class="sub-stat-value" style="font-size:1.2rem;">₹{{ number_format($totalRevenue) }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Table -->
    <div class="sub-section-card">
      <div class="sub-section-header">
        <div class="sub-section-title">
          <i class="bi bi-receipt"></i> All Subscriptions & Purchases
        </div>
        <span style="color:rgba(255,255,255,.5);font-size:.78rem;">{{ $records->count() }} records</span>
      </div>
      <div class="table-responsive">
        <table id="liecense_table" class="table table-hover mb-0">
          <thead>
            <tr>
              <th style="width:40px">#</th>
              <th>Customer</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Type</th>
              <th>Plan / Title</th>
              <th>Payment ID</th>
              <th>Method</th>
              <th>Amount (₹)</th>
              <th>Status</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            @php $i = 1; @endphp
            @forelse($records as $record)
              @php
                $title  = !empty($record->subscription_name) ? $record->subscription_name : $record->report_title;
                $price  = number_format((float)str_replace('RS','',$record->amount));
                $isPlan = $record->payment_plan == 'report';
                $status = strtolower($record->p_status ?? 'pending');
              @endphp
              <tr>
                <td class="fw-bold text-navy">{{ $i++ }}</td>
                <td class="fw-semibold">{{ $record->first_name }} {{ $record->last_name }}</td>
                <td style="font-size:.82rem;">{{ $record->user_email }}</td>
                <td style="font-size:.82rem;">{{ $record->user_phone ?? '—' }}</td>
                <td>
                  @if($isPlan)
                    <span class="type-plan"><i class="bi bi-file-earmark-bar-graph-fill me-1"></i>Business Plan</span>
                  @else
                    <span class="type-sub"><i class="bi bi-star-fill me-1"></i>Subscription</span>
                  @endif
                </td>
                <td class="fw-medium" style="max-width:180px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{ $title }}">
                  {{ $title }}
                </td>
                <td style="font-size:.77rem;color:#94a3b8;font-family:monospace;">{{ $record->r_payment_id ?? '—' }}</td>
                <td style="font-size:.82rem;">{{ $record->payment_method }}/{{ $record->method }}</td>
                <td class="fw-bold">₹{{ $price }}</td>
                <td>
                  @if($status === 'success')
                    <span class="status-success"><i class="bi bi-check-circle-fill me-1"></i>Success</span>
                  @elseif($status === 'failed')
                    <span class="status-failed"><i class="bi bi-x-circle-fill me-1"></i>Failed</span>
                  @else
                    <span class="status-pending"><i class="bi bi-clock-fill me-1"></i>{{ ucfirst($status) }}</span>
                  @endif
                </td>
                <td style="font-size:.82rem;white-space:nowrap;">
                  {{ \Carbon\Carbon::parse($record->payment_date)->format('d M Y') }}
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="11" class="text-center py-5">
                  <i class="bi bi-receipt" style="font-size:2.5rem;color:#cbd5e1;"></i>
                  <p class="mt-2 text-muted mb-0">No subscription records found.</p>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script>
$(function () {
  $('#liecense_table').DataTable({
    paging: true, lengthChange: true, searching: true,
    ordering: true, info: true, autoWidth: false, responsive: true,
    order: [[10, 'desc']]
  });
});
</script>

@endsection
