<header class="dashboard-header">
    <div class="header-container">
        
        <!-- Sidebar Toggle (Left Most) -->
        <div class="nav-item">
            <button class="btn sidebar-toggle-btn" id="sidebarToggleBtn" title="Toggle Sidebar">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Logo -->
        <a class="brand" href="{{ url('/') }}">
            <x-application-logo class="application-logo" />
            
            <div class="brand-text-wrap">
                <span class="brand-text">PESO Manolo Fortich</span>
                <h1 class="site-title">Admin Portal</h1>
            </div>
        </a>

        <!-- Search Bar (Center) -->
        <div class="nav-search">
            <div class="search-wrapper">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Search jobs, employers, applicants...">
            </div>
        </div>
       
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" id="navbarToggler" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Right Section - Notifications & User Menu -->
        <div class="nav-right">
            <!-- Notifications -->
            <div class="nav-item notification-item">
                <a class="btn notification-btn" href="#">
                    <i class="fas fa-bell notification-icon"></i>
                    <span class="notification-badge">{{ $pendingJobsCount ?? 0 }}</span>
                </a>
                <ul class="dropdown-menu notification-dropdown">
                    <li class="dropdown-header">Notifications</li>
                    <li><a href="{{ route('dashboard') }}"><i class="fas fa-clock"></i> {{ $pendingJobsCount ?? 0 }} pending job(s) for approval</a></li>
                    <li><a href="#"><i class="fas fa-user"></i> New employer registered</a></li>
                    <li class="divider"></li>
                    <li><a href="#" class="view-all">View All Notifications</a></li>
                </ul>
            </div>

            <!-- User Menu -->
            <div class="nav-item user-menu">
                <a class="btn user-btn" href="#">
                    <div class="user-avatar">AD</div>
                    <span class="user-name">Admin</span>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="dropdown-menu user-dropdown">
                    <li><a href="{{ url('/profile') }}"><i class="fas fa-user"></i> My Profile</a></li>
                    <li><a href="{{ url('/settings') }}"><i class="fas fa-cog"></i> Settings</a></li>
                    <li><a href="#"><i class="fas fa-question-circle"></i> Help</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div class="mobile-nav-overlay" id="mobileOverlay"></div>

<script>
    // Sidebar toggle functionality
    document.getElementById('sidebarToggleBtn').addEventListener('click', function() {
        const sidebar = document.querySelector('.dashboard-sidebar');
        const mainWrapper = document.querySelector('.main-wrapper');
        
        if (sidebar) {
            sidebar.classList.toggle('collapsed');
        }
        if (mainWrapper) {
            mainWrapper.classList.toggle('expanded');
        }
    });

    // Mobile navbar toggle
    document.getElementById('navbarToggler').addEventListener('click', function() {
        document.querySelector('.nav-right').classList.toggle('active');
        document.getElementById('mobileOverlay').classList.toggle('active');
    });

    document.getElementById('mobileOverlay').addEventListener('click', function() {
        document.querySelector('.nav-right').classList.remove('active');
        this.classList.remove('active');
    });
</script>

<style>

/* DASHBOARD HEADER */
.dashboard-header {
    background: linear-gradient(
        to right,
        #02205c 0%,
        #001a4d 60%,
        #020230 65%,
        #000000 70%,
        #2d0000 80%,
        #5a0202 85%,
        #8B0000 90%,
        #FF0000 100%
    ) !important;

    border-bottom: 3px solid #ffd700 !important;
    overflow: visible;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
}

.header-container {
    display: flex !important;
    align-items: center !important;
    justify-content: flex-start !important;
    flex-wrap: nowrap !important;
    padding: 0 1.5rem;
    height: 80px;
    max-width: 100% !important;
    margin: 0 auto !important;
    width: 100% !important;
    gap: 15px;
}

/* Sidebar Toggle Button - Left Most */
.sidebar-toggle-btn {
    padding: 8px 12px !important;
    font-size: 18px;
    color: white !important;
    background: transparent !important;
    border: none !important;
    cursor: pointer;
    transition: all 0.3s;
    flex-shrink: 0;
}

.sidebar-toggle-btn:hover {
    color: #ffd700 !important;
    transform: scale(1.1);
}

.sidebar-toggle-btn i {
    color: white !important;
}

/* BRAND - Next to Sidebar Toggle */
.brand {
    display: flex !important;
    align-items: center !important;
    gap: 15px;
    text-decoration: none;
    color: #ffffff;
    flex-shrink: 0 !important;
}

.brand-text-wrap {
    display: flex;
    flex-direction: column;
}

.brand-text {
    font-size: 1rem;
    line-height: 1;
    color: #ffffff;
    opacity: 0.9;
}

.site-title {
    font-size: 1.5rem;
    color: #ffd700;
    margin: 0;
    line-height: 1.1;
}

.application-logo {
    width: 50px;
    height: auto;
}

/* Search Bar - Center */
.nav-search {
    flex: 1;
    display: flex;
    justify-content: center;
    max-width: 400px;
    margin: 0 auto;
}

.search-wrapper {
    position: relative;
    width: 100%;
}

.search-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #001a4d;
    font-size: 14px;
}

.search-input {
    width: 100%;
    padding: 10px 15px 10px 40px;
    border: none;
    border-radius: 25px;
    background: white;
    color: #333;
    font-size: 14px;
    outline: none;
}

.search-input::placeholder {
    color: #666;
}

