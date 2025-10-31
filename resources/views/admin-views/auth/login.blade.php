<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FoodTech Mate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .login-header {
            background: linear-gradient(135deg, #ffb400, #ff8800);
            color: #fff;
            text-align: center;
            padding: 25px 20px;
        }
        .login-header h2 {
            font-weight: 700;
            margin: 0;
        }
        .btn-custom {
            border-radius: 8px;
            font-weight: 600;
        }
        .btn-google {
            background: #db4437;
            color: #fff;
        }
        .btn-google:hover {
            background: #c23321;
        }
        .btn-visit {
            background: #28a745;
            color: #fff;
        }
        .btn-visit:hover {
            background: #218838;
        }
        .form-control {
            border-radius: 8px;
        }
        .login-footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }
        .login-footer a {
            text-decoration: none;
            font-weight: 500;
            color: #0d6efd;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="card login-card">
        <div class="login-header">
            <h2>FOODTECH-MATE</h2>
        </div>
        <div class="card-body p-4">
            <!-- Laravel login form -->
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
           @if ($errors->any())
                <div style="color:red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="" action="{{ route('login_post') }}" method="post" id="form-id">
                @csrf
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Email" required autofocus>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" class="form-control password-input pe-5 @error('password') is-invalid @enderror"  name="password" placeholder="Password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-warning btn-custom">Sign In</button>
                </div>
            </form>

            <div class="text-center my-3">
                <span>OR</span>
            </div>

            <!-- Google login -->
            <div class="d-grid mb-2">
                <a href="{{ route('socialite.auth', 'google') }}" class="btn btn-google btn-custom">
                    <i class="bi bi-google me-2"></i> Sign in with Google
                </a>
            </div>

        </div>
        <div class="login-footer">
            <a href="/forgot-password">Forgot Password?</a> | 
            <a href="/register-user">Register Now</a> | 
            <a href="/">Visit Site</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
