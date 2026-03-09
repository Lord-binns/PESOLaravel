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
        
        /* Clock - Bigger */
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
        .digital-time .time-period { font-size: 12px; color: rgba(255, 255, 255, 0.8); text-transform: uppercase; }
        
        /* Calendar - Shorter with side month */
        .calendar-section {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }
        
        .calendar-wrapper {
            background: rgba(255, 255, 255, 0.08);
            padding: 8px;
            border-radius: 8px;
            border: 1px solid rgba(255, 215, 0, 0.2);
        }
        
        .calendar-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 2px; }
        
        .calendar-day-header { color: rgba(255, 255, 255, 0.5); font-size: 8px; font-weight: 600; text-align: center; padding: 2px 0; }
        
        .calendar-day {
            width: 24px; height: 20px; display: flex; align-items: center; justify-content: center;
            color: rgba(255,255,255,0.9); font-size: 9px; font-weight: 500; border-radius: 3px;
        }
        
        .calendar-day:hover { background: rgba(255,255,255,0.15); }
        .calendar-day.other-month { color: rgba(255,255,255,0.25); }
        .calendar-day.today { background: #ffd700; color: #001a4d; font-weight: 700; }
        
        .calendar-month-display {
            text-align: center;
            min-width: 80px;
        }
        
        .calendar-month-display .month-name {
            font-size: 18px; font-weight: 700; color: #ffd700; line-height: 1.2;
        }
        
        .calendar-month-display .year-name {
            font-size: 14px; color: rgba(255,255,255,0.7);
        }
        
        .calendar-nav { color: rgba(255,255,255,0.7); cursor: pointer; font-size: 14px; padding: 3px 8px; border-radius: 3px; display: block; margin: 3px 0; }
        .calendar-nav:hover { color: white; background: rgba(255,255,255,0.1); }
        
        .action-card { background: #001a4d !important; color: white; border-radius: 10px; padding: 30px; text-align: center; height: 100%; transition: all 0.3s; }
        .action-card:hover { background: #02205c !important; transform: translateY(-5px); }
        .action-card h3 { color: #ffd700; font-weight: 600; margin-bottom: 15px; }
        .action-card p { color: white; margin-bottom: 20px; }
        .action-card .btn { background: linear-gradient(90deg, #ff4444, #cc0000); border: none; color: white; padding: 12px 25px; border-radius: 8px; font-weight: 600; }
        
        .table-container { background-color: rgba(255, 255, 255, 0.25); border-radius: 10px; padding: 20px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); }
        .table { background: white; }
        .table thead th { background: #001a4d; color: white; border: none; }
        .table td { vertical-align: middle; }
        
        .status-badge { padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .status-interview { background: #dbeafe; color: #1e40af; }
        .status-hired { background: #dcfce7; color: #166534; }
        .status-pending { background: #fef3c7; color: #92400e; }
        
        .btn-action { background: linear-gradient(90deg, #ff4444, #cc0000); border: none; color: white; padding: 8px 16px; border-radius: 6px; font-size: 14px; }
        
        .user-info { display: flex; align-items: center; gap: 10px; }
        .user-avatar { width: 40px; height: 40px; border-radius: 50%; background: #001a4d; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 14px; }
        
        .datetime-badge { display: inline-flex; align-items: center; gap: 5px; padding: 4px 10px; background: #e8f4fd; border-radius: 15px; font-size: 12px; color: #001a4d; font-weight: 500; }
        
        .deadline-badge { background: #fee2e2; color: #991b1b; }
        
        .schedule-card { background: #f8f9fa; border-left: 4px solid #ffd700; border-radius: 8px; padding: 15px; margin-bottom: 15px; }
        .schedule-card .date { font-size: 24px; font-weight: 700; color: #001a4d; line-height: 1; }
        .schedule-card .month { font-size: 12px; color: #6b7280; text-transform: uppercase; }
        .schedule-card .time { font-size: 14px; color: #001a4d; font-weight: 600; }
        .schedule-card .event-title { font-size: 16px; font-weight: 600; color: #333; margin-top: 8px; }
        
        .job-post-card { background: white; border: 1px solid #e5e7eb; border-radius: 10px; padding: 20px; margin-bottom: 15px; transition: all 0.3s; }
        .job-post-card:hover { border-color: #001a4d; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .job-post-card .job-title { font-size: 18px; font-weight: 600; color: #001a4d; }
        .job-post-card .job-meta { font-size: 13px; color: #6b7280; display: flex; gap: 15px; margin-top: 8px; }
        .job-post-card .applicant-count { background: #001a4d; color: white; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        
        .section-header { display: flex; align-items: center; margin-bottom: 25px; }
        .section-header::before, .section-header::after { content: ''; flex: 1; height: 3px; background: #FF2D2D; }
        .section-header span { padding: 0 15px; font-weight: 700; color: #001a4d; font-size: 1.3rem; }
        
        @media (max-width: 768px) {
            .datetime-bar { flex-direction: column; text-align: center; gap: 20px; }
            .calendar-section { flex-direction: column; align-items: center; }
        }
    </style>
</head>
<body>
    @include('components.employer-navbar')
    <main>
        <div class="container" style="max-width: 1200px;">
            
            <!-- Clock and Calendar Bar -->
            <div class="datetime-bar">
                <!-- Bigger Clock -->
                <div class="clock-section">
                    <div class="analog-clock">
                        <div class="clock-hand hour-hand" id="hourHand"></div>
                        <div class="clock-hand minute-hand" id="minuteHand"></div>
                        <div class="clock-hand second-hand" id="secondHand"></div>
                        <div class="clock-center"></div>
                    </div>
                    <div class="digital-time">
                        <div class="time-display" id="digitalTime">00:00</div>
                        <div class="time-period" id="timePeriod">AM</div>
                    </div>
                </div>
                
                <!-- Calendar - Side by side layout -->
                <div class="calendar-section">
                    <div class="calendar-wrapper">
                        <div class="calendar-grid" id="calendarGrid"></div>
                    </div>
                    
                    <div class="calendar-month-display">
                        <span class="calendar-nav" onclick="changeMonth(-1)">&#8249;</span>
                        <div class="month-name" id="monthName">JAN</div>
                        <div class="year-name" id="yearName">2025</div>
                        <span class="calendar-nav" onclick="changeMonth(1)">&#8250;</span>
                    </div>
                </div>
            </div>
            
            <!-- Action Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="action-card">
                        <h3><i class="fas fa-plus-circle me-2"></i>Post New Job</h3>
                        <p>Create a new job vacancy and reach qualified candidates.</p>
                        <button class="btn">Post Job Now</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="action-card">
                        <h3><i class="fas fa-tasks me-2"></i>Manage Applicants</h3>
                        <p>Review and manage all applicants for your job postings.</p>
                        <button class="btn">View Applicants</button>
                    </div>
                </div>
            </div>
            
            <!-- Active Job Posts -->
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
                            <div><div class="datetime-badge"><i class="fas fa-calendar-plus"></i> Posted: Jan 10</div></div>
                            <div class="datetime-badge deadline-badge"><i class="fas fa-calendar-times"></i> Deadline: Jan 25</div>
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
                            <div><div class="datetime-badge"><i class="fas fa-calendar-plus"></i> Posted: Jan 12</div></div>
                            <div class="datetime-badge deadline-badge"><i class="fas fa-calendar-times"></i> Deadline: Jan 28</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Upcoming Interviews -->
            <div class="section-header">
                <span><i class="fas fa-calendar-alt me-2"></i>Upcoming Interviews</span>
            </div>
            
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="schedule-card">
                        <div class="d-flex">
                            <div class="text-center" style="min-width: 50px;">
                                <div class="date">20</div>
                                <div class="month">Jan</div>
                            </div>
                            <div style="margin-left: 10px;">
                                <div class="time"><i class="fas fa-clock me-1"></i> 9:00 AM</div>
                                <div class="event-title">John Doe</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="schedule-card">
                        <div class="d-flex">
                            <div class="text-center" style="min-width: 50px;">
                                <div class="date">21</div>
                                <div class="month">Jan</div>
                            </div>
                            <div style="margin-left: 10px;">
                                <div class="time"><i class="fas fa-clock me-1"></i> 2:00 PM</div>
                                <div class="event-title">Jane Smith</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="schedule-card">
                        <div class="d-flex">
                            <div class="text-center" style="min-width: 50px;">
                                <div class="date">22</div>
                                <div class="month">Jan</div>
                            </div>
                            <div style="margin-left: 10px;">
                                <div class="time"><i class="fas fa-clock me-1"></i> 10:30 AM</div>
                                <div class="event-title">Mike Brown</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Applicants -->
            <div class="section-header">
                <span><i class="fas fa-users me-2"></i>Recent Applicants</span>
            </div>
            
            <div class="table-container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Applicant Name</th>
                            <th>Position</th>
                            <th>Date Applied</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><div class="user-info"><div class="user-avatar">JD</div><span>John Doe</span></div></td>
                            <td>Software Developer</td>
                            <td><div class="datetime-badge"><i class="fas fa-calendar"></i> Jan 15, 2025</div></td>
                            <td><span class="status-badge status-interview">Interview</span></td>
                            <td>
                                <button class="btn-action" title="Hire"><i class="fas fa-check"></i></button>
                                <button class="btn-action" style="background: #6c757d;" title="View"><i class="fas fa-eye"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="user-info"><div class="user-avatar">JS</div><span>Jane Smith</span></div></td>
                            <td>Graphic Designer</td>
                            <td><div class="datetime-badge"><i class="fas fa-calendar"></i> Jan 14, 2025</div></td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                            <td>
                                <button class="btn-action" title="Hire"><i class="fas fa-check"></i></button>
                                <button class="btn-action" style="background: #6c757d;" title="View"><i class="fas fa-eye"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </main>
    
    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();
        
        function updateClock() {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            
            const hours12 = hours % 12 || 12;
            const period = hours >= 12 ? 'PM' : 'AM';
            document.getElementById('digitalTime').textContent = `${String(hours12).padStart(2, '0')}:${String(minutes).padStart(2, '0')}`;
            document.getElementById('timePeriod').textContent = period;
            
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
