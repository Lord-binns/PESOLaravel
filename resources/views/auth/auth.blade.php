<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Welcome - PESO Manolo Fortich</title>
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
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
            padding: 15px;
            overflow: auto;
        }
        
        .auth-container {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
            position: relative;
            min-height: 450px;
        }
        
        /* Slider that moves left/right */
        .auth-slider {
            display: flex;
            width: 200%;
            transition: transform 0.8s cubic-bezier(0.68, -0.15, 0.265, 1.15);
        }
        
        .auth-slider.register-active {
            transform: translateX(-50%);
        }
        
        .auth-panel {
            width: 50%;
            flex-shrink: 0;
        }
        
        /* Logo/Image Side */
        .auth-image {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 25px;
            color: white;
            position: relative;
            overflow: hidden;
            height: 100%;
            min-height: 450px;
        }
        
        .auth-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('{{ asset("images/LogoPNG.png") }}') center center no-repeat;
            background-size: 100px;
            opacity: 0.1;
            pointer-events: none;
        }
        
        .auth-image > * {
            position: relative;
            z-index: 1;
        }
        
        .auth-image h2 {
            color: #ffd700;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
            font-size: 20px;
        }
        
        .auth-image p {
            text-align: center;
            opacity: 0.9;
            font-size: 12px;
            line-height: 1.4;
        }
        
        .auth-image .logo-img {
            width: 80px;
            height: auto;
            margin-bottom: 15px;
            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.3));
        }
        
        .auth-image .features-list {
            list-style: none;
            padding: 0;
            margin-top: 15px;
            text-align: left;
        }
        
        .auth-image .features-list li {
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
        }
        
        .auth-image .features-list li i {
            color: #ffd700;
            font-size: 10px;
        }
        
        /* Form Side */
        .auth-form {
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            min-height: 450px;
            background: #ffffff;
        }
        
        .auth-form h1 {
            color: #001a4d;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 8px;
        }
        
        .auth-form .subtitle {
            color: #6b7280;
            margin-bottom: 20px;
            font-size: 13px;
        }
        
        .form-group {
            margin-bottom: 12px;
        }
        
        .form-group label {
            color: #001a4d;
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
            font-size: 13px;
        }
        
        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 13px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #001a4d;
            box-shadow: 0 0 0 3px rgba(0, 26, 77, 0.1);
            transform: translateX(5px);
        }
        
        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e5e7eb;
            border-left: none;
            border-radius: 0 8px 8px 0;
            color: #6b7280;
            padding: 8px 10px;
        }
        
        .form-control.with-icon {
            border-right: none;
            border-radius: 8px 0 0 8px;
            padding: 8px 12px;
        }
        
        .btn-primary-custom {
            background: linear-gradient(90deg, #001a4d, #02205c);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            font-size: 14px;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .btn-primary-custom:hover {
            background: linear-gradient(90deg, #02205c, #001a4d);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 26, 77, 0.3);
        }
        
        .btn-danger-custom {
            background: linear-gradient(90deg, #ff4444, #cc0000);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            font-size: 14px;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .btn-danger-custom:hover {
            background: linear-gradient(90deg, #cc0000, #ff4444);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255, 68, 68, 0.3);
        }
        
        .form-check-input:checked {
            background-color: #001a4d;
            border-color: #001a4d;
        }
        
        .forgot-link, .terms-link {
            color: #001a4d;
            text-decoration: none;
            font-weight: 500;
            font-size: 13px;
        }
        
        .forgot-link:hover, .terms-link:hover {
            color: #ffd700;
            text-decoration: underline;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 15px 0;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e5e7eb;
        }
        
        .divider span {
            padding: 0 10px;
            color: #6b7280;
            font-size: 12px;
        }
        
        .switch-link {
            text-align: center;
            margin-top: 12px;
            color: #6b7280;
            font-size: 13px;
        }
        
        .switch-link a {
            color: #001a4d;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .switch-link a:hover {
            color: #ffd700;
            text-decoration: underline;
        }
        
        .back-home {
            position: absolute;
            top: 15px;
            left: 15px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s;
            z-index: 100;
            font-size: 14px;
        }
        
        .back-home:hover {
            color: #ffd700;
            text-decoration: none;
            transform: scale(1.1);
        }
        
        /* Password strength */
        .password-strength {
            margin-top: 5px;
        }
        
        .password-strength .progress {
            height: 4px;
            border-radius: 2px;
            background: #e5e7eb;
        }
        
        .password-strength .progress-bar {
            transition: width 0.3s;
        }
        
        .password-strength .strength-text {
            font-size: 10px;
            margin-top: 3px;
        }
        
        .strength-weak { color: #dc3545; }
        .strength-fair { color: #ffc107; }
        .strength-good { color: #28a745; }
        .strength-strong { color: #198754; }
        
        .form-check-label {
            font-size: 12px;
        }
        
        .text-danger {
            font-size: 11px;
        }
        
        @media (max-width: 768px) {
            .auth-container {
                max-width: 350px;
            }
            
            .auth-slider {
                width: 100%;
                flex-direction: column;
            }
            
            .auth-slider.register-active {
                transform: none;
            }
            
            .auth-panel {
                width: 100%;
            }
            
            .auth-image {
                padding: 20px 15px;
                min-height: 200px;
            }
            
            .auth-image .logo-img {
                width: 60px;
            }
            
            .auth-form {
                padding: 20px 15px;
                min-height: 450px;
            }
        }
    </style>
</head>
<body>
    <a href="{{ url('/') }}" class="back-home">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="auth-container">
        <div class="auth-slider" id="authSlider">
            <!-- Login Panel (Left Side) -->
            <div class="auth-panel">
                <div class="auth-form">
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
                                <div class="text-danger mt-1">{{ $message }}</div>
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
                                <div class="text-danger mt-1">{{ $message }}</div>
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
                        
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="fas fa-sign-in-alt me-2"></i> Sign In
                        </button>
                    </form>
                    
                    <div class="divider">
                        <span>OR</span>
                    </div>
                    
                    <p class="switch-link">
                        Don't have an account? <a href="javascript:void(0)" id="showRegister">Register here</a>
                    </p>
                </div>
            </div>
            
            <!-- Login Image Panel (Right Side in login view) -->
            <div class="auth-panel">
                <div class="auth-image">
                    <img src="{{ asset('images/LogoPNG.png') }}" alt="PESO Logo" class="logo-img">
                    <h2>Welcome Back!</h2>
                    <p>Access your PESO Manolo Fortich account to manage your job applications and connect with employers.</p>
                </div>
            </div>
            
            <!-- Register Image Panel (Left Side in register view) -->
            <div class="auth-panel">
                <div class="auth-image">
                    <img src="{{ asset('images/LogoPNG.png') }}" alt="PESO Logo" class="logo-img">
                    <h2>Join PESO!</h2>
                    <p>Create your account to access employment opportunities in Manolo Fortich.</p>
                    
                    <ul class="features-list">
                        <li><i class="fas fa-check-circle"></i> Browse job listings</li>
                        <li><i class="fas fa-check-circle"></i> Apply for jobs online</li>
                        <li><i class="fas fa-check-circle"></i> Track your applications</li>
                        <li><i class="fas fa-check-circle"></i> Get career guidance</li>
                        <li><i class="fas fa-check-circle"></i> Access training programs</li>
                    </ul>
                </div>
            </div>
            
            <!-- Register Panel (Right Side) -->
            <div class="auth-panel">
                <div class="auth-form">
                    <h1>Create Account</h1>
                    <p class="subtitle">Fill in your details to get started</p>
                    
                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf
                        
                        <div class="form-group">
                            <label for="reg_name">Full Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control with-icon" id="reg_name" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required>
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="reg_email">Email Address</label>
                            <div class="input-group">
                                <input type="email" class="form-control with-icon" id="reg_email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="reg_password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control with-icon" id="reg_password" name="password" placeholder="Create a password" required>
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
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="reg_password_confirmation">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control with-icon" id="reg_password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            @error('password_confirmation')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="terms-link">Terms</a> and <a href="#" class="terms-link">Privacy</a>
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-danger-custom">
                            <i class="fas fa-user-plus me-2"></i> Create Account
                        </button>
                    </form>
                    
                    <p class="switch-link">
                        Already have an account? <a href="javascript:void(0)" id="showLogin">Sign In</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const authSlider = document.getElementById('authSlider');
        const showRegister = document.getElementById('showRegister');
        const showLogin = document.getElementById('showLogin');
        
        let isLoginView = true;
        
        // Go to register view
        showRegister.addEventListener('click', function(e) {
            e.preventDefault();
            if (isLoginView) {
                authSlider.classList.add('register-active');
                isLoginView = false;
            }
        });
        
        // Go to login view
        showLogin.addEventListener('click', function(e) {
            e.preventDefault();
            if (!isLoginView) {
                authSlider.classList.remove('register-active');
                isLoginView = true;
            }
        });
        
        // Password strength indicator
        const passwordInput = document.getElementById('reg_password');
        const strengthBar = document.getElementById('passwordStrength');
        const strengthText = document.getElementById('strengthText');
        
        if (passwordInput) {
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
        }
    </script>
</body>
</html>
