@extends('layouts.master')

@section('content')

<style>
/* ── Business Plan Purchase Success Page ─────────────────────── */
.ty-outer {
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 16px;
}
.ty-card {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 12px 50px rgba(2,43,80,.12);
    padding: 56px 48px 48px;
    text-align: center;
    max-width: 560px;
    width: 100%;
    position: relative;
    overflow: hidden;
}
.ty-card::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0;
    height: 5px;
    background: linear-gradient(90deg, #022B50, #ffd200);
}
.ty-card::after {
    content: '';
    position: absolute; bottom: -40px; right: -40px;
    width: 160px; height: 160px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,210,0,.07) 0%, transparent 70%);
}

/* Animated success ring */
.ty-icon-wrap {
    width: 96px; height: 96px;
    margin: 0 auto 28px;
    border-radius: 50%;
    background: linear-gradient(135deg, #022B50 0%, #0a4a8c 100%);
    display: flex; align-items: center; justify-content: center;
    animation: popIn .55s cubic-bezier(.26,.53,.74,1.48) both;
    box-shadow: 0 10px 30px rgba(2,43,80,.25);
    position: relative;
}
.ty-icon-wrap::after {
    content: '';
    position: absolute; inset: -5px;
    border-radius: 50%;
    border: 2px dashed rgba(255,210,27,.4);
    animation: spin 8s linear infinite;
}
@keyframes popIn {
    0%   { transform: scale(0); opacity: 0; }
    100% { transform: scale(1); opacity: 1; }
}
@keyframes spin { to { transform: rotate(360deg); } }

.ty-icon-wrap i { color: #ffd200; font-size: 40px; }

.ty-title {
    font-size: 1.75rem; font-weight: 800; color: #0f172a;
    margin-bottom: .5rem;
    animation: fadeUp .5s .15s ease both;
}
.ty-subtitle {
    font-size: .95rem; color: #64748b;
    line-height: 1.7; margin-bottom: 2rem;
    animation: fadeUp .5s .25s ease both;
}
@keyframes fadeUp {
    from { opacity:0; transform:translateY(12px); }
    to   { opacity:1; transform:translateY(0); }
}

/* Plan name chip */
.ty-plan-chip {
    display: inline-flex; align-items: center; gap: 8px;
    background: #f0f5ff;
    border: 1.5px solid #c7d8f8;
    border-radius: 50px;
    padding: 10px 22px;
    font-size: .88rem; color: #022B50; font-weight: 700;
    margin-bottom: 2rem;
    animation: fadeUp .5s .35s ease both;
}
.ty-plan-chip i { color: #6d28d9; }

/* Info tiles */
.ty-tiles {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 2rem;
    animation: fadeUp .5s .4s ease both;
}
.ty-tile {
    background: #f8fafc;
    border: 1.5px solid #e8f0f9;
    border-radius: 14px;
    padding: 16px 14px;
    text-align: left;
}
.ty-tile .tile-label {
    font-size: .7rem; font-weight: 700; color: #94a3b8;
    text-transform: uppercase; letter-spacing: .07em; margin-bottom: 5px;
}
.ty-tile .tile-value { font-size: .92rem; font-weight: 700; color: #022B50; }

/* Action buttons */
.ty-actions {
    display: flex; flex-direction: column; gap: 12px;
    animation: fadeUp .5s .5s ease both;
}
.ty-btn-primary {
    display: block;
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    color: #fff; border: none; border-radius: 13px;
    padding: 14px; font-weight: 700; font-size: .95rem;
    text-decoration: none; text-align: center;
    transition: all .3s; cursor: pointer;
}
.ty-btn-primary:hover {
    background: linear-gradient(135deg, #011f3d, #022B50);
    color: #ffd200; text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(2,43,80,.28);
}
.ty-btn-secondary {
    display: block;
    background: #f4f7fb; color: #022B50;
    border: 1.5px solid #e4eaf2;
    border-radius: 13px; padding: 13px;
    font-weight: 700; font-size: .92rem;
    text-decoration: none; text-align: center;
    transition: all .3s;
}
.ty-btn-secondary:hover { background: #e9ecef; color: #022B50; text-decoration: none; }

@media (max-width: 480px) {
    .ty-card { padding: 40px 20px 36px; }
    .ty-tiles { grid-template-columns: 1fr; }
    .ty-title { font-size: 1.45rem; }
}
</style>

<!-- Page Header -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6">
        <h4 class="mb-0">Purchase Successful</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end mb-0">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Order Confirmation</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="container-fluid">
    <div class="ty-outer">
      <div class="ty-card">

        <!-- Icon -->
        <div class="ty-icon-wrap">
          <i class="bi bi-file-earmark-bar-graph-fill"></i>
        </div>

        <div class="ty-title">Business Plan Purchased!</div>
        <p class="ty-subtitle">
          Congratulations! Your business plan report is ready. You can access and download
          it anytime from your dashboard under <strong>My Business Plans</strong>.
        </p>

        <!-- Plan chip -->
        <div class="ty-plan-chip">
          <i class="bi bi-bag-check-fill"></i>
          Purchase Confirmed
        </div>

        <!-- Info tiles -->
        <div class="ty-tiles">
          <div class="ty-tile">
            <div class="tile-label">Status</div>
            <div class="tile-value" style="color:#16a34a;">
              <i class="bi bi-patch-check-fill me-1" style="font-size:.85rem"></i>Confirmed
            </div>
          </div>
          <div class="ty-tile">
            <div class="tile-label">Payment</div>
            <div class="tile-value">
              <i class="bi bi-shield-check me-1" style="font-size:.85rem;color:#94a3b8"></i>Verified
            </div>
          </div>
          <div class="ty-tile">
            <div class="tile-label">Gateway</div>
            <div class="tile-value">Razorpay</div>
          </div>
          <div class="ty-tile">
            <div class="tile-label">Date</div>
            <div class="tile-value">{{ now()->format('d M Y') }}</div>
          </div>
        </div>

        <!-- Actions -->
        <div class="ty-actions">
          <a href="/reports/list" class="ty-btn-primary">
            <i class="bi bi-file-earmark-bar-graph me-2"></i>View My Business Plans
          </a>
          <a href="/user-dashboard" class="ty-btn-secondary">
            <i class="bi bi-house me-2"></i>Go to Dashboard
          </a>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
