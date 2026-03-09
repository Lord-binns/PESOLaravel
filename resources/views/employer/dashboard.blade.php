<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Employer Dashboard - PESO Manolo Fortich</title>
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
            background-color: #ffffff;
            color: #333333;
        }
        
        /* Header */
        .page-header {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            padding: 60px 20px;
            text-align: center;
            color: white;
        }
        
        .page-header h1 {
            color: #ffd700;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .page-header p {
            color: white;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Main content */
        main {
            background: #ffffff;
            padding: 60px 20px;
        }
        
        /* Cards - Landing page style */
        .custom-card {
            background-color: #f8f9fa;
            color: #333333;
            border: 2px solid #001a4d;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        
        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .custom-card h3 {
            color: #001a4d;
            font-weight: 600;
        }
        
        .custom-card .card-icon {
            font-size: 40px;
            color: #001a4d;
            margin-bottom: 15px;
        }
        
        /* Action cards with red accent - landing page style */
        .action-card {
            background: #001a4d !important;
            color: white;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            height: 100%;
            transition: all 0.3s;
        }
        
        .action-card:hover {
            background: #02205c !important;
            transform: translateY(-5px);
        }
        
        .action-card h3 {
            color: #ffd700;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .action-card p {
            color: white;
            margin-bottom: 20px;
        }
        
        .action-card .btn {
            background: linear-gradient(90deg, #ff4444, #cc0000);
            border: none;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
        }
        
        .action-card .btn:hover {
            background: #cc0000;
        }
        
        /* Table */
        .table-container {
            background-color: rgba(255, 255, 255, 0.25);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .table {
            background: white;
        }
        
        .table thead th {
            background: #001a4d;
            color: white;
            border: none;
        }
        
        .table td {
            vertical-align: middle;
        }
        
        /* Status badges */
        .status-badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-interview {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .status-hired {
            background: #dcfce7;
            color: #166534;
        }
        
        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }
        
        .status-not-selected {
            background: #fee2e2;
            color: #991b1b;
        }
        
        /* Buttons */
        .btn-action {
            background: linear-gradient(90deg, #ff4444, #cc0000);
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
        }
        
        .btn-action:hover {
            background: #cc0000;
            color: white;
        }
        
        .btn-outline-custom {
            color: #ffd700;
            border: 2px solid #ffd700;
            background: transparent;
            padding: 10px 20px;
            border-radius: 8px;
        }
        
        .btn-outline-custom:hover {
            background: #ffd700;
            color: #001a4d;
        }
        
        /* User info */
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #001a4d;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }
        
        /* Date/Time Styles */
        .datetime-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            background: #e8f4fd;
            border-radius: 15px;
            font-size: 12px;
            color: #001a4d;
            font-weight: 500;
        }
        
        .datetime-badge i {
            font-size: 10px;
        }
        
        .deadline-badge {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .deadline-badge i {
            color: #dc2626;
        }
        
        .schedule-card {
            background: #f8f9fa;
            border-left: 4px solid #ffd700;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }
        
        .schedule-card .date {
            font-size: 24px;
            font-weight: 700;
            color: #001a4d;
            line-height: 1;
        }
        
        .schedule-card .month {
            font-size: 12px;
            color: #6b7280;
            text-transform: uppercase;
        }
        
        .schedule-card .time {
            font-size: 14px;
            color: #001a4d;
            font-weight: 600;
        }
        
        .schedule-card .event-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-top: 8px;
        }
        
        /* Job Post Card */
        .job-post-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        
        .job-post-card:hover {
            border-color: #001a4d;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .job-post-card .job-title {
            font-size: 18px;
            font-weight: 600;
            color: #001a4d;
        }
        
        .job-post-card .job-meta {
            font-size: 13px;
            color: #6b7280;
            display: flex;
            gap: 15px;
            margin-top: 8px;
        }
        
        .job-post-card .job-meta i {
            margin-right: 4px;
        }
        
        .job-post-card .applicant-count {
            background: #001a4d;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        /* Section Headers */
        .section-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .section-header::before,
        .section-header::after {
            content: '';
            flex: 1;
            height: 3px;
            background: #FF2D2D;
        }
        
        .section-header span {
            padding: 0 15px;
            font-weight: 700;
            color: #001a4d;
            font-size: 1.3rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('components.employer-navbar')
    
    {{--  <!-- Page Header -->
    <div class="page-header">
        <h1><i class="fas fa-building me-3"></i>Employer Dashboard</h1>
        <p>Welcome back! Manage your job postings, review applicants, and handle recruitment activities.</p>
    </div>  --}}
    
    <!-- Main Content -->
    <main>
        <div class="container" style="max-width: 1200px;">
            
            <!-- Stats Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="custom-card text-center">
                        <div class="card-icon"><i class="fas fa-briefcase"></i></div>
                        <h3>12</h3>
                        <p style="margin: 0; color: #6b7280;">Active Job Posts</p>
                        <div class="datetime-badge mt-2">
                            <i class="fas fa-clock"></i> Updated: Today
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-card text-center">
                        <div class="card-icon"><i class="fas fa-users"></i></div>
                        <h3>45</h3>
                        <p style="margin: 0; color: #6b7280;">Total Applicants</p>
                        <div class="datetime-badge mt-2">
                            <i class="fas fa-calendar"></i> This Week
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-card text-center">
                        <div class="card-icon"><i class="fas fa-calendar-check"></i></div>
                        <h3>8</h3>
                        <p style="margin: 0; color: #6b7280;">Interview Scheduled</p>
                        <div class="datetime-badge mt-2">
                            <i class="fas fa-calendar-day"></i> Jan 20-25, 2025
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-card text-center">
                        <div class="card-icon"><i class="fas fa-user-check"></i></div>
                        <h3>5</h3>
                        <p style="margin: 0; color: #6b7280;">Hired This Month</p>
                        <div class="datetime-badge mt-2">
                            <i class="fas fa-calendar-week"></i> January 2025
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Action Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="action-card">
                        <h3><i class="fas fa-plus-circle me-2"></i>Post New Job</h3>
                        <p>Create a new job vacancy and reach qualified candidates in your area.</p>
                        <button class="btn">Post Job Now</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="action-card">
                        <h3><i class="fas fa-tasks me-2"></i>Manage Applicants</h3>
                        <p>Review, filter, and manage all applicants for your job postings.</p>
                        <button class="btn">View Applicants</button>
                    </div>
                </div>
            </div>
            
            <!-- Active Job Posts with Dates -->
            <div class="section-header">
                <span><i class="fas fa-list-alt me-2"></i>Active Job Posts</span>
            </div>
            
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="job-post-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="job-title">Senior Software Developer</div>
                                <div class="job-meta">
                                    <span><i class="fas fa-map-marker-alt"></i> Manolo Fortich</span>
                                    <span><i class="fas fa-money-bill-wave"></i> ₱45,000 - ₱60,000</span>
                                </div>
                            </div>
                            <span class="applicant-count"><i class="fas fa-users"></i> 12</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="datetime-badge">
                                    <i class="fas fa-calendar-plus"></i> Posted: Jan 10, 2025
                                </div>
                            </div>
                            <div class="datetime-badge deadline-badge">
                                <i class="fas fa-calendar-times"></i> Deadline: Jan 25, 2025
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="job-post-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="job-title">Graphic Designer</div>
                                <div class="job-meta">
                                    <span><i class="fas fa-map-marker-alt"></i> Manolo Fortich</span>
                                    <span><i class="fas fa-money-bill-wave"></i> ₱25,000 - ₱35,000</span>
                                </div>
                            </div>
                            <span class="applicant-count"><i class="fas fa-users"></i> 8</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="datetime-badge">
                                    <i class="fas fa-calendar-plus"></i> Posted: Jan 12, 2025
                                </div>
                            </div>
                            <div class="datetime-badge deadline-badge">
                                <i class="fas fa-calendar-times"></i> Deadline: Jan 28, 2025
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="job-post-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="job-title">Marketing Manager</div>
                                <div class="job-meta">
                                    <span><i class="fas fa-map-marker-alt"></i> Manolo Fortich</span>
                                    <span><i class="fas fa-money-bill-wave"></i> ₱40,000 - ₱50,000</span>
                                </div>
                            </div>
                            <span class="applicant-count"><i class="fas fa-users"></i> 15</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="datetime-badge">
                                    <i class="fas fa-calendar-plus"></i> Posted: Jan 8, 2025
                                </div>
                            </div>
                            <div class="datetime-badge deadline-badge">
                                <i class="fas fa-calendar-times"></i> Deadline: Jan 22, 2025
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="job-post-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="job-title">Customer Service Representative</div>
                                <div class="job-meta">
                                    <span><i class="fas fa-map-marker-alt"></i> Manolo Fortich</span>
                                    <span><i class="fas fa-money-bill-wave"></i> ₱18,000 - ₱22,000</span>
                                </div>
                            </div>
                            <span class="applicant-count"><i class="fas fa-users"></i> 10</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="datetime-badge">
                                    <i class="fas fa-calendar-plus"></i> Posted: Jan 14, 2025
                                </div>
                            </div>
                            <div class="datetime-badge deadline-badge">
                                <i class="fas fa-calendar-times"></i> Deadline: Jan 30, 2025
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Upcoming Interviews Schedule -->
            <div class="section-header">
                <span><i class="fas fa-calendar-alt me-2"></i>Upcoming Interviews Schedule</span>
            </div>
            
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="schedule-card">
                        <div class="d-flex">
                            <div class="text-center" style="min-width: 60px;">
                                <div class="date">20</div>
                                <div class="month">Jan</div>
                            </div>
                            <div style="margin-left: 15px;">
                                <div class="time"><i class="fas fa-clock me-1"></i> 9:00 AM - 10:00 AM</div>
                                <div class="event-title">John Doe - Software Developer</div>
                                <div class="datetime-badge mt-2" style="font-size: 11px;">
                                    <i class="fas fa-video"></i> Online Interview
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="schedule-card">
                        <div class="d-flex">
                            <div class="text-center" style="min-width: 60px;">
                                <div class="date">21</div>
                                <div class="month">Jan</div>
                            </div>
                            <div style="margin-left: 15px;">
                                <div class="time"><i class="fas fa-clock me-1"></i> 2:00 PM - 3:00 PM</div>
                                <div class="event-title">Jane Smith - Graphic Designer</div>
                                <div class="datetime-badge mt-2" style="font-size: 11px;">
                                    <i class="fas fa-video"></i> Online Interview
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="schedule-card">
                        <div class="d-flex">
                            <div class="text-center" style="min-width: 60px;">
                                <div class="date">22</div>
                                <div class="month">Jan</div>
                            </div>
                            <div style="margin-left: 15px;">
                                <div class="time"><i class="fas fa-clock me-1"></i> 10:30 AM - 11:30 AM</div>
                                <div class="event-title">Michael Brown - Marketing Manager</div>
                                <div class="datetime-badge mt-2" style="font-size: 11px;">
                                    <i class="fas fa-building"></i> In-Person
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="schedule-card">
                        <div class="d-flex">
                            <div class="text-center" style="min-width: 60px;">
                                <div class="date">23</div>
                                <div class="month">Jan</div>
                            </div>
                            <div style="margin-left: 15px;">
                                <div class="time"><i class="fas fa-clock me-1"></i> 11:00 AM - 12:00 PM</div>
                                <div class="event-title">Sarah Wilson - Customer Service</div>
                                <div class="datetime-badge mt-2" style="font-size: 11px;">
                                    <i class="fas fa-video"></i> Online Interview
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="schedule-card">
                        <div class="d-flex">
                            <div class="text-center" style="min-width: 60px;">
                                <div class="date">24</div>
                                <div class="month">Jan</div>
                            </div>
                            <div style="margin-left: 15px;">
                                <div class="time"><i class="fas fa-clock me-1"></i> 3:00 PM - 4:00 PM</div>
                                <div class="event-title">Robert Lee - Software Developer</div>
                                <div class="datetime-badge mt-2" style="font-size: 11px;">
                                    <i class="fas fa-video"></i> Online Interview
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="schedule-card">
                        <div class="d-flex">
                            <div class="text-center" style="min-width: 60px;">
                                <div class="date">25</div>
                                <div class="month">Jan</div>
                            </div>
                            <div style="margin-left: 15px;">
                                <div class="time"><i class="fas fa-clock me-1"></i> 9:30 AM - 10:30 AM</div>
                                <div class="event-title">Emily Davis - Marketing Manager</div>
                                <div class="datetime-badge mt-2" style="font-size: 11px;">
                                    <i class="fas fa-building"></i> In-Person
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- LRA/SRA Section -->
            <div class="section-header">
                <span><i class="fas fa-handshake me-2"></i>Recruitment Activities</span>
            </div>
            
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="action-card">
                        <h3><i class="fas fa-file-contract me-2"></i>Local Referral Agreement (LRA)</h3>
                        <p>Request for local job referrals and placement services through PESO.</p>
                        <div class="datetime-badge mt-3" style="background: rgba(255,255,255,0.2); color: white;">
                            <i class="fas fa-calendar"></i> Processing Time: 3-5 Business Days
                        </div>
                        <button class="btn mt-3">Request LRA</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="action-card">
                        <h3><i class="fas fa-globe me-2"></i>Special Recruitment Activity (SRA)</h3>
                        <p>Organize special recruitment events with PESO assistance.</p>
                        <div class="datetime-badge mt-3" style="background: rgba(255,255,255,0.2); color: white;">
                            <i class="fas fa-calendar"></i> Next Event: Feb 15, 2025
                        </div>
                        <button class="btn mt-3">Request SRA</button>
                    </div>
                </div>
            </div>
            
            <!-- Recent Applicants Table -->
            <div class="section-header">
                <span><i class="fas fa-users me-2"></i>Recent Applicants</span>
            </div>
            
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Applicant Name</th>
                                <th>Position Applied</th>
                                <th>Date Applied</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">JD</div>
                                        <span>John Doe</span>
                                    </div>
                                </td>
                                <td>Software Developer</td>
                                <td>
                                    <div class="datetime-badge">
                                        <i class="fas fa-calendar"></i> Jan 15, 2025
                                    </div>
                                </td>
                                <td><span class="status-badge status-interview"><i class="fas fa-calendar-check me-1"></i> Interview</span></td>
                                <td>
                                    <button class="btn-action" title="Hire"><i class="fas fa-check"></i></button>
                                    <button class="btn-action" style="background: #6c757d;" title="View"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">JS</div>
                                        <span>Jane Smith</span>
                                    </div>
                                </td>
                                <td>Graphic Designer</td>
                                <td>
                                    <div class="datetime-badge">
                                        <i class="fas fa-calendar"></i> Jan 14, 2025
                                    </div>
                                </td>
                                <td><span class="status-badge status-pending"><i class="fas fa-clock me-1"></i> Pending</span></td>
                                <td>
                                    <button class="btn-action" title="Hire"><i class="fas fa-check"></i></button>
                                    <button class="btn-action" style="background: #6c757d;" title="View"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">MB</div>
                                        <span>Michael Brown</span>
                                    </div>
                                </td>
                                <td>Marketing Manager</td>
                                <td>
                                    <div class="datetime-badge">
                                        <i class="fas fa-calendar"></i> Jan 13, 2025
                                    </div>
                                </td>
                                <td><span class="status-badge status-hired"><i class="fas fa-check-circle me-1"></i> Hired</span></td>
                                <td>
                                    <button class="btn-action" style="background: #6c757d;" title="View"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">SW</div>
                                        <span>Sarah Wilson</span>
                                    </div>
                                </td>
                                <td>Customer Service</td>
                                <td>
                                    <div class="datetime-badge">
                                        <i class="fas fa-calendar"></i> Jan 16, 2025
                                    </div>
                                </td>
                                <td><span class="status-badge status-pending"><i class="fas fa-clock me-1"></i> Pending</span></td>
                                <td>
                                    <button class="btn-action" title="Hire"><i class="fas fa-check"></i></button>
                                    <button class="btn-action" style="background: #6c757d;" title="View"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">RL</div>
                                        <span>Robert Lee</span>
                                    </div>
                                </td>
                                <td>Software Developer</td>
                                <td>
                                    <div class="datetime-badge">
                                        <i class="fas fa-calendar"></i> Jan 17, 2025
                                    </div>
                                </td>
                                <td><span class="status-badge status-interview"><i class="fas fa-calendar-check me-1"></i> Interview</span></td>
                                <td>
                                    <button class="btn-action" title="Hire"><i class="fas fa-check"></i></button>
                                    <button class="btn-action" style="background: #6c757d;" title="View"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </main>
    
    <!-- Footer -->
    @include('components.footer')
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
