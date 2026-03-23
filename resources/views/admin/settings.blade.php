<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Settings - PESO Manolo Fortich</title>
    @if (file_exists(public_path('images/LogoPNG.png')))
        <link rel="icon" href="{{ asset('images/LogoPNG.png') }}" type="image/png">
    @else
        <link rel="icon" href="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png" type="image/png">
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        html, body { min-height: 100vh; display: flex; flex-direction: column; margin: 0; }
        body { background-color: #f8f9fa; color: #333333; }
        main { flex: 1; background: #f8f9fa; padding: 30px 20px; }

        .dashboard-sidebar {
            position: fixed; left: 0; top: 80px;
            width: 80px; height: calc(100vh - 80px);
            background: linear-gradient(to bottom, #001a4d, #000000);
            border-right: 3px solid #ffd700;
            z-index: 999; padding: 20px 0;
            display: flex; flex-direction: column; align-items: center; gap: 15px;
            transition: all 0.3s ease;
        }
        .dashboard-sidebar.collapsed { width: 0; padding: 20px 0; overflow: hidden; border-right: none; }
        .sidebar-icon-btn {
            width: 55px; height: 55px; border-radius: 12px;
            background: rgba(255,255,255,0.1); border: none; color: white;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            text-decoration: none; transition: all 0.3s; cursor: pointer; position: relative;
        }
        .sidebar-icon-btn:hover { background: rgba(255,215,0,0.2); color: #ffd700; transform: scale(1.05); }
        .sidebar-icon-btn.active { background: #ffd700; color: #001a4d; }
        .sidebar-icon-btn i { font-size: 20px; margin-bottom: 2px; }
        .sidebar-icon-btn span { font-size: 9px; font-weight: 500; text-transform: uppercase; }
        .sidebar-divider { width: 40px; height: 2px; background: rgba(255,255,255,0.2); margin: 5px 0; }
        .sidebar-badge { position: absolute; top: -5px; right: -5px; background: #ff4444; color: white; font-size: 10px; font-weight: bold; min-width: 18px; height: 18px; border-radius: 9px; display: flex; align-items: center; justify-content: center; }

        .main-content { margin-left: 80px; padding: 100px 20px 20px 20px; transition: margin-left 0.3s ease; flex: 1; }
        .main-content.expanded { margin-left: 0; }

        /* Single Long Card */
        .settings-card {
            max-width: 800px;
            margin: 0 auto;
            background: #1a1a1a;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.8);
            border: 1px solid #2a2a2a;
            overflow: hidden;
            min-height: auto;
        }
        .settings-header-section {
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            color: #ffd700;
            padding: 40px;
            text-align: center;
            position: relative;
        }
        .settings-icon {
            width: 80px; height: 80px; border-radius: 50%;
            background: linear-gradient(45deg, #ffd700, #ffed4a);
            border: 5px solid rgba(255,255,255,0.3);
            margin: 0 auto 20px;
            display: flex; align-items: center; justify-content: center;
            font-size: 36px; color: #001a4d;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }
        .settings-title { font-size: 32px; margin-bottom: 10px; font-weight: 700; }
        .settings-subtitle { font-size: 16px; opacity: 0.9; }

        .card-content {
            padding: 40px;
            color: #e0e0e0;
        }
        .card-content .form-label { color: #f0f0f0; font-weight: 600; margin-bottom: 8px; }
        .card-content .form-control { 
            background: #2a2a2a;
            border-color: #444;
            color: #e0e0e0;
            border-radius: 8px;
            padding: 12px 16px;
        }
        .card-content .form-control::placeholder { color: #888; }
        .card-content .form-control:focus { 
            background: #333;
            border-color: #ffd700;
            color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(255,215,0,0.2); 
        }
        .card-content .form-select {
            background: #2a2a2a url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            border-color: #444;
            color: #e0e0e0;
        }
        .card-content .form-select:focus {
            border-color: #ffd700;
            box-shadow: 0 0 0 0.25rem rgba(255,215,0,0.2);
        }
        .section-title {
            display: flex; align-items: center; gap: 12px;
            font-weight: 700; font-size: 20px; color: #ffd700; margin-bottom: 25px;
            position: relative;
        }
        .section-title::after {
            content: ""; position: absolute; bottom: -10px; left: 0;
            width: 50px; height: 3px; background: #ffd700;
        }
        .setting-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 15px;
        }
        .setting-item:last-child { border-bottom: none; }
        .setting-info h4 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #f0f0f0;
        }
        .setting-info p {
            font-size: 0.9rem;
            opacity: 0.7;
            margin: 0;
        }
        
        /* Toggle Switch */
        .toggle-switch {
            position: relative;
            width: 60px;
            height: 30px;
            display: inline-block;
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
            background-color: #555;
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
            background-color: #ffd700;
        }
        input:checked + .toggle-slider:before {
            transform: translateX(30px);
        }

        .btn-save {
            background: linear-gradient(45deg, #001a4d, #02205c); 
            border: 2px solid #ffd700;
            color: #ffd700;
            border-radius: 8px; padding: 12px 28px; 
            font-weight: 600; font-size: 14px;
            transition: all 0.3s;
            cursor: pointer;
        }
        .btn-save:hover { 
            background: linear-gradient(45deg, #ffd700, #ffed4a);
            color: #001a4d;
            transform: translateY(-2px);
        }
        .btn-reset {
            background: transparent;
            border: 2px solid #666;
            color: #e0e0e0;
            border-radius: 8px; padding: 12px 28px; 
            font-weight: 600; font-size: 14px;
            transition: all 0.3s;
            cursor: pointer;
        }
        .btn-reset:hover {
            border-color: #ffd700;
            color: #ffd700;
        }

        .button-group {
            display: flex; gap: 15px; margin-top: 30px; 
            padding-top: 30px; border-top: 1px solid rgba(255,255,255,0.1);
        }

        @media (max-width: 991px) {
            .dashboard-sidebar { display: none; }
            .main-content { margin-left: 0; padding: 90px 15px 15px; }
            .settings-card { margin: 0 10px; border-radius: 15px; }
            .settings-header-section { padding: 30px 20px; }
            .settings-title { font-size: 24px; }
            .card-content { padding: 30px 20px; }
        }
    </style>
</head>
<body>
    @include('components.admin-navbar')
    @include('components.admin-sidebar')

    <div class="main-content" id="mainContent">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- SINGLE SETTINGS CARD -->
        <div class="settings-card">
            <!-- HEADER SECTION -->
            <div class="settings-header-section">
                <div class="settings-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <h1 class="settings-title">Settings</h1>
                <p class="settings-subtitle">Manage your account preferences and application settings</p>
            </div>

            <!-- CONTENT SECTION -->
            <div class="card-content">
                <!-- APPEARANCE SECTION -->
                <div>
                    <h3 class="section-title">
                        <i class="fas fa-palette"></i>Appearance
                    </h3>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h4><i class="fas fa-moon me-2"></i>Dark Mode</h4>
                            <p>Switch between light and dark themes</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="darkModeToggle">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <!-- NOTIFICATION SECTION -->
                <div style="margin-top: 40px;">
                    <h3 class="section-title">
                        <i class="fas fa-bell"></i>Notifications
                    </h3>
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
                </div>

                <!-- PRIVACY & SECURITY SECTION -->
                <div style="margin-top: 40px;">
                    <h3 class="section-title">
                        <i class="fas fa-shield-alt"></i>Privacy & Security
                    </h3>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Profile Visibility</h4>
                            <p>Control who can see your profile</p>
                        </div>
                        <select class="form-select" style="width: auto; min-width: 150px;">
                            <option>Public</option>
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
                </div>

                <!-- SYSTEM SECTION -->
                <div style="margin-top: 40px;">
                    <h3 class="section-title">
                        <i class="fas fa-sliders-h"></i>System
                    </h3>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Items Per Page</h4>
                            <p>Default number of items to display in tables</p>
                        </div>
                        <select class="form-select" style="width: auto; min-width: 100px;">
                            <option>10</option>
                            <option selected>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>
                </div>

                <!-- BUTTON GROUP -->
                <div class="button-group">
                    <button class="btn-save" onclick="saveSettings()">
                        <i class="fas fa-save me-2"></i>Save Changes
                    </button>
                    <button class="btn-reset" onclick="resetSettings()">
                        <i class="fas fa-undo me-2"></i>Reset
                    </button>
                </div>
            </div>
        </div>

    </div>

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

        function saveSettings() {
            // Show success message
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show';
            alert.innerHTML = '<i class="fas fa-check-circle me-2"></i>Settings saved successfully! <button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            document.querySelector('.main-content').insertBefore(alert, document.querySelector('.settings-card'));
            
            setTimeout(() => {
                alert.remove();
            }, 4000);
        }

        function resetSettings() {
            location.reload();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('dashboardSidebar');
            const mainContent = document.getElementById('mainContent');
            const toggleBtn = document.querySelector('.sidebar-toggle-btn');

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('expanded');
                });
            }
        });
    </script>
</body>
</html>
