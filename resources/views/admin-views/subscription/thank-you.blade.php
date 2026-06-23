@extends('layouts.master')

<style>
/* ── Success Page ────────────────────────────────── */
.success-outer {
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 16px;
}
.success-card {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 12px 50px rgba(2,43,80,0.11);
    padding: 56px 48px 48px;
    text-align: center;
    max-width: 520px;
    width: 100%;
    position: relative;
    overflow: hidden;
}
.success-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 5px;
    background: linear-gradient(90deg, #28a745, #20c997);
}

/* Animated circle */
.success-circle {
    width: 90px; height: 90px;
    background: linear-gradient(135deg, #28a745, #20c997);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 26px;
    animation: popIn 0.55s cubic-bezier(0.26, 0.53, 0.74, 1.48) both;
    box-shadow: 0 8px 28px rgba(40,167,69,0.3);
}
.success-circle i { color: #fff; font-size: 38px; }
@keyframes popIn {
    0%   { transform: scale(0); opacity: 0; }
    100% { transform: scale(1); opacity: 1; }
}

/* Confetti dots decorative */
.success-card::after {
    content: '';
    position: absolute;
    bottom: -30px; right: -30px;
    width: 140px; height: 140px;
    background: radial-gradient(circle, rgba(40,167,69,0.06) 0%, transparent 70%);
    border-radius: 50%;
}

.success-title {
    font-size: 1.7rem;
    font-weight: 800;
    color: #101010;
    margin-bottom: 10px;
    animation: fadeUp 0.5s 0.15s ease both;
}
.success-subtitle {
    font-size: 0.97rem;
    color: #6c757d;
    margin-bottom: 32px;
    line-height: 1.65;
    animation: fadeUp 0.5s 0.25s ease both;
}
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(12px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* Order ID chip */
.order-id-chip {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #f4f7fb;
    border: 1.5px solid #e4eaf2;
    border-radius: 50px;
    padding: 10px 22px;
    font-size: 0.88rem;
    color: #022B50;
    font-weight: 700;
    margin-bottom: 36px;
    animation: fadeUp 0.5s 0.35s ease both;
}
.order-id-chip i { color: #adb5bd; }

/* Info Tiles */
.success-tiles {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 36px;
    animation: fadeUp 0.5s 0.4s ease both;
}
.success-tile {
    background: #f4f7fb;
    border: 1.5px solid #e4eaf2;
    border-radius: 14px;
    padding: 16px 14px;
    text-align: left;
}
.success-tile .tile-label {
    font-size: 0.72rem;
    font-weight: 700;
    color: #adb5bd;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 5px;
}
.success-tile .tile-value {
    font-size: 0.92rem;
    font-weight: 700;
    color: #022B50;
}

/* CTA Buttons */
.success-actions {
    display: flex;
    flex-direction: column;
    gap: 12px;
    animation: fadeUp 0.5s 0.5s ease both;
}
.btn-continue-dash {
    display: block;
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    color: #fff;
    border: none;
    border-radius: 13px;
    padding: 14px;
    font-weight: 700;
    font-size: 0.95rem;
    font-family: 'Quicksand', sans-serif;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s;
    cursor: pointer;
}
.btn-continue-dash:hover {
    background: linear-gradient(135deg, #011f3d, #022B50);
    color: #FFD21B;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(2,43,80,0.28);
}
.btn-view-subs {
    display: block;
    background: #f4f7fb;
    color: #022B50;
    border: 1.5px solid #e4eaf2;
    border-radius: 13px;
    padding: 13px;
    font-weight: 700;
    font-size: 0.92rem;
    font-family: 'Quicksand', sans-serif;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s;
}
.btn-view-subs:hover {
    background: #e9ecef;
    color: #022B50;
    text-decoration: none;
}

@media (max-width: 480px) {
    .success-card { padding: 40px 24px 36px; }
    .success-tiles { grid-template-columns: 1fr; }
    .success-title { font-size: 1.45rem; }
}
</style>

@section('content')

<div class="app-content">
    <div class="container-fluid">
        <div class="success-outer">
            <div class="success-card">

                {{-- Success Icon --}}
                <div class="success-circle">
                    <i class="bi bi-check-lg"></i>
                </div>

                <div class="success-title">Payment Successful!</div>
                <p class="success-subtitle">
                    Congratulations! You've successfully subscribed to your plan.
                    Your subscription is now active and ready to use.
                </p>

                {{-- Order ID --}}
                @isset($orderId)
                <div class="order-id-chip">
                    <i class="bi bi-receipt"></i>
                    Order ID: <span>{{ $orderId }}</span>
                </div>
                @endisset

                {{-- Info Tiles --}}
                <div class="success-tiles">
                    <div class="success-tile">
                        <div class="tile-label">Status</div>
                        <div class="tile-value" style="color:#28a745;">
                            <i class="bi bi-patch-check-fill me-1" style="font-size:0.85rem;"></i>Active
                        </div>
                    </div>
                    <div class="success-tile">
                        <div class="tile-label">Payment</div>
                        <div class="tile-value">
                            <i class="bi bi-shield-check me-1" style="font-size:0.85rem;color:#adb5bd;"></i>Verified
                        </div>
                    </div>
                    <div class="success-tile">
                        <div class="tile-label">Gateway</div>
                        <div class="tile-value">Razorpay</div>
                    </div>
                    <div class="success-tile">
                        <div class="tile-label">Date</div>
                        <div class="tile-value">{{ now()->format('d M Y') }}</div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="success-actions">
                    <a href="/subscriptions/list" class="btn-continue-dash">
                        <i class="bi bi-grid-3x3-gap me-2"></i>View My Subscriptions
                    </a>
                    <a href="/dashboard" class="btn-view-subs">
                        <i class="bi bi-house me-2"></i>Go to Dashboard
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
