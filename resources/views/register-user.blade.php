<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account – FoodTech Mate</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  @extends('layouts.head-css')
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      min-height: 100vh;
      background: #f1f5f9;
      font-family: 'Segoe UI', system-ui, sans-serif;
      display: flex;
      flex-direction: column;
    }

    /* ── top nav bar ────────────────────────────────── */
    .top-bar {
      background: #fff;
      border-bottom: 1px solid #e5e7eb;
      padding: .75rem 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .top-bar .brand { font-size: 1.25rem; font-weight: 800; color: #111827; text-decoration: none; }
    .top-bar .brand span { color: #ffd200; }
    .top-bar .nav-links a { font-size: .875rem; color: #374151; text-decoration: none; margin-left: 1.25rem; font-weight: 500; }
    .top-bar .nav-links a:hover { color: #f97316; }

    /* ── page container ─────────────────────────────── */
    .reg-container {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1rem;
    }

    .reg-card {
      display: flex;
      width: 100%;
      max-width: 960px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0,0,0,.12);
      background: #fff;
    }

    /* ── left info panel ────────────────────────────── */
    .reg-info {
      width: 320px;
      background: linear-gradient(160deg, #022B50, #0a4a8c);
      padding: 2.5rem 2rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      color: #fff;
      flex-shrink: 0;
    }
    .reg-info h3 { font-size: 1.4rem; font-weight: 800; margin-bottom: .5rem; }
    .reg-info p  { font-size: .875rem; opacity: .8; margin-bottom: 2rem; }
    .contact-item { display: flex; align-items: flex-start; gap: .75rem; margin-bottom: 1.1rem; font-size: .875rem; }
    .contact-item i { font-size: 1.1rem; margin-top: .05rem; opacity: .85; flex-shrink: 0; }
    .contact-item a { color: #fff; text-decoration: none; word-break: break-word; }
    .contact-item a:hover { opacity: .8; }

    /* ── right form panel ───────────────────────────── */
    .reg-form { flex: 1; padding: 2.5rem 2.5rem; overflow-y: auto; }
    .reg-form h2 { font-size: 1.5rem; font-weight: 800; color: #111827; margin-bottom: .3rem; }
    .reg-form .sub { font-size: .875rem; color: #6b7280; margin-bottom: 1.75rem; }

    .form-label { font-size: .78rem; font-weight: 600; color: #374151; text-transform: uppercase; letter-spacing: .04em; }
    .form-control {
      border-radius: 10px; border: 1.5px solid #e5e7eb;
      padding: .65rem 1rem; font-size: .9rem; transition: border-color .2s;
    }
    .form-control:focus { border-color: #022B50; box-shadow: 0 0 0 3px rgba(2,43,80,.12); }
    .text-danger { font-size: .78rem; }

    .btn-register {
      padding: .75rem 2rem; border-radius: 10px;
      background: linear-gradient(135deg, #022B50, #ffd200);
      color: #fff; font-weight: 700; font-size: .95rem;
      border: none; cursor: pointer; transition: opacity .2s;
    }
    .btn-register:hover { opacity: .9; }

    .divider { display: flex; align-items: center; gap: 1rem; margin: 1.25rem 0; color: #9ca3af; font-size: .8rem; }
    .divider::before, .divider::after { content: ''; flex: 1; height: 1px; background: #e5e7eb; }

    .btn-google {
      display: flex; align-items: center; justify-content: center; gap: .6rem;
      padding: .7rem 1rem; border-radius: 10px;
      background: #fff; border: 1.5px solid #e5e7eb; color: #374151;
      font-weight: 600; font-size: .9rem; text-decoration: none;
      transition: background .15s;
    }
    .btn-google:hover { background: #f9fafb; color: #111; }

    .sign-in-link { text-align: center; font-size: .825rem; color: #6b7280; margin-top: 1.25rem; }
    .sign-in-link a { color: #022B50; font-weight: 600; text-decoration: none; }
    .sign-in-link a:hover { text-decoration: underline; }

    @media (max-width: 768px) {
      .reg-info { display: none; }
      .reg-form  { padding: 2rem 1.5rem; }
    }
  </style>
</head>
<body>

<!-- Top nav -->
<div class="top-bar">
  <a class="brand" href="/">FoodTech<span>Mate</span></a>
  <div class="nav-links">
    <a href="/">Home</a>
    <a href="/login/admin">Sign In</a>
  </div>
</div>

<!-- Main card -->
<div class="reg-container">
  <div class="reg-card">

    <!-- Left info -->
    <div class="reg-info">
      <h3>Contact Information</h3>
      <p>Reach us for seamless communication &amp; support</p>

      <div class="contact-item">
        <i class="bi bi-telephone-fill"></i>
        <a href="tel:+917020048677">+91 7020048677</a>
      </div>
      <div class="contact-item">
        <i class="bi bi-envelope-fill"></i>
        <a href="mailto:foodtechmate@gmail.com">foodtechmate@gmail.com</a>
      </div>
      <div class="contact-item">
        <i class="bi bi-geo-alt-fill"></i>
        <span>7, Star Properties, Office No 302 Sant Niwas, New DP Rd, Pimple Nilakh, Pune 411027</span>
      </div>
    </div>

    <!-- Right form -->
    <div class="reg-form">
      <h2>Create your account</h2>
      <p class="sub">Join FoodTech Mate and access industry insights</p>

      @if(session('success'))
        <div class="alert alert-success py-2 mb-3" style="border-radius:10px;font-size:.875rem;">
          {{ session('success') }}
        </div>
      @endif

      <form action="/register-user" method="POST">
        @csrf
        <div class="row g-3 mb-3">
          <div class="col-md-6">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" name="first_name" placeholder="First name" value="{{ old('first_name') }}">
            <span class="text-danger">{{ $errors->first('first_name') }}</span>
          </div>
          <div class="col-md-6">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name') }}">
            <span class="text-danger">{{ $errors->first('last_name') }}</span>
          </div>
        </div>
        <div class="row g-3 mb-3">
          <div class="col-md-6">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" placeholder="you@example.com" value="{{ old('email') }}">
            <span class="text-danger">{{ $errors->first('email') }}</span>
          </div>
          <div class="col-md-6">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Min. 8 characters">
            <span class="text-danger">{{ $errors->first('password') }}</span>
          </div>
        </div>
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label class="form-label">Mobile Number</label>
            <input type="tel" class="form-control" name="mobile" placeholder="+91 XXXXX XXXXX" value="{{ old('mobile') }}">
            <span class="text-danger">{{ $errors->first('mobile') }}</span>
          </div>
        </div>
        <button type="submit" class="btn-register">Create Account &rarr;</button>
      </form>

      <div class="divider">or register with</div>

      <a href="{{ route('socialite.auth', 'google') }}" class="btn-google">
        <svg width="20" height="20" viewBox="0 0 48 48">
          <path fill="#EA4335" d="M24 9.5c3.5 0 6.6 1.2 9 3.2l6.7-6.7C35.7 2.2 30.2 0 24 0 14.7 0 6.7 5.4 2.8 13.3l7.8 6c1.8-5.4 6.8-9.8 13.4-9.8z"/>
          <path fill="#4285F4" d="M46.6 24.5c0-1.5-.1-3-.4-4.5H24v8.5h12.7c-.6 3-2.3 5.5-4.9 7.2l7.6 5.9c4.4-4.1 7.2-10.1 7.2-17.1z"/>
          <path fill="#FBBC05" d="M10.6 28.6A14.5 14.5 0 0 1 9.5 24c0-1.6.3-3.2.8-4.6l-7.8-6A24 24 0 0 0 0 24c0 3.9.9 7.5 2.5 10.8l8.1-6.2z"/>
          <path fill="#34A853" d="M24 48c6.2 0 11.4-2 15.2-5.5l-7.6-5.9c-2 1.4-4.7 2.2-7.6 2.2-6.6 0-12.2-4.4-14.2-10.4l-8.1 6.2C5.9 42.8 14.4 48 24 48z"/>
        </svg>
        Continue with Google
      </a>

      <div class="sign-in-link">
        Already have an account? <a href="/login/admin">Sign in</a>
      </div>
    </div>

  </div>
</div>

@extends('layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
