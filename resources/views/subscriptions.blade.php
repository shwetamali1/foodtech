<!doctype html>
<html lang="en">
  @extends('layouts.head-css')
  <style>
    #preloader {
        position: fixed;
        left: 0; top: 0;
        width: 100%; height: 100%;
        z-index: 9999;
        background: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .loader {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #022B50;
        border-radius: 50%;
        width: 60px; height: 60px;
        animation: spin 1s linear infinite;
    }
    @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

    /* ── Subscribe Hero ─────────────────────────────────── */
    .subscribe-hero {
        min-height: 52vh;
        background: linear-gradient(135deg, #022B50 0%, #0a4a8a 50%, #1565c0 100%);
        display: flex;
        align-items: center;
        padding: 110px 0 80px;
        position: relative;
        overflow: hidden;
        text-align: center;
    }
    .subscribe-hero::before {
        content: '';
        position: absolute;
        top: -100px; right: -100px;
        width: 420px; height: 420px;
        background: rgba(255,210,27,0.06);
        border-radius: 50%;
        animation: floatOrb 8s ease-in-out infinite;
    }
    .subscribe-hero::after {
        content: '';
        position: absolute;
        bottom: -80px; left: -80px;
        width: 300px; height: 300px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
        animation: floatOrb 10s ease-in-out infinite reverse;
    }
    @keyframes floatOrb { 0%,100%{transform:scale(1)} 50%{transform:scale(1.12)} }

    .hero-pill {
        display: inline-block;
        background: rgba(255,210,27,0.18);
        border: 1px solid rgba(255,210,27,0.38);
        color: #FFD21B;
        padding: 6px 22px;
        border-radius: 50px;
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 1.6px;
        margin-bottom: 18px;
        position: relative;
        z-index: 1;
    }
    .subscribe-hero h1 {
        color: #fff;
        font-weight: 800;
        font-size: 2.8rem;
        line-height: 1.22;
        position: relative;
        z-index: 1;
        margin-bottom: 14px;
    }
    .subscribe-hero h1 span { color: #FFD21B; }
    .subscribe-hero p {
        color: rgba(255,255,255,0.75);
        font-size: 1.05rem;
        max-width: 500px;
        margin: 0 auto 32px;
        position: relative;
        z-index: 1;
    }

    /* Email pill form */
    .hero-subscribe-wrap {
        max-width: 480px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }
    .hero-subscribe-wrap .pill-form {
        display: flex;
        align-items: center;
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(10px);
        border-radius: 60px;
        padding: 6px 6px 6px 22px;
        border: 1px solid rgba(255,255,255,0.22);
    }
    .hero-subscribe-wrap .pill-form input {
        flex: 1;
        background: transparent;
        border: none;
        outline: none;
        color: #fff;
        font-size: 0.92rem;
        font-family: "Quicksand", sans-serif;
        padding: 8px 0;
    }
    .hero-subscribe-wrap .pill-form input::placeholder { color: rgba(255,255,255,0.55); }
    .btn-sub-hero {
        background: #FFD21B;
        color: #022B50;
        border: none;
        border-radius: 50px;
        padding: 11px 26px;
        font-weight: 700;
        font-size: 0.88rem;
        font-family: "Quicksand", sans-serif;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.3s;
    }
    .btn-sub-hero:hover { background: #e6bc00; transform: scale(1.04); }

    /* ── Plans Section ─────────────────────────────────── */
    .plans-section {
        padding: 80px 0 90px;
        background: #F5F5F5;
    }
    .section-eyebrow {
        display: inline-block;
        background: rgba(2,43,80,0.08);
        color: #022B50;
        padding: 6px 18px;
        border-radius: 50px;
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        margin-bottom: 16px;
    }
    .plans-section h2 {
        font-size: 2.1rem;
        font-weight: 700;
        color: #101010;
        margin-bottom: 10px;
    }
    .plans-section .sub-text {
        font-size: 0.97rem;
        color: #4B4B4B;
        max-width: 520px;
        margin: 0 auto 50px;
        line-height: 1.7;
    }

    /* Pricing Card */
    .pricing-card-new {
        background: #fff;
        border-radius: 22px;
        padding: 36px 28px;
        border: 2px solid transparent;
        box-shadow: 0 4px 22px rgba(2,43,80,0.07);
        transition: all 0.35s ease;
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .pricing-card-new::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, #022B50, #0a4a8a);
    }
    .pricing-card-new:hover {
        border-color: rgba(2,43,80,0.25);
        transform: translateY(-8px);
        box-shadow: 0 18px 52px rgba(2,43,80,0.13);
    }
    .pricing-card-new.featured {
        border-color: #FFD21B;
        transform: translateY(-6px);
        box-shadow: 0 14px 48px rgba(2,43,80,0.14);
    }
    .pricing-card-new.featured::before {
        background: linear-gradient(90deg, #FFD21B, #e6a800);
    }
    .pricing-card-new.featured:hover { transform: translateY(-12px); }

    .popular-badge {
        position: absolute;
        top: 18px; right: 18px;
        background: #FFD21B;
        color: #022B50;
        font-size: 0.68rem;
        font-weight: 800;
        padding: 4px 14px;
        border-radius: 50px;
        letter-spacing: 0.6px;
        text-transform: uppercase;
    }

    .plan-icon-wrap {
        width: 52px; height: 52px;
        background: linear-gradient(135deg, #022B50, #0a4a8a);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
    }
    .plan-icon-wrap i { color: #FFD21B; font-size: 20px; }

    .plan-name {
        font-size: 1.22rem;
        font-weight: 700;
        color: #101010;
        margin-bottom: 6px;
    }
    .offer-chip {
        display: inline-block;
        background: rgba(255,210,27,0.18);
        color: #8a6500;
        font-size: 0.75rem;
        font-weight: 700;
        padding: 3px 13px;
        border-radius: 50px;
        margin-bottom: 12px;
    }
    .plan-desc-text {
        color: #4B4B4B;
        font-size: 0.88rem;
        margin-bottom: 20px;
        line-height: 1.65;
        flex-grow: 0;
    }
    .plan-price-display {
        font-size: 1.9rem;
        font-weight: 800;
        color: #022B50;
        margin-bottom: 6px;
        line-height: 1;
    }
    .plan-price-display small {
        font-size: 0.85rem;
        font-weight: 500;
        color: #6c757d;
    }
    .plan-divider {
        border: none;
        border-top: 1.5px solid #f0f2f5;
        margin: 20px 0;
    }
    .plan-features-list {
        list-style: none;
        padding: 0;
        margin: 0 0 28px;
        flex-grow: 1;
    }
    .plan-features-list li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        font-size: 0.88rem;
        color: #4B4B4B;
        margin-bottom: 10px;
        font-weight: 500;
        line-height: 1.5;
    }
    .plan-features-list li i {
        color: #022B50;
        font-size: 11px;
        margin-top: 4px;
        flex-shrink: 0;
    }
    .plan-features-list li.credits-row i { color: #FFD21B; }
    .plan-features-list .section-label {
        font-size: 0.73rem;
        font-weight: 700;
        color: #022B50;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 8px;
        margin-top: 4px;
        display: block;
    }

    .btn-plan-new {
        display: block;
        width: 100%;
        background: linear-gradient(135deg, #022B50, #0a4a8a);
        color: #fff;
        border: none;
        border-radius: 13px;
        padding: 14px;
        font-weight: 700;
        font-size: 0.93rem;
        font-family: "Quicksand", sans-serif;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: auto;
    }
    .btn-plan-new:hover {
        background: linear-gradient(135deg, #011f3d, #022B50);
        color: #FFD21B;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(2,43,80,0.25);
    }
    .btn-plan-new.btn-featured {
        background: linear-gradient(135deg, #FFD21B, #e6a800);
        color: #022B50;
    }
    .btn-plan-new.btn-featured:hover {
        background: linear-gradient(135deg, #e6a800, #cc9000);
        color: #022B50;
        box-shadow: 0 6px 20px rgba(255,210,27,0.35);
    }

    /* ── Add-on Service Cards (compact) ─────────────────────── */
    .addon-card-sm {
        background: #fff;
        border-radius: 16px;
        padding: 18px 16px;
        border: 1.5px solid #eef1f6;
        box-shadow: 0 3px 14px rgba(2,43,80,0.06);
        transition: all 0.25s ease;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        height: 100%;
    }
    .addon-card-sm:hover {
        border-color: rgba(2,43,80,0.18);
        transform: translateY(-3px);
        box-shadow: 0 10px 26px rgba(2,43,80,0.1);
    }
    .addon-card-icon {
        width: 36px; height: 36px;
        background: linear-gradient(135deg, #022B50, #0a4a8a);
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 12px;
    }
    .addon-card-icon i { color: #FFD21B; font-size: 14px; }
    .addon-card-title {
        font-size: 0.92rem;
        font-weight: 700;
        color: #101010;
        margin-bottom: 6px;
    }
    .addon-card-price {
        font-size: 1.3rem;
        font-weight: 800;
        color: #022B50;
        margin-bottom: 8px;
        line-height: 1;
    }
    .addon-card-credit {
        font-size: 0.78rem;
        color: #4B4B4B;
        font-weight: 600;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .addon-card-credit i { color: #022B50; font-size: 10px; }
    .addon-card-btn {
        display: block;
        width: 100%;
        background: linear-gradient(135deg, #022B50, #0a4a8a);
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 9px;
        font-weight: 700;
        font-size: 0.8rem;
        font-family: "Quicksand", sans-serif;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s;
        margin-top: auto;
    }
    .addon-card-btn:hover {
        background: linear-gradient(135deg, #011f3d, #022B50);
        color: #FFD21B;
        text-decoration: none;
    }

    /* ── Responsive ──────────────────────────────────────── */
    @media (max-width: 767px) {
        .subscribe-hero h1 { font-size: 1.9rem; }
        .plans-section h2 { font-size: 1.7rem; }
        .subscribe-hero { padding: 95px 0 55px; }
        .hero-subscribe-wrap .pill-form { flex-direction: column; border-radius: 16px; padding: 14px; gap: 10px; }
        .hero-subscribe-wrap .pill-form input { width: 100%; }
        .btn-sub-hero { width: 100%; border-radius: 12px; }
    }
  </style>
<body>
    <div id="preloader"><div class="loader"></div></div>
    <main>

@include('layouts.header-menu')

{{-- ── Subscribe Hero ─────────────────────────────── --}}
<section class="subscribe-hero">
    <div class="container">
        <div class="col-lg-8 mx-auto">
           
            <h1>Subscribe for <span>Exclusive Updates</span></h1>
            <p>Join our community! Get exclusive updates, offers, and food safety insights delivered straight to your inbox.</p>

            <div class="hero-subscribe-wrap">
                <form action="emailSubscribe" method="POST">
                    @csrf
                    <div class="pill-form">
                        <input name="email" type="email" placeholder="Enter your email address...">
                        <button class="btn-sub-hero" type="submit">Subscribe Now</button>
                    </div>
                </form>

                @if(session('success'))
                    <div class="alert mt-3 rounded-3" role="alert"
                         style="background:rgba(25,135,84,0.18); border:1px solid rgba(25,135,84,0.32); color:#fff; font-size:0.9rem;">
                        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert mt-3 rounded-3" role="alert"
                         style="background:rgba(220,53,69,0.18); border:1px solid rgba(220,53,69,0.32); color:#fff; font-size:0.9rem;">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ── Pricing Plans ────────────────────────────── --}}
<section class="plans-section">
    <div class="container">
        <div class="text-center">
            <div class="section-eyebrow">PRICING PLANS</div>
            <h2>Perfect Plan for Your Needs</h2>
            <p class="sub-text">
                Choose a subscription that aligns with your business goals and start managing
                your food operations with ease today!
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            <?php $idx = 0; foreach ($showRec as $plan) { $idx++; $featured = ($idx == 2); ?>
            <div class="col-sm-6 col-lg-4 d-flex">
                <div class="pricing-card-new w-100 <?= $featured ? 'featured' : '' ?>">

                    @if($featured)
                        <div class="popular-badge">Most Popular</div>
                    @endif

                    <div class="plan-icon-wrap">
                        <i class="fa fa-<?= $featured ? 'star' : ($idx == 1 ? 'leaf' : 'rocket') ?>"></i>
                    </div>

                    <div class="plan-name">{{ $plan->title }}</div>

                    @if(!empty($plan->offer) && $plan->offer > 0)
                        <div class="offer-chip">{{ $plan->offer }}% Off</div>
                    @endif

                    <p class="plan-desc-text">{{ $plan->description }}</p>

                    <div class="plan-price-display">
                        {{ $plan->price }}
                        <small>+govt fee</small>
                    </div>

                    <hr class="plan-divider">

                    <ul class="plan-features-list">
                        @if(!empty($plan->credits))
                            <li class="credits-row">
                                <i class="fa fa-bolt"></i>
                                <span>{{ $plan->credits }} Credits/Month (~60 videos)</span>
                            </li>
                        @endif

                        @if(!empty($plan->label_validation_limit))
                            <li class="credits-row">
                                <i class="fa fa-check-circle"></i>
                                <span>{{ $plan->label_validation_limit }} Label Validation{{ $plan->label_validation_limit > 1 ? 's' : '' }}/Year</span>
                            </li>
                        @endif

                        @if(!empty($plan->features))
                            <li><span class="section-label">Everything in {{ $plan->title }}:</span></li>
                            <?php
                                $array = json_decode($plan->features, true);
                                $fea = isset($array[0]) ? str_replace(["\r\n", "\n", "\r"], "||", $array[0]) : '';
                                $features = array_filter(array_map('trim', explode("||", $fea)));
                            ?>
                            @foreach($features as $feature)
                                @if(trim($feature))
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>{{ trim($feature) }}</span>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>

                    <a href="/login/admin" class="btn-plan-new <?= $featured ? 'btn-featured' : '' ?>">
                        Get Started &nbsp;<i class="fa fa-arrow-right"></i>
                    </a>

                </div>
            </div>
            <?php } ?>
        </div>

        @if(!empty($addonServices) && count($addonServices) > 0)
        <div class="text-center mt-5 mb-4">
            <h3 style="color:#022B50; font-weight:800;">Add-on Services</h3>
            <p style="color:#6c757d; max-width:560px; margin:0 auto;">
                Need additional label validation credits? Purchase an Add-On Service to continue submitting labels without upgrading your subscription plan.
            </p>
        </div>
        <div class="row g-3 justify-content-center">
            @foreach($addonServices as $service)
            <div class="col-6 col-md-4 col-lg-3 d-flex">
                <div class="addon-card-sm w-100">
                    <div class="addon-card-icon"><i class="fa fa-bolt"></i></div>
                    <div class="addon-card-title">{{ $service->title }}</div>
                    <div class="addon-card-price">₹{{ number_format((float) str_replace('RS', '', $service->price)) }}</div>
                    @if(!empty($service->label_validation_credit))
                    <div class="addon-card-credit">
                        <i class="fa fa-check"></i>
                        +{{ $service->label_validation_credit }} label validation{{ $service->label_validation_credit > 1 ? 's' : '' }}
                    </div>
                    @endif
                    <a href="/login/admin" class="addon-card-btn">
                        Buy Now <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endif

    </div>
</section>

@extends('layouts.footer')

  </body>
</html>
