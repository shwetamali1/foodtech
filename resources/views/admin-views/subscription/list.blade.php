@extends('layouts.master')

<style>
/* ── Page Header ─────────────────────────────────── */
.sub-page-header {
    background: linear-gradient(135deg, #022B50 0%, #0a4a8a 100%);
    border-radius: 18px;
    padding: 28px 32px;
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
    position: relative;
    overflow: hidden;
}
.sub-page-header::after {
    content: '';
    position: absolute;
    bottom: -40px; right: -40px;
    width: 160px; height: 160px;
    background: rgba(255,210,27,0.08);
    border-radius: 50%;
}
.sub-page-header h2 {
    color: #fff;
    font-weight: 700;
    font-size: 1.35rem;
    margin: 0;
}
.sub-page-header .breadcrumb { margin: 0; }
.sub-page-header .breadcrumb-item a { color: rgba(255,255,255,0.65); text-decoration: none; font-size: 0.85rem; }
.sub-page-header .breadcrumb-item.active { color: #FFD21B; font-size: 0.85rem; }
.sub-page-header .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,0.35); }

.btn-add-plan {
    background: #FFD21B;
    color: #022B50;
    border: none;
    border-radius: 10px;
    padding: 10px 22px;
    font-weight: 700;
    font-size: 0.88rem;
    text-decoration: none;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    position: relative;
    z-index: 1;
}
.btn-add-plan:hover {
    background: #e6a800;
    color: #022B50;
    text-decoration: none;
    transform: translateY(-1px);
    box-shadow: 0 4px 14px rgba(255,210,27,0.4);
}

