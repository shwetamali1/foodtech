<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In – FoodTech Mate</title>
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

    .auth-wrapper {
      display: flex;
      width: 100%;
      max-width: 900px;
      min-height: 560px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0,0,0,.15);
    }

    /* ── Left panel ─────────────────────────────────── */
    .auth-left {
      flex: 1;
      background: linear-gradient(160deg, #022B50, #0a4a8c);
      padding: 3rem 2.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      color: #fff;
    }
    .auth-left .brand { font-size: 1.6rem; font-weight: 800; letter-spacing: .03em; margin-bottom: .3rem; }
    .auth-left .brand span { opacity: .75; }
    .auth-left .tagline { font-size: .95rem; opacity: .85; margin-bottom: 2.5rem; }
    .auth-left .feature { display: flex; align-items: center; gap: .75rem; margin-bottom: 1rem; font-size: .9rem; }
    .auth-left .feature i { font-size: 1.25rem; opacity: .9; }

    /* ── Right panel ────────────────────────────────── */
    .auth-right {
      width: 420px;
      background: #fff;
      padding: 3rem 2.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .auth-right h2 { font-size: 1.6rem; font-weight: 800; color: #111827; margin-bottom: .3rem; }
    .auth-right .sub { font-size: .875rem; color: #6b7280; margin-bottom: 2rem; }

    .form-label { font-size: .8rem; font-weight: 600; color: #374151; text-transform: uppercase; letter-spacing: .04em; }
    .form-control {
      border-radius: 10px; border: 1.5px solid #e5e7eb; padding: .7rem 1rem;
      font-size: .9rem; transition: border-color .2s;
    }
    .form-control:focus { border-color: #022B50; box-shadow: 0 0 0 3px rgba(2,43,80,.15); }

    .btn-signin {
      width: 100%; padding: .75rem; border-radius: 10px;
      background: linear-gradient(135deg, #022B50, #ffd200);
      color: #fff; font-weight: 700; font-size: 1rem;
      border: none; cursor: pointer; transition: opacity .2s;
    }
    .btn-signin:hover { opacity: .9; }

    .divider { display: flex; align-items: center; gap: 1rem; margin: 1.25rem 0; color: #9ca3af; font-size: .8rem; }
    .divider::before, .divider::after { content: ''; flex: 1; height: 1px; background: #e5e7eb; }

    .btn-google {
      width: 100%; padding: .7rem 1rem; border-radius: 10px;
      background: #fff; border: 1.5px solid #e5e7eb; color: #374151;
      font-weight: 600; font-size: .9rem; display: flex; align-items: center; justify-content: center; gap: .6rem;
      cursor: pointer; transition: background .15s;
      text-decoration: none;
    }
    .btn-google:hover { background: #f9fafb; color: #111; }
    .btn-google img { width: 20px; }

    .auth-footer { margin-top: 1.5rem; text-align: center; font-size: .825rem; color: #6b7280; }
    .auth-footer a { color: #022B50; font-weight: 600; text-decoration: none; }
    .auth-footer a:hover { text-decoration: underline; }

    @media (max-width: 700px) {
      .auth-left  { display: none; }
      .auth-right { width: 100%; padding: 2rem 1.5rem; }
      .auth-wrapper { border-radius: 0; }
    }
  </style>
</head>
<body>

<div class="auth-wrapper">

  <!-- Left branding panel -->
  <div class="auth-left">
    <div class="brand">FoodTech<span>Mate</span></div>
    <div class="tagline">Your food industry intelligence platform</div>
    <div class="feature"><i class="bi bi-graph-up-arrow"></i> Detailed business plan reports</div>
    <div class="feature"><i class="bi bi-shield-lock-fill"></i> Secure &amp; private transactions</div>
    <div class="feature"><i class="bi bi-lightning-charge-fill"></i> Instant access after payment</div>
    <div class="feature"><i class="bi bi-headset"></i> 24/7 expert support</div>
  </div>

  <!-- Right form panel -->
  <div class="auth-right">
    <h2>Welcome back</h2>
    <p class="sub">Sign in to access your dashboard</p>

    @if(session('error'))
      <div class="alert alert-danger py-2 mb-3" style="border-radius:10px;font-size:.875rem;">{{ session('error') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger py-2 mb-3" style="border-radius:10px;font-size:.875rem;">
        @foreach($errors->all() as $err)<div>{{ $err }}</div>@endforeach
      </div>
    @endif

    <form action="{{ route('login_post') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="you@example.com" required autofocus>
      </div>
      <div class="mb-4">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
      </div>
      <button type="submit" class="btn-signin">Sign In</button>
    </form>

    <div class="divider">or continue with</div>

    <a href="{{ route('socialite.auth', 'google') }}" class="btn-google">
      <svg width="20" height="20" viewBox="0 0 48 48"><path fill="#EA4335" d="M24 9.5c3.5 0 6.6 1.2 9 3.2l6.7-6.7C35.7 2.2 30.2 0 24 0 14.7 0 6.7 5.4 2.8 13.3l7.8 6c1.8-5.4 6.8-9.8 13.4-9.8z"/><path fill="#4285F4" d="M46.6 24.5c0-1.5-.1-3-.4-4.5H24v8.5h12.7c-.6 3-2.3 5.5-4.9 7.2l7.6 5.9c4.4-4.1 7.2-10.1 7.2-17.1z"/><path fill="#FBBC05" d="M10.6 28.6A14.5 14.5 0 0 1 9.5 24c0-1.6.3-3.2.8-4.6l-7.8-6A24 24 0 0 0 0 24c0 3.9.9 7.5 2.5 10.8l8.1-6.2z"/><path fill="#34A853" d="M24 48c6.2 0 11.4-2 15.2-5.5l-7.6-5.9c-2 1.4-4.7 2.2-7.6 2.2-6.6 0-12.2-4.4-14.2-10.4l-8.1 6.2C5.9 42.8 14.4 48 24 48z"/></svg>
      Sign in with Google
    </a>

    <div class="auth-footer">
      <a href="/forgot-password">Forgot Password?</a> &nbsp;·&nbsp;
      <a href="/register-user">Create an account</a> &nbsp;·&nbsp;
      <a href="/">Visit Site</a>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
