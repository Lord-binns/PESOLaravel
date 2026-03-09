<header class="site-header">
    <div class="header-container">
        
        <a class="brand" href="#">
            <x-application-logo class="application-logo" />
            
            <div class="brand-text-wrap">
                <span class="brand-text">Public Employment Service Office</span>
                <h1 class="site-title">Manolo Fortich</h1>
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
                <a class="btn" href="/">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    HOME
                </a>
            </div>

            <div class="nav-item">
                <a class="btn" href="#">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="12" cy="12" r="1"/>
                        <path d="M12 1v6m0 6v6M4.22 4.22l4.24m2.12 4.24 2.12l4.24 4.24M1 12h6m6 0h6m-15.78 7.78l4.24-4.24m2.12-2.12l4.24-4.24"/>
                    </svg>
                    GET TO KNOW US
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/history') }}">Our History</a></li>
                    <li><a href="{{ url('/about') }}">Our Team</a></li>
                </ul>
            </div>

            <div class="nav-item">
                <a class="btn" href="#">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                    SERVICES
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Job Placement</a></li>
                    <li><a href="#">Skills Training</a></li>
                    <li><a href="#">Career Counseling</a></li>
                    <li><a href="#">Documentation</a></li>
                </ul>
            </div>

        </nav>

        <!-- Right Section -->
        <div class="nav-right">
            <div class="nav-item">
                <a class="btn search-btn" href="#" onclick="toggleSearch()" title="Search">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffd700" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.35-4.35"/>
                    </svg>
                </a>
            </div>

            <div class="nav-item">
                <a class="btn btn-ghost" href="{{ route('Register') }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Sign Up
                </a>
            </div>
        </div>
    </div>

    <!-- Search Overlay -->
    <div id="search-overlay">
        <form action="#" method="GET">
            <input type="text" name="search" placeholder="Search..." autofocus>
            <button type="submit">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.35-4.35"/>
                </svg>
            </button>
        </form>
    </div>
</header>

<script>
function toggleSearch() {
    var searchOverlay = document.getElementById('search-overlay');
    if (searchOverlay.style.display === 'none' || searchOverlay.style.display === '') {
        searchOverlay.style.display = 'block';
    } else {
        searchOverlay.style.display = 'none';
    }
}

document.getElementById('navbarToggler').addEventListener('click', function() {
    document.getElementById('mainNav').classList.toggle('active');
    document.querySelector('.nav-right').classList.toggle('active');
});
</script>

<style>

/* HEADER LAYOUT */
.site-header {
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
    font-size: 1.1rem;
    line-height: 1;
    color: #ffffff;
    opacity: 0.9;
}

.site-title {
    font-size: 3rem;
    color: #f8ce00;
    margin: 0;
    line-height: 1.1;
}

.application-logo {
    width: 70px;
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

/* RIGHT NAV */
.nav-right {
    display: flex !important;
    align-items: center !important;
    background: transparent !important;
    margin-right: 0 !important;
    padding: 0 25px;
    height: 80px;
}

.nav-right .btn {
    color: white !important;
    background: transparent !important;
    border: none !important;
    padding: 8px 12px;
}

.search-btn {
    background: transparent !important;
}

/* Search Overlay */
#search-overlay {
    display: none;
    position: absolute;
    top: 100%;
    right: 150px;
    background: #fff;
    padding: 15px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    z-index: 1000;
    border-radius: 8px;
}

#search-overlay input {
    padding: 8px 12px;
    border: 2px solid #ffd700;
    border-radius: 20px;
    outline: none;
    font-size: 14px;
    width: 200px;
    color: #001a4d;
}

#search-overlay button {
    padding: 8px 12px;
    background: #ffd700;
    color: #001a4d;
    border: none;
    border-radius: 20px;
    cursor: pointer;
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
    
    .brand-text {
        display: none;
    }
    
    .site-title {
        font-size: 1.5rem !important;
    }
    
    .application-logo {
        width: 50px !important;
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
    
    #search-overlay {
        right: 10px;
        left: 10px;
    }
    
    #search-overlay input {
        width: 100%;
    }
}

@media (max-width: 576px) {
    .site-title {
        font-size: 1.2rem !important;
    }
    
    .nav .btn {
        font-size: 14px;
    }
}
</style>
