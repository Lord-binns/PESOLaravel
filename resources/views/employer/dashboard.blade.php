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
        body { background-color: #ffffff; color: #333333; }
        main { background: #ffffff; padding: 40px 20px; }
        
        .datetime-bar {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            padding: 15px 25px;
            border-radius: 15px;
            margin-bottom: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .clock-section { display: flex; align-items: center; gap: 15px; }
        
        .analog-clock {
            width: 120px; height: 120px; border-radius: 50%;
            background: linear-gradient(145deg, #0a1f4d, #001a4d);
            border: 3px solid #ffd700;
            position: relative;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.3), inset 0 0 15px rgba(0,0,0,0.5);
        }
        
        .clock-center {
            position: absolute; top: 50%; left: 50%;
            width: 12px; height: 12px; background: #ffd700;
            border-radius: 50%; transform: translate(-50%, -50%); z-index: 10;
        }
        
        .clock-hand { position: absolute; bottom: 50%; left: 50%; transform-origin: bottom center; }
        
        .hour-hand { width: 4px; height: 35px; background: #ffd700; transform: translateX(-50%); }
        .minute-hand { width: 2px; height: 45px; background: #fff; transform: translateX(-50%); }
        .second-hand { width: 1px; height: 50px; background: #ff4444; transform: translateX(-50%); }
        
        .digital-time { text-align: left; }
        .digital-time .time-display { font-size: 32px; font-weight: 700; color: #ffd700; line-height: 1; font-family: 'Courier New', monospace; }
        .digital-time .date-display { font-size: 14px; color: #fff; }
        
        .calendar-section { text-align: center; color: white; }
        .calendar-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        .calendar-header button { background: none; border: none; color: #ffd700; cursor: pointer; font-size: 18px; }
        
        .mini-calendar {
            width: 180px; height: 180px;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 10px;
        }
        
        .calendar-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 2px; text-align: center; font-size: 11px; }
        .calendar-day-header { font-weight: bold; color: #ffd700; padding: 2px; }
        .calendar-day { padding: 4px; border-radius: 50%; }
        .calendar-day:hover { background: rgba(255,215,0,0.3); }
        .calendar-day.today { background: #ffd700; color: #001a4d; font-weight: bold; }
        .calendar-day.other-month { opacity: 0.4; }
        
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
        
        .main-content {
            margin-left: 80px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }
        
        .main-content.expanded {
            margin-left: 0;
        }
        
        /* Stats Cards */
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .stat-card {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            border-radius: 15px;
            padding: 25px;
            color: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
            transition: transform 0.3s;
        }
        
        .stat-card:hover { transform: translateY(-5px); }
        .stat-card .icon { font-size: 40px; color: #ffd700; margin-bottom: 15px; }
        .stat-card .number { font-size: 36px; font-weight: bold; }
        .stat-card .label { font-size: 14px; opacity: 0.9; }
        
        /* Job Posts */
        .section-title {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .job-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 4px solid #ffd700;
            transition: transform 0.2s;
        }
        
        .job-card:hover { transform: translateX(5px); }
        
        .job-card.expired {
            border-left-color: #6c757d;
            background: #f8f9fa;
        }
        
        .job-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px; }
        .job-title { font-size: 18px; font-weight: 700; color: #001a4d; margin: 0; }
        .job-salary { font-size: 16px; color: #28a745; font-weight: 600; }
        .job-details { display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 10px; }
        .job-detail { display: flex; align-items: center; gap: 5px; color: #666; font-size: 14px; }
        .job-status { padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .job-status.active { background: #d4edda; color: #155724; }
        .job-status.expired, .job-status.closed { background: #f8d7da; color: #721c24; }
        
        .job-actions { display: flex; gap: 10px; margin-top: 15px; }
        .btn-action { padding: 8px 15px; border-radius: 5px; font-size: 13px; border: none; cursor: pointer; transition: all 0.3s; }
        .btn-view { background: #001a4d; color: white; }
        .btn-view:hover { background: #002d73; }
        .btn-archive { background: #6c757d; color: white; }
        .btn-archive:hover { background: #5a6268; }
        
        .empty-state { text-align: center; padding: 40px; color: #666; }
        .empty-state i { font-size: 60px; color: #ddd; margin-bottom: 20px; }
        
        @media (max-width: 768px) {
            .dashboard-sidebar { display: none; }
            .main-content { margin-left: 0; }
            .datetime-bar { flex-direction: column; gap: 20px; }
            .calendar-section { width: 100%; }
        }
    </style>
</head>
<body>
    @include('components.employer-navbar')
    
    <!-- Sidebar -->
    <div class="dashboard-sidebar" id="dashboardSidebar">
        <a href="{{ url('/employer/dashboard') }}" class="sidebar-icon-btn active"><i class="fas fa-th-large"></i><span>Home</span></a>
        <a href="{{ url('/employer/post-job') }}" class="sidebar-icon-btn"><i class="fas fa-plus-circle"></i><span>Post</span></a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-briefcase"></i><span>Posts</span></a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-users"></i><span>Applicants</span></a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-chart-line"></i><span>Analytics</span></a>
        <div class="sidebar-divider"></div>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-archive"></i><span>Archive</span></a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-bell"></i><span>Alerts</span></a>
        <div class="sidebar-divider"></div>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-cog"></i><span>Settings</span></a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-question-circle"></i><span>Help</span></a>
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
        
        <div class="datetime-bar">
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
            
            <div class="calendar-section">
                <div class="mini-calendar">
                    <div class="calendar-header">
                        <button onclick="changeMonth(-1)">&#8249;</button>
                        <span id="monthName">JAN</span>
                        <button onclick="changeMonth(1)">&#8250;</button>
                    </div>
                    <div style="font-weight: bold; margin-bottom: 5px;" id="yearName">2024</div>
                    <div class="calendar-grid" id="calendarGrid"></div>
                </div>
            </div>
        </div>
        
        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <i class="fas fa-briefcase icon"></i>
                <div class="number">{{ $activeJobs->count() }}</div>
                <div class="label">Active Job Posts</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-users icon"></i>
                <div class="number">0</div>
                <div class="label">Total Applicants</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-check-circle icon"></i>
                <div class="number">0</div>
                <div class="label">Hired</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-archive icon"></i>
                <div class="number">{{ $archivedJobs->count() }}</div>
                <div class="label">Archived Posts</div>
            </div>
        </div>
        
        <!-- Active Jobs Section -->
        <div class="section-title">
            <i class="fas fa-briefcase"></i> Active Job Posts
            <a href="{{ url('/employer/post-job') }}" class="btn btn-sm btn-warning float-end">
                <i class="fas fa-plus"></i> Post New Job
            </a>
        </div>
        
        @if($activeJobs->count() > 0)
            @foreach($activeJobs as $job)
                <div class="job-card">
                    <div class="job-header">
                        <div>
                            <h5 class="job-title">{{ $job->position_title }}</h5>
                            <div class="job-details">
                                <span class="job-detail"><i class="fas fa-money-bill-wave"></i> {{ $job->salary }}</span>
                                <span class="job-detail"><i class="fas fa-map-marker-alt"></i> {{ $job->place_of_work }}</span>
                                <span class="job-detail"><i class="fas fa-users"></i> {{ $job->vacancy_count }} vacancy{{ $job->vacancy_count > 1 ? 'ies' : 'y' }}</span>
                                <span class="job-detail"><i class="fas fa-calendar"></i> Expires: {{ \Carbon\Carbon::parse($job->valid_until)->format('M d, Y') }}</span>
                            </div>
                        </div>
                        <span class="job-status active">{{ ucfirst($job->status) }}</span>
                    </div>
                    <div class="job-actions">
                        <button class="btn-action btn-view"><i class="fas fa-eye"></i> View Details</button>
                        <form action="{{ route('employer.job.archive', $job->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn-action btn-archive"><i class="fas fa-archive"></i> Archive</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty-state">
                <i class="fas fa-briefcase"></i>
                <h5>No Active Job Posts</h5>
                <p>Start posting jobs to attract applicants</p>
                <a href="{{ url('/employer/post-job') }}" class="btn btn-primary">Post Your First Job</a>
            </div>
        @endif
        
        <!-- Archived Jobs Section -->
        @if($archivedJobs->count() > 0)
            <div class="section-title" style="margin-top: 40px;">
                <i class="fas fa-archive"></i> Archived / Expired Job Posts
            </div>
            
            @foreach($archivedJobs as $job)
                <div class="job-card expired">
                    <div class="job-header">
                        <div>
                            <h5 class="job-title">{{ $job->position_title }}</h5>
                            <div class="job-details">
                                <span class="job-detail"><i class="fas fa-money-bill-wave"></i> {{ $job->salary }}</span>
                                <span class="job-detail"><i class="fas fa-map-marker-alt"></i> {{ $job->place_of_work }}</span>
                                <span class="job-detail"><i class="fas fa-calendar"></i> Expired: {{ \Carbon\Carbon::parse($job->valid_until)->format('M d, Y') }}</span>
                            </div>
                        </div>
                        <span class="job-status {{ $job->status == 'closed' ? 'closed' : 'expired' }}">{{ ucfirst($job->status) }}</span>
                    </div>
                    <div class="job-actions">
                        <button class="btn-action btn-view"><i class="fas fa-eye"></i> View Details</button>
                    </div>
                </div>
            @endforeach
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
        
        // Clock & Calendar
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();
        
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
        
        function renderCalendar() {
            const monthNames = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
            document.getElementById('monthName').textContent = monthNames[currentMonth];
            document.getElementById('yearName').textContent = currentYear;
            
            const firstDay = new Date(currentYear, currentMonth, 1).getDay();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
            const daysInPrevMonth = new Date(currentYear, currentMonth, 0).getDate();
            const today = new Date();
            const isCurrentMonth = today.getMonth() === currentMonth && today.getFullYear() === currentYear;
            
            let html = '';
            const dayNames = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
            dayNames.forEach(d => html += `<div class="calendar-day-header">${d}</div>`);
            
            for (let i = firstDay - 1; i >= 0; i--) 
                html += `<div class="calendar-day other-month">${daysInPrevMonth - i}</div>`;
            
            for (let day = 1; day <= daysInMonth; day++) {
                let cls = 'calendar-day';
                if (isCurrentMonth && today.getDate() === day) cls += ' today';
                html += `<div class="${cls}">${day}</div>`;
            }
            
            const remaining = 42 - (firstDay + daysInMonth);
            for (let i = 1; i <= remaining; i++) 
                html += `<div class="calendar-day other-month">${i}</div>`;
            
            document.getElementById('calendarGrid').innerHTML = html;
        }
        
        function changeMonth(delta) {
            currentMonth += delta;
            if (currentMonth > 11) { currentMonth = 0; currentYear++; }
            if (currentMonth < 0) { currentMonth = 11; currentYear--; }
            renderCalendar();
        }
        
        updateClock();
        setInterval(updateClock, 1000);
        renderCalendar();
    </script>
</body>
</html>
