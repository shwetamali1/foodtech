@extends('layouts.master')

@section('content')

<style>
.plan-form-card {
    border: none;
    border-radius: 18px;
    box-shadow: 0 8px 40px rgba(2,43,80,0.10);
    overflow: hidden;
}
.plan-form-header {
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    padding: 28px 32px 22px;
    display: flex;
    align-items: center;
    gap: 14px;
}
.plan-form-header .header-icon {
    width: 46px; height: 46px;
    background: rgba(255,210,27,0.18);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; color: #FFD21B;
    flex-shrink: 0;
}
.plan-form-header h5 {
    margin: 0;
    color: #fff;
    font-size: 1.15rem;
    font-weight: 800;
}
.plan-form-header p {
    margin: 0;
    color: rgba(255,255,255,0.6);
    font-size: 0.82rem;
}
.section-label {
    font-size: 0.72rem;
    font-weight: 800;
    color: #adb5bd;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding-bottom: 10px;
    border-bottom: 1.5px solid #f0f3f8;
    margin-bottom: 20px;
}
.form-label {
    font-size: 0.82rem;
    font-weight: 700;
    color: #022B50;
    margin-bottom: 6px;
}
.form-label .req { color: #e74c3c; }
.form-control {
    border: 1.5px solid #e4eaf2;
    border-radius: 10px;
    padding: 10px 14px;
    font-size: 0.9rem;
    color: #022B50;
    background: #f8fafc;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.form-control:focus {
    border-color: #022B50;
    box-shadow: 0 0 0 3px rgba(2,43,80,0.08);
    background: #fff;
}
.form-control::placeholder { color: #b0bec5; }
.input-prefix {
    background: #f0f3f8;
    border: 1.5px solid #e4eaf2;
    border-right: none;
    border-radius: 10px 0 0 10px;
    padding: 10px 14px;
    font-size: 0.88rem;
    font-weight: 700;
    color: #022B50;
}
.input-group .form-control { border-radius: 0 10px 10px 0 !important; }
.plan-form-footer {
    background: #f8fafc;
    border-top: 1.5px solid #f0f3f8;
    padding: 20px 32px;
    display: flex;
    gap: 12px;
    justify-content: flex-end;
}
.btn-save {
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 11px 28px;
    font-weight: 700;
    font-size: 0.92rem;
    transition: all 0.25s;
    cursor: pointer;
}
.btn-save:hover {
    background: linear-gradient(135deg, #011f3d, #022B50);
    color: #FFD21B;
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(2,43,80,0.25);
}
.btn-cancel {
    background: #fff;
    color: #6c757d;
    border: 1.5px solid #e4eaf2;
    border-radius: 10px;
    padding: 11px 24px;
    font-weight: 700;
    font-size: 0.92rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s;
}
.btn-cancel:hover {
    background: #f8fafc;
    color: #022B50;
    text-decoration: none;
}
.text-danger { font-size: 0.78rem; }
textarea.form-control { resize: vertical; min-height: 140px; }
</style>

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0">Add Subscription Plan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('subscriptions/list') }}">Subscriptions</a></li>
                    <li class="breadcrumb-item active">Add Plan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">

                <div class="plan-form-card card mb-4">

                    {{-- Card Header --}}
                    <div class="plan-form-header">
                        <div class="header-icon">
                            <i class="bi bi-plus-circle"></i>
                        </div>
                        <div>
                            <h5>New Subscription Plan</h5>
                            <p>Fill in the details to create a new plan</p>
                        </div>
                    </div>

                    <form action="add_submit" method="POST">
                        @csrf

                        <div class="card-body p-4">

                            {{-- Section: Basic Info --}}
                            <div class="section-label">Basic Information</div>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Plan Title <span class="req">*</span></label>
                                    <input type="text" name="title" class="form-control" placeholder="e.g. Professional Plan" value="{{ old('title') }}">
                                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Plan Offer <span class="req">*</span></label>
                                    <input type="text" name="offer" class="form-control" placeholder="e.g. 3 Months Free" value="{{ old('offer') }}">
                                    @error('offer')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description <span class="req">*</span></label>
                                    <input type="text" name="description" class="form-control" placeholder="Brief description of this plan" value="{{ old('description') }}">
                                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            {{-- Section: Pricing --}}
                            <div class="section-label">Pricing</div>
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Plan Price <span class="req">*</span></label>
                                    <div class="input-group">
                                        <span class="input-prefix">₹</span>
                                        <input type="text" name="price" class="form-control" placeholder="0" value="{{ old('price') }}">
                                    </div>
                                    @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Government Fee</label>
                                    <div class="input-group">
                                        <span class="input-prefix">₹</span>
                                        <input type="number" name="government_fee" class="form-control" placeholder="0" value="{{ old('government_fee') }}">
                                    </div>
                                    @error('government_fee')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Discount Rate</label>
                                    <div class="input-group">
                                        <input type="number" name="discount" class="form-control" placeholder="0" value="{{ old('discount') }}" style="border-radius:10px 0 0 10px !important;">
                                        <span class="input-prefix" style="border-left:none;border-right:1.5px solid #e4eaf2;border-radius:0 10px 10px 0;">%</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Credits</label>
                                    <input type="text" name="credits" class="form-control" placeholder="e.g. 100" value="{{ old('credits') }}">
                                </div>
                            </div>

                            {{-- Section: Features --}}
                            <div class="section-label">Features</div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Features <span class="req">*</span></label>
                                    <textarea name="features[]" class="form-control" rows="8" placeholder="Enter one feature per line&#10;e.g. Unlimited reports&#10;Priority support&#10;Custom branding"></textarea>
                                    <small class="text-muted" style="font-size:0.75rem;">Enter one feature per line</small>
                                    @error('features')<span class="text-danger d-block">{{ $message }}</span>@enderror
                                </div>
                            </div>

                        </div>

                        {{-- Footer --}}
                        <div class="plan-form-footer">
                            <a href="{{ url('subscriptions/list') }}" class="btn-cancel">
                                <i class="bi bi-x-lg"></i> Cancel
                            </a>
                            <button type="submit" class="btn-save">
                                <i class="bi bi-plus-lg me-1"></i> Create Plan
                            </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
