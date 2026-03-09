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
            --input-bg: #ffffff;
            --input-border: #ced4da;
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
            --input-bg: #1a1a2e;
            --input-border: #0f3460;
        }
        
        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: all 0.3s ease;
            margin: 0;
            padding: 0;
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
    @include('components.employer-navbar')
    
    <!-- Back Button -->
    <div style="background: #f5f5f5; padding: 15px 20px;">
        <a href="{{ url('/employer/dashboard') }}" style="display: inline-flex; align-items: center; gap: 8px; color: #001a4d; text-decoration: none; font-weight: 600; padding: 10px 15px; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>
    
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
                        <h4><i class="fas fa-moon me-2"></i>Dark Mode</h4>
                        <p>Switch between light and dark themes</p>
                    </div>
                    <label class="toggle-switch dark-mode-toggle">
                        <input type="checkbox" id="darkModeToggle">
                        <span class="toggle-slider"></span>
                    </label>
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
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <h4>Push Notifications</h4>
                        <p>Receive browser push notifications</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
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
                        <h4>Two-Factor Authentication</h4>
                        <p>Add an extra layer of security</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
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
            
            <!-- Save Button -->
            <div class="text-center">
                <button class="btn-save" onclick="saveSettings()">
                    <i class="fas fa-save me-2"></i>Save Changes
                </button>
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
        
        // Save Settings
        function saveSettings() {
            const successMessage = document.getElementById('successMessage');
            successMessage.classList.add('show');
            setTimeout(() => {
                successMessage.classList.remove('show');
            }, 3000);
        }
    </script>
</body>
</html>
