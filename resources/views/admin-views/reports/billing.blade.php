@extends('layouts.master')

@section('content')

<style>
/* ── Report Billing Page ─────────────────────────────── */
.rb-stepper {
    display: flex; align-items: center; justify-content: center;
    gap: 0; margin-bottom: 2rem;
}
.rb-step { display: flex; flex-direction: column; align-items: center; gap: 6px; }
.rb-step-num {
    width: 36px; height: 36px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: .85rem; font-weight: 700;
    border: 2px solid #e4eaf2; background: #fff; color: #adb5bd;
}
.rb-step.done .rb-step-num  { background: #16a34a; border-color: #16a34a; color: #fff; }
.rb-step.active .rb-step-num { background: linear-gradient(135deg,#022B50,#0a4a8a); border-color: #022B50; color: #ffd200; }
.rb-step-label { font-size: .72rem; font-weight: 600; color: #adb5bd; white-space: nowrap; }
.rb-step.active .rb-step-label { color: #022B50; }
.rb-step.done  .rb-step-label { color: #16a34a; }
.rb-step-line { flex: 1; height: 2px; background: #e4eaf2; min-width: 60px; margin-bottom: 22px; }
.rb-step-line.done { background: #16a34a; }

/* ── Main layout ─────────────────────────────────────── */
.rb-layout { display: grid; grid-template-columns: 1fr 340px; gap: 24px; align-items: start; }
@media (max-width: 900px) { .rb-layout { grid-template-columns: 1fr; } }

/* ── Billing Card ────────────────────────────────────── */
.rb-card {
    background: #fff; border-radius: 22px; overflow: hidden;
    box-shadow: 0 8px 40px rgba(2,43,80,.09);
}
.rb-card-header {
    background: linear-gradient(135deg,#022B50,#0a4a8a);
    padding: 24px 28px; display: flex; align-items: center; gap: 14px;
    position: relative;
}
.rb-card-header::before {
    content: ''; position: absolute; left: 0; top: 0; bottom: 0;
    width: 4px; background: #ffd200;
}
.rb-header-icon {
    width: 48px; height: 48px; background: rgba(255,210,27,.15);
    border: 1px solid rgba(255,210,27,.3); border-radius: 12px;
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.rb-header-icon i { color: #ffd200; font-size: 20px; }
.rb-card-header h5 { color: #fff; font-weight: 700; font-size: 1.05rem; margin: 0 0 2px; }
.rb-card-header p  { color: rgba(255,255,255,.6); font-size: .82rem; margin: 0; }
.rb-card-body { padding: 28px; }
.rb-card-footer {
    padding: 0 28px 24px; display: flex; align-items: center; gap: 12px; flex-wrap: wrap;
}
.rb-note {
    padding: 0 28px 20px; font-size: .77rem; color: #94a3b8;
    display: flex; align-items: center; gap: 6px;
}

/* Fields */
.rb-field-label {
    font-weight: 700; font-size: .82rem; color: #022B50;
    margin-bottom: 7px; display: flex; align-items: center; gap: 4px;
}
.rb-field-label .req { color: #dc3545; }
.rb-field-wrap { position: relative; }
.rb-field-wrap i {
    position: absolute; left: 13px; top: 50%; transform: translateY(-50%);
    color: #94a3b8; font-size: 15px; pointer-events: none;
}
.rb-field-wrap input {
    width: 100%; border: 1.5px solid #e4eaf2; border-radius: 11px;
    padding: 12px 14px 12px 38px;
    font-size: .9rem; color: #101010; background: #f8fafc;
    transition: all .3s; outline: none; font-family: 'Quicksand', sans-serif;
}
.rb-field-wrap input:focus { border-color: #022B50; background: #fff; box-shadow: 0 0 0 3px rgba(2,43,80,.06); }
.rb-field-wrap input::placeholder { color: #b0bec5; font-size: .87rem; }
.rb-error { font-size: .79rem; color: #dc3545; margin-top: 4px; }
.rb-field-group { margin-bottom: 18px; }

.btn-rb-buy {
    background: linear-gradient(135deg,#022B50,#0a4a8a); color: #fff;
    border: none; border-radius: 12px; padding: 13px 28px;
    font-weight: 700; font-size: .93rem; font-family: 'Quicksand', sans-serif;
    cursor: pointer; transition: all .3s;
    display: inline-flex; align-items: center; gap: 8px;
}
.btn-rb-buy:hover { color: #ffd200; transform: translateY(-1px); box-shadow: 0 6px 20px rgba(2,43,80,.28); }
.btn-rb-cancel {
    background: #f4f7fb; color: #6c757d; border: 1.5px solid #e4eaf2;
    border-radius: 12px; padding: 12px 22px;
    font-weight: 700; font-size: .9rem; font-family: 'Quicksand', sans-serif;
    text-decoration: none; display: inline-flex; align-items: center; gap: 6px; transition: all .3s;
}
.btn-rb-cancel:hover { background: #e9ecef; color: #495057; text-decoration: none; }

/* ── Order Summary Card ──────────────────────────────── */
.rb-summary {
    background: #fff; border-radius: 22px;
    box-shadow: 0 8px 40px rgba(2,43,80,.09);
    overflow: hidden; position: sticky; top: 20px;
}
.rb-summary-header {
    background: linear-gradient(135deg,#022B50,#0a4a8a);
    padding: 18px 22px; position: relative;
}
.rb-summary-header::before {
    content: ''; position: absolute; left: 0; top: 0; bottom: 0;
    width: 4px; background: #ffd200;
}
.rb-summary-header h6 {
    color: #fff; font-weight: 700; margin: 0; font-size: .95rem;
    display: flex; align-items: center; gap: .4rem;
}
.rb-summary-header h6 i { color: #ffd200; }
.rb-summary-body { padding: 22px; }
.rb-plan-chip {
    display: inline-flex; align-items: center; gap: 6px;
    background: #ede9fe; color: #6d28d9;
    border-radius: 50px; padding: 4px 12px;
    font-size: .72rem; font-weight: 700; margin-bottom: 12px;
}
.rb-plan-title { font-size: .95rem; font-weight: 700; color: #0f172a; line-height: 1.4; margin-bottom: 14px; }
.rb-divider { border: none; border-top: 1.5px dashed #e4eaf2; margin: 14px 0; }
.rb-price-row { display: flex; justify-content: space-between; align-items: center; }
.rb-price-label { font-size: .82rem; color: #64748b; font-weight: 600; }
.rb-price-val   { font-size: 1.4rem; font-weight: 800; color: #022B50; }
.rb-secure-badge {
    margin-top: 18px; background: #f0fdf4; border: 1px solid #bbf7d0;
    border-radius: 10px; padding: 10px 14px;
    display: flex; align-items: center; gap: 8px; font-size: .8rem; color: #166534; font-weight: 600;
}

.btn-back-rb {
    display: inline-flex; align-items: center; gap: 6px;
    color: #64748b; font-size: .85rem; font-weight: 600;
    text-decoration: none; margin-bottom: 20px; transition: color .2s;
}
.btn-back-rb:hover { color: #022B50; text-decoration: none; }
</style>

<!-- Page Header Banner -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6">
        <h4 class="mb-0"><i class="bi bi-credit-card-2-front me-2"></i>Billing Details</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end mb-0">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/business-plans') }}">Business Plans</a></li>
          <li class="breadcrumb-item active">Billing</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="container-fluid">

    <a href="javascript:history.back()" class="btn-back-rb">
      <i class="bi bi-arrow-left"></i> Back to Plan
    </a>

    <!-- Stepper -->
    <div class="rb-stepper">
      <div class="rb-step done">
        <div class="rb-step-num"><i class="bi bi-check-lg"></i></div>
        <span class="rb-step-label">Select Plan</span>
      </div>
      <div class="rb-step-line done"></div>
      <div class="rb-step active">
        <div class="rb-step-num">2</div>
        <span class="rb-step-label">Billing Details</span>
      </div>
      <div class="rb-step-line"></div>
      <div class="rb-step">
        <div class="rb-step-num">3</div>
        <span class="rb-step-label">Payment</span>
      </div>
    </div>

    <!-- Two-column layout: Form + Summary -->
    <div class="rb-layout">

      <!-- Billing Form -->
      <div class="rb-card">
        <div class="rb-card-header">
          <div class="rb-header-icon"><i class="bi bi-person-vcard-fill"></i></div>
          <div>
            <h5>Billing Information</h5>
            <p>Verify your details before proceeding to payment</p>
          </div>
        </div>

        <form action="{{ $editRec->id }}" method="post">
          @csrf

          <div class="rb-card-body">
            @if($errors->any())
              <div class="alert alert-danger rounded-3 mb-4 d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-triangle-fill"></i>
                Please fix the errors below and try again.
              </div>
            @endif

            <div class="row g-3">
              <div class="col-md-6">
                <div class="rb-field-group">
                  <label class="rb-field-label">First Name <span class="req">*</span></label>
                  <div class="rb-field-wrap">
                    <i class="bi bi-person"></i>
                    <input type="text" name="first_name" placeholder="First name" value="{{ $userData->first_name }}">
                  </div>
                  @if($errors->first('first_name'))
                    <div class="rb-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first('first_name') }}</div>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="rb-field-group">
                  <label class="rb-field-label">Last Name <span class="req">*</span></label>
                  <div class="rb-field-wrap">
                    <i class="bi bi-person"></i>
                    <input type="text" name="last_name" placeholder="Last name" value="{{ $userData->last_name }}">
                  </div>
                  @if($errors->first('last_name'))
                    <div class="rb-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first('last_name') }}</div>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="rb-field-group">
                  <label class="rb-field-label">Email Address <span class="req">*</span></label>
                  <div class="rb-field-wrap">
                    <i class="bi bi-envelope"></i>
                    <input type="email" name="email" placeholder="Email address" value="{{ $userData->email }}">
                  </div>
                  @if($errors->first('email'))
                    <div class="rb-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first('email') }}</div>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="rb-field-group">
                  <label class="rb-field-label">Mobile Number <span class="req">*</span></label>
                  <div class="rb-field-wrap">
                    <i class="bi bi-phone"></i>
                    <input type="number" name="mobile" placeholder="Mobile number" value="{{ $userData->mobile }}">
                  </div>
                  @if($errors->first('mobile'))
                    <div class="rb-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first('mobile') }}</div>
                  @endif
                </div>
              </div>
            </div>
          </div>

          <div class="rb-card-footer">
            <button type="submit" class="btn-rb-buy">
              <i class="bi bi-arrow-right-circle"></i> Continue to Payment
            </button>
            <a href="{{ URL::to('/business-plans') }}" class="btn-rb-cancel">
              <i class="bi bi-x-lg"></i> Cancel
            </a>
          </div>

          <div class="rb-note">
            <i class="bi bi-shield-lock-fill"></i>
            Your information is encrypted and securely stored
          </div>
        </form>
      </div>

      <!-- Order Summary -->
      <div class="rb-summary">
        <div class="rb-summary-header">
          <h6><i class="bi bi-file-earmark-bar-graph-fill"></i> Order Summary</h6>
        </div>
        <div class="rb-summary-body">
          <div class="rb-plan-chip"><i class="bi bi-bag-fill"></i> Business Plan</div>
          <div class="rb-plan-title">{{ $editRec->title ?? $editRec->report_title ?? 'Business Plan Report' }}</div>

          @if(!empty($editRec->description))
            <p style="font-size:.82rem; color:#64748b; line-height:1.6; margin-bottom:14px;">
              {{ \Illuminate\Support\Str::limit($editRec->description, 120) }}
            </p>
          @endif

          <hr class="rb-divider">

          <div class="rb-price-row">
            <span class="rb-price-label">Total Amount</span>
            <span class="rb-price-val">₹{{ number_format((float)($editRec->price ?? $editRec->amount ?? 0)) }}</span>
          </div>

          <div class="rb-secure-badge">
            <i class="bi bi-shield-check-fill" style="font-size:1rem;"></i>
            Secure payment via Razorpay
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

@endsection