.search-input:focus {
    box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.3);
}

/* Mobile Toggle */
.navbar-toggler {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: transparent;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 1001;
}

.navbar-toggler span {
    display: block;
    width: 25px;
    height: 3px;
    background: white;
    border-radius: 2px;
    transition: all 0.3s;
}

/* Dropdown Arrow */
.dropdown-arrow {
    font-size: 10px;
    margin-left: 4px;
    opacity: 0.8;
}

/* DROPDOWN */
.nav-item {
    position: relative;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: #fff;
    list-style: none;
    padding: 0.5rem 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    z-index: 9999;
    min-width: 180px;
}

.dropdown-menu li a {
    display: block;
    padding: 0.6rem 1rem;
    color: #001a4d;
    text-decoration: none;
}

.dropdown-menu li a:hover {
    background-color: #f0f0f0;
}

.nav-item:hover .dropdown-menu {
    display: block;
}

/* RIGHT NAV - Notifications & User Menu */
.nav-right {
    display: flex !important;
    align-items: center !important;
    background: transparent !important;
    margin-left: auto !important;
    padding: 0 25px;
    height: 80px;
    gap: 10px;
}

/* Notification Bell */
.notification-item {
    position: relative;
}

.notification-btn {
    position: relative;
    padding: 8px 12px !important;
    font-size: 18px;
    color: white !important;
}

.notification-icon {
    color: white !important;
}

.notification-badge {
    position: absolute;
    top: 0;
    right: 0;
    background: #ff4444;
    color: white;
    font-size: 10px;
    padding: 2px 5px;
    border-radius: 50%;
    font-weight: bold;
}

.notification-dropdown {
    right: 0;
    left: auto;
    min-width: 280px;
}

.notification-dropdown .dropdown-header {
    font-weight: bold;
    color: #001a4d;
    padding: 0.5rem 1rem;
    border-bottom: 1px solid #dee2e6;
}

.notification-dropdown li a {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 13px;
    line-height: 1.4;
}

.notification-dropdown li a i {
    color: #001a4d;
    margin-top: 3px;
}

.notification-dropdown .view-all {
    text-align: center;
    font-weight: 600;
    color: #001a4d;
}

/* User Menu */
.user-menu {
    position: relative;
}

.user-btn {
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
    color: white !important;
    background: transparent !important;
    border: none !important;
    padding: 5px 10px !important;
}

.user-avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #ffd700;
    color: #001a4d;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 12px;
}

.user-name {
    font-weight: 500;
}

.user-dropdown {
    right: 0;
    left: auto;
}

.user-dropdown li a {
    display: flex;
    align-items: center;
    gap: 10px;
}

.user-dropdown li.divider {
    height: 1px;
    background: #dee2e6;
    margin: 5px 0;
}

/* Mobile Nav Overlay */
.mobile-nav-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 998;
}

.mobile-nav-overlay.active {
    display: block;
}

/* MOBILE STYLES */
@media (max-width: 991px) {
    .header-container {
        flex-wrap: wrap !important;
        padding: 10px 15px;
        height: auto;
        min-height: 70px;
    }
    
    .navbar-toggler {
        display: flex !important;
        order: 3;
        margin-left: auto;
        position: absolute;
        right: 15px;
        top: 20px;
    }
    
    .brand-text-wrap {
        display: none;
    }
    
    .site-title {
        font-size: 1.2rem !important;
    }
    
    .application-logo {
        width: 40px !important;
    }
    
    .nav-search {
        display: none !important;
    }
    
    .sidebar-toggle-btn {
        order: 1;
    }
    
    .brand {
        order: 2;
    }
    
    .nav-right {
        position: fixed;
        top: 70px;
        left: 0;
        right: 0;
        background: linear-gradient(
            to right,
            #02205c 0%,
            #001a4d 60%,
            #020230 65%,
            #000000 70%,
            #2d0000 80%,
            #5a0202 85%,
            #8B0000 90%,
            #FF0000 100%
        ) !important;
        flex-direction: column;
        align-items: flex-start !important;
        padding: 15px;
        height: auto;
        transform: translateX(100%);
        transition: transform 0.3s ease;
        z-index: 999;
    }
    
    .nav-right.active {
        transform: translateX(0);
    }
    
    .nav-right .nav-item {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .nav-right .notification-btn,
    .nav-right .user-btn {
        justify-content: flex-start;
        width: 100%;
        padding: 12px 0 !important;
    }
    
    .nav-right .notification-dropdown,
    .nav-right .user-dropdown {
        position: static;
        width: 100%;
        background: rgba(0, 0, 0, 0.3);
        box-shadow: none;
    }
    
    .nav-right .notification-dropdown li a,
    .nav-right .user-dropdown li a {
        color: white;
    }
    
    .nav-right .notification-dropdown li a:hover,
    .nav-right .user-dropdown li a:hover {
        background: rgba(255, 255, 255, 0.1);
    }
    
    .nav-right .dropdown-header {
        color: #ffd700 !important;
        border-bottom-color: rgba(255, 255, 255, 0.2) !important;
    }
}

@media (max-width: 576px) {
    .site-title {
        font-size: 1rem !important;
    }
    
    .nav .btn {
        font-size: 14px;
    }
    
    .user-name {
        display: none;
    }
    
    .header-container {
        padding: 10px 10px;
    }
    
    .navbar-toggler {
        right: 10px;
    }
}
</style>
