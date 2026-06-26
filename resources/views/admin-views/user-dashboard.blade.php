@extends('layouts.master')

@section('content')

<style>
  /* ── stat cards ─────────────────────────────────────────────── */
  .ustat-card {
    border-radius: 16px;
    border: none;
    padding: 1.4rem 1.6rem;
    color: #fff;
    display: flex;
    align-items: center;
    gap: 1.1rem;
    box-shadow: 0 6px 20px rgba(0,0,0,.12);
    position: relative;
    overflow: hidden;
    transition: transform .2s, box-shadow .2s;
  }
  .ustat-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(0,0,0,.16); }
  .ustat-card::after {
    content: '';
    position: absolute;
    right: -20px; top: -20px;
    width: 90px; height: 90px;
    border-radius: 50%;
    background: rgba(255,255,255,.09);
  }
  .ustat-icon {
    width: 54px; height: 54px; border-radius: 14px;
    background: rgba(255,255,255,.22);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem; flex-shrink: 0;
    backdrop-filter: blur(4px);
  }
  .ustat-label { font-size: .72rem; opacity: .8; text-transform: uppercase; letter-spacing: .08em; margin-bottom: 2px; }
  .ustat-value { font-size: 1.9rem; font-weight: 800; line-height: 1; }
  .bg-grad-navy   { background: linear-gradient(135deg, #022B50 0%, #0a4a8c 100%); }
  .bg-grad-gold   { background: linear-gradient(135deg, #e6a800 0%, #ffd200 100%); color: #022B50 !important; }
  .bg-grad-teal   { background: linear-gradient(135deg, #0e7490 0%, #0891b2 100%); }

  /* ── profile card ────────────────────────────────────────────── */
  .ud-profile-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(2,43,80,.09);
    padding: 1.8rem 1.5rem;
    height: 100%;
    display: flex;
    flex-direction: column;
    border: 1px solid #e8f0f9;
  }
  .ud-avatar {
    width: 72px; height: 72px; border-radius: 50%;
    background: linear-gradient(135deg, #022B50, #ffd200);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.8rem; color: #fff; font-weight: 800;
    margin-bottom: 1rem;
    box-shadow: 0 4px 14px rgba(2,43,80,.2);
    flex-shrink: 0;
  }
  .ud-name { font-size: 1.15rem; font-weight: 800; color: #0f172a; margin-bottom: .25rem; }
  .ud-role { font-size: .78rem; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: .05em; margin-bottom: 1rem; }
  .ud-info-row {
    display: flex; align-items: center; gap: .6rem;
    font-size: .845rem; color: #374151;
    padding: .5rem 0;
    border-bottom: 1px solid #f1f5f9;
  }
  .ud-info-row:last-of-type { border-bottom: none; }
  .ud-info-row .ud-icon {
    width: 28px; height: 28px; border-radius: 8px;
    background: #e8f0f9; color: #022B50;
    display: flex; align-items: center; justify-content: center;
    font-size: .8rem; flex-shrink: 0;
  }
  .ud-info-label { font-size: .72rem; color: #94a3b8; font-weight: 600; text-transform: uppercase; letter-spacing: .04em; }
  .ud-info-val   { font-size: .875rem; color: #1e293b; font-weight: 500; }

  /* ── plan cards ─────────────────────────────────────────────── */
  .ud-plan-card {
    border-radius: 16px;
    border: 1.5px solid #e8f0f9;
    padding: 1.5rem;
    background: #fff;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 2px 12px rgba(2,43,80,.06);
    transition: box-shadow .2s;
  }
  .ud-plan-card:hover { box-shadow: 0 8px 24px rgba(2,43,80,.11); }
  .ud-plan-section-label {
    font-size: .7rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: .09em; color: #64748b;
    margin-bottom: .85rem;
    display: flex; align-items: center; gap: .4rem;
  }
  .ud-plan-section-label::after {
    content: ''; flex: 1; height: 1px; background: #e8f0f9;
  }
  .ud-plan-badge {
    display: inline-flex; align-items: center; gap: 4px;
    background: #dcfce7; color: #15803d;
    border-radius: 50px; padding: 3px 12px;
    font-size: .72rem; font-weight: 700;
    margin-bottom: .6rem;
  }
  .ud-plan-badge.purchased { background: #ede9fe; color: #6d28d9; }
  .ud-plan-name { font-size: 1rem; font-weight: 700; color: #0f172a; margin-bottom: .5rem; line-height: 1.3; }
  .ud-plan-meta { font-size: .825rem; color: #64748b; margin-bottom: .3rem; }
  .ud-plan-meta strong { color: #022B50; font-weight: 700; }
  .ud-plan-empty { color: #94a3b8; font-size: .9rem; margin-bottom: 1rem; flex: 1; }
  .ud-plan-card .btn { margin-top: auto; }

  /* ── orders table ────────────────────────────────────────────── */
  .ud-table th, .ud-table td { vertical-align: middle; font-size: .875rem; }
  .ud-table th { background: #f8fafc !important; color: #022B50; font-weight: 700; font-size: .75rem; text-transform: uppercase; letter-spacing: .06em; }
  .ud-type-plan { background: #ede9fe; color: #6d28d9; border-radius: 50px; padding: 3px 11px; font-size: .72rem; font-weight: 700; display: inline-block; }
  .ud-type-sub  { background: #dcfce7; color: #15803d; border-radius: 50px; padding: 3px 11px; font-size: .72rem; font-weight: 700; display: inline-block; }

  /* ── section card ────────────────────────────────────────────── */
  .ud-section-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(2,43,80,.09);
    border: 1px solid #e8f0f9;
    overflow: hidden;
    margin-bottom: 1.5rem;
  }
  .ud-section-header {
    background: linear-gradient(135deg, #022B50 0%, #0a4a8c 100%);
    padding: 1rem 1.4rem;
    display: flex; align-items: center; justify-content: space-between;
    position: relative;
  }
  .ud-section-header::before {
    content: ''; position: absolute; left: 0; top: 0; bottom: 0;
    width: 4px; background: #ffd200;
  }
  .ud-section-title { color: #fff; font-weight: 700; font-size: .95rem; display: flex; align-items: center; gap: .5rem; }
  .ud-section-title i { color: #ffd200; }
</style>

<!-- Page Header Banner -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6">
        <h4 class="mb-0">My Dashboard</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end mb-0">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="app-content">
  <div class="container-fluid">

    @php
      $subPlan    = $records->where('payment_plan','subcribe')->first();
      $bizPlan    = $records->where('payment_plan','report')->first();
      $totalSpend = $records->sum(fn($r) => (float)str_replace('RS','',$r->amount));
      $planCount  = $records->count();
      $bizCount   = $records->where('payment_plan','report')->count();
    @endphp

    <!-- Quick-stat row -->
    <div class="row g-3 mb-4">
      <div class="col-6 col-md-4">
        <div class="ustat-card bg-grad-navy">
          <div class="ustat-icon"><i class="bi bi-bag-check-fill"></i></div>
          <div>
            <div class="ustat-label">Total Purchases</div>
            <div class="ustat-value">{{ $planCount }}</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="ustat-card bg-grad-gold">
          <div class="ustat-icon"><i class="bi bi-currency-rupee"></i></div>
          <div>
            <div class="ustat-label">Total Spent</div>
            <div class="ustat-value">₹{{ number_format($totalSpend) }}</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="ustat-card bg-grad-teal">
          <div class="ustat-icon"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
          <div>
            <div class="ustat-label">Business Plans</div>
            <div class="ustat-value">{{ $bizCount }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Profile + Plans row -->
    <div class="row g-3 mb-4">

      <!-- Profile card -->
      <div class="col-md-4">
        <div class="ud-profile-card">
          <div class="ud-avatar">
            {{ strtoupper(substr($userData->first_name,0,1)) }}{{ strtoupper(substr($userData->last_name??'',0,1)) }}
          </div>
          <div class="ud-name">{{ $userData->first_name }} {{ $userData->last_name }}</div>
          <div class="ud-role">Member</div>

          <div class="ud-info-row">
            <div class="ud-icon"><i class="bi bi-envelope-fill"></i></div>
            <div>
              <div class="ud-info-label">Email</div>
              <div class="ud-info-val">{{ $userData->email }}</div>
            </div>
            <i class="bi bi-patch-check-fill text-success ms-auto" title="Verified"></i>
          </div>
          <div class="ud-info-row">
            <div class="ud-icon"><i class="bi bi-phone-fill"></i></div>
            <div>
              <div class="ud-info-label">Mobile</div>
              <div class="ud-info-val">{{ $userData->mobile ?? '—' }}</div>
            </div>
          </div>
          <div class="ud-info-row">
            <div class="ud-icon"><i class="bi bi-calendar3"></i></div>
            <div>
              <div class="ud-info-label">Member Since</div>
              <div class="ud-info-val">{{ \Carbon\Carbon::parse($userData->created_at)->format('d M Y') }}</div>
            </div>
          </div>

          <a href="{{ url('/settings/profiles') }}" class="btn btn-primary mt-4 w-100">
            <i class="bi bi-pencil-square me-1"></i> Edit Profile
          </a>
        </div>
      </div>

      <!-- Active subscription plan -->
      <div class="col-md-4">
        <div class="ud-plan-card">
          <div class="ud-plan-section-label"><i class="bi bi-star-fill text-warning"></i> Active Subscription</div>
          @if($subPlan)
            <span class="ud-plan-badge"><i class="bi bi-check-circle-fill"></i> Active</span>
            <div class="ud-plan-name">{{ $subPlan->subscription_name }}</div>
            <div class="ud-plan-meta">Amount: <strong>₹{{ number_format((float)str_replace('RS','',$subPlan->amount)) }}</strong></div>
            <div class="ud-plan-meta mb-3">Purchased: <strong>{{ \Carbon\Carbon::parse($subPlan->payment_date)->format('d M Y') }}</strong></div>
            <a href="{{ url('/subscriptions/invoice/'.$subPlan->r_payment_id.'/'.$subPlan->id) }}"
               class="btn btn-sm btn-outline-success mt-auto">
              <i class="bi bi-download me-1"></i> Download Invoice
            </a>
          @else
            <p class="ud-plan-empty">You don't have an active subscription plan yet.</p>
            <a href="{{ url('/subscriptions/list') }}" class="btn btn-primary btn-sm">
              <i class="bi bi-star me-1"></i> Browse Subscriptions
            </a>
          @endif
        </div>
      </div>

      <!-- Latest business plan -->
      <div class="col-md-4">
        <div class="ud-plan-card">
          <div class="ud-plan-section-label"><i class="bi bi-file-earmark-bar-graph-fill text-primary"></i> Latest Business Plan</div>
          @if($bizPlan)
            <span class="ud-plan-badge purchased"><i class="bi bi-bag-check-fill"></i> Purchased</span>
            <div class="ud-plan-name">{{ $bizPlan->report_title }}</div>
            <div class="ud-plan-meta">Amount: <strong>₹{{ number_format((float)str_replace('RS','',$bizPlan->amount)) }}</strong></div>
            <div class="ud-plan-meta mb-3">Date: <strong>{{ \Carbon\Carbon::parse($bizPlan->payment_date)->format('d M Y') }}</strong></div>
            <a href="{{ url('/subscriptions/invoice/'.$bizPlan->r_payment_id.'/'.$bizPlan->id) }}"
               class="btn btn-sm btn-outline-success mt-auto">
              <i class="bi bi-download me-1"></i> Download Invoice
            </a>
          @else
            <p class="ud-plan-empty">No business plan purchased yet. Explore our market research reports.</p>
            <a href="{{ url('/business-plans') }}" class="btn btn-primary btn-sm">
              <i class="bi bi-file-earmark-bar-graph me-1"></i> View Business Plans
            </a>
          @endif
        </div>
      </div>

    </div>

    <!-- Purchased Plans table -->
    <div class="ud-section-card">
      <div class="ud-section-header">
        <div class="ud-section-title"><i class="bi bi-receipt"></i> Purchased Plans</div>
      </div>
      <div class="table-responsive">
        <table id="orders-table" class="table ud-table table-hover mb-0">
          <thead>
            <tr>
              <th style="width:50px">#</th>
              <th>Type</th>
              <th>Plan / Report Title</th>
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
                    <span class="ud-type-plan">Business Plan</span>
                  @else
                    <span class="ud-type-sub">Subscription</span>
                  @endif
                </td>
                <td class="fw-semibold">{{ $title }}</td>
                <td>{{ $record->payment_method }}{{ $record->method ? '/'.$record->method : '' }}</td>
                <td class="fw-bold text-navy">₹{{ $price }}</td>
                <td>{{ \Carbon\Carbon::parse($record->payment_date)->format('d M Y') }}</td>
                <td>
                  <a href="{{ url('/subscriptions/invoice/'.$record->r_payment_id.'/'.$record->id) }}"
                     class="btn-icon btn-icon-download" title="Download Invoice">
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

<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script>
$(function(){
  $('#orders-table').DataTable({
    paging: true, lengthChange: true, searching: true,
    ordering: true, info: true, autoWidth: false, responsive: true
  });
});
</script>

@endsection
