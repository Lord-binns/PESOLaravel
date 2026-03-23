<!-- Admin Sidebar - Consistent across all admin pages -->
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
    <a href="{{ route('admin.profile') }}" class="sidebar-icon-btn {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
        <i class="fas fa-user"></i><span>Profile</span>
    </a>
    <a href="{{ route('admin.settings') }}" class="sidebar-icon-btn {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
        <i class="fas fa-cog"></i><span>Settings</span>
    </a>
    <div class="sidebar-divider"></div>
    <form action="{{ route('logout') }}" method="POST" style="width: 55px;">
        @csrf
        <button type="submit" class="sidebar-icon-btn" style="border: none; cursor: pointer;">
            <i class="fas fa-sign-out-alt"></i><span>Logout</span>
        </button>
    </form>
</div>
