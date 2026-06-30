@extends('layouts.master')

@section('content')

<style>
.billing-card {
    background: #fff; border-radius: 22px; overflow: hidden;
    box-shadow: 0 8px 40px rgba(2,43,80,0.09); max-width: 680px; margin: 0 auto;
}
.billing-card-header {
    background: linear-gradient(135deg, #022B50, #0a4a8a); padding: 26px 30px;
    display: flex; align-items: center; gap: 14px;
}
.billing-header-icon {
    width: 50px; height: 50px; background: rgba(255,210,27,0.15);
    border: 1px solid rgba(255,210,27,0.3); border-radius: 13px;
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.billing-header-icon i { color: #FFD21B; font-size: 20px; }
.billing-card-header h5 { color: #fff; font-weight: 700; font-size: 1.05rem; margin: 0 0 3px; }
.billing-card-header p { color: rgba(255,255,255,0.6); font-size: 0.82rem; margin: 0; }
.billing-card-body { padding: 30px; }
.field-label { font-weight: 700; font-size: 0.82rem; color: #022B50; margin-bottom: 7px; }
.field-label .required { color: #dc3545; }
.billing-input {
    width: 100%; border: 1.5px solid #e4eaf2; border-radius: 11px; padding: 12px 15px;
    font-size: 0.9rem; font-family: 'Quicksand', sans-serif; color: #101010; background: #f8fafc;
}
.billing-input:focus { border-color: #022B50; background: #fff; box-shadow: 0 0 0 3px rgba(2,43,80,0.06); }
.error-msg { font-size: 0.79rem; color: #dc3545; margin-top: 5px; }
.field-group { margin-bottom: 20px; }
.billing-card-footer { padding: 0 30px 30px; display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
.btn-buy {
    background: linear-gradient(135deg, #022B50, #0a4a8a); color: #fff; border: none; border-radius: 12px;
    padding: 13px 30px; font-weight: 700; font-size: 0.93rem; font-family: 'Quicksand', sans-serif;
    cursor: pointer; display: inline-flex; align-items: center; gap: 8px;
}
.btn-buy:hover { background: linear-gradient(135deg, #011f3d, #022B50); color: #FFD21B; }
.btn-cancel-billing {
    background: #f4f7fb; color: #6c757d; border: 1.5px solid #e4eaf2; border-radius: 12px;
    padding: 12px 24px; font-weight: 700; font-size: 0.9rem; font-family: 'Quicksand', sans-serif;
    text-decoration: none; display: inline-flex; align-items: center; gap: 6px;
}
.btn-cancel-billing:hover { background: #e9ecef; color: #495057; text-decoration: none; }
.billing-note { font-size: 0.78rem; color: #adb5bd; padding: 0 30px 24px; display: flex; align-items: center; gap: 6px; }
.btn-back {
    display: inline-flex; align-items: center; gap: 6px; color: #6c757d; font-size: 0.85rem;
    font-weight: 600; text-decoration: none; margin-bottom: 22px;
}
.btn-back:hover { color: #022B50; text-decoration: none; }
</style>

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Billing Details</h3></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="/addon-services/list">Add-on Services</a></li>
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

        <div class="billing-card">
            <div class="billing-card-header">
                <div class="billing-header-icon"><i class="bi bi-person-vcard-fill"></i></div>
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
                        <div class="col-md-6">
                            <div class="field-group">
                                <label class="field-label">First Name <span class="required">*</span></label>
                                <input type="text" name="first_name" class="billing-input" value="{{ $userData->first_name }}">
                                @if($errors->first('first_name'))
                                    <div class="error-msg">{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-group">
                                <label class="field-label">Last Name <span class="required">*</span></label>
                                <input type="text" name="last_name" class="billing-input" value="{{ $userData->last_name }}">
                                @if($errors->first('last_name'))
                                    <div class="error-msg">{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-group">
                                <label class="field-label">Email Address <span class="required">*</span></label>
                                <input type="email" name="email" class="billing-input" value="{{ $userData->email }}" required>
                                @if($errors->first('email'))
                                    <div class="error-msg">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-group">
                                <label class="field-label">Mobile Number <span class="required">*</span></label>
                                <input type="number" name="mobile" class="billing-input" value="{{ $userData->mobile }}" required>
                                @if($errors->first('mobile'))
                                    <div class="error-msg">{{ $errors->first('mobile') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="billing-card-footer">
                    <button type="submit" class="btn-buy">
                        <i class="bi bi-arrow-right-circle"></i> Continue to Payment
                    </button>
                    <a href="{{ URL::to('/addon-services/list') }}" class="btn-cancel-billing">
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
