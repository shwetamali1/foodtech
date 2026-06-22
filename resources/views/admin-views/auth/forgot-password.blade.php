<?php $site_direction = session()->get('site_direction'); ?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $site_direction }}">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodTech Mate – Reset Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      min-height: 100vh;
      background: #f1f5f9;
      font-family: 'Segoe UI', system-ui, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .fp-wrapper {
      display: flex;
      width: 100%;
      max-width: 820px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0,0,0,.14);
    }

    /* ── Left illustration panel ──────────────────────── */
    .fp-left {
      flex: 1;
      background: linear-gradient(160deg, #022B50, #0a4a8c);
      padding: 3rem 2.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: #fff;
      text-align: center;
    }
    .fp-left .icon-circle {
      width: 90px; height: 90px; border-radius: 50%;
      background: rgba(255,255,255,.2);
      display: flex; align-items: center; justify-content: center;
      font-size: 2.5rem; margin-bottom: 1.5rem;
    }
    .fp-left h3 { font-size: 1.4rem; font-weight: 800; margin-bottom: .75rem; }
    .fp-left p  { font-size: .875rem; opacity: .85; line-height: 1.6; }

    /* ── Right form panel ─────────────────────────────── */
    .fp-right {
      width: 420px;
      background: #fff;
      padding: 3rem 2.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .brand { font-size: 1.2rem; font-weight: 800; color: #111827; margin-bottom: 2rem; }
    .brand span { color: #ffd200; }

    .fp-right h2 { font-size: 1.5rem; font-weight: 800; color: #111827; margin-bottom: .3rem; }
    .fp-right .sub { font-size: .875rem; color: #6b7280; margin-bottom: 2rem; line-height: 1.5; }

    .form-label { font-size: .78rem; font-weight: 600; color: #374151; text-transform: uppercase; letter-spacing: .04em; }
    .form-control {
      border-radius: 10px; border: 1.5px solid #e5e7eb;
      padding: .7rem 1rem; font-size: .9rem; transition: border-color .2s;
    }
    .form-control:focus { border-color: #022B50; box-shadow: 0 0 0 3px rgba(2,43,80,.15); }

    .btn-send {
      width: 100%; padding: .75rem; border-radius: 10px;
      background: linear-gradient(135deg, #022B50, #ffd200);
      color: #fff; font-weight: 700; font-size: 1rem;
      border: none; cursor: pointer; transition: opacity .2s;
    }
    .btn-send:hover { opacity: .9; }

    .fp-footer { margin-top: 1.5rem; text-align: center; font-size: .825rem; color: #6b7280; }
    .fp-footer a { color: #022B50; font-weight: 600; text-decoration: none; }
    .fp-footer a:hover { text-decoration: underline; }

    @media (max-width: 650px) {
      .fp-left    { display: none; }
      .fp-right   { width: 100%; padding: 2rem 1.5rem; }
      .fp-wrapper { border-radius: 0; }
    }
  </style>
</head>
<body>

<div class="fp-wrapper">

  <!-- Left panel -->
  <div class="fp-left">
    <div class="icon-circle"><i class="bi bi-shield-lock-fill"></i></div>
    <h3>Password Recovery</h3>
    <p>Enter the email address linked to your account and we'll send you a secure reset link right away.</p>
  </div>

  <!-- Right form -->
  <div class="fp-right">

    <div class="brand">FoodTech<span>Mate</span></div>

    <h2>Forgot your password?</h2>
    <p class="sub">No problem! Just enter your email and we'll send you a reset link.</p>

    @if(session('error'))
      <div class="alert alert-danger py-2 mb-3" style="border-radius:10px;font-size:.875rem;">{{ session('error') }}</div>
    @endif
    @if(session('success'))
      <div class="alert alert-success py-2 mb-3" style="border-radius:10px;font-size:.875rem;">{{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger py-2 mb-3" style="border-radius:10px;font-size:.875rem;">
        @foreach($errors->all() as $err)<div>{{ $err }}</div>@endforeach
      </div>
    @endif

    <form action="{{ route('forgot') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label class="form-label" for="loginEmail">Email Address</label>
        <input id="loginEmail" type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               placeholder="you@example.com" value="{{ old('email') }}" required autofocus>
        @error('email')
          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
      <button type="submit" class="btn-send">
        <i class="bi bi-send-fill me-2"></i>Send Reset Link
      </button>
    </form>

    <div class="fp-footer">
      <a href="/login/admin"><i class="bi bi-arrow-left me-1"></i>Back to Sign In</a>
      &nbsp;·&nbsp;
      <a href="/register-user">Create an account</a>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
