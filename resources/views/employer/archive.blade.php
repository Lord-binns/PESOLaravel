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
        body { background-color: #ffffff; color: #333333; }
        main { background: #ffffff; padding: 40px 20px; }
        
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
        
        /* Archive Cards */
        .section-title {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .archive-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 4px solid #6c757d;
        }
        
        .archive-card:hover { transform: translateX(5px); }
        
        .archive-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px; }
        .archive-title { font-size: 18px; font-weight: 700; color: #001a4d; margin: 0; }
        .archive-reason { 
            padding: 5px 12px; 
            border-radius: 20px; 
            font-size: 12px; 
            font-weight: 600;
            background: #6c757d;
            color: white;
        }
        
        .archive-details { display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 10px; }
        .archive-detail { display: flex; align-items: center; gap: 5px; color: #666; font-size: 14px; }
        .archived-date { font-size: 12px; color: #999; }
        
        .archive-actions { display: flex; gap: 10px; margin-top: 15px; }
        .btn-action { padding: 8px 15px; border-radius: 5px; font-size: 13px; border: none; cursor: pointer; transition: all 0.3s; }
        .btn-restore { background: #28a745; color: white; }
        .btn-restore:hover { background: #218838; }
        .btn-delete { background: #dc3545; color: white; }
        .btn-delete:hover { background: #c82333; }
        
        .empty-state { text-align: center; padding: 40px; color: #666; }
        .empty-state i { font-size: 60px; color: #ddd; margin-bottom: 20px; }
        
        @media (max-width: 768px) {
            .dashboard-sidebar { display: none; }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>
    @include('components.employer-navbar')
    
    <!-- Sidebar -->
    <div class="dashboard-sidebar" id="dashboardSidebar">
        <a href="{{ url('/employer/dashboard') }}" class="sidebar-icon-btn"><i class="fas fa-th-large"></i><span>Home</span></a>
        <a href="{{ url('/employer/post-job') }}" class="sidebar-icon-btn"><i class="fas fa-plus-circle"></i><span>Post</span></a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-briefcase"></i><span>Posts</span></a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-users"></i><span>Applicants</span></a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-chart-line"></i><span>Analytics</span></a>
        <div class="sidebar-divider"></div>
        <a href="{{ url('/employer/archive') }}" class="sidebar-icon-btn active"><i class="fas fa-archive"></i><span>Archive</span></a>
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
        
        <div class="section-title">
            <i class="fas fa-archive"></i> Archived Jobs
        </div>
        
        @if($archivedJobs->count() > 0)
            @foreach($archivedJobs as $job)
                <div class="archive-card">
                    <div class="archive-header">
                        <div>
                            <h5 class="archive-title">{{ $job->position_title }}</h5>
                            <div class="archive-details">
                                <span class="archive-detail"><i class="fas fa-money-bill-wave"></i> {{ $job->salary }}</span>
                                <span class="archive-detail"><i class="fas fa-map-marker-alt"></i> {{ $job->place_of_work }}</span>
                            </div>
                        </div>
                        <span class="archive-reason">
                            @if($job->archived_reason == 'manual') Archived
                            @elseif($job->archived_reason == 'expired') Expired
                            @else {{ ucfirst($job->archived_reason) }}
                            @endif
                        </span>
                    </div>
                    <div class="archived-date">
                        <i class="fas fa-clock"></i> Archived on: {{ \Carbon\Carbon::parse($job->archived_at)->format('M d, Y - h:i A') }}
                    </div>
                    <div class="archive-actions">
                        <form action="{{ route('employer.archive.restore', $job->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn-action btn-restore"><i class="fas fa-trash-restore"></i> Restore</button>
                        </form>
                        <form action="{{ route('employer.archive.delete', $job->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to permanently delete this job?');">
                            @csrf
                            <button type="submit" class="btn-action btn-delete"><i class="fas fa-times"></i> Delete Permanently</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty-state">
                <i class="fas fa-archive"></i>
                <h5>No Archived Jobs</h5>
                <p>Jobs you archive will appear here</p>
                <a href="{{ url('/employer/dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
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
    </script>
</body>
</html>
