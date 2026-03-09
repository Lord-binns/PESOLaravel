<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Register - PESO Manolo Fortich</title>
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
        
        .register-container {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            display: flex;
            position: relative;
        }
        
        .register-image {
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
        
        .register-image::before {
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
        
        .register-image h2 {
            color: #ffd700;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }
        
        .register-image p {
            text-align: center;
            opacity: 0.9;
            font-size: 14px;
            line-height: 1.6;
        }
        
        .register-image .logo-img {
            width: 120px;
            height: auto;
            margin-bottom: 25px;
            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.3));
        }
        
        .register-image .features-list {
            list-style: none;
            padding: 0;
            margin-top: 25px;
            text-align: left;
        }
        
        .register-image .features-list li {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .register-image .features-list li i {
            color: #ffd700;
        }
        
        .register-form {
            flex: 1;
            padding: 40px;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .register-form h1 {
            color: #001a4d;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .register-form .subtitle {
            color: #6b7280;
            margin-bottom: 25px;
        }
        
        .form-group {
            margin-bottom: 18px;
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
        
        .btn-register {
            background: linear-gradient(90deg, #ff4444, #cc0000);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .btn-register:hover {
            background: linear-gradient(90deg, #cc0000, #ff4444);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255, 68, 68, 0.3);
        }
        
        .form-check-input:checked {
            background-color: #001a4d;
            border-color: #001a4d;
        }
        
        .terms-link {
            color: #001a4d;
            text-decoration: none;
            font-weight: 500;
        }
        
        .terms-link:hover {
            color: #ffd700;
            text-decoration: underline;
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #6b7280;
        }
        
        .login-link a {
            color: #001a4d;
            font-weight: 600;
            text-decoration: none;
        }
        
        .login-link a:hover {
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
        
        .password-strength {
            margin-top: 8px;
        }
        
        .password-strength .progress {
            height: 6px;
            border-radius: 3px;
            background: #e5e7eb;
        }
        
        .password-strength .progress-bar {
            transition: width 0.3s;
        }
        
        .password-strength .strength-text {
            font-size: 12px;
            margin-top: 5px;
        }
        
        .strength-weak { color: #dc3545; }
        .strength-fair { color: #ffc107; }
        .strength-good { color: #28a745; }
        .strength-strong { color: #198754; }
        
        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
                max-width: 400px;
            }
            
            .register-image {
                padding: 30px 20px;
            }
            
            .register-image .logo-img {
                width: 80px;
            }
            
            .register-form {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-image">
            <a href="{{ url('/') }}" class="back-home">
                <i class="fas fa-arrow-left"></i>
            </a>
            <img src="{{ asset('images/LogoPNG.png') }}" alt="PESO Logo" class="logo-img">
            <h2>Join PESO!</h2>
            <p>Create your account to access employment opportunities and services in Manolo Fortich.</p>
            
            <ul class="features-list">
                <li><i class="fas fa-check-circle"></i> Browse job listings</li>
                <li><i class="fas fa-check-circle"></i> Apply for jobs online</li>
                <li><i class="fas fa-check-circle"></i> Track your applications</li>
                <li><i class="fas fa-check-circle"></i> Get career guidance</li>
                <li><i class="fas fa-check-circle"></i> Access training programs</li>
            </ul>
        </div>
        
        <div class="register-form">
            <h1>Create Account</h1>
            <p class="subtitle">Fill in your details to get started</p>
            
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control with-icon" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required>
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    @error('name')
                        <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>
                
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
                        <input type="password" class="form-control with-icon" id="password" name="password" placeholder="Create a password" required>
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <div class="password-strength">
                        <div class="progress">
                            <div class="progress-bar" id="passwordStrength" role="progressbar" style="width: 0%"></div>
                        </div>
                        <span class="strength-text" id="strengthText"></span>
                    </div>
                    @error('password')
                        <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control with-icon" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    @error('password_confirmation')
                        <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                        <label class="form-check-label" for="terms">
                            I agree to the <a href="#" class="terms-link">Terms of Service</a> and <a href="#" class="terms-link">Privacy Policy</a>
                        </label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-register">
                    <i class="fas fa-user-plus me-2"></i> Create Account
                </button>
            </form>
            
            <p class="login-link">
                Already have an account? <a href="{{ route('login') }}">Sign In</a>
            </p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('passwordStrength');
        const strengthText = document.getElementById('strengthText');
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            if (password.length >= 8) strength += 25;
            if (password.length >= 12) strength += 15;
            if (/[a-z]/.test(password)) strength += 15;
            if (/[A-Z]/.test(password)) strength += 15;
            if (/[0-9]/.test(password)) strength += 15;
            if (/[^a-zA-Z0-9]/.test(password)) strength += 15;
            
            strength = Math.min(strength, 100);
            
            strengthBar.style.width = strength + '%';
            
            if (password.length === 0) {
                strengthBar.className = 'progress-bar';
                strengthText.textContent = '';
            } else if (strength < 30) {
                strengthBar.className = 'progress-bar bg-danger strength-weak';
                strengthText.textContent = 'Weak';
                strengthText.className = 'strength-text strength-weak';
            } else if (strength < 50) {
                strengthBar.className = 'progress-bar bg-warning strength-fair';
                strengthText.textContent = 'Fair';
                strengthText.className = 'strength-text strength-fair';
            } else if (strength < 75) {
                strengthBar.className = 'progress-bar bg-info strength-good';
                strengthText.textContent = 'Good';
                strengthText.className = 'strength-text strength-good';
            } else {
                strengthBar.className = 'progress-bar bg-success strength-strong';
                strengthText.textContent = 'Strong';
                strengthText.className = 'strength-text strength-strong';
            }
        });
    </script>
</body>
</html>
