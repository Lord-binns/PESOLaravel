<header class="site-header">
    <div class="container header-inner" style="display:flex; align-items:center;">
        
        <a class="brand" href="#" style="display: flex; align-items: center; gap: 15px; text-decoration: none; color: #ffffff;">
            <x-application-logo class="application-logo" style="width:70px; height:auto;" />
            
            <div style="display: flex; flex-direction: column;">
                <span class="brand-text" style="font-size: 1.1rem; line-height: 1; color: #ffffff; opacity: 0.9;">
                    Public Employment Service Office
                </span>
                <h1 class="site-title" style="font-size: 3rem; color: #f8ce00; margin: 0; line-height: 1.1;">
                    <strong>Manolo Fortich</strong>
                </h1>
            </div>
        </a>
       
        <nav class="nav" aria-label="Main navigation">

            <div class="nav-item" style="position:relative; margin-right:1.5rem;">
                <a class="btn" href="#">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    HOME
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Placeholder A</a></li>
                    <li><a href="#">Placeholder B</a></li>
                </ul>
            </div>

            <div class="nav-item" style="position:relative; margin-right:1.5rem;">
                <a class="btn" href="#">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="12" cy="12" r="1"/>
                        <path d="M12 1v6m0 6v6M4.22 4.22l4.24m2.12 4.24 2.12l4.24 4.24M1 12h6m6 0h6m-15.78 7.78l4.24-4.24m2.12-2.12l4.24-4.24"/>
                    </svg>
                    GET TO KNOW US
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Our Team</a></li>
                    <li><a href="#">Our History</a></li>
                </ul>
            </div>

            <div class="nav-item" style="position:relative; margin-right:1.5rem;">
                <a class="btn" href="#">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                    SERVICES
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Placeholder Service 1</a></li>
                    <li><a href="#">Placeholder Service 2</a></li>
                </ul>
            </div>

        </nav>

        <!-- Right Section - Transparent background (no gradient) -->
        <div class="nav-right" style="display: flex; align-items: center; padding: 0 25px; height: 80px; margin-right: -1.5rem;">

            <!-- Search Icon Button - transparent bg -->
            <div class="nav-item" style="margin-right: 1rem;">
                <a class="btn search-btn" href="#" onclick="toggleSearch()" title="Search">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffd700" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.35-4.35"/>
                    </svg>
                </a>
            </div>

            <div class="nav-item">
                <a class="btn btn-ghost" href="#">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Sign In
                </a>
            </div>
        </div>
    </div>

    <!-- Search Overlay (hidden by default) -->
    <div id="search-overlay" style="display: none; position: absolute; top: 100%; right: 150px; background: #fff; padding: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); z-index: 1000; border-radius: 8px;">
        <form action="#" method="GET" style="display: flex; align-items: center; gap: 8px;">
            <input 
                type="text" 
                name="search" 
                placeholder="Search..." 
                style="padding: 8px 12px; border: 2px solid #ffd700; border-radius: 20px; outline: none; font-size: 14px; width: 200px; color: #001a4d;"
                autofocus
            >
            <button 
                type="submit" 
                style="padding: 8px 12px; background: #ffd700; color: #001a4d; border: none; border-radius: 20px; cursor: pointer;"
            >
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
    if (searchOverlay.style.display === 'none') {
        searchOverlay.style.display = 'block';
    } else {
        searchOverlay.style.display = 'none';
    }
}
</script>

<style>

/* HEADER LAYOUT - with smoother color transitions only */
.site-header {
    background: linear-gradient(to right, 
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
}

.header-inner {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    flex-wrap: nowrap !important;
}

/* Override Bootstrap container */
.header-inner.container {
    max-width: none !important;
    padding-left: 1.5rem !important;
    padding-right: 0 !important;
    width: 100% !important;
}

/* BRAND (left side) */
.brand {
    display: flex !important;
    align-items: center !important;
    gap: 15px;
    text-decoration: none;
    color: #ffffff;
    flex-shrink: 0 !important;
}

.site-title {
    white-space: nowrap;
}

/* NAV CONTAINER */
.nav {
    display: flex !important;
    align-items: center !important;
    gap: 0.1rem;
    margin-left: 3rem;
    flex-shrink: 0 !important;
}

/* NAV BUTTONS */
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
}

.dropdown-menu li a {
    display: block;
    padding: 0.5rem 1rem;
    color: #001a4d;
    text-decoration: none;
}

.nav-item:hover .dropdown-menu {
    display: block;
}

/* RIGHT NAV SECTION - Transparent background */
.nav-right {
    display: flex !important;
    align-items: center !important;
    background: transparent !important;
    margin-right: 0 !important;
}

.nav-right .btn {
    color: white !important;
    background: transparent !important;
    border: none !important;
    padding: 8px 12px;
}

/* Search button - transparent bg */
.search-btn {
    background: transparent !important;
}

</style>
