<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Employer Dashboard - PESO Manolo Fortich</title>
    @if (file_exists(public_path('images/LogoPNG.png')))
        <link rel="icon" href="{{ asset('images/LogoPNG.png') }}" type="image/png">
    @else
        <link rel="icon" href="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png" type="image/png">
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Sticky Footer Layout */
        html, body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
        }
        
        body { 
            background-color: #f8f9fa; 
            color: #333333; 
        }
        
        main {
            flex: 1;
            background: #f8f9fa; 
            padding: 30px 20px;
        }
        
        /* Clock and Stats Card */
        .datetime-card {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            border-radius: 15px;
            padding: 25px 30px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        /* Stats Icons - Left Side */
        .stats-icons {
            display: flex;
            gap: 20px;
        }
        
        .stat-icon-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            color: white;
            position: relative;
        }
        
        .stat-icon-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #ffd700;
            transition: all 0.3s;
        }
        
        .stat-icon-item:hover .stat-icon-circle {
            background: rgba(255,215,0,0.25);
            transform: scale(1.1);
        }
        
        /* Number Indicator Badge - Gold Color */
        .stat-number-badge {
            position top: -5: absolute;
           px;
            right: -5px;
            background: #ffd700;
            color: #001a4d;
            font-size: 11px;
            font-weight: bold;
            min-width: 20px;
            height: 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 5px;
            border: 2px solid #001a4d;
        }
        
        .stat-icon-label {
            font-size: 10px;
            text-transform: uppercase;
            opacity: 0.8;
        }
        
        /* Clock - Center */
        .clock-section { 
            display: flex; 
            align-items: center; 
            gap: 20px; 
        }
        
        .analog-clock {
            width: 120px; 
            height: 120px; 
            border-radius: 50%;
            background: linear-gradient(145deg, #0a1f4d, #001a4d);
            border: 3px solid #ffd700;
            position: relative;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.4), inset 0 0 20px rgba(0,0,0,0.5);
        }
        
        .clock-center {
            position: absolute; 
            top: 50%; 
            left: 50%;
            width: 12px; 
            height: 12px; 
            background: #ffd700;
            border-radius: 50%; 
            transform: translate(-50%, -50%); 
            z-index: 10;
        }
        
        .clock-hand { 
            position: absolute; 
            bottom: 50%; 
            left: 50%; 
            transform-origin: bottom center; 
            border-radius: 3px;
        }
        
        .hour-hand { 
            width: 4px; 
            height: 35px; 
            background: #ffd700; 
            transform: translateX(-50%); 
        }
        .minute-hand { 
            width: 3px; 
            height: 42px; 
            background: #fff; 
            transform: translateX(-50%); 
        }
        .second-hand { 
            width: 1px; 
            height: 48px; 
            background: #ff4444; 
            transform: translateX(-50%); 
        }
        
        .digital-time { 
            text-align: left; 
        }
        .digital-time .time-display { 
            font-size: 36px; 
            font-weight: 700; 
            color: #ffd700; 
            line-height: 1; 
            font-family: 'Courier New', monospace; 
        }
        .digital-time .date-display { 
            font-size: 14px; 
            color: #fff; 
            opacity: 0.9;
            margin-top: 3px;
        }
        
        /* Sidebar */
        .dashboard-sidebar {
            position: fixed;
            left: 0;
            top: 80px;
            width: 80px;
            height: calc(100vh - 80px);
            background: linear-gradient(to bottom, #001a4d, #000000);
            border-right: 3px solid #ffd700;
            z-index: 999;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
        }
        
        .dashboard-sidebar.collapsed {
            width: 0;
            padding: 20px 0;
            overflow: hidden;
            border-right: none;
        }
        
        .sidebar-icon-btn {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            background: rgba(255,255,255,0.1);
            border: none;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
        }
        
        .sidebar-icon-btn:hover {
            background: rgba(255,215,0,0.2);
            color: #ffd700;
            transform: scale(1.05);
        }
        
        .sidebar-icon-btn.active {
            background: #ffd700;
            color: #001a4d;
        }
        
        .sidebar-icon-btn i { font-size: 20px; margin-bottom: 2px; }
        .sidebar-icon-btn span { font-size: 9px; font-weight: 500; text-transform: uppercase; }
        .sidebar-divider { width: 40px; height: 2px; background: rgba(255,255,255,0.2); margin: 5px 0; }
        
        /* Pending badge on sidebar */
        .sidebar-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ffc107;
            color: #000;
            font-size: 10px;
            font-weight: bold;
            min-width: 18px;
            height: 18px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .main-content {
            margin-left: 80px;
            padding: 100px 20px 20px 20px;
            transition: margin-left 0.3s ease;
            flex: 1;
        }
        
        .main-content.expanded {
            margin-left: 0;
        }
        
        .section-title {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 600;
            font-size: 14px;
            color: #001a4d;
            margin: 20px 0;
        }
        
        .section-title::before,
        .section-title::after {
            content: "";
            flex: 1;
            height: 2px;
            background: #001a4d;
        }
        
        /* Job Cards - Smaller & Grid */
        .jobs-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }
        
        .job-card {
            background: white;
            border-radius: 10px;
            padding: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 4px solid #ffd700;
            transition: transform 0.2s;
        }
        
        .job-card:hover { transform: translateY(-3px); }
        
        /* Pending job card style */
        .job-card.pending {
            border-left-color: #ffc107;
            background: #fffbf0;
        }
        
        .job-card.expired {
            border-left-color: #6c757d;
            background: #f8f9fa;
        }
        
        .job-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
        }
        
        .job-title { 
            font-size: 13px; 
            font-weight: 700; 
            color: #001a4d; 
            margin: 0; 
            line-height: 1.3;
        }
        
        .job-status { 
            padding: 2px 8px; 
            border-radius: 10px; 
            font-size: 9px; 
            font-weight: 600; 
            white-space: nowrap;
        }
        .job-status.active { background: #d4edda; color: #155724; }
        .job-status.pending { background: #fff3cd; color: #856404; }
        .job-status.expired { background: #f8d7da; color: #721c24; }
        
        .job-salary { 
            font-size: 12px; 
            color: #28a745; 
            font-weight: 600; 
            margin-bottom: 5px;
        }
        
        .job-details { 
            display: flex; 
            gap: 8px; 
            flex-wrap: wrap; 
            margin-bottom: 8px; 
        }
        .job-detail { 
            display: flex; 
            align-items: center; 
            gap: 3px; 
            color: #666; 
            font-size: 10px; 
        }
        
        .job-actions { 
            display: flex; 
            gap: 5px; 
            margin-top: 8px; 
        }
        .btn-action { 
            padding: 4px 8px; 
            border-radius: 4px; 
            font-size: 10px; 
            border: none; 
            cursor: pointer; 
            transition: all 0.3s; 
        }
        .btn-view { background: #001a4d; color: white; }
        .btn-view:hover { background: #002d73; }
        .btn-archive { background: #6c757d; color: white; }
        .btn-archive:hover { background: #5a6268; }
        
        .empty-state { text-align: center; padding: 30px; color: #666; background: white; border-radius: 10px; }
        .empty-state i { font-size: 48px; color: #ddd; margin-bottom: 15px; }
        
        /* Alert Messages */
        .alert {
            border-radius: 10px;
            border: none;
        }
        
        /* Modal Styles */
        .modal-header {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            color: white;
        }
        .modal-header .btn-close {
            filter: invert(1);
        }
        .job-detail-modal .detail-label {
            font-weight: 600;
            color: #001a4d;
            font-size: 12px;
            text-transform: uppercase;
        }
        .job-detail-modal .detail-value {
            color: #333;
            margin-bottom: 10px;
        }
        
        @media (max-width: 991px) {
            .jobs-grid { grid-template-columns: repeat(2, 1fr); }
        }
        
        @media (max-width: 768px) {
            .dashboard-sidebar { display: none; }
            .main-content { margin-left: 0; padding: 90px 15px 15px 15px; }
            .datetime-card { flex-direction: column; gap: 20px; padding: 20px; }
            .stats-icons { width: 100%; justify-content: center; flex-wrap: wrap; }
            .analog-clock { width: 90px; height: 90px; }
            .hour-hand { height: 25px; }
            .minute-hand { height: 32px; }
            .second-hand { height: 38px; }
            .digital-time .time-display { font-size: 28px; }
            .jobs-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    @include('components.employer-navbar')
    
    <!-- Sidebar -->
    <div class="dashboard-sidebar" id="dashboardSidebar">
        <a href="{{ url('/employer/dashboard') }}" class="sidebar-icon class="fas fa-btn active"><i-th-large"></i><span>Home</span></a>
        <a href="{{ url('/employer/post-job') }}" class="sidebar-icon-btn"><i class="fas fa-plus-circle"></i><span>Post</span></a>
        <a href="#" class="sidebar-icon-btn">
            <i class="fas fa-briefcase"></i><span>Posts</span>
        </a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-users"></i><span>Applicants</span></a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-chart-line"></i><span>Analytics</span></a>
        <div class="sidebar-divider"></div>
        <a href="{{ url('/employer/archive') }}" class="sidebar-icon-btn"><i class="fas fa-archive"></i><span>Archive</span></a>
        <div class="sidebar-divider"></div>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-cog"></i><span>Settings</span></a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="sidebar-icon-btn" style="border: none; cursor: pointer;">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
            </button>
        </form>
    </div>
    
    <div class="main-content" id="mainContent">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        <!-- Clock and Stats Card -->
        <div class="datetime-card">
            <!-- Stats Icons - Left Side -->
            <div class="stats-icons">
                <div class="stat-icon-item">
                    <div class="stat-icon-circle">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <span class="stat-number-badge">{{ $activeJobs->count() }}</span>
                    <span class="stat-icon-label">Active</span>
                </div>
                <div class="stat-icon-item">
                    <div class="stat-icon-circle">
                        <i class="fas fa-clock"></i>
                    </div>
                    <span class="stat-number-badge">{{ $pendingJobs->count() }}</span>
                    <span class="stat-icon-label">Pending</span>
                </div>
                <div class="stat-icon-item">
                    <div class="stat-icon-circle">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="stat-number-badge">0</span>
                    <span class="stat-icon-label">Applicants</span>
                </div>
                <div class="stat-icon-item">
                    <div class="stat-icon-circle">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <span class="stat-number-badge">0</span>
                    <span class="stat-icon-label">Hired</span>
                </div>
            </div>
            
            <!-- Clock - Center -->
            <div class="clock-section">
                <div class="analog-clock">
                    <div class="clock-center"></div>
                    <div class="clock-hand hour-hand" id="hourHand"></div>
                    <div class="clock-hand minute-hand" id="minuteHand"></div>
                    <div class="clock-hand second-hand" id="secondHand"></div>
                </div>
                <div class="digital-time">
                    <div class="time-display"><span id="timeDisplay">00:00:00</span> <span id="timePeriod">AM</span></div>
                    <div class="date-display" id="dateDisplay">Loading...</div>
                </div>
            </div>
        </div>
        
        <!-- Pending Jobs Section -->
        @if($pendingJobs->count() > 0)
        <div class="section-title">
            <i class="fas fa-clock" style="color: #ffc107;"></i> Pending Approval
        </div>
        
        <div class="jobs-grid">
            @foreach($pendingJobs as $job)
                <div class="job-card pending">
                    <div class="job-card-header">
                        <h5 class="job-title">{{ $job->position_title }}</h5>
                        <span class="job-status pending">Pending</span>
                    </div>
                    <div class="job-salary">{{ $job->salary }}</div>
                    <div class="job-details">
                        <span class="job-detail"><i class="fas fa-map-marker-alt"></i> {{ $job->place_of_work }}</span>
                        <span class="job-detail"><i class="fas fa-users"></i> {{ $job->vacancy_count }}</span>
                    </div>
                    <div class="job-details">
                        <span class="job-detail"><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($job->posting_date)->format('M d, Y') }}</span>
                    </div>
                    <div class="job-actions">
                        <button class="btn-action btn-view" data-bs-toggle="modal" data-bs-target="#pendingJobModal{{ $job->id }}">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </div>
                </div>
                
                <!-- Pending Job Detail Modal -->
                <div class="modal fade" id="pendingJobModal{{ $job->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $job->position_title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body job-detail-modal">
                                <div class="alert alert-warning">
                                    <i class="fas fa-clock"></i> This job is pending approval from the admin.
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="detail-label">Position Title</div>
                                        <div class="detail-value">{{ $job->position_title }}</div>
                                        
                                        <div class="detail-label">Salary</div>
                                        <div class="detail-value">{{ $job->salary }}</div>
                                        
                                        <div class="detail-label">Place of Work</div>
                                        <div class="detail-value">{{ $job->place_of_work }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="detail-label">Vacancy Count</div>
                                        <div class="detail-value">{{ $job->vacancy_count }} position(s)</div>
                                        
                                        <div class="detail-label">Job Type</div>
                                        <div class="detail-value">{{ ucfirst($job->nature_of_work) }}</div>
                                        
                                        <div class="detail-label">Valid Until</div>
                                        <div class="detail-value">{{ \Carbon\Carbon::parse($job->valid_until)->format('F d, Y') }}</div>
                                        
                                        <div class="detail-label">Status</div>
                                        <div class="detail-value">
                                            <span class="job-status pending">Pending Approval</span>
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($job->job_description))
                                <div class="mt-3">
                                    <div class="detail-label">Job Description</div>
                                    <div class="detail-value">{{ $job->job_description }}</div>
                                </div>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
        
        <!-- Active Jobs Section -->
        <div class="section-title">
            <i class="fas fa-briefcase"></i> Active Job Posts
        </div>
        
        @if($activeJobs->count() > 0)
            <div class="jobs-grid">
                @foreach($activeJobs as $job)
                    <div class="job-card">
                        <div class="job-card-header">
                            <h5 class="job-title">{{ $job->position_title }}</h5>
                            <span class="job-status active">{{ ucfirst($job->status) }}</span>
                        </div>
                        <div class="job-salary">{{ $job->salary }}</div>
                        <div class="job-details">
                            <span class="job-detail"><i class="fas fa-map-marker-alt"></i> {{ $job->place_of_work }}</span>
                            <span class="job-detail"><i class="fas fa-users"></i> {{ $job->vacancy_count }}</span>
                        </div>
                        <div class="job-details">
                            <span class="job-detail"><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($job->valid_until)->format('M d, Y') }}</span>
                        </div>
                        <div class="job-actions">
                            <button class="btn-action btn-view" data-bs-toggle="modal" data-bs-target="#jobModal{{ $job->id }}">
                                <i class="fas fa-eye"></i> View
                            </button>
                            <form action="{{ route('employer.job.archive', $job->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-action btn-archive"><i class="fas fa-archive"></i></button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Job Detail Modal -->
                    <div class="modal fade" id="jobModal{{ $job->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $job->position_title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body job-detail-modal">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="detail-label">Position Title</div>
                                            <div class="detail-value">{{ $job->position_title }}</div>
                                            
                                            <div class="detail-label">Company</div>
                                            <div class="detail-value">{{ $job->company_name ?? 'PESO Manolo Fortich' }}</div>
                                            
                                            <div class="detail-label">Salary</div>
                                            <div class="detail-value">{{ $job->salary }}</div>
                                            
                                            <div class="detail-label">Place of Work</div>
                                            <div class="detail-value">{{ $job->place_of_work }}</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="detail-label">Vacancy Count</div>
                                            <div class="detail-value">{{ $job->vacancy_count }} position(s)</div>
                                            
                                            <div class="detail-label">Job Type</div>
                                            <div class="detail-value">{{ $job->job_type ?? 'Full-time' }}</div>
                                            
                                            <div class="detail-label">Valid Until</div>
                                            <div class="detail-value">{{ \Carbon\Carbon::parse($job->valid_until)->format('F d, Y') }}</div>
                                            
                                            <div class="detail-label">Status</div>
                                            <div class="detail-value">
                                                <span class="job-status active">{{ ucfirst($job->status) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @if(!empty($job->description))
                                    <div class="mt-3">
                                        <div class="detail-label">Job Description</div>
                                        <div class="detail-value">{{ $job->description }}</div>
                                    </div>
                                    @endif
                                    @if(!empty($job->requirements))
                                    <div class="mt-3">
                                        <div class="detail-label">Requirements</div>
                                        <div class="detail-value">{{ $job->requirements }}</div>
                                    </div>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('employer.job.archive', $job->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-warning"><i class="fas fa-archive"></i> Archive Job</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-briefcase"></i>
                <h5>No Active Job Posts</h5>
                <p>Start posting jobs to attract applicants</p>
                <a href="{{ url('/employer/post-job') }}" class="btn btn-primary">Post Your First Job</a>
            </div>
        @endif
    </div>
    
    @include('components.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggler = document.getElementById('sidebarToggler');
            const dashboardSidebar = document.getElementById('dashboardSidebar');
            const mainContent = document.getElementById('mainContent');
            
            if (sidebarToggler && dashboardSidebar && mainContent) {
                sidebarToggler.addEventListener('click', function(e) {
                    e.preventDefault();
                    dashboardSidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('expanded');
                });
            }
        });
        
        // Clock
        function updateClock() {
            const now = new Date();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            let seconds = now.getSeconds();
            const period = hours >= 12 ? 'PM' : 'AM';
            
            hours = hours % 12 || 12;
            const timeString = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            
            document.getElementById('timeDisplay').textContent = timeString;
            document.getElementById('timePeriod').textContent = period;
            document.getElementById('dateDisplay').textContent = now.toDateString();
            
            document.getElementById('hourHand').style.transform = `translateX(-50%) rotate(${(hours % 12) * 30 + minutes / 2}deg)`;
            document.getElementById('minuteHand').style.transform = `translateX(-50%) rotate(${minutes * 6}deg)`;
            document.getElementById('secondHand').style.transform = `translateX(-50%) rotate(${seconds * 6}deg)`;
        }
        
        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>
</html>
