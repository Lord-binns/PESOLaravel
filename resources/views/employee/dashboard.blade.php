<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Employee Dashboard - PESO Manolo Fortich</title>
    @if (file_exists(public_path('images/LogoPNG.png')))
        <link rel="icon" href="{{ asset('images/LogoPNG.png') }}" type="image/png">
        <link rel="apple-touch-icon" href="{{ asset('images/LogoPNG.png') }}">
    @else
        <link rel="icon" href="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png" type="image/png">
        <link rel="apple-touch-icon" href="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png">
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #ffffff; color: #333333; }
        main { background: #ffffff; padding: 40px 20px; }
        
        /* Enhanced DateTime Bar */
        .datetime-bar {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            padding: 25px 30px;
            border-radius: 15px;
            margin-bottom: 40px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        /* Analog Clock */
        .clock-container { display: flex; align-items: center; gap: 25px; }
        
        .analog-clock {
            width: 120px; height: 120px; border-radius: 50%;
            background: linear-gradient(145deg, #0a1f4d, #001a4d);
            border: 4px solid #ffd700;
            position: relative;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3), inset 0 0 20px rgba(0,0,0,0.5);
        }
        
        .clock-center {
            position: absolute; top: 50%; left: 50%;
            width: 12px; height: 12px; background: #ffd700;
            border-radius: 50%; transform: translate(-50%, -50%); z-index: 10;
        }
        
        .clock-hand {
            position: absolute; bottom: 50%; left: 50%;
            transform-origin: bottom center; border-radius: 3px;
        }
        
        .hour-hand { width: 4px; height: 35px; background: #ffd700; transform: translateX(-50%) rotate(0deg); }
        .minute-hand { width: 3px; height: 45px; background: #ffffff; transform: translateX(-50%) rotate(0deg); }
        .second-hand { width: 2px; height: 50px; background: #ff4444; transform: translateX(-50%) rotate(0deg); }
        
        .clock-number {
            position: absolute; color: #ffffff; font-size: 10px;
            font-weight: bold; width: 20px; height: 20px;
            text-align: center; line-height: 20px;
        }
        .clock-number.n12 { top: 5px; left: 50%; transform: translateX(-50%); }
        .clock-number.n3 { top: 50%; right: 5px; transform: translateY(-50%); }
        .clock-number.n6 { bottom: 5px; left: 50%; transform: translateX(-50%); }
        .clock-number.n9 { top: 50%; left: 5px; transform: translateY(-50%); }
        
        .digital-time { text-align: center; }
        .digital-time .time-display {
            font-size: 42px; font-weight: 700; color: #ffd700;
            line-height: 1; text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
            font-family: 'Courier New', monospace;
        }
        .digital-time .time-period {
            font-size: 16px; color: rgba(255, 255, 255, 0.8);
            text-transform: uppercase; letter-spacing: 2px;
        }
        .digital-time .date-display { font-size: 14px; color: rgba(255, 255, 255, 0.7); margin-top: 5px; }
        
        /* Full Calendar */
        .calendar-wrapper {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 12px;
            border: 1px solid rgba(255, 215, 0, 0.3);
        }
        
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .calendar-header h4 {
            color: #ffd700;
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }
        
        .calendar-nav {
            color: white;
            cursor: pointer;
            font-size: 16px;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .calendar-nav:hover { background: rgba(255, 255, 255, 0.2); }
        
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }
        
        .calendar-day-header {
            color: rgba(255, 255, 255, 0.7);
            font-size: 11px;
            font-weight: 600;
            text-align: center;
            padding: 5px 0;
            text-transform: uppercase;
        }
        
        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 13px;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .calendar-day:hover { background: rgba(255, 255, 255, 0.2); }
        
        .calendar-day.other-month { color: rgba(255, 255, 255, 0.3); }
        
        .calendar-day.today {
            background: #ffd700;
            color: #001a4d;
            font-weight: 700;
        }
        
        .calendar-day.has-event {
            position: relative;
        }
        
        .calendar-day.has-event::after {
            content: '';
            position: absolute;
            bottom: 3px;
            width: 5px;
            height: 5px;
            background: #ff4444;
            border-radius: 50%;
        }
        
        /* Action cards */
        .action-card {
            background: #001a4d !important; color: white;
            border-radius: 10px; padding: 30px;
            text-align: center; height: 100%; transition: all 0.3s;
        }
        .action-card:hover { background: #02205c !important; transform: translateY(-5px); }
        .action-card h3 { color: #ffd700; font-weight: 600; margin-bottom: 15px; }
        .action-card p { color: white; margin-bottom: 20px; }
        .action-card .btn {
            background: linear-gradient(90deg, #ff4444, #cc0000);
            border: none; color: white; padding: 12px 25px;
            border-radius: 8px; font-weight: 600;
        }
        
        /* Table */
        .table-container {
            background-color: rgba(255, 255, 255, 0.25);
            border-radius: 10px; padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .table { background: white; }
        .table thead th { background: #001a4d; color: white; border: none; }
        .table td { vertical-align: middle; }
        
        .status-badge { padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .status-interview { background: #dbeafe; color: #1e40af; }
        .status-hired { background: #dcfce7; color: #166534; }
        .status-pending { background: #fef3c7; color: #92400e; }
        
        .btn-action {
            background: linear-gradient(90deg, #ff4444, #cc0000);
            border: none; color: white; padding: 8px 16px;
            border-radius: 6px; font-size: 14px;
        }
        
        .btn-success-custom {
            background: #28a745; border: none; color: white;
            padding: 10px 20px; border-radius: 8px; font-weight: 600;
        }
        
        /* Profile card */
        .profile-card {
            background-color: #f8f9fa; border: 2px solid #001a4d;
            border-radius: 10px; padding: 25px; text-align: center;
        }
        
        .profile-avatar {
            width: 80px; height: 80px; border-radius: 50%;
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            color: white; display: flex; align-items: center;
            justify-content: center; font-size: 28px; font-weight: bold;
            margin: 0 auto 15px;
        }
        
        .profile-card h5 { color: #001a4d; margin-bottom: 5px; }
        
        .profile-info {
            text-align: left; margin-top: 20px;
            padding-top: 20px; border-top: 1px solid #dee2e6;
        }
        
        .profile-info .info-item { padding: 8px 0; }
        .profile-info label { color: #6b7280; font-size: 12px; text-transform: uppercase; }
        .profile-info p { color: #001a4d; margin: 0; font-weight: 500; }
        
        /* Job card */
        .job-card {
            background-color: #f8f9fa; border: 2px solid #001a4d;
            border-radius: 10px; padding: 20px; margin-bottom: 15px;
            transition: all 0.3s;
        }
        .job-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
        .job-card h5 { color: #001a4d; font-weight: 600; margin-bottom: 5px; }
        .job-card .company { color: #6b7280; font-size: 14px; margin-bottom: 10px; }
        .job-card .details { display: flex; gap: 20px; color: #6b7280; font-size: 13px; margin-bottom: 15px; }
        
        /* Clearance card */
        .clearance-card {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            border-radius: 10px; padding: 30px; color: white;
        }
        .clearance-card h4 { color: #ffd700; margin-bottom: 10px; }
        .clearance-card .validity { font-size: 14px; opacity: 0.9; margin-bottom: 20px; }
        
        @media (max-width: 768px) {
            .datetime-bar { flex-direction: column; text-align: center; }
            .clock-container { flex-direction: column; }
            .analog-clock { width: 100px; height: 100px; }
        }
    </style>
</head>
<body>
    @include('components.employee-navbar')
    <main>
        <div class="container" style="max-width: 1200px;">
            
            <!-- Enhanced Clock and Full Calendar Bar -->
            <div class="datetime-bar">
                <!-- Analog Clock with Digital Time -->
                <div class="clock-container">
                    <div class="analog-clock">
                        <div class="clock-number n12">12</div>
                        <div class="clock-number n3">3</div>
                        <div class="clock-number n6">6</div>
                        <div class="clock-number n9">9</div>
                        <div class="clock-hand hour-hand" id="hourHand"></div>
                        <div class="clock-hand minute-hand" id="minuteHand"></div>
                        <div class="clock-hand second-hand" id="secondHand"></div>
                        <div class="clock-center"></div>
                    </div>
                    <div class="digital-time">
                        <div class="time-display" id="digitalTime">00:00:00</div>
                        <div class="time-period" id="timePeriod">AM</div>
                        <div class="date-display" id="fullDate">Loading...</div>
                    </div>
                </div>
                
                <!-- Full Calendar -->
                <div class="calendar-wrapper">
                    <div class="calendar-header">
                        <span class="calendar-nav" onclick="changeMonth(-1)"><i class="fas fa-chevron-left"></i></span>
                        <h4 id="calendarMonthYear">January 2025</h4>
                        <span class="calendar-nav" onclick="changeMonth(1)"><i class="fas fa-chevron-right"></i></span>
                    </div>
                    <div class="calendar-grid" id="calendarGrid"></div>
                </div>
            </div>
            
            <!-- Action Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="action-card">
                        <h3><i class="fas fa-search me-2"></i>Find Jobs</h3>
                        <p>Browse available job vacancies in your area.</p>
                        <button class="btn">Search Jobs</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="action-card">
                        <h3><i class="fas fa-user-edit me-2"></i>Edit Profile</h3>
                        <p>Update your profile information and skills.</p>
                        <button class="btn">Update Profile</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="action-card">
                        <h3><i class="fas fa-file-download me-2"></i>Get Clearance</h3>
                        <p>Download or print your PESO clearance.</p>
                        <button class="btn">Download</button>
                    </div>
                </div>
            </div>
            
            <div class="row g-4">
                <!-- Profile Section -->
                <div class="col-md-4">
                    <div class="profile-card">
                        <div class="profile-avatar">JS</div>
                        <h5>John Smith</h5>
                        <p style="color: #6b7280; margin-bottom: 15px;">Job Seeker</p>
                        <button class="btn-action">Edit Profile</button>
                        
                        <div class="profile-info">
                            <div class="info-item"><label>Email</label><p>john.smith@email.com</p></div>
                            <div class="info-item"><label>Phone</label><p>0912 345 6789</p></div>
                            <div class="info-item"><label>Location</label><p>Manolo Fortich, Bukidnon</p></div>
                        </div>
                    </div>
                </div>
                
                <!-- Main Content -->
                <div class="col-md-8">
                    <h2 style="display:flex; align-items:center; text-align:center; width:100%; margin-bottom: 30px;">
                        <span style="flex:1; height:3px; background:#FF2D2D;"></span>
                        <span style="padding:0 15px; font-weight:700; color: #001a4d;">My Applications</span>
                        <span style="flex:1; height:3px; background:#FF2D2D;"></span>
                    </h2>
                    
                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Company</th>
                                    <th>Date Applied</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Software Developer</td><td>Tech Corp Inc.</td><td>Jan 15, 2025</td><td><span class="status-badge status-interview"> Interview</span></td></tr>
                                <tr><td>Graphic Designer</td><td>Creative Studios</td><td>Jan 14, 2025</td><td><span class="status-badge status-pending">Pending</span></td></tr>
                                <tr><td>Marketing Manager</td><td>Business Solutions</td><td>Jan 10, 2025</td><td><span class="status-badge status-hired">Hired</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <h2 style="display:flex; align-items:center; text-align:center; width:100%; margin-bottom: 30px; margin-top: 40px;">
                        <span style="flex:1; height:3px; background:#FF2D2D;"></span>
                        <span style="padding:0 15px; font-weight:700; color: #001a4d;">Latest Job Vacancies</span>
                        <span style="flex:1; height:3px; background:#FF2D2D;"></span>
                    </h2>
                    
                    <div class="job-card">
                        <div class="row">
                            <div class="col-md-9">
                                <h5>Senior Software Engineer</h5>
                                <p class="company">Tech Innovations Philippines</p>
                                <div class="details">
                                    <span><i class="fas fa-map-marker-alt"></i> Manolo Fortich</span>
                                    <span><i class="fas fa-money-bill-wave"></i> ₱45,000 - ₱60,000</span>
                                    <span><i class="fas fa-clock"></i> Full Time</span>
                                </div>
                            </div>
                            <div class="col-md-3 text-end">
                                <button class="btn-success-custom">Apply Now</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="job-card">
                        <div class="row">
                            <div class="col-md-9">
                                <h5>Marketing Coordinator</h5>
                                <p class="company">Growth Marketing Inc.</p>
                                <div class="details">
                                    <span><i class="fas fa-map-marker-alt"></i> Manolo Fortich</span>
                                    <span><i class="fas fa-money-bill-wave"></i> ₱25,000 - ₱35,000</span>
                                    <span><i class="fas fa-clock"></i> Full Time</span>
                                </div>
                            </div>
                            <div class="col-md-3 text-end">
                                <button class="btn-success-custom">Apply Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- PESO Clearance -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="clearance-card">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4><i class="fas fa-file-alt me-2"></i>PESO Clearance</h4>
                                <p class="validity mb-0">Your PESO Clearance is valid and active. You can download or print it anytime.</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <p class="mb-1"><strong>Date Issued:</strong> December 15, 2024</p>
                                <p class="mb-3"><strong>Valid Until:</strong> December 15, 2025</p>
                                <button class="btn" style="background: white; color: #001a4d;">
                                    <i class="fas fa-download me-2"></i> Download Clearance
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
    
    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        let currentDate = new Date();
        let currentMonth = currentDate.getMonth();
        let currentYear = currentDate.getFullYear();
        
        const eventDays = [5, 10, 15, 20, 25]; // Days with events
        
        function updateDateTime() {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            
            const hours12 = hours % 12 || 12;
            const period = hours >= 12 ? 'PM' : 'AM';
            document.getElementById('digitalTime').textContent = 
                `${String(hours12).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            document.getElementById('timePeriod').textContent = period;
            
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('fullDate').textContent = now.toLocaleDateString('en-US', options);
            
            const hourDeg = (hours % 12) * 30 + (minutes / 2);
            const minuteDeg = minutes * 6 + (seconds / 10);
            const secondDeg = seconds * 6;
            
            document.getElementById('hourHand').style.transform = `translateX(-50%) rotate(${hourDeg}deg)`;
            document.getElementById('minuteHand').style.transform = `translateX(-50%) rotate(${minuteDeg}deg)`;
            document.getElementById('secondHand').style.transform = `translateX(-50%) rotate(${secondDeg}deg)`;
        }
        
        function renderCalendar() {
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
                              'July', 'August', 'September', 'October', 'November', 'December'];
            
            document.getElementById('calendarMonthYear').textContent = `${monthNames[currentMonth]} ${currentYear}`;
            
            const firstDay = new Date(currentYear, currentMonth, 1).getDay();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
            const daysInPrevMonth = new Date(currentYear, currentMonth, 0).getDate();
            
            const today = new Date();
            const isCurrentMonth = today.getMonth() === currentMonth && today.getFullYear() === currentYear;
            
            let calendarHTML = '';
            const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            
            dayNames.forEach(day => {
                calendarHTML += `<div class="calendar-day-header">${day}</div>`;
            });
            
            // Previous month days
            for (let i = firstDay - 1; i >= 0; i--) {
                calendarHTML += `<div class="calendar-day other-month">${daysInPrevMonth - i}</div>`;
            }
            
            // Current month days
            for (let day = 1; day <= daysInMonth; day++) {
                let classes = 'calendar-day';
                if (isCurrentMonth && today.getDate() === day) classes += ' today';
                if (eventDays.includes(day)) classes += ' has-event';
                calendarHTML += `<div class="${classes}">${day}</div>`;
            }
            
            // Next month days
            const totalCells = firstDay + daysInMonth;
            const remainingCells = 42 - totalCells;
            for (let i = 1; i <= remainingCells; i++) {
                calendarHTML += `<div class="calendar-day other-month">${i}</div>`;
            }
            
            document.getElementById('calendarGrid').innerHTML = calendarHTML;
        }
        
        function changeMonth(delta) {
            currentMonth += delta;
            if (currentMonth > 11) { currentMonth = 0; currentYear++; }
            if (currentMonth < 0) { currentMonth = 11; currentYear--; }
            renderCalendar();
        }
        
        updateDateTime();
        setInterval(updateDateTime, 1000);
        renderCalendar();
    </script>
</body>
</html>
