<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Profile - PESO Manolo Fortich</title>
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
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        
        /* Header */
        .page-header {
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
            padding: 50px 20px;
            text-align: center;
            color: white;
            border-bottom: 3px solid #ffd700;
        }
        
        .page-header h1 {
            color: #ffd700;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .page-header p {
            color: rgba(255,255,255,0.9);
            font-size: 1.1rem;
        }
        
        /* Main Content */
        main {
            padding: 40px 20px;
            min-height: calc(100vh - 200px);
        }
        
        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .profile-header {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-bottom: 30px;
            padding-bottom: 25px;
            border-bottom: 2px solid #eee;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: 700;
            border: 4px solid #ffd700;
        }
        
        .profile-info h2 {
            color: #001a4d;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .profile-info .company-name {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        
        .profile-info .badges {
            display: flex;
            gap: 10px;
        }
        
        .badge-status {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .badge-verified {
            background: #e8f5e9;
            color: #2e7d32;
        }
        
        .badge-premium {
            background: linear-gradient(135deg, #ffd700, #ff8c00);
            color: #001a4d;
        }
        
        /* Section Titles */
        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #001a4d;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #ffd700;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        /* Info Items */
        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }
        
        .info-content h4 {
            color: #001a4d;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 3px;
        }
        
        .info-content p {
            color: #666;
            font-size: 0.95rem;
            margin: 0;
        }
        
        /* Edit Button */
        .btn-edit {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-edit:hover {
            background: linear-gradient(135deg, #02205c 0%, #001a4d 100%);
            color: white;
        }
        
        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-item {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
        }
        
        .stat-item .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #ffd700;
        }
        
        .stat-item .stat-label {
            font-size: 0.85rem;
            opacity: 0.9;
        }
        
        /* Form Styles */
        .form-label {
            color: #001a4d;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .form-control, .form-select {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 20px;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #001a4d;
            box-shadow: 0 0 0 3px rgba(0,26,77,0.1);
        }
        
        /* Activity Item */
        .activity-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
            margin-bottom: 12px;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }
        
        .activity-icon.posted {
            background: #e3f2fd;
            color: #1565c0;
        }
        
        .activity-icon.hired {
            background: #e8f5e9;
            color: #2e7d32;
        }
        
        .activity-icon.interview {
            background: #fff3e0;
            color: #ef6c00;
        }
        
        .activity-content {
            flex: 1;
        }
        
        .activity-content h4 {
            font-size: 0.95rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 3px;
        }
        
        .activity-content p {
            font-size: 0.85rem;
            color: #666;
            margin: 0;
        }
        
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .profile-header {
                flex-direction: column;
                text-align: center;
            }
            
            .profile-info .badges {
                justify-content: center;
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
        <h1><i class="fas fa-user-circle me-3"></i>My Profile</h1>
        <p>Manage your company profile and account settings</p>
    </div>
    
    <!-- Main Content -->
    <main>
        <div class="container" style="max-width: 900px;">
            
            <!-- Profile Card -->
            <div class="profile-card">
                <div class="profile-header">
                    <div class="profile-avatar">TC</div>
                    <div class="profile-info">
                        <h2>TechCorp Inc.</h2>
                        <p class="company-name">Technology Solutions Provider</p>
                        <div class="badges">
                            <span class="badge-status badge-verified"><i class="fas fa-check-circle me-1"></i> Verified</span>
                            <span class="badge-status badge-premium"><i class="fas fa-star me-1"></i> Premium Partner</span>
                        </div>
                    <div style="margin-left: auto;">
                        <button class="btn-edit"><i class="fas fa-edit"></i> Edit Profile</button>
                    </div>
                
                <!-- Stats -->
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Job Posts</div>
                    <div class="stat-item">
                        <div class="stat-number">45</div>
                        <div class="stat-label">Applicants</div>
                    <div class="stat-item">
                        <div class="stat-number">8</div>
                        <div class="stat-label">Hired</div>
                    <div class="stat-item">
                        <div class="stat-number">5</div>
                        <div class="stat-label">Active</div>
                </div>
                
                <h3 class="section-title"><i class="fas fa-building"></i> Company Information</h3>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-building"></i></div>
                            <div class="info-content">
                                <h4>Company Name</h4>
                                <p>TechCorp Inc.</p>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-industry"></i></div>
                            <div class="info-content">
                                <h4>Industry</h4>
                                <p>Information Technology</p>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="info-content">
                                <h4>Location</h4>
                                <p>Manolo Fortich, Bukidnon</p>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-users"></i></div>
                            <div class="info-content">
                                <h4>Company Size</h4>
                                <p>50-100 Employees</p>
                            </div>
                    </div>
                
                <h3 class="section-title"><i class="fas fa-address-card"></i> Contact Information</h3>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-user"></i></div>
                            <div class="info-content">
                                <h4>Contact Person</h4>
                                <p>John Smith</p>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-envelope"></i></div>
                            <div class="info-content">
                                <h4>Email Address</h4>
                                <p>john.smith@techcorp.com</p>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-phone"></i></div>
                            <div class="info-content">
                                <h4>Phone Number</h4>
                                <p>+63 912 345 6789</p>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-globe"></i></div>
                            <div class="info-content">
                                <h4>Website</h4>
                                <p>www.techcorp.com</p>
                            </div>
                    </div>
                
                <h3 class="section-title"><i class="fas fa-clock"></i> Recent Activity</h3>
                
                <div class="activity-item">
                    <div class="activity-icon posted"><i class="fas fa-briefcase"></i></div>
                    <div class="activity-content">
                        <h4>Posted new job: Senior Software Developer</h4>
                        <p>2 hours ago</p>
                    </div>
                
                <div class="activity-item">
                    <div class="activity-icon interview"><i class="fas fa-calendar-check"></i></div>
                    <div class="activity-content">
                        <h4>Scheduled interview with John Doe</h4>
                        <p>Yesterday at 9:00 AM</p>
                    </div>
                
                <div class="activity-item">
                    <div class="activity-icon hired"><i class="fas fa-user-check"></i></div>
                    <div class="activity-content">
                        <h4>Hired Maria Garcia as Graphic Designer</h4>
                        <p>3 days ago</p>
                    </div>
            </div>
    </main>
    
    <!-- Footer -->
    @include('components.footer')
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
