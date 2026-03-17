<!-- Consistent Sidebar for All Admin Pages -->
<div class="dashboard-sidebar" id="dashboardSidebar">
    <a href="{{ route('dashboard') }}" class="sidebar-icon-btn {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="fas fa-home"></i><span>Home</span>
    </a>
    <a href="{{ route('admin.pending') }}" class="sidebar-icon-btn {{ request()->routeIs('admin.pending') ? 'active' : '' }}">
        <i class="fas fa-list"></i><span>All Jobs</span>
        @if(isset($pendingJobsCount) && $pendingJobsCount > 0)
            <span class="sidebar-badge">{{ $pendingJobsCount }}</span>
        @endif
    </a>
    <a href="{{ route('admin.archive') }}" class="sidebar-icon-btn {{ request()->routeIs('admin.archive') ? 'active' : '' }}">
        <i class="fas fa-archive"></i><span>Archive</span>
    </a>
    <div class="sidebar-divider"></div>
    <a href="#" class="sidebar-icon-btn"><i class="fas fa-file-alt"></i><span>Clearances</span></a>
    <a href="#" class="sidebar-icon-btn"><i class="fas fa-chart-line"></i><span>Reports</span></a>
    <div class="sidebar-divider"></div>
    <a href="#" class="sidebar-icon-btn"><i class="fas fa-cog"></i><span>Settings</span></a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="sidebar-icon-btn" style="border: none; cursor: pointer; width: 55px;">
            <i class="fas fa-sign-out-alt"></i><span>Logout</span>
        </button>
    </form>
</div>
