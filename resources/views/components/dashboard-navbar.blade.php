<header class="dashboard-header">
    <div class="header-container">
        
        <a class="brand" href="{{ url('/') }}">
            <x-application-logo class="application-logo" />
            
            <div class="brand-text-wrap">
                <span class="brand-text">PESO Manolo Fortich</span>
                <h1 class="site-title">Dashboard</h1>
            </div>
        </a>
       
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" id="navbarToggler" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="nav" id="mainNav">

            <div class="nav-item">
                <a class="btn" href="{{ url('/dashboard') }}">
                    <i class="fas fa-home"></i>
                    HOME
                </a>
            </div>

            <div class="nav-item">
                <a class="btn" href="#">
                    <i class="fas fa-bell"></i>
                    NOTIFICATIONS
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">New Application</a></li>
                    <li><a href="#"> Interview Schedule</a></li>
                    <li><a href="#">Job Updates</a></li>
                </ul>
            </div>

            <div class="nav-item">
                <a class="btn" href="#">
                    <i class="fas fa-calendar-alt"></i>
                    EVENTS
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Job Fairs</a></li>
                    <li><a href="#">Training Sessions</a></li>
                    <li><a href="#">Seminars</a></li>
                </ul>
            </div>

            <div class="nav-item">
                <a class="btn" href="#">
                    <i class="fas fa-cog"></i>
                    SETTINGS
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile Settings</a></li>
                    <li><a href="#">Account Settings</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
            </div>

        </nav>

        <!-- Right Section - User Menu -->
        <div class="nav-right">
            <div class="nav-item user-menu">
                <a class="btn user-btn" href="#">
                    <div class="user-avatar">JS</div>
                    <span class="user-name">John Smith</span>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="dropdown-menu user-dropdown">
                    <li><a href="#"><i class="fas fa-user"></i> My Profile</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                    <li><a href="#"><i class="fas fa-question-circle"></i> Help</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<script>
document.getElementById('navbarToggler').addEventListener('click', function() {
    document.getElementById('mainNav').classList.toggle('active');
    document.querySelector('.nav-right').classList.toggle('active');
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
    position: relative;
}

.header-container {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    flex-wrap: nowrap !important;
    padding: 0 1.5rem;
    height: 80px;
    max-width: 100% !important;
    margin: 0 auto !important;
    width: 100% !important;
}

/* BRAND */
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

/* Mobile Toggle */
.navbar-toggler {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: transparent;
    border: none;
    padding: 10px;
    cursor: pointer;
}

.navbar-toggler span {
    display: block;
    width: 25px;
    height: 3px;
    background: white;
    border-radius: 2px;
}

/* NAV */
.nav {
    display: flex !important;
    align-items: center !important;
    gap: 0.1rem;
    margin-left: 3rem;
    flex-shrink: 0 !important;
}

.nav .btn {
    color: white !important;
    display: flex !important;
    align-items: center !important;
    gap: 0.5rem;
    white-space: nowrap;
    text-decoration: none;
    font-weight: 500;
    background: transparent !important;
    border: none !important;
    padding: 8px 12px;
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
    margin-right: 1.5rem;
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

/* RIGHT NAV - User Menu */
.nav-right {
    display: flex !important;
    align-items: center !important;
    background: transparent !important;
    margin-right: 0 !important;
    padding: 0 25px;
    height: 80px;
}

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
    
    .nav {
        display: none !important;
        flex-direction: column;
        align-items: flex-start !important;
        width: 100%;
        order: 5;
        margin-left: 0;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid rgba(255,255,255,0.2);
    }
    
    .nav.active {
        display: flex !important;
    }
    
    .nav .btn {
        width: 100%;
        justify-content: flex-start;
        padding: 12px 0;
    }
    
    .nav-item {
        width: 100%;
        margin-right: 0;
    }
    
    .dropdown-menu {
        position: static;
        box-shadow: none;
        background: rgba(0,0,0,0.2);
        padding-left: 20px;
        width: 100%;
    }
    
    .dropdown-menu li a {
        color: white;
    }
    
    .dropdown-menu li a:hover {
        background-color: rgba(255,255,255,0.1);
    }
    
    .nav-right {
        display: none !important;
        flex-direction: column;
        width: 100%;
        order: 6;
        padding: 15px 0;
        border-top: 1px solid rgba(255,255,255,0.2);
        height: auto;
        padding: 0;
    }
    
    .nav-right.active {
        display: flex !important;
    }
    
    .nav-right .nav-item {
        width: 100%;
    }
    
    .nav-right .btn {
        justify-content: flex-start;
        padding: 12px 0;
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
}
</style>