/* ── Plan Card ───────────────────────────────────── */
.plan-card {
    background: #fff;
    border-radius: 20px;
    border: 2px solid transparent;
    box-shadow: 0 4px 20px rgba(2,43,80,0.07);
    transition: all 0.35s ease;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
    position: relative;
}
.plan-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, #022B50, #0a4a8a);
}
.plan-card:hover {
    border-color: rgba(2,43,80,0.18);
    transform: translateY(-6px);
    box-shadow: 0 16px 44px rgba(2,43,80,0.12);
}
.plan-card.active-plan {
    border-color: #28a745;
}
.plan-card.active-plan::before {
    background: linear-gradient(90deg, #28a745, #20c997);
}

.active-ribbon {
    position: absolute;
    top: 14px; right: 14px;
    background: linear-gradient(135deg, #28a745, #20c997);
    color: #fff;
    font-size: 0.68rem;
    font-weight: 700;
    padding: 4px 14px;
    border-radius: 50px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    gap: 5px;
}

.plan-card-body {
    padding: 30px 26px 0;
    flex: 1;
}
.plan-icon-circle {
    width: 50px; height: 50px;
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
}
.plan-icon-circle i { color: #FFD21B; font-size: 20px; }

.plan-card-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: #101010;
    margin-bottom: 6px;
}
.offer-badge-card {
    display: inline-block;
    background: rgba(255,210,27,0.17);
    color: #8a6500;
    font-size: 0.72rem;
    font-weight: 700;
    padding: 3px 12px;
    border-radius: 50px;
    margin-bottom: 10px;
}
.plan-card-desc {
    color: #6c757d;
    font-size: 0.87rem;
    line-height: 1.6;
    margin-bottom: 18px;
}
.plan-card-price {
    font-size: 1.75rem;
    font-weight: 800;
    color: #022B50;
    margin-bottom: 4px;
    line-height: 1;
}
.plan-card-price small {
    font-size: 0.82rem;
    font-weight: 500;
    color: #adb5bd;
}
.plan-divider {
    border: none;
    border-top: 1.5px solid #f0f2f5;
    margin: 18px 0;
}
.plan-features-ul {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
}
.plan-features-ul .feature-section-label {
    font-size: 0.7rem;
    font-weight: 700;
    color: #022B50;
    text-transform: uppercase;
    letter-spacing: 0.9px;
    margin-bottom: 8px;
    display: block;
}
.plan-features-ul li {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    font-size: 0.86rem;
    color: #4B4B4B;
    margin-bottom: 8px;
    font-weight: 500;
    line-height: 1.5;
}
.plan-features-ul li i {
    color: #022B50;
    font-size: 12px;
    margin-top: 3px;
    flex-shrink: 0;
}
.plan-features-ul li.credit-row i { color: #FFD21B; }

.plan-card-footer {
    padding: 0 26px 26px;
}
.btn-subscribe {
    display: block;
    width: 100%;
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    color: #fff;
    border: none;
    border-radius: 12px;
    padding: 13px;
    font-weight: 700;
    font-size: 0.92rem;
    font-family: 'Quicksand', sans-serif;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s;
    cursor: pointer;
}
.btn-subscribe:hover {
    background: linear-gradient(135deg, #011f3d, #022B50);
    color: #FFD21B;
    text-decoration: none;
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(2,43,80,0.25);
}
.btn-subscribe.btn-active {
    background: linear-gradient(135deg, #28a745, #20c997);
    cursor: default;
    color: #fff;
}
.btn-subscribe.btn-active:hover {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: #fff;
    transform: none;
    box-shadow: none;
}
.btn-edit-plan {
    display: block;
    width: 100%;
    background: #f4f7fb;
    color: #022B50;
    border: 1.5px solid #e4eaf2;
    border-radius: 12px;
    padding: 12px;
    font-weight: 700;
    font-size: 0.9rem;
    font-family: 'Quicksand', sans-serif;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s;
}
.btn-edit-plan:hover {
    background: #022B50;
    color: #FFD21B;
    border-color: #022B50;
    text-decoration: none;
    transform: translateY(-1px);
}

/* Empty State */
.empty-plans {
    text-align: center;
    padding: 70px 20px;
    color: #adb5bd;
}
.empty-plans i { font-size: 3.5rem; margin-bottom: 16px; display: block; }
.empty-plans p { font-size: 1rem; margin: 0; }
</style>

@section('content')

{{-- ── Page Header ─────────────────────────────────── --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="sub-page-header">
            <div>
                <h2><i class="bi bi-grid-3x3-gap me-2" style="color:#FFD21B;"></i>Subscription Plans</h2>
                <ol class="breadcrumb mt-1">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Subscriptions</li>
                </ol>
            </div>
            @if($role_id != 8)
                <a href="{{ URL::to('/subscriptions/add') }}" class="btn-add-plan">
                    <i class="bi bi-plus-lg"></i> Add New Plan
                </a>
            @endif
        </div>
    </div>
</div>

{{-- ── Plans Grid ───────────────────────────────────── --}}
<div class="app-content">
    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success rounded-3 mb-4 d-flex align-items-center gap-2">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            </div>
        @endif

        @if(count($showRec) > 0)
        <div class="row g-4">
            <?php $idx = 0; foreach ($showRec as $plan) { $idx++;
                $isActive = ($plan->payment_status != '' && $plan->r_payment_id != '');
            ?>
            <div class="col-sm-6 col-xl-4 d-flex">
                <div class="plan-card w-100 <?= $isActive ? 'active-plan' : '' ?>">

                    @if($isActive)
                        <div class="active-ribbon">
                            <i class="bi bi-patch-check-fill"></i> Active
                        </div>
                    @endif

                    <div class="plan-card-body">
                        <div class="plan-icon-circle">
                            <i class="bi bi-<?= $idx == 1 ? 'feather' : ($idx == 2 ? 'star-fill' : 'rocket-takeoff-fill') ?>"></i>
                        </div>

                        <div class="plan-card-title">{{ $plan->title }}</div>

                        @if(!empty($plan->offer) && $plan->offer > 0)
                            <div class="offer-badge-card">{{ $plan->offer }}% Off</div>
                        @endif

                        <p class="plan-card-desc">{{ $plan->description }}</p>

                        <div class="plan-card-price">
                            {{ $plan->price }}
                            <small>+govt fee</small>
                        </div>

                        <hr class="plan-divider">

                        <ul class="plan-features-ul">
                            @if(!empty($plan->credits))
                                <li class="credit-row">
                                    <i class="bi bi-lightning-fill"></i>
                                    <span>{{ $plan->credits }} Credits/Month (~60 videos)</span>
                                </li>
                            @endif

                            @if(!empty($plan->features))
                                <li><span class="feature-section-label">Everything in {{ $plan->title }}:</span></li>
                                <?php
                                    $arr = json_decode($plan->features, true);
                                    $fea = isset($arr[0]) ? str_replace(["\r\n", "\n", "\r"], "||", $arr[0]) : '';
                                    $feats = array_filter(array_map('trim', explode("||", $fea)));
                                ?>
                                @foreach($feats as $feat)
                                    @if(trim($feat))
                                    <li>
                                        <i class="bi bi-check2"></i>
                                        <span>{{ trim($feat) }}</span>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    <div class="plan-card-footer">
                        @if($role_id != 8)
                            <a href="/subscriptions/edit/{{ $plan->id }}" class="btn-edit-plan">
                                <i class="bi bi-pencil me-1"></i>Edit Plan
                            </a>
                        @else
                            @if($isActive)
                                <span class="btn-subscribe btn-active">
                                    <i class="bi bi-patch-check me-1"></i>Subscribed
                                </span>
                            @else
                                <a href="/subscriptions/subscribe/{{ $plan->id }}" class="btn-subscribe">
                                    Subscribe Now <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            @endif
                        @endif
                    </div>

                </div>
            </div>
            <?php } ?>
        </div>
        @else
            <div class="empty-plans">
                <i class="bi bi-grid-3x3-gap"></i>
                <p>No subscription plans available yet.</p>
            </div>
        @endif

    </div>
</div>

@endsection
