<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Admin Dashboard - PESO Manolo Fortich</title>
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
        
        .stats-icons { display: flex; gap: 20px; }
        
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
            color: #fffffe;
            transition: all 0.3s;
        }
        
        .stat-icon-item:hover .stat-icon-circle { background: rgba(255,215,0,0.25); transform: scale(1.1); }
        
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
        
        .stat-icon-label { font-size: 10px; text-transform: uppercase; opacity: 0.8; }
        
        .clock-section { display: flex; align-items: center; gap: 20px; }
        
        .analog-clock {
            width: 120px; height: 120px; border-radius: 50%;
            background: linear-gradient(145deg, #0a1f4d, #001a4d);
            border: 3px solid #ffd700;
            position: relative;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.4), inset 0 0 20px rgba(0,0,0,0.5);
        }
        
        .clock-center { position: absolute; top: 50%; left: 50%; width: 12px; height: 12px; background: #ffd700; border-radius: 50%; transform: translate(-50%, -50%); z-index: 10; }
        
        .clock-hand { position: absolute; bottom: 50%; left: 50%; transform-origin: bottom center; border-radius: 3px; }
        .hour-hand { width: 4px; height: 35px; background: #ffd700; transform: translateX(-50%); }
        .minute-hand { width: 3px; height: 42px; background: #fff; transform: translateX(-50%); }
        .second-hand { width: 1px; height: 48px; background: #ff4444; transform: translateX(-50%); }
        
        .digital-time { text-align: left; }
        .digital-time .time-display { font-size: 36px; font-weight: 700; color: #ffd700; line-height: 1; font-family: 'Courier New', monospace; }
        .digital-time .date-display { font-size: 14px; color: #fff; opacity: 0.9; margin-top: 3px; }
        
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
        
        .sidebar-badge {
            position: absolute; top: -5px; right: -5px;
            background: #ff4444; color: white;
            font-size: 10px; font-weight: bold;
            min-width: 18px; height: 18px;
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
        }
        
        .main-content { margin-left: 80px; padding: 100px 20px 20px 20px; transition: margin-left 0.3s ease; flex: 1; }
        .main-content.expanded { margin-left: 0; }
        
        .section-title {
            display: flex; align-items: center; justify-content: center; gap: 10px;
            font-weight: 600; font-size: 14px; color: #001a4d; margin: 20px 0;
        }
        
        .section-title::before, .section-title::after {
            content: ""; flex: 1; height: 2px; background: #001a4d;
        }
        
        .jobs-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; }
        
        .job-card {
            background: white; border-radius: 10px; padding: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: transform 0.2s;
        }
        
        .job-card.active { border-left: 4px solid #28a745; }
        .job-card.pending { border-left: 4px solid #ffc107; }
        .job-card.rejected { border-left: 4px solid #dc3545; }
        
        .job-card:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.15); }
        
        .job-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px; }
        
        .job-title { font-size: 14px; font-weight: 700; color: #001a4d; margin: 0; line-height: 1.3; }
        
        .job-status { padding: 2px 8px; border-radius: 10px; font-size: 9px; font-weight: 600; white-space: nowrap; }
        .job-status.active { background: #d4edda; color: #155724; }
        .job-status.pending { background: #fff3cd; color: #856404; }
        .job-status.rejected { background: #f8d7da; color: #721c24; }
        
        .job-salary { font-size: 12px; color: #28a745; font-weight: 600; margin-bottom: 8px; }
        
        .job-details { display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 10px; }
        .job-detail { display: flex; align-items: center; gap: 5px; color: #666; font-size: 11px; }
        
        .job-actions { display: flex; gap: 8px; margin-top: 12px; padding-top: 12px; border-top: 1px solid #eee; }
        .job-actions .btn-action {
            flex: 1; padding: 8px 12px; border-radius: 6px; font-size: 12px;
            border: none; cursor: pointer; transition: all 0.3s;
            display: flex; align-items: center; justify-content: center; gap: 5px;
        }
        
        .btn-approve { background: #28a745; color: white; }
        .btn-approve:hover { background: #218838; }
        .btn-reject { background: #dc3545; color: white; }
        .btn-reject:hover { background: #c82333; }
        .btn-view { background: #001a4d; color: white; }
        .btn-view:hover { background: #002d73; }
        
        .empty-state { text-align: center; padding: 40px; color: #666; background: white; border-radius: 10px; }
        .empty-state i { font-size: 48px; color: #ddd; margin-bottom: 15px; }
        
        .alert { border-radius: 10px; border: none; }
        
        /* Modal Styles */
        .modal-header { background: #001a4d; color: white; }
        .modal-header .btn-close { filter: invert(1); }
        
        @media (max-width: 991px) { .jobs-grid { grid-template-columns: 1fr; } }
        
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
        }
    </style>
</head>
<body>
    @include('components.admin-navbar')
    
@include('components.admin-sidebar')
    
    <div class="main-content" id="mainContent">
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
            <div class="stats-icons">
                <div class="stat-icon-item">
                    <div class="stat-icon-circle"><i class="fas fa-briefcase"></i></div>
                    <span class="stat-number-badge">{{ $activeJobsCount }}</span>
                    <span class="stat-icon-label">Active Jobs</span>
                </div>
                <div class="stat-icon-item">
                    <div class="stat-icon-circle"><i class="fas fa-clock"></i></div>
                    <span class="stat-number-badge">{{ $pendingJobsCount }}</span>
                    <span class="stat-icon-label">Pending</span>
                </div>
                <div class="stat-icon-item">
                    <div class="stat-icon-circle"><i class="fas fa-building"></i></div>
                    <span class="stat-number-badge">{{ $establishmentsCount }}</span>
                    <span class="stat-icon-label">Employers</span>
                </div>
                <div class="stat-icon-item">
                    <div class="stat-icon-circle"><i class="fas fa-archive"></i></div>
                    <span class="stat-number-badge">{{ $archivedCount }}</span>
                    <span class="stat-icon-label">Archived</span>
                </div>
            </div>
            
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
        
        <!-- Active Jobs Section -->
        <div class="section-title">
            <i class="fas fa-briefcase"></i> All Active Job Posts
        </div>
        
        @if($activeJobs->count() > 0)
            <div class="jobs-grid">
                @foreach($activeJobs as $job)
                    <div class="job-card active">
                        <div class="job-header">
                            <h5 class="job-title">{{ $job->position_title }}</h5>
                            <span class="job-status active">Active</span>
                        </div>
                        <div class="job-salary">{{ $job->salary }}</div>
                        <div class="job-details">
                            <span class="job-detail"><i class="fas fa-map-marker-alt"></i> {{ $job->place_of_work }}</span>
                            <span class="job-detail"><i class="fas fa-users"></i> {{ $job->vacancy_count }} position(s)</span>
                        </div>
                        <div class="job-details">
                            <span class="job-detail"><i class="fas fa-calendar"></i> Posted: {{ \Carbon\Carbon::parse($job->posting_date)->format('M d, Y') }}</span>
                            <span class="job-detail"><i class="fas fa-calendar-check"></i> Valid until: {{ \Carbon\Carbon::parse($job->valid_until)->format('M d, Y') }}</span>
                        </div>
                        <div class="job-actions">
                            <button class="btn-action btn-view" data-bs-toggle="modal" data-bs-target="#jobModal{{ $job->id }}">
                                <i class="fas fa-eye"></i> View Details
                            </button>
                            <form action="{{ route('admin.job.reject', $job->id) }}" method="POST" style="flex: 1;">
                                @csrf
                                <button type="submit" class="btn-action btn-reject" onclick="return confirm('Are you sure you want to reject this job?');">
                                    <i class="fas fa-times"></i> Reject
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-briefcase"></i>
                <h5>No Active Jobs</h5>
                <p>There are no active job postings yet.</p>
            </div>
        @endif

    </div>
    
    <!-- Job Detail Modals -->
    @foreach($activeJobs as $job)
    <div class="modal fade" id="jobModal{{ $job->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-briefcase me-2"></i>{{ $job->position_title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Salary</label>
                            <p class="text-success fw-bold">{{ $job->salary }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Vacancy Count</label>
                            <p>{{ $job->vacancy_count }} position(s)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Place of Work</label>
                            <p><i class="fas fa-map-marker-alt me-1"></i> {{ $job->place_of_work }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nature of Work</label>
                            <p>{{ $job->nature_of_work }}</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Job Description</label>
                        <p>{{ $job->job_description }}</p>
                    </div>
                    @if($job->education_level)
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Education Level</label>
                            <p>{{ $job->education_level }}</p>
                        </div>
                        @if($job->course)
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Course</label>
                            <p>{{ $job->course }}</p>
                        </div>
                        @endif
                    </div>
                    @endif
                    @if($job->work_experience)
                    <div class="mb-3">
                        <label class="form-label fw-bold">Work Experience</label>
                        <p>{{ $job->work_experience }}</p>
                    </div>
                    @endif
                    @if($job->license_eligibility)
                    <div class="mb-3">
                        <label class="form-label fw-bold">License/Eligibility</label>
                        <p>{{ $job->license_eligibility }}</p>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Posting Date</label>
                            <p>{{ \Carbon\Carbon::parse($job->posting_date)->format('F d, Y') }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Valid Until</label>
                            <p>{{ \Carbon\Carbon::parse($job->valid_until)->format('F d, Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('admin.job.reject', $job->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to reject this job?');">
                            <i class="fas fa-times"></i> Reject Job
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    @include('components.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
                    // Get searchable text from the card
                    const title = card.querySelector('.job-title').textContent.toLowerCase();
                    const details = card.querySelector('.job-details').textContent.toLowerCase();
                    const salary = card.querySelector('.job-salary').textContent.toLowerCase();
                    
                    // Check if query matches any search field
                    if (title.includes(query) || details.includes(query) || salary.includes(query)) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Show/hide empty state if no results
                const jobsGrid = document.querySelector('.jobs-grid');
                const emptyState = document.querySelector('.empty-state');
                
                if (visibleCount === 0 && query.length > 0) {
                    if (jobsGrid && emptyState) {
                        jobsGrid.style.display = 'none';
                        // Create custom no results message if needed
                        if (!document.querySelector('.no-search-results')) {
                            const noResults = document.createElement('div');
                            noResults.className = 'empty-state no-search-results';
                            noResults.innerHTML = `
                                <i class="fas fa-search"></i>
                                <h5>No Results Found</h5>
                                <p>No jobs match your search for "<strong>${this.value}</strong>"</p>
                            `;
                            jobsGrid.parentElement.insertBefore(noResults, jobsGrid);
                        }
                    }
                } else {
                    if (jobsGrid) {
                        jobsGrid.style.display = 'grid';
                    }
                    const noResults = document.querySelector('.no-search-results');
                    if (noResults) {
                        noResults.remove();
                    }
                }
            });
        }
    </script>
</body>
</html>
