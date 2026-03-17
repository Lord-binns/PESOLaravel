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
                <a class="btn" href="/jobs">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                    JOBS
                </a>
            </div>

            <div class="nav-item">
                <a class="btn" href="#">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="12" cy="12" r="1"/>
                        <path d="M12 1v6m0 6v6M4.22 4.22l4.24m2.12 4.24 2.12l4.24 4.24M1 12h6m6 0h6m-15.78 7.78l4.24-4.24m2.12-2.12l4.24-4.24"/>
                    </svg>
                    ABOUT
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/about') }}">About</a></li>
                    <li><a href="{{ url('/history') }}">History</a></li>
                    <li><a href="{{ url('/accomplishments') }}">Accomplishments</a></li>
                </ul>
            </div>

            <div class="nav-item">
                <a class="btn" href="#skills-services">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                    SERVICES
                </a>
            </div>

        </nav>

        <!-- Right Section - Login/Register -->
        <div class="nav-right">
            <div class="nav-item">
                <a class="btn auth-btn" href="{{ route('login') }}">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 7v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1z"/>
                        <path d="M17 7v12a1 1 0 0 0 2 0V7a1 1 0 0 0-2 0z"/>
                    </svg>
                    Login
                </a>
            </div>
            <div class="nav-item">
                <a class="btn auth-btn" href="{{ route('register') }}">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="19" y1="10" x2="19" y2="14"/>
                        <line x1="5" y1="10" x2="5" y2="14"/>
                        <circle cx="12" cy="12" r="8"/>
                        <polyline points="12,2 12,4 16,8 20,8 20,12 20,16 16,20 12,20 12,18"/>
                    </svg>
                    Register
                </a>
            </div>
        </div>
</header>

<script>
document.getElementById('navbarToggler').addEventListener('click', function() {
    document.getElementById('mainNav').classList.toggle('active');
    document.querySelector('.nav-right').classList.toggle('active');
});
</script>

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
    padding: 6px 10px;
    font-size: 14px;
}

.nav-right .auth-btn {
    border-radius: 20px;
    transition: all 0.3s ease;
    margin-left: 5px;
}

.nav-right .auth-btn:hover {
    background: rgba(255,215,0,0.2);
    transform: translateY(-1px);
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
