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

/* ── Stepper ──────────────────────────────────────── */
.stepper {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 32px;
    gap: 0;
}
.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    position: relative;
}
.step-num {
    width: 36px; height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    font-weight: 700;
    border: 2px solid #e4eaf2;
    background: #fff;
    color: #adb5bd;
    transition: all 0.3s;
}
.step.done .step-num {
    background: #28a745;
    border-color: #28a745;
    color: #fff;
}
.step.active .step-num {
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    border-color: #022B50;
    color: #FFD21B;
}
.step-label {
    font-size: 0.72rem;
    font-weight: 600;
    color: #adb5bd;
    white-space: nowrap;
}
.step.active .step-label { color: #022B50; }
.step.done .step-label { color: #28a745; }
.step-line {
    flex: 1;
    height: 2px;
    background: #e4eaf2;
    min-width: 60px;
    margin-bottom: 22px;
}
.step-line.done { background: #28a745; }

/* ── Billing Card ────────────────────────────────── */
.billing-card {
    background: #fff;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 8px 40px rgba(2,43,80,0.09);
    max-width: 680px;
    margin: 0 auto;
}
.billing-card-header {
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    padding: 26px 30px;
    display: flex;
    align-items: center;
    gap: 14px;
}
.billing-header-icon {
    width: 50px; height: 50px;
    background: rgba(255,210,27,0.15);
    border: 1px solid rgba(255,210,27,0.3);
    border-radius: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.billing-header-icon i { color: #FFD21B; font-size: 20px; }
.billing-card-header h5 {
    color: #fff;
    font-weight: 700;
    font-size: 1.05rem;
    margin: 0 0 3px;
}
.billing-card-header p {
    color: rgba(255,255,255,0.6);
    font-size: 0.82rem;
    margin: 0;
}

.billing-card-body { padding: 30px; }

/* Form styling */
.field-label {
    font-weight: 700;
    font-size: 0.82rem;
    color: #022B50;
    margin-bottom: 7px;
    letter-spacing: 0.2px;
    display: flex;
    align-items: center;
    gap: 4px;
}
.field-label .required { color: #dc3545; }

.billing-input {
    width: 100%;
    border: 1.5px solid #e4eaf2;
    border-radius: 11px;
    padding: 12px 15px;
    font-size: 0.9rem;
    font-family: 'Quicksand', sans-serif;
    color: #101010;
    background: #f8fafc;
    transition: all 0.3s;
    outline: none;
}
.billing-input:focus {
    border-color: #022B50;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(2,43,80,0.06);
}
.billing-input::placeholder { color: #b0bec5; font-size: 0.87rem; }
.error-msg { font-size: 0.79rem; color: #dc3545; margin-top: 5px; }

/* Field Groups */
.field-group { margin-bottom: 20px; }
.field-icon-wrap { position: relative; }
.field-icon-wrap i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #adb5bd;
    font-size: 15px;
    pointer-events: none;
}
.field-icon-wrap input { padding-left: 40px; }

/* Card Footer / Buttons */
.billing-card-footer {
    padding: 0 30px 30px;
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}
.btn-buy {
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    color: #fff;
    border: none;
    border-radius: 12px;
    padding: 13px 30px;
    font-weight: 700;
    font-size: 0.93rem;
    font-family: 'Quicksand', sans-serif;
    cursor: pointer;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.btn-buy:hover {
    background: linear-gradient(135deg, #011f3d, #022B50);
    color: #FFD21B;
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(2,43,80,0.28);
}
.btn-cancel-billing {
    background: #f4f7fb;
    color: #6c757d;
    border: 1.5px solid #e4eaf2;
    border-radius: 12px;
    padding: 12px 24px;
    font-weight: 700;
    font-size: 0.9rem;
    font-family: 'Quicksand', sans-serif;
    text-decoration: none;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.btn-cancel-billing:hover {
    background: #e9ecef;
    color: #495057;
    text-decoration: none;
}

/* Security note */
.billing-note {
    font-size: 0.78rem;
    color: #adb5bd;
    padding: 0 30px 24px;
    display: flex;
    align-items: center;
    gap: 6px;
}

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

@media (max-width: 576px) {
    .billing-card-body { padding: 22px 18px; }
    .billing-card-footer { padding: 0 18px 22px; flex-direction: column; }
    .btn-buy, .btn-cancel-billing { width: 100%; justify-content: center; }
}
</style>

@section('content')

{{-- ── Page Header ─────────────────────────────────── --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="sub-page-header">
            <div>
                <h2><i class="bi bi-credit-card-2-front me-2" style="color:#FFD21B;"></i>Billing Details</h2>
                <ol class="breadcrumb mt-1">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="/subscriptions/list">Subscriptions</a></li>
                    <li class="breadcrumb-item active">Billing Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <a href="javascript:history.back()" class="btn-back">
            <i class="bi bi-arrow-left"></i> Back
        </a>

        {{-- ── Step Indicator ──────────────────────────── --}}
        <div class="stepper mb-4">
            <div class="step done">
                <div class="step-num"><i class="bi bi-check-lg"></i></div>
                <span class="step-label">Choose Plan</span>
            </div>
            <div class="step-line done"></div>
            <div class="step active">
                <div class="step-num">2</div>
                <span class="step-label">Billing Details</span>
            </div>
            <div class="step-line"></div>
            <div class="step">
                <div class="step-num">3</div>
                <span class="step-label">Payment</span>
            </div>
        </div>

        {{-- ── Billing Card ────────────────────────────── --}}
        <div class="billing-card">

            <div class="billing-card-header">
                <div class="billing-header-icon">
                    <i class="bi bi-person-vcard-fill"></i>
                </div>
                <div>
                    <h5>Billing Information</h5>
                    <p>Please verify your details before proceeding to payment</p>
                </div>
            </div>

            <form action="{{ $editRec->id }}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                <div class="billing-card-body">

                    @if($errors->any())
                        <div class="alert alert-danger rounded-3 mb-4 d-flex align-items-center gap-2">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            Please fix the errors below and try again.
                        </div>
                    @endif

                    <div class="row g-3">

                        {{-- First Name --}}
                        <div class="col-md-6">
                            <div class="field-group">
                                <label class="field-label">
                                    First Name <span class="required">*</span>
                                </label>
                                <div class="field-icon-wrap">
                                    <i class="bi bi-person"></i>
                                    <input type="text" name="first_name" class="billing-input"
                                           placeholder="Enter first name"
                                           value="{{ $userData->first_name }}">
                                </div>
                                @if($errors->first('first_name'))
                                    <div class="error-msg"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                        </div>

                        {{-- Last Name --}}
                        <div class="col-md-6">
                            <div class="field-group">
                                <label class="field-label">
                                    Last Name <span class="required">*</span>
                                </label>
                                <div class="field-icon-wrap">
                                    <i class="bi bi-person"></i>
                                    <input type="text" name="last_name" class="billing-input"
                                           placeholder="Enter last name"
                                           value="{{ $userData->last_name }}">
                                </div>
                                @if($errors->first('last_name'))
                                    <div class="error-msg"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="col-md-6">
                            <div class="field-group">
                                <label class="field-label">
                                    Email Address <span class="required">*</span>
                                </label>
                                <div class="field-icon-wrap">
                                    <i class="bi bi-envelope"></i>
                                    <input type="email" name="email" class="billing-input"
                                           placeholder="Enter your email"
                                           value="{{ $userData->email }}" required>
                                </div>
                                @if($errors->first('email'))
                                    <div class="error-msg"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>

                        {{-- Mobile --}}
                        <div class="col-md-6">
                            <div class="field-group">
                                <label class="field-label">
                                    Mobile Number <span class="required">*</span>
                                </label>
                                <div class="field-icon-wrap">
                                    <i class="bi bi-phone"></i>
                                    <input type="number" name="mobile" class="billing-input"
                                           placeholder="Enter mobile number"
                                           value="{{ $userData->mobile }}" required>
                                </div>
                                @if($errors->first('mobile'))
                                    <div class="error-msg"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first('mobile') }}</div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <div class="billing-card-footer">
                    <button type="submit" class="btn-buy">
                        <i class="bi bi-arrow-right-circle"></i> Continue to Payment
                    </button>
                    <a href="{{ URL::to('/subscriptions/list/') }}" class="btn-cancel-billing">
                        <i class="bi bi-x-lg"></i> Cancel
                    </a>
                </div>

                <div class="billing-note">
                    <i class="bi bi-shield-lock-fill"></i>
                    Your information is encrypted and securely stored
                </div>

            </form>
        </div>

    </div>
</div>

@endsection
