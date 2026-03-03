<header class="site-header">
    <div class="container header-inner" style="display:flex; align-items:center;">
        <a class="brand" href="#" style="display: flex; align-items: center; gap: 15px;">
            <x-application-logo class="application-logo" style="width:70px; height:auto;" />
            
            <div style="display: flex; flex-direction: column;">
                <span class="brand-text" style="font-size: 1.1rem; line-height: 1;">
                    Public Employment Service Office
                </span>
                <h1 class="site-title" style="font-size: 3rem; margin: 0; line-height: 1.1;">
                    <strong>Manolo Fortich</strong>
                </h1>
            </div>
        </a>
       
        <nav class="nav" aria-label="Main navigation" style="display:flex; align-items:center; flex:1;">
            <div class="nav-item" style="position:relative; margin-right:1rem;">
                <a class="btn" href="#">Home</a>
                <ul class="dropdown-menu" style="display:none; position:absolute; top:100%; left:0; background:#fff; list-style:none; padding:0.5rem 0; box-shadow:0 2px 8px rgba(0,0,0,0.15);">
                    <li><a href="#" style="display:block; padding:0.25rem 1rem;">Placeholder A</a></li>
                    <li><a href="#" style="display:block; padding:0.25rem 1rem;">Placeholder B</a></li>
                </ul>
            </div>

            <div class="nav-item" style="position:relative; margin-right:1rem;">
                <a class="btn" href="#">About</a>
                <ul class="dropdown-menu" style="display:none; position:absolute; top:100%; left:0; background:#fff; list-style:none; padding:0.5rem 0; box-shadow:0 2px 8px rgba(0,0,0,0.15);">
                    <li><a href="#" style="display:block; padding:0.25rem 1rem;">Our Team</a></li>
                    <li><a href="#" style="display:block; padding:0.25rem 1rem;">Our History</a></li>
                </ul>
            </div>

            <div class="nav-item" style="position:relative; margin-right:1rem;">
                <a class="btn" href="#">Services</a>
                <ul class="dropdown-menu" style="display:none; position:absolute; top:100%; left:0; background:#fff; list-style:none; padding:0.5rem 0; box-shadow:0 2px 8px rgba(0,0,0,0.15);">
                    <li><a href="#" style="display:block; padding:0.25rem 1rem;">Placeholder Service 1</a></li>
                    <li><a href="#" style="display:block; padding:0.25rem 1rem;">Placeholder Service 2</a></li>
                </ul>
            </div>

            <div class="nav-item" style="margin-left:auto;">
                <a class="btn btn-ghost" href="#">Sign In</a>
            </div>
        </nav>
    </div>
</header>

<style>
.nav-item:hover .dropdown-menu { display: block !important; }
</style>
