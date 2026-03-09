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
            cursor: pointer;
            background: none;
            border: none;
            font-size: 1rem;
        }
        
        .back-home:hover {
            color: #ffd700;
            text-decoration: none;
        }
        
        .register-image h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-align: center;
        }
        
        .register-image p {
            font-size: 1.1rem;
            text-align: center;
            opacity: 0.9;
        }
        
        .register-form {
            flex: 1;
            padding: 40px;
            position: relative;
        }
        
        .register-form h1 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #001a4d;
            margin-bottom: 5px;
        }
        
        .register-form .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }
        
        .form-group .input-group {
            position: relative;
        }
        
        .form-group input, .form-group select {
            padding: 12px 15px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
            width: 100%;
        }
        
        .form-group input:focus, .form-group select:focus {
            border-color: #001a4d;
            box-shadow: 0 0 0 3px rgba(0, 26, 77, 0.1);
            outline: none;
        }
        
        .form-group .input-group-text {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: #666;
            z-index: 10;
        }
        
        .password-requirements {
            margin-top: 8px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 6px;
            font-size: 0.85rem;
        }
        
        .password-requirements .progress {
            height: 6px;
            margin-top: 8px;
            border-radius: 3px;
            background: #e9ecef;
        }
        
        .password-requirements .progress-bar {
            transition: all 0.3s;
        }
        
        .strength-text {
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 5px;
        }
        
        .strength-weak { color: #dc3545; }
        .strength-fair { color: #ffc107; }
        .strength-good { color: #17a2b8; }
        .strength-strong { color: #28a745; }
        
        .btn-register {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .btn-register:hover {
            background: linear-gradient(135deg, #02205c 0%, #001a4d 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 26, 77, 0.3);
        }
        
        .login-link {
            text-align: center;
            margin-top: 25px;
            color: #666;
        }
        
        .login-link a {
            color: #001a4d;
            font-weight: 600;
            text-decoration: none;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
            }
            
            .register-image {
                padding: 30px;
            }
            
            .register-image h2 {
                font-size: 1.8rem;
            }
            
            .register-form {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-image">
            <button type="button" class="back-home" onclick="history.back()">
                <i class="fas fa-arrow-left"></i> 
            </button>
            <img src="{{ asset('images/LogoPNG.png') }}" alt="PESO Logo" style="width: 150px; height: auto; margin-bottom: 20px; filter: drop-shadow(0 5px 10px rgba(0,0,0,0.3));">
            <h2>Join PESO Manolo Fortich</h2>
            <p>Create your account to access job opportunities and services</p>
        </div>
        
        <div class="register-form">
            <h1>Create Account</h1>
            <p class="subtitle">Fill in your details to get started</p>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Enter your first name" required>
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            @error('first_name')
                                <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Enter your last name" required>
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            @error('last_name')
                                <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    @error('email')
                        <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="role">Register as</label>
                    <div class="input-group">
                        <select class="form-control" id="role" name="role" required style="padding-left: 40px;">
                            <option value="" selected disabled>Select your role</option>
                            <option value="employee">Employee (Job Seeker)</option>
                            <option value="employer">Employer</option>
                        </select>
                        <span class="input-group-text">
                            <i class="fas fa-user-tag"></i>
                        </span>
                    </div>
                    @error('role')
                        <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                    
                    <div class="password-requirements">
                        <small>Password strength:</small>
                        <div class="progress">
                            <div id="passwordStrength" class="progress-bar" role="progressbar" style="width: 0%"></div>
                        </div>
                        <span id="strengthText" class="strength-text"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    @error('password_confirmation')
                        <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-register">
                    <i class="fas fa-user-plus me-2"></i> Create Account
                </button>
            </form>
            
            <p class="login-link">
                Already have an account? <a href="{{ route('login') }}">Sign In</a>
            </p>
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
