@extends('layouts.master')

@section('content')

<style>
/* ── Service Request Page ───────────────────────────── */
.req-outer {
    max-width: 720px; margin: 0 auto;
}
.req-card {
    background: #fff; border-radius: 22px;
    box-shadow: 0 8px 40px rgba(2,43,80,.09);
    overflow: hidden;
}
.req-card-header {
    background: linear-gradient(135deg, #022B50 0%, #0a4a8c 100%);
    padding: 26px 30px; display: flex; align-items: center; gap: 16px;
    position: relative;
}
.req-card-header::before {
    content: ''; position: absolute; left: 0; top: 0; bottom: 0;
    width: 4px; background: #ffd200;
}
.req-header-icon {
    width: 52px; height: 52px;
    background: rgba(255,210,27,.15); border: 1px solid rgba(255,210,27,.3);
    border-radius: 14px; display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.req-header-icon i { color: #ffd200; font-size: 22px; }
.req-card-header h5 { color: #fff; font-weight: 700; font-size: 1.1rem; margin: 0 0 3px; }
.req-card-header p  { color: rgba(255,255,255,.6); font-size: .82rem; margin: 0; }

.req-card-body   { padding: 30px; }
.req-card-footer { padding: 0 30px 28px; display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }

/* Fields */
.req-field-group { margin-bottom: 20px; }
.req-field-label {
    font-weight: 700; font-size: .82rem; color: #022B50;
    margin-bottom: 7px; display: flex; align-items: center; gap: 4px;
}
.req-field-label .req { color: #dc3545; }
.req-field-wrap { position: relative; }
.req-field-wrap i {
    position: absolute; left: 13px; top: 50%; transform: translateY(-50%);
    color: #94a3b8; font-size: 15px; pointer-events: none;
}
.req-field-wrap.top i { top: 18px; transform: none; }
.req-field-wrap input,
.req-field-wrap textarea {
    width: 100%; border: 1.5px solid #e4eaf2; border-radius: 11px;
    padding: 12px 14px 12px 40px;
    font-size: .9rem; color: #101010; background: #f8fafc;
    font-family: 'Quicksand', sans-serif;
    outline: none; transition: all .3s; resize: vertical;
}
.req-field-wrap input:focus,
.req-field-wrap textarea:focus {
    border-color: #022B50; background: #fff;
    box-shadow: 0 0 0 3px rgba(2,43,80,.06);
}
.req-field-wrap input::placeholder,
.req-field-wrap textarea::placeholder { color: #b0bec5; font-size: .87rem; }
.req-error { font-size: .79rem; color: #dc3545; margin-top: 4px; }

/* Info strip */
.req-info-strip {
    background: #f0f5ff; border: 1px solid #c7d8f8;
    border-radius: 12px; padding: 14px 18px; margin-bottom: 24px;
    display: flex; align-items: flex-start; gap: 10px;
    font-size: .84rem; color: #1e40af;
}
.req-info-strip i { font-size: 1rem; flex-shrink: 0; margin-top: 1px; }

.btn-req-submit {
    background: linear-gradient(135deg, #022B50, #0a4a8a); color: #fff;
    border: none; border-radius: 12px; padding: 13px 28px;
    font-weight: 700; font-size: .93rem; font-family: 'Quicksand', sans-serif;
    cursor: pointer; transition: all .3s;
    display: inline-flex; align-items: center; gap: 8px;
}
.btn-req-submit:hover { color: #ffd200; transform: translateY(-1px); box-shadow: 0 6px 20px rgba(2,43,80,.28); }
</style>

<!-- Page Header Banner -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6">
        <h4 class="mb-0">Service Request</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end mb-0">
          <li class="breadcrumb-item"><a href="{{ url('/user-dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Service Request</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="app-content">
  <div class="container-fluid">
    <div class="req-outer">

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
          <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif
      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <div class="req-card">

        <!-- Header -->
        <div class="req-card-header">
          <div class="req-header-icon"><i class="bi bi-headset"></i></div>
          <div>
            <h5>Submit Your Query</h5>
            <p>Our team will get back to you within 24–48 business hours</p>
          </div>
        </div>

        <!-- Form -->
        <form action="{{ url('userrequest/add_submit') }}" method="post">
          @csrf

          <div class="req-card-body">

            <div class="req-info-strip">
              <i class="bi bi-info-circle-fill"></i>
              <span>Please fill in all fields accurately so our support team can assist you effectively.</span>
            </div>

            <div class="row g-0">
              <div class="col-md-6 pe-md-2">
                <div class="req-field-group">
                  <label class="req-field-label">Full Name <span class="req">*</span></label>
                  <div class="req-field-wrap">
                    <i class="bi bi-person"></i>
                    <input type="text" name="name" placeholder="Your full name" value="{{ old('name') }}">
                  </div>
                  @if($errors->first('name'))
                    <div class="req-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first('name') }}</div>
                  @endif
                </div>
              </div>
              <div class="col-md-6 ps-md-2">
                <div class="req-field-group">
                  <label class="req-field-label">Mobile Number <span class="req">*</span></label>
                  <div class="req-field-wrap">
                    <i class="bi bi-phone"></i>
                    <input type="tel" name="mobile" placeholder="Your mobile number" value="{{ old('mobile') }}">
                  </div>
                  @if($errors->first('mobile'))
                    <div class="req-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first('mobile') }}</div>
                  @endif
                </div>
              </div>
            </div>

            <div class="req-field-group">
              <label class="req-field-label">Email Address <span class="req">*</span></label>
              <div class="req-field-wrap">
                <i class="bi bi-envelope"></i>
                <input type="email" name="email" placeholder="Your email address" value="{{ old('email') }}">
              </div>
              @if($errors->first('email'))
                <div class="req-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first('email') }}</div>
              @endif
            </div>

            <div class="req-field-group">
              <label class="req-field-label">Your Query <span class="req">*</span></label>
              <div class="req-field-wrap top">
                <i class="bi bi-chat-text"></i>
                <textarea name="user_query" rows="5"
                          placeholder="Describe your query or issue in detail...">{{ old('user_query') }}</textarea>
              </div>
              @if($errors->first('user_query'))
                <div class="req-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first('user_query') }}</div>
              @endif
            </div>

          </div>

          <div class="req-card-footer">
            <button type="submit" class="btn-req-submit">
              <i class="bi bi-send-fill"></i> Submit Query
            </button>
            <a href="{{ url('/user-dashboard') }}" class="btn btn-outline-secondary">
              <i class="bi bi-x-circle me-1"></i> Cancel
            </a>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

@endsection
