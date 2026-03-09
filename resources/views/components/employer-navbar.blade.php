<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            @if(file_exists(public_path('images/LogoPNG.png')))
                <img src="{{ asset('images/LogoPNG.png') }}" alt="PESO Logo" style="height: 40px;">
            @else
                <span style="color: #ffd700; font-weight: bold;">PESO</span>
            @endif
            <span style="margin-left: 10px; font-weight: 600;">Manolo Fortich</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/employer/dashboard') }}">
                        <i class="fas fa-home me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-briefcase me-1"></i> My Jobs
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users me-1"></i> Applicants
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i> My Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="fas fa-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="{{ url('/settings') }}"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ url('/login') }}"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
</nav>

<style>
    .navbar {
        padding: 15px 0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .navbar-brand {
        font-size: 1.3rem;
    }
    
    .nav-link {
        padding: 8px 15px !important;
        border-radius: 5px;
        transition: all 0.3s;
    }
    
    .nav-link:hover {
        background: rgba(255,255,255,0.1);
    }
    
    .dropdown-menu {
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        border-radius: 10px;
        padding: 10px;
    }
    
    .dropdown-item {
        padding: 10px 15px;
        border-radius: 5px;
        color: #333;
    }
    
    .dropdown-item:hover {
        background: #001a4d;
        color: white;
    }
</style>
