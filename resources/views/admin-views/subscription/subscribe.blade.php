@extends('layouts.master')

<style>
/* ── Page Header ─────────────────────────────────── */
.sub-page-header {
    background: linear-gradient(135deg, #022B50 0%, #0a4a8a 100%);
    border-radius: 18px;
    padding: 26px 30px;
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    position: relative;
    overflow: hidden;
}
.sub-page-header::after {
    content: '';
    position: absolute;
    bottom: -40px; right: -40px;
    width: 150px; height: 150px;
    background: rgba(255,210,27,0.08);
    border-radius: 50%;
}
.sub-page-header h2 {
    color: #fff;
    font-weight: 700;
    font-size: 1.3rem;
    margin: 0;
}
.sub-page-header .breadcrumb { margin: 0; }
.sub-page-header .breadcrumb-item a { color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.85rem; }
.sub-page-header .breadcrumb-item.active { color: #FFD21B; font-size: 0.85rem; }
.sub-page-header .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,0.35); }

/* ── Order Card ──────────────────────────────────── */
.order-card {
    background: #fff;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 8px 40px rgba(2,43,80,0.1);
    max-width: 560px;
    margin: 0 auto;
}
.order-card-header {
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    padding: 28px 30px;
    display: flex;
    align-items: center;
    gap: 16px;
}
.order-header-icon {
    width: 52px; height: 52px;
    background: rgba(255,210,27,0.15);
    border: 1px solid rgba(255,210,27,0.3);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.order-header-icon i { color: #FFD21B; font-size: 22px; }
.order-card-header h5 {
    color: #fff;
    font-weight: 700;
    font-size: 1.05rem;
    margin: 0 0 3px;
}
.order-card-header p {
    color: rgba(255,255,255,0.6);
    font-size: 0.82rem;
    margin: 0;
}

.order-card-body { padding: 28px 30px; }

/* Plan Info Strip */
.plan-info-strip {
    display: flex;
    align-items: center;
    gap: 14px;
    background: #f4f7fb;
    border: 1.5px solid #e4eaf2;
    border-radius: 14px;
    padding: 16px 18px;
    margin-bottom: 24px;
}
.strip-icon {
    width: 44px; height: 44px;
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.strip-icon i { color: #FFD21B; font-size: 18px; }
.strip-text .plan-label { font-weight: 700; color: #022B50; font-size: 0.97rem; }
.strip-text .plan-sub { color: #6c757d; font-size: 0.82rem; margin-top: 2px; }

/* Breakdown Table */
.breakdown-table {
    border: 1.5px solid #e4eaf2;
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 20px;
}
.breakdown-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 13px 18px;
    border-bottom: 1px solid #f0f2f5;
}
.breakdown-row:last-child { border-bottom: none; }
.breakdown-row .label { font-size: 0.88rem; color: #6c757d; }
.breakdown-row .value { font-size: 0.92rem; font-weight: 600; color: #101010; }
.breakdown-row .value.discount { color: #198754; }
.breakdown-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 18px;
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    border-radius: 14px;
    margin-bottom: 24px;
}
.breakdown-total .label { color: #fff; font-weight: 700; font-size: 0.95rem; }
.breakdown-total .value { color: #FFD21B; font-weight: 800; font-size: 1.25rem; }

/* Checkout Button */
.btn-checkout {
    display: block;
    width: 100%;
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    color: #fff;
    border: none;
    border-radius: 14px;
    padding: 15px;
    font-weight: 700;
    font-size: 0.97rem;
    font-family: 'Quicksand', sans-serif;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s;
    cursor: pointer;
}
.btn-checkout:hover {
    background: linear-gradient(135deg, #011f3d, #022B50);
    color: #FFD21B;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(2,43,80,0.28);
}
.secure-note {
    text-align: center;
    margin-top: 14px;
    font-size: 0.78rem;
    color: #adb5bd;
}
.secure-note i { margin-right: 4px; }

/* Back link */
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #6c757d;
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    margin-bottom: 22px;
    transition: color 0.2s;
}
.btn-back:hover { color: #022B50; text-decoration: none; }
</style>

@section('content')

{{-- ── Page Header ─────────────────────────────────── --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="sub-page-header">
            <div>
                <h2><i class="bi bi-receipt me-2" style="color:#FFD21B;"></i>Subscription Plan</h2>
                <ol class="breadcrumb mt-1">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="/subscriptions/list">Subscriptions</a></li>
                    <li class="breadcrumb-item active">Plan Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>

{{-- ── Order Summary ────────────────────────────── --}}
<div class="app-content">
    <div class="container-fluid">

        <a href="/subscriptions/list" class="btn-back">
            <i class="bi bi-arrow-left"></i> Back to Plans
        </a>

        <div class="order-card">

            {{-- Header --}}
            <div class="order-card-header">
                <div class="order-header-icon">
                    <i class="bi bi-bag-check-fill"></i>
                </div>
                <div>
                    <h5>Plan Summary</h5>
                    <p>Review the details before proceeding to checkout</p>
                </div>
            </div>

            <div class="order-card-body">

                {{-- Plan Info --}}
                <div class="plan-info-strip">
                    <div class="strip-icon">
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="strip-text">
                        <div class="plan-label">{{ $editRec->title }}</div>
                        <div class="plan-sub">{{ $editRec->description }}</div>
                    </div>
                </div>

                {{-- Price Breakdown --}}
                <?php
                    $mprice    = (float) str_replace('RS', '', $editRec->price);
                    $discount  = !empty($editRec->discount) ? (float)$editRec->discount : 0;
                    $dis       = ($mprice * $discount) / 100;
                    $govt_fee  = !empty($editRec->government_fee) ? (float)$editRec->government_fee : 0;
                    $total     = $mprice - $dis + $govt_fee;
                ?>

                <div class="breakdown-table">
                    <div class="breakdown-row">
                        <span class="label">{{ $editRec->title }} Plan</span>
                        <span class="value">{{ $editRec->price }}</span>
                    </div>
                    @if($discount > 0)
                    <div class="breakdown-row">
                        <span class="label">Discount ({{ $editRec->discount }}%)</span>
                        <span class="value discount">&minus; <?php echo number_format($dis, 2); ?> RS</span>
                    </div>
                    @endif
                    @if($govt_fee > 0)
                    <div class="breakdown-row">
                        <span class="label">Government Fee</span>
                        <span class="value"><?php echo number_format($govt_fee, 2); ?> RS</span>
                    </div>
                    @endif
                </div>

                <div class="breakdown-total">
                    <span class="label">Total Payable</span>
                    <span class="value">RS&nbsp;<?php echo number_format($total, 2); ?></span>
                </div>

                {{-- Checkout CTA --}}
                <a href="/subscriptions/billing-details/{{ $editRec->id }}" class="btn-checkout">
                    <i class="bi bi-arrow-right-circle me-2"></i>Proceed to Checkout
                </a>

                <p class="secure-note">
                    <i class="bi bi-lock-fill"></i>256-bit SSL encrypted &middot; Secured payment gateway
                </p>

            </div>
        </div>

    </div>
</div>

@endsection
