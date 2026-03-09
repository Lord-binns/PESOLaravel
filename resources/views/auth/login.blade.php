<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login - PESO Manolo Fortich</title>
    @if (file_exists(public_path('images/LogoPNG.png')))
        <link rel="icon" href="{{ asset('images/LogoPNG.png') }}" type="image/png">
        <link rel="apple-touch-icon" href="{{ asset('images/LogoPNG.png') }}">
    @else
        <link rel="icon" href="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png" type="image/png">
        <link rel="apple-touch-icon" href="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png">
    @endif
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(
                to right,
                #02205c 0%,
                #001a4d 60%,
                #020230 65%,
                #000000 70%,
                #2d0000 80%,
                #5a0202 85%,
                #8B0000 90%,
                #FF0000 100%
            );
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            display: flex;
            position: relative;
        }
        
        .login-image {
            flex: 1;
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('{{ asset("images/LogoPNG.png") }}') center center no-repeat;
            background-size: 150px;
            opacity: 0.1;
        }
        
        .login-image h2 {
            color: #ffd700;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }
        
        .login-image p {
            text-align: center;
            opacity: 0.9;
            font-size: 14px;
            line-height: 1.6;
        }
        
        .login-image .logo-img {
            width: 120px;
            height: auto;
            margin-bottom: 25px;
            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.3));
        }
        
        .login-form {
            flex: 1;
            padding: 40px;
        }
        
        .login-form h1 {
            color: #001a4d;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .login-form .subtitle {
            color: #6b7280;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            color: #001a4d;
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #001a4d;
            box-shadow: 0 0 0 3px rgba(0, 26, 77, 0.1);
        }
        
        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e5e7eb;
            border-left: none;
            border-radius: 0 10px 10px 0;
            color: #6b7280;
        }
        
        .form-control.with-icon {
            border-right: none;
            border-radius: 10px 0 0 10px;
        }
        
        .btn-login {
            background: linear-gradient(90deg, #001a4d, #02205c);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            background: linear-gradient(90deg, #02205c, #001a4d);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 26, 77, 0.3);
        }
        
        .form-check-input:checked {
            background-color: #001a4d;
            border-color: #001a4d;
        }
        
        .forgot-link {
            color: #001a4d;
            text-decoration: none;
            font-weight: 500;
        }
        
        .forgot-link:hover {
            color: #ffd700;
            text-decoration: underline;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e5e7eb;
        }
        
        .divider span {
            padding: 0 15px;
            color: #6b7280;
            font-size: 14px;
        }
        
        .signup-link {
            text-align: center;
            margin-top: 20px;
            color: #6b7280;
        }
        
        .signup-link a {
            color: #001a4d;
            font-weight: 600;
            text-decoration: none;
        }
        
        .signup-link a:hover {
            color: #ffd700;
            text-decoration: underline;
        }
        
        .back-home {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s;
            z-index: 10;
        }
        
        .back-home:hover {
            color: #ffd700;
            text-decoration: none;
        }
        
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 400px;
            }
            
            .login-image {
                padding: 30px 20px;
            }
            
            .login-image .logo-img {
                width: 80px;
            }
            
            .login-form {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-image">
            <a href="{{ url('/') }}" class="back-home">
                <i class="fas fa-arrow-left"></i>
            </a>
            <img src="{{ asset('images/LogoPNG.png') }}" alt="PESO Logo" class="logo-img">
            <h2>Welcome Back!</h2>
            <p>Access your PESO Manolo Fortich account to manage your job applications, track your employment status, and connect with potential employers.</p>
        </div>
        
        <div class="login-form">
            <h1>Sign In</h1>
            <p class="subtitle">Enter your credentials to access your account</p>
            
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-group">
                        <input type="email" class="form-control with-icon" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    @error('email')
                        <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control with-icon" id="password" name="password" placeholder="Enter your password" required>
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                    <a href="#" class="forgot-link">Forgot password?</a>
                </div>
                
                <button type="submit" class="btn btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i> Sign In
                </button>
            </form>
            
            <div class="divider">
                <span>OR</span>
            </div>
            
            <p class="signup-link">
                Don't have an account? <a href="{{ route('register') }}">Register here</a>
            </p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
