<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Admin Profile - PESO Manolo Fortich</title>
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
        .profile-card {
            max-width: 800px;
            margin: 0 auto;
            background: #1a1a1a;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.8);
            border: 1px solid #2a2a2a;
            overflow: hidden;
            min-height: calc(100vh - 200px);
        }
        .profile-header-section {
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            color: #ffd700;
            padding: 50px 40px;
            text-align: center;
            position: relative;
        }
        .profile-avatar {
            width: 150px; height: 150px; border-radius: 50%;
            background: linear-gradient(45deg, #ffd700, #ffed4a);
            border: 8px solid rgba(255,255,255,0.3);
            margin: 0 auto 25px;
            display: flex; align-items: center; justify-content: center;
            font-size: 48px; font-weight: bold; color: #001a4d;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }
        .profile-name { font-size: 36px; margin-bottom: 10px; font-weight: 700; }
        .profile-role { font-size: 20px; opacity: 0.9; margin-bottom: 30px; }
        .profile-stats {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px; margin-top: 30px;
        }
        .stat-box {
            background: rgba(255,255,255,0.2); border-radius: 15px;
            padding: 25px; backdrop-filter: blur(10px);
            text-align: center;
        }
        .stat-number { font-size: 32px; font-weight: bold; color: #ffd700; }
        .stat-label { font-size: 14px; opacity: 0.9; }

        .card-content {
            padding: 40px;
            color: #e0e0e0;
        }
        .card-content .form-label { color: #f0f0f0; }
        .card-content .form-control { 
            background: #2a2a2a;
            border-color: #444;
            color: #e0e0e0;
        }
        .card-content .form-control::placeholder { color: #888; }
        .card-content .form-control:focus { 
            background: #333;
            border-color: #ffd700;
            color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(255,215,0,0.2); 
        }
        .card-content .readonly-info {
            background: #2a2a2a;
            border-left-color: #ffd700;
        }
        .card-content .readonly-info .form-control-plaintext { 
            color: #f0f0f0;
        }
        .card-content .section-title { 
            color: #ffd700;
        }
        .section-title {
            display: flex; align-items: center; gap: 12px;
            font-weight: 700; font-size: 24px; color: #001a4d; margin-bottom: 30px;
            position: relative;
        }
        .section-title::after {
            content: ""; position: absolute; bottom: -10px; left: 0;
            width: 60px; height: 4px; background: #ffd700;
        }
        .form-label { font-weight: 600; color: #001a4d; margin-bottom: 8px; }
        .form-control { 
            border-radius: 12px; border: 2px solid #e9ecef; padding: 14px 16px;
            font-size: 16px; transition: all 0.3s;
        }
        .form-control:focus { 
            border-color: #ffd700; box-shadow: 0 0 0 0.25rem rgba(255,215,0,0.2); 
            transform: translateY(-1px);
        }
        .btn-primary {
            background: linear-gradient(45deg, #000000, #1a1a1a); 
            border: 2px solid #ffd700;
            color: #ffd700;
            border-radius: 12px; padding: 14px 32px; 
            font-weight: 600; font-size: 16px;
        }
        .btn-primary:hover { 
            background: linear-gradient(45deg, #ffd700, #ffed4a);
            color: #000;
            transform: translateY(-2px); 
        }
        .btn-primary:hover { 
            background: linear-gradient(45deg, #02205c, #001a4d); 
            transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,26,77,0.3);
        }
        .btn-outline-secondary { border-radius: 12px; padding: 14px 32px; font-weight: 600; }

        .readonly-info {
            background: #f8f9fa; border-radius: 12px; padding: 20px; margin-bottom: 20px;
            border-left: 4px solid #ffd700;
        }
        .readonly-info .form-label { color: #6b7280; font-weight: 500; }
        .readonly-info .form-control-plaintext { 
            color: #001a4d; font-size: 16px; font-weight: 500; padding: 12px 0;
        }
        .badge { font-size: 14px; padding: 10px 20px; }

        @media (max-width: 991px) {
            .dashboard-sidebar { display: none; }
            .main-content { margin-left: 0; padding: 90px 15px 15px; }
            .profile-card { margin: 0 10px; border-radius: 15px; }
            .profile-header-section { padding: 30px 20px; }
            .profile-avatar { width: 120px; height: 120px; font-size: 36px; }
            .profile-name { font-size: 28px; }
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
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- SINGLE LONG PROFILE CARD -->
        <div class="profile-card">
            <!-- HEADER SECTION -->
            <div class="profile-header-section">
                <div class="profile-avatar">
                    <img src="https://i.pinimg.com/originals/10/97/1c/10971c649437bf9b8f77cf7c59504df4.gif" alt="Profile" class="img-fluid rounded-circle w-100 h-100 object-fit-cover">
                </div>
                <h1 class="profile-name">{{ $user->first_name }} {{ $user->last_name }}</h1>
                <p class="profile-role">
                    <i class="fas fa-shield-alt me-2"></i>System Administrator
                </p>

                <!-- STATS -->
                <div class="profile-stats">
                    <div class="stat-box">
                        <div class="stat-number">{{ $pendingJobsCount ?? 0 }}</div>
                        <div class="stat-label">Pending Jobs</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">{{ $activeJobsCount ?? 0 }}</div>
                        <div class="stat-label">Active Jobs</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">{{ $establishmentsCount ?? 0 }}</div>
                        <div class="stat-label">Employers</div>
                    </div>
                </div>
            </div>

            <!-- CONTENT SECTION -->
            <div class="card-content">
                <!-- READONLY INFO -->
                <div class="readonly-info">
                    <h3 class="section-title mb-4">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        Profile Information
                    </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <p class="form-control-plaintext">{{ $user->first_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <p class="form-control-plaintext">{{ $user->last_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <p class="form-control-plaintext">{{ $user->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Role</label>
                            <span class="badge bg-primary">{{ ucfirst($user->role) }}</span>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Member Since</label>
                            <p class="form-control-plaintext">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- UPDATE FORM -->
                <div>
                    <h3 class="section-title">
                        <i class="fas fa-edit text-success me-2"></i>
                        Update Profile
                    </h3>
                    <form action="{{ url('/admin/profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $user->first_name) }}" required>
                                @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $user->last_name) }}" required>
                                @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">New Password (leave blank to keep current)</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter new password">
                                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Profile
                            </button>
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="fas fa-undo me-2"></i>Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
