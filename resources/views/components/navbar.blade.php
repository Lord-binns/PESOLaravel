<header class="site-header">
    <div class="container header-inner" style="display:flex; align-items:center;">
        <a class="brand" href="#" style="display: flex; align-items: center; gap: 15px; text-decoration: none; color: #ffffff;">
            
            <x-application-logo class="application-logo" style="width:70px; height:auto;" />
            
            <div style="display: flex; flex-direction: column;">
                <span class="brand-text" style="font-size: 1.1rem; line-height: 1; color: #ffffff; opacity: 0.9;">
                    Public Employment Service Office
                </span>
                <h1 class="site-title" style="font-size: 3rem; margin: 0; line-height: 1.1;">
                    <strong>Manolo Fortich</strong>
                </h1>
            </div>
        </a>
       
        <nav class="nav" aria-label="Main navigation" style="display:flex; align-items:center; flex:1;">
            <div class="nav-item" style="position:relative; margin-right:1.5rem;">
                <a class="btn" href="#" style="color:white; display:flex; align-items:center; gap:0.5rem;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    Home
                </a>
                <ul class="dropdown-menu" style="display:none; position:absolute; top:100%; left:0; background:#fff; list-style:none; padding:0.5rem 0; box-shadow:0 2px 8px rgba(0,0,0,0.15);">
                    <li><a href="#" style="display:block; padding:0.5rem 1rem; color:#001a4d;">Placeholder A</a></li>
                    <li><a href="#" style="display:block; padding:0.5rem 1rem; color:#001a4d;">Placeholder B</a></li>
                </ul>
            </div>

            <div class="nav-item" style="position:relative; margin-right:1.5rem;">
                <a class="btn" href="#" style="color:white; display:flex; align-items:center; gap:0.5rem;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="12" cy="12" r="1"/><path d="M12 1v6m0 6v6M4.22 4.22l4.24 4.24m2.12 2.12l4.24 4.24M1 12h6m6 0h6m-15.78 7.78l4.24-4.24m2.12-2.12l4.24-4.24"/>
                    </svg>
                    About
                </a>
                <ul class="dropdown-menu" style="display:none; position:absolute; top:100%; left:0; background:#fff; list-style:none; padding:0.5rem 0; box-shadow:0 2px 8px rgba(0,0,0,0.15);">
                    <li><a href="#" style="display:block; padding:0.5rem 1rem; color:#001a4d;">Our Team</a></li>
                    <li><a href="#" style="display:block; padding:0.5rem 1rem; color:#001a4d;">Our History</a></li>
                </ul>
            </div>

            <div class="nav-item" style="position:relative; margin-right:1.5rem;">
                <a class="btn" href="#" style="color:white; display:flex; align-items:center; gap:0.5rem;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                    Services
                </a>
                <ul class="dropdown-menu" style="display:none; position:absolute; top:100%; left:0; background:#fff; list-style:none; padding:0.5rem 0; box-shadow:0 2px 8px rgba(0,0,0,0.15);">
                    <li><a href="#" style="display:block; padding:0.5rem 1rem; color:#001a4d;">Placeholder Service 1</a></li>
                    <li><a href="#" style="display:block; padding:0.5rem 1rem; color:#001a4d;">Placeholder Service 2</a></li>
                </ul>
            </div>

            <div class="nav-item" style="margin-left:auto;">
                <a class="btn btn-ghost" href="#" style="color:white; display:flex; align-items:center; gap:0.5rem;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                    </svg>
                    Sign In
                </a>
            </div>
        </nav>
    </div>
</header>

<style>
.nav-item:hover .dropdown-menu { display: block !important; }
</style>
