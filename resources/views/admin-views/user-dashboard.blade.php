@extends('layouts.master')

<style>
  /* ── shared ─────────────────────────────────────────────────── */
  .dash-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,.07);
  }
  .dash-card .card-header {
    background: #022B50;
    border-bottom: none;
    font-weight: 600;
    font-size: .95rem;
    color: #ffd200;
  }

  /* ── stat cards (user section) ───────────────────────────────── */
  .ustat-card {
    border-radius: 12px;
    border: none;
    padding: 1.2rem 1.4rem;
    color: #fff;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 4px 14px rgba(0,0,0,.1);
  }
  .ustat-icon {
    width: 50px; height: 50px; border-radius: 50%;
    background: rgba(255,255,255,.22);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.4rem; flex-shrink: 0;
  }
  .ustat-label { font-size: .75rem; opacity: .85; text-transform: uppercase; letter-spacing: .05em; }
  .ustat-value { font-size: 1.7rem; font-weight: 700; line-height: 1; }
  .bg-grad-teal   { background: linear-gradient(135deg,#022B50,#0a4a8c); }
  .bg-grad-purple { background: linear-gradient(135deg,#ffd200,#f97316); color:#022B50 !important; }
  .bg-grad-amber  { background: linear-gradient(135deg,#022B50,#1a5276); }

  /* ── profile card ────────────────────────────────────────────── */
  .profile-card { background:#fff; border-radius:12px; box-shadow:0 2px 12px rgba(0,0,0,.07); padding:1.5rem; }
  .profile-avatar {
    width: 64px; height: 64px; border-radius: 50%;
    background: linear-gradient(135deg,#022B50,#ffd200);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.6rem; color: #fff; font-weight: 700;
    margin-bottom: .75rem;
  }
  .profile-name { font-size: 1.1rem; font-weight: 700; color: #111827; }
  .profile-row { display: flex; align-items: center; gap: .5rem; font-size: .875rem; color: #374151; padding: .3rem 0; border-bottom: 1px solid #f3f4f6; }
  .profile-row:last-child { border-bottom: none; }
  .profile-row .label { font-weight: 600; min-width: 70px; color: #6b7280; }

  /* ── plan cards ─────────────────────────────────────────────── */
  .plan-card { border-radius: 12px; border: 2px solid #e5e7eb; padding: 1.2rem; background:#fff; height:100%; }
  .plan-badge { display:inline-block; background:#d1fae5; color:#065f46; border-radius:20px; padding:2px 10px; font-size:.75rem; font-weight:600; margin-bottom:.5rem; }
  .plan-name  { font-size:1rem; font-weight:700; color:#111827; margin-bottom:.5rem; }
  .plan-meta  { font-size:.8rem; color:#6b7280; }
  .plan-meta span { font-weight:600; color:#374151; }

  /* ── orders table ────────────────────────────────────────────── */
  #orders-table td, #orders-table th { vertical-align: middle; font-size: .875rem; }
  .badge-plan { background:#eff6ff; color:#1e40af; border-radius:20px; padding:3px 10px; font-size:.75rem; }
  .badge-sub  { background:#f0fdf4; color:#15803d; border-radius:20px; padding:3px 10px; font-size:.75rem; }

</style>

@section('content')

<!-- Page header -->
<div class="row mb-1">
  <div class="col-sm-6">
    <h4 class="mb-0 fw-bold">My Dashboard</h4>
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

    {{-- ══════════════════════════════════════════════════════════
         USER DASHBOARD
    ══════════════════════════════════════════════════════════ --}}

    @php
      $subPlan    = $records->where('payment_plan','subcribe')->first();
      $bizPlan    = $records->where('payment_plan','report')->first();
      $totalSpend = $records->sum(fn($r) => (float)str_replace('RS','',$r->amount));
      $planCount  = $records->count();
    @endphp

    <!-- Quick-stat row -->
    <div class="row g-3 mb-4">
      <div class="col-6 col-md-4">
        <div class="ustat-card bg-grad-teal">
          <div class="ustat-icon"><i class="bi bi-bag-check-fill"></i></div>
          <div>
            <div class="ustat-label">Total Purchases</div>
            <div class="ustat-value">{{ $planCount }}</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="ustat-card bg-grad-purple">
          <div class="ustat-icon"><i class="bi bi-currency-rupee"></i></div>
          <div>
            <div class="ustat-label">Total Spent</div>
            <div class="ustat-value">₹{{ number_format($totalSpend) }}</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="ustat-card bg-grad-amber">
          <div class="ustat-icon"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
          <div>
            <div class="ustat-label">Business Plans</div>
            <div class="ustat-value">{{ $records->where('payment_plan','report')->count() }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Profile + Plans row -->
    <div class="row g-3 mb-4">

      <!-- Profile card -->
      <div class="col-md-4">
        <div class="profile-card h-100">
          <div class="profile-avatar">
            {{ strtoupper(substr($userData->first_name,0,1)) }}{{ strtoupper(substr($userData->last_name??'',0,1)) }}
          </div>
          <div class="profile-name mb-2">{{ $userData->first_name }} {{ $userData->last_name }}</div>
          <div class="profile-row">
            <span class="label">Email</span>
            <span>{{ $userData->email }}</span>
            <i class="bi bi-patch-check-fill text-success ms-auto"></i>
          </div>
          <div class="profile-row">
            <span class="label">Mobile</span>
            <span>{{ $userData->mobile ?? '—' }}</span>
          </div>
          <div class="profile-row">
            <span class="label">Member</span>
            <span>{{ \Carbon\Carbon::parse($userData->created_at)->format('d M Y') }}</span>
          </div>
          <a href="{{ url('/settings/profiles') }}" class="btn btn-sm btn-outline-primary mt-3 w-100">
            <i class="bi bi-pencil-square me-1"></i> Edit Profile
          </a>
        </div>
      </div>

      <!-- Active subscription plan -->
      <div class="col-md-4">
        <div class="plan-card">
          <div class="text-muted fw-semibold mb-2" style="font-size:.8rem;text-transform:uppercase;letter-spacing:.05em">Active Subscription</div>
          @if($subPlan)
            <div class="plan-badge">Active</div>
            <div class="plan-name">{{ $subPlan->subscription_name }}</div>
            <div class="plan-meta mb-1">Amount: <span>₹{{ number_format((float)str_replace('RS','',$subPlan->amount)) }}</span></div>
            <div class="plan-meta mb-3">Date: <span>{{ \Carbon\Carbon::parse($subPlan->payment_date)->format('d M Y') }}</span></div>
            <a href="{{ url('/subscriptions/invoice/'.$subPlan->r_payment_id.'/'.$subPlan->id) }}" class="btn btn-sm btn-outline-success">
              <i class="bi bi-download me-1"></i> Download Invoice
            </a>
          @else
            <div class="text-muted mt-2">No active subscription.</div>
            <a href="{{ url('/subscriptions/list') }}" class="btn btn-sm btn-primary mt-3">Browse Subscriptions</a>
          @endif
        </div>
      </div>

      <!-- Active business plan -->
      <div class="col-md-4">
        <div class="plan-card">
          <div class="text-muted fw-semibold mb-2" style="font-size:.8rem;text-transform:uppercase;letter-spacing:.05em">Latest Business Plan</div>
          @if($bizPlan)
            <div class="plan-badge">Purchased</div>
            <div class="plan-name">{{ $bizPlan->report_title }}</div>
            <div class="plan-meta mb-1">Amount: <span>₹{{ number_format((float)str_replace('RS','',$bizPlan->amount)) }}</span></div>
            <div class="plan-meta mb-3">Date: <span>{{ \Carbon\Carbon::parse($bizPlan->payment_date)->format('d M Y') }}</span></div>
            <a href="{{ url('/subscriptions/invoice/'.$bizPlan->r_payment_id.'/'.$bizPlan->id) }}" class="btn btn-sm btn-outline-success">
              <i class="bi bi-download me-1"></i> Download Invoice
            </a>
          @else
            <div class="text-muted mt-2">No business plan purchased.</div>
            <a href="{{ url('/business-plans') }}" class="btn btn-sm btn-primary mt-3">View Business Plans</a>
          @endif
        </div>
      </div>

    </div>

    <!-- Purchased Plans table -->
    <div class="dash-card card mb-4">
      <div class="card-header">
        <i class="bi bi-receipt me-2 text-primary"></i>Purchased Plans
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table id="orders-table" class="table table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Plan Type</th>
                <th>Plan Title</th>
                <th>Payment Method</th>
                <th>Amount (₹)</th>
                <th>Purchase Date</th>
                <th>Invoice</th>
              </tr>
            </thead>
            <tbody>
              @php $idx = 1; @endphp
              @foreach($records as $record)
                @php
                  $title  = !empty($record->subscription_name) ? $record->subscription_name : $record->report_title;
                  $price  = number_format((float)str_replace('RS','',$record->amount));
                  $isPlan = $record->payment_plan == 'report';
                @endphp
                <tr>
                  <td>{{ $idx++ }}</td>
                  <td>
                    @if($isPlan)
                      <span class="badge-plan">Business Plan</span>
                    @else
                      <span class="badge-sub">Subscription</span>
                    @endif
                  </td>
                  <td class="fw-medium">{{ $title }}</td>
                  <td>{{ $record->payment_method }}/{{ $record->method }}</td>
                  <td class="fw-semibold">{{ $price }}</td>
                  <td>{{ \Carbon\Carbon::parse($record->payment_date)->format('d M Y') }}</td>
                  <td>
                    <a href="{{ url('/subscriptions/invoice/'.$record->r_payment_id.'/'.$record->id) }}"
                       class="btn btn-sm btn-outline-secondary">
                      <i class="bi bi-receipt"></i>
                    </a>
                  </td>
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
<script>
$(function(){
  $('#orders-table, #subscribe_table').DataTable({
    paging: true, lengthChange: true, searching: true,
    ordering: true, info: true, autoWidth: false, responsive: true
  });
});
</script>
@endsection
