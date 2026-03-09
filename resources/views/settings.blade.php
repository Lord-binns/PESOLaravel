<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Settings - PESO Manolo Fortich</title>
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
        /* Light Mode (Default) */
        :root {
            --bg-color: #ffffff;
            --text-color: #333333;
            --card-bg: #f8f9fa;
            --card-border: #001a4d;
            --header-bg: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            --accent-color: #ffd700;
            --danger-color: #ff4444;
            --sidebar-bg: #f8f9fa;
            --input-bg: #ffffff;
            --input-border: #ced4da;
            --table-stripe: #f8f9fa;
        }
        
        /* Dark Mode */
        [data-theme="dark"] {
            --bg-color: #1a1a2e;
            --text-color: #e0e0e0;
            --card-bg: #16213e;
            --card-border: #0f3460;
            --header-bg: linear-gradient(135deg, #0f3460 0%, #1a1a2e 100%);
            --accent-color: #ffd700;
            --danger-color: #ff6b6b;
            --sidebar-bg: #16213e;
            --input-bg: #1a1a2e;
            --input-border: #0f3460;
            --table-stripe: #16213e;
        }
        
        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: all 0.3s ease;
        }
        
        /* Header */
        .page-header {
            background: var(--header-bg);
            padding: 40px 20px;
            text-align: center;
            color: white;
        }
        
        .page-header h1 {
            color: var(--accent-color);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .page-header p {
            color: white;
            opacity: 0.9;
        }
        
        /* Main Content */
        main {
            padding: 40px 20px;
            min-height: calc(100vh - 200px);
        }
        
        /* Settings Container */
        .settings-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        /* Settings Card */
        .settings-card {
            background-color: var(--card-bg);
            border: 2px solid var(--card-border);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }
        
        .settings-card h2 {
            color: var(--card-border);
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .settings-card h2 i {
            color: var(--accent-color);
        }
        
        /* Setting Item */
        .setting-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--input-border);
        }
        
        .setting-item:last-child {
            border-bottom: none;
        }
        
        .setting-info h4 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .setting-info p {
            font-size: 0.85rem;
            opacity: 0.7;
            margin: 0;
        }
        
        /* Toggle Switch */
        .toggle-switch {
            position: relative;
            width: 60px;
            height: 30px;
        }
        
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.3s;
            border-radius: 30px;
        }
        
        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.3s;
            border-radius: 50%;
        }
        
        input:checked + .toggle-slider {
            background-color: var(--card-border);
        }
        
        input:checked + .toggle-slider:before {
            transform: translateX(30px);
        }
        
        /* Dark Mode Toggle Specific */
        .dark-mode-toggle .toggle-slider {
            background: linear-gradient(90deg, #ffd700, #ff8c00);
        }
        
        .dark-mode-toggle input:checked + .toggle-slider {
            background: linear-gradient(90deg, #0f3460, #1a1a2e);
        }
        
        /* Form Controls */
        .form-select, .form-control {
            background-color: var(--input-bg);
            border: 1px solid var(--input-border);
            color: var(--text-color);
            transition: all 0.3s ease;
        }
        
        .form-select:focus, .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        }
        
        /* Danger Zone */
        .danger-zone {
            border-color: var(--danger-color);
        }
        
        .danger-zone h2 {
            color: var(--danger-color);
        }
        
        .danger-zone h2 i {
            color: var(--danger-color);
        }
        
        /* Buttons */
        .btn-save {
            background: linear-gradient(90deg, #001a4d, #02205c);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-save:hover {
            background: linear-gradient(90deg, #02205c, #001a4d);
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background: linear-gradient(90deg, #ff4444, #cc0000);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
        }
        
        .btn-danger:hover {
            background: #cc0000;
        }
        
        /* Dark Mode Icon */
        .theme-icon {
            font-size: 20px;
            transition: all 0.3s ease;
        }
        
        [data-theme="dark"] .theme-icon {
            color: #ffd700;
        }
        
        /* Notification Preview */
        .notification-preview {
            background: var(--input-bg);
            border: 1px solid var(--input-border);
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
        }
        
        .preview-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .preview-badge.email {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .preview-badge.push {
            background: #dcfce7;
            color: #166534;
        }
        
        .preview-badge.sms {
            background: #fef3c7;
            color: #92400e;
        }
        
        [data-theme="dark"] .preview-badge.email {
            background: #1e3a5f;
            color: #60a5fa;
        }
        
        [data-theme="dark"] .preview-badge.push {
            background: #14532d;
            color: #86efac;
        }
        
        [data-theme="dark"] .preview-badge.sms {
            background: #78350f;
            color: #fcd34d;
        }
        
        /* Success Message */
        .success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            z-index: 1000;
            display: none;
        }
        
        .success-message.show {
            display: block;
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')
    
    <!-- Page Header -->
    <div class="page-header">
        <h1><i class="fas fa-cog me-3"></i>Settings</h1>
        <p>Manage your account preferences and application settings</p>
    </div>
    
    <!-- Main Content -->
    <main>
        <div class="settings-container">
            
            <!-- Appearance Settings -->
            <div class="settings-card">
                <h2><i class="fas fa-palette"></i> Appearance</h2>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4><i class="fas fa-moon theme-icon me-2"></i>Dark Mode</h4>
                        <p>Switch between light and dark themes</p>
                    </div>
                    <label class="toggle-switch dark-mode-toggle">
                        <input type="checkbox" id="darkModeToggle">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4>Compact Mode</h4>
                        <p>Reduce spacing for more content visibility</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="compactModeToggle">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>
            
            <!-- Notification Settings -->
            <div class="settings-card">
                <h2><i class="fas fa-bell"></i> Notifications</h2>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4>Email Notifications</h4>
                        <p>Receive updates via email</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked id="emailToggle">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4>Push Notifications</h4>
                        <p>Receive browser push notifications</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="pushToggle">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4>SMS Notifications</h4>
                        <p>Receive text message alerts</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="smsToggle">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
                
                <div class="notification-preview">
                    <h5 style="font-size: 0.9rem; margin-bottom: 15px;">Notification Types</h5>
                    <span class="preview-badge email me-2"><i class="fas fa-envelope me-1"></i> Email</span>
                    <span class="preview-badge push me-2"><i class="fas fa-bell me-1"></i> Push</span>
                    <span class="preview-badge sms"><i class="fas fa-sms me-1"></i> SMS</span>
                </div>
            </div>
            
            <!-- Privacy Settings -->
            <div class="settings-card">
                <h2><i class="fas fa-shield-alt"></i> Privacy & Security</h2>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4>Profile Visibility</h4>
                        <p>Control who can see your profile</p>
                    </div>
                    <select class="form-select" style="width: auto; min-width: 150px;">
                        <option>Public</option>
                        <option>Employers Only</option>
                        <option>Private</option>
                    </select>
                </div>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4>Show Online Status</h4>
                        <p>Let others see when you're online</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked id="onlineStatusToggle">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4>Two-Factor Authentication</h4>
                        <p>Add an extra layer of security</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="twoFactorToggle">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>
            
            <!-- Language & Region -->
            <div class="settings-card">
                <h2><i class="fas fa-globe"></i> Language & Region</h2>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4>Language</h4>
                        <p>Select your preferred language</p>
                    </div>
                    <select class="form-select" style="width: auto; min-width: 150px;">
                        <option>English</option>
                        <option>Filipino</option>
                        <option>Bisaya</option>
                    </select>
                </div>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4>Timezone</h4>
                        <p>Set your local timezone</p>
                    </div>
                    <select class="form-select" style="width: auto; min-width: 200px;">
                        <option>Asia/Manila (GMT+8)</option>
                        <option>Asia/Tokyo (GMT+9)</option>
                        <option>UTC (GMT+0)</option>
                        <option>America/New_York (GMT-5)</option>
                    </select>
                </div>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4>Date Format</h4>
                        <p>Choose your preferred date format</p>
                    </div>
                    <select class="form-select" style="width: auto; min-width: 150px;">
                        <option>MM/DD/YYYY</option>
                        <option>DD/MM/YYYY</option>
                        <option>YYYY-MM-DD</option>
                    </select>
                </div>
            </div>
            
            <!-- Danger Zone -->
            <div class="settings-card danger-zone">
                <h2><i class="fas fa-exclamation-triangle"></i> Danger Zone</h2>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4>Delete Account</h4>
                        <p>Permanently delete your account and all data</p>
                    </div>
                    <button class="btn-danger"><i class="fas fa-trash me-2"></i>Delete Account</button>
                </div>
            </div>
            
            <!-- Save Button -->
            <div class="text-center">
                <button class="btn-save" onclick="saveSettings()">
                    <i class="fas fa-save me-2"></i>Save Changes
                </button>
            </div>
            
        </div>
    </main>
    
    <!-- Footer -->
    @include('components.footer')
    
    <!-- Success Message -->
    <div class="success-message" id="successMessage">
        <i class="fas fa-check-circle me-2"></i>Settings saved successfully!
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Check for saved theme preference
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
            document.getElementById('darkModeToggle').checked = true;
        }
        
        // Dark Mode Toggle
        document.getElementById('darkModeToggle').addEventListener('change', function() {
            if (this.checked) {
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.removeAttribute('data-theme');
                localStorage.setItem('theme', 'light');
            }
        });
        
        // Compact Mode Toggle
        document.getElementById('compactModeToggle').addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.add('compact-mode');
                localStorage.setItem('compactMode', 'enabled');
            } else {
                document.body.classList.remove('compact-mode');
                localStorage.setItem('compactMode', 'disabled');
            }
        });
        
        // Check for saved compact mode
        if (localStorage.getItem('compactMode') === 'enabled') {
            document.getElementById('compactModeToggle').checked = true;
            document.body.classList.add('compact-mode');
        }
        
        // Save Settings
        function saveSettings() {
            const successMessage = document.getElementById('successMessage');
            successMessage.classList.add('show');
            
            // Hide after 3 seconds
            setTimeout(() => {
                successMessage.classList.remove('show');
            }, 3000);
        }
    </script>
</body>
</html>
