<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Employer Profile - PESO Manolo Fortich</title>
    @if (file_exists(public_path('images/LogoPNG.png')))
        <link rel="icon" href="{{ asset('images/LogoPNG.png') }}" type="image/png">
    @else
        <link rel="icon" href="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png" type="image/png">
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Same styles as admin profile */
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
        
        .main-content { margin-left: 80px; padding: 100px 20px 20px 20px; transition: margin-left 0.3s ease; flex: 1; }
        .main-content.expanded { margin-left: 0; }
        
        .profile-header {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        
        .profile-avatar {
            width: 150px; height: 150px; border-radius: 50%;
            background: linear-gradient(45deg, #ffd700, #ffed4a);
            border: 8px solid rgba(255,255,255,0.3);
            margin: 0 auto 20px;
            display: flex; align-items: center; justify-content: center;
            font-size: 48px; font-weight: bold; color: #001a4d;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        
        .profile-name { font-size: 36px; margin-bottom: 10px; }
        .profile-role { font-size: 20px; opacity: 0.9; }
        
        .profile-stats {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px; margin-top: 30px;
        }
        
        .stat-box {
            background: rgba(255,255,255,0.15); border-radius: 15px;
            padding: 25px; text-align: center; backdrop-filter: blur(10px);
        }
        
        .stat-number { font-size: 32px; font-weight: bold; color: #ffd700; }
        .stat-label { font-size: 14px; opacity: 0.8; }
        
        .profile-section {
            background: white; border-radius: 15px; padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1); margin-bottom: 25px;
        }
        
        .section-title {
            display: flex; align-items: center; gap: 10px;
            font-weight: 600; font-size: 22px; color: #001a4d; margin-bottom: 25px;
            position: relative;
        }
        
        .section-title::after {
            content: ""; position: absolute; bottom: -8px; left: 0;
            width: 50px; height: 3px; background: #ffd700;
        }
        
        .form-label { font-weight: 600; color: #001a4d; }
        .form-control { border-radius: 10px; border: 2px solid #e9ecef; padding: 12px 15px; }
        .form-control:focus { border-color: #ffd700; box-shadow: 0 0 0 0.2rem rgba(255,215,0,0.25); }
        
        .btn-primary { background: linear-gradient(45deg, #001a4d, #02205c); border: none; border-radius: 10px; padding: 12px 30px; font-weight: 600; }
        .btn-primary:hover { background: linear-gradient(45deg, #02205c, #001a4d); transform: translateY(-2px); }
        
        @media (max-width: 991px) {
            .dashboard-sidebar { display: none; }
            .main-content { margin-left: 0; padding: 90px 15px 15px; }
            .profile-header { padding: 30px 20px; }
            .profile-avatar { width: 120px; height: 120px; font-size: 36px; }
            .profile-name { font-size: 28px; }
        }
    </style>
</head>
<body>
    @include('components.employer-navbar')
    
    <!-- Sidebar (Employer version) -->
    <div class="dashboard-sidebar" id="dashboardSidebar">
        <a href="{{ url('/employer/dashboard') }}" class="sidebar-icon-btn">
            <i class="fas fa-th-large"></i><span>Home</span>
        </a>
        <a href="{{ url('/employer/post-job') }}" class="sidebar-icon-btn">
            <i class="fas fa-plus-circle"></i><span>Post</span>
        </a>
        <a href="#" class="sidebar-icon-btn">
            <i class="fas fa-briefcase"></i><span>Posts</span>
        </a>
        <div class="sidebar-divider"></div>
        <a href="{{ url('/employer/archive') }}" class="sidebar-icon-btn">
            <i class="fas fa-archive"></i><span>Archive</span>
        </a>
        <div class="sidebar-divider"></div>
        <a href="{{ url('/employer/profile') }}" class="sidebar-icon-btn active">
            <i class="fas fa-user"></i><span>Profile</span>
        </a>
        <a href="{{ url('/settings') }}" class="sidebar-icon-btn">
            <i class="fas fa-cog"></i><span>Settings</span>
        </a>
        <div class="sidebar-divider"></div>
        <form action="{{ route('logout') }}" method="POST" style="width: 55px;">
            @csrf
            <button type="submit" class="sidebar-icon-btn" style="border: none; cursor: pointer;">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
            </button>
        </form>
    </div>
    
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
        
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-avatar">
                {{ substr($user->first_name ?? $user->name ?? 'E', 0, 1) }}{{ substr($user->last_name ?? '', 0, 1) }}
            </div>
            <h1 class="profile-name">{{ $user->first_name }} {{ $user->last_name }} ({{ $user->name }})</h1>
            <p class="profile-role"><i class="fas fa-building me-2"></i>Employer</p>
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
                    <div class="stat-number">{{ $archivedCount ?? 0 }}</div>
                    <div class="stat-label">Archived</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number">{{ $establishmentsCount ?? 0 }}</div>
                    <div class="stat-label">Establishments</div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Profile Info -->
            <div class="col-lg-8">
                <div class="profile-section">
                    <h3 class="section-title">
                        <i class="fas fa-info-circle text-primary"></i>
                        Profile Information
                    </h3>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" value="{{ $user->first_name }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="{{ $user->last_name }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <p class="form-control-plaintext">{{ $user->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Role</label>
                            <span class="badge bg-primary fs-6 px-3 py-2">{{ ucfirst($user->role) }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Member Since</label>
                            <p class="form-control-plaintext">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="col-lg-4">
                <div class="profile-section">
                    <h3 class="section-title">
                        <i class="fas fa-bolt text-warning"></i>
                        Quick Actions
                    </h3>
                    <div class="d-grid gap-3">
                        <a href="{{ url('/employer/post-job') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Post New Job
                        </a>
                        <a href="{{ route('employer.archive') }}" class="btn btn-outline-primary">
                            <i class="fas fa-archive me-2"></i>View Archive
                        </a>
                        <a href="{{ url('/employer/dashboard') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Edit Profile Form -->
        <div class="profile-section">
            <h3 class="section-title">
                <i class="fas fa-edit text-success"></i>
                Update Profile
            </h3>
            <form action="{{ url('/employer/profile') }}" method="POST">
                @csrf @method('PUT')
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
    
    @include('components.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle
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
