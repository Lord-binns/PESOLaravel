<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Archive - PESO Manolo Fortich</title>
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
            position: absolute;
            top: -5px;
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
        
        /* Notification badge on sidebar */
        .sidebar-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4444;
            color: white;
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
        
        /* Section Title */
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
        
        /* Page Header */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .page-header-title {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #001a4d;
        }
        
        .page-header-title i {
            font-size: 28px;
            color: #dc3545;
        }
        
        .page-header-title h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        
        .page-header-title p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }
        
        .back-to-dashboard {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #001a4d;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .back-to-dashboard:hover {
            background: #002d73;
            color: white;
            transform: translateX(-3px);
        }
        
        /* Jobs Grid */
        .jobs-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .job-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        
        .job-card.rejected {
            border-left: 4px solid #dc3545;
        }
        
        .job-card:hover { 
            transform: translateY(-3px); 
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        
        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }
        
        .job-title { 
            font-size: 14px; 
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
        .job-status.rejected { background: #f8d7da; color: #721c24; }
        
        .job-salary { 
            font-size: 12px; 
            color: #28a745; 
            font-weight: 600; 
            margin-bottom: 8px;
        }
        
        .job-details { 
            display: flex; 
            gap: 15px; 
            flex-wrap: wrap; 
            margin-bottom: 10px; 
        }
        .job-detail { 
            display: flex; 
            align-items: center; 
            gap: 5px; 
            color: #666; 
            font-size: 11px; 
        }
        
        .job-actions { 
            display: flex; 
            gap: 8px; 
            margin-top: 12px; 
            padding-top: 12px;
            border-top: 1px solid #eee;
        }
        .job-actions .btn-action { 
            flex: 1;
            padding: 8px 12px; 
            border-radius: 6px; 
            font-size: 12px; 
            border: none; 
            cursor: pointer; 
            transition: all 0.3s; 
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        .btn-view { 
            background: #001a4d; 
            color: white; 
        }
        .btn-view:hover { 
            background: #002d73; 
        }
        
        .empty-state { 
            text-align: center; 
            padding: 60px 40px; 
            color: #666;
            background: white;
            border-radius: 10px;
            grid-column: 1 / -1;
        }
        .empty-state i { 
            font-size: 64px; 
            color: #ddd; 
            margin-bottom: 20px; 
        }
        .empty-state h4 {
            color: #001a4d;
            margin-bottom: 10px;
        }
        
        /* Alert Messages */
        .alert {
            border-radius: 10px;
            border: none;
        }
        
        @media (max-width: 991px) {
            .jobs-grid { grid-template-columns: 1fr; }
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
            .page-header { flex-direction: column; gap: 15px; align-items: flex-start; }
            .back-to-dashboard { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>
    @include('components.admin-navbar')
    @include('components.admin-sidebar', ['pendingJobsCount' => $pendingJobsCount ?? 0])
    
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
                    <span class="stat-number-badge">{{ $activeJobsCount }}</span>
                    <span class="stat-icon-label">Active Jobs</span>
                </div>
                <div class="stat-icon-item">
                    <div class="stat-icon-circle">
                        <i class="fas fa-clock"></i>
                    </div>
                    <span class="stat-number-badge">{{ $pendingJobsCount }}</span>
                    <span class="stat-icon-label">Pending</span>
                </div>
                <div class="stat-icon-item">
                    <div class="stat-icon-circle">
                        <i class="fas fa-building"></i>
                    </div>
                    <span class="stat-number-badge">{{ $establishmentsCount }}</span>
                    <span class="stat-icon-label">Employers</span>
                </div>
                <div class="stat-icon-item">
                    <div class="stat-icon-circle">
                        <i class="fas fa-archive"></i>
                    </div>
                    <span class="stat-number-badge">{{ $archivedCount }}</span>
                    <span class="stat-icon-label">Archived</span>
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
        
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-title">
                <i class="fas fa-archive"></i>
                <div>
                    <h2>Rejected Job Posts</h2>
                    <p>All rejected job postings are stored here</p>
                </div>
            </div>
            <a href="{{ route('dashboard') }}" class="back-to-dashboard">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
        
        <!-- Rejected Jobs Section -->
        <div class="section-title">
            <i class="fas fa-times-circle"></i> Rejected Jobs ({{ $rejectedCount }})
        </div>
        
        @if($rejectedJobs->count() > 0)
            <div class="jobs-grid">
                @foreach($rejectedJobs as $job)
                    <div class="job-card rejected">
                        <div class="job-header">
                            <h5 class="job-title">{{ $job->position_title }}</h5>
                            <span class="job-status rejected">Rejected</span>
                        </div>
                        <div class="job-salary">{{ $job->salary }}</div>
                        <div class="job-details">
                            <span class="job-detail"><i class="fas fa-map-marker-alt"></i> {{ $job->place_of_work }}</span>
                            <span class="job-detail"><i class="fas fa-users"></i> {{ $job->vacancy_count }} position(s)</span>
                        </div>
                        <div class="job-details">
                            <span class="job-detail"><i class="fas fa-calendar"></i> Posted: {{ \Carbon\Carbon::parse($job->posting_date)->format('M d, Y') }}</span>
                            <span class="job-detail"><i class="fas fa-calendar-check"></i> Rejected: {{ \Carbon\Carbon::parse($job->archived_at)->format('M d, Y') }}</span>
                        </div>
                        <div class="job-details">
                            <span class="job-detail"><i class="fas fa-times-circle text-danger"></i> Reason: {{ ucfirst(str_replace('_', ' ', $job->archived_reason)) }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-check-circle"></i>
                <h4>No Rejected Jobs</h4>
                <p>There are no rejected job postings in the archive.</p>
                <a href="{{ route('dashboard') }}" class="back-to-dashboard" style="display: inline-flex; margin-top: 15px;">
                    <i class="fas fa-home"></i> Go to Dashboard
                </a>
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

        // Search Filter Functionality
        const searchInput = document.querySelector('.search-input');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase().trim();
                const jobCards = document.querySelectorAll('.job-card');
                let visibleCount = 0;

                jobCards.forEach(card => {
                    const title = card.querySelector('.job-title')?.textContent.toLowerCase() || '';
                    const details = card.querySelector('.job-details')?.textContent.toLowerCase() || '';
                    const salary = card.querySelector('.job-salary')?.textContent.toLowerCase() || '';
                    
                    if (title.includes(query) || details.includes(query) || salary.includes(query)) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                const jobsGrid = document.querySelector('.jobs-grid');
                if (visibleCount === 0 && query.length > 0) {
                    if (jobsGrid && !document.querySelector('.no-search-results')) {
                        jobsGrid.style.display = 'none';
                        const noResults = document.createElement('div');
                        noResults.className = 'empty-state no-search-results';
                        noResults.innerHTML = `<i class="fas fa-search"></i><h5>No Results Found</h5><p>No jobs match your search for "<strong>${this.value}</strong>"</p>`;
                        jobsGrid.parentElement.insertBefore(noResults, jobsGrid);
                    }
                } else {
                    if (jobsGrid) jobsGrid.style.display = 'grid';
                    const noResults = document.querySelector('.no-search-results');
                    if (noResults) noResults.remove();
                }
            });
        }
    </script>
</body>
</html>
