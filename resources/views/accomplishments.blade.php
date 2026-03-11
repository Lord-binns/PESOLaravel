<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>PESO Accomplishments - PESO Manolo Fortich</title>
    @if (file_exists(public_path('images/LogoPNG.png')))
        <link rel="icon" href="{{ asset('images/LogoPNG.png') }}" type="image/png">
        <link rel="apple-touch-icon" href="{{ asset('images/LogoPNG.png') }}">
    @else
        <link rel="icon" href="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png" type="image/png">
        <link rel="apple-touch-icon" href="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png">
    @endif
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css'])
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
    <style>
        body { 
            background-color: #ffffff;
            color: #333333;
        }
        .site-header {
            background-color: #001a4d;
            border-bottom: 3px solid #ffd700;
        }
        .btn-primary {
            background-color: #ff4444;
            border-color: #ff4444;
        }
        .btn-primary:hover {
            background-color: #cc0000;
        }
        .site-footer {
            background: linear-gradient(to right, #FF0000 0%, #FF0000 10%, #000000 20%, #030112 30%, #03010f 40%, #09012a 50%, #010135 60%, #02256a 100%) !important;
            border-top: 3px solid #ffd700;
            color: #ffffff;
        }
        h1, h2, h3 { color: #001a4d; }
        
        /* Clean Header - White Background with Red Side Lines */
        .page-header {
            background: #ffffff;
            padding: 60px 0;
            position: relative;
            border-left: 5px solid #ff4444;
            border-right: 5px solid #ff4444;
        }
        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: #ff4444;
        }
        .page-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: #ff4444;
        }
        .page-title {
            color: #001a4d;
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }
        .page-subtitle {
            color: #666666;
            text-align: center;
            font-size: 1.2rem;
        }
        
        /* ============================================
           ACCOMPLISHMENTS SECTION - WHITE BACKGROUND
           ============================================ */
        .accomplishments-section {
            background: #ffffff;
            padding: 5rem 0;
            position: relative;
        }

        .accomplishments-section .section-title {
            color: #001a4d;
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .accomplishments-section .section-subtitle {
            color: #666666;
            text-align: center;
            margin-bottom: 3rem;
            font-size: 1.1rem;
        }

        .accomplishments-title-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-bottom: 3rem;
        }

        .accomplishments-title-wrapper .title-line {
            height: 3px;
            width: 80px;
            background: linear-gradient(90deg, transparent, #ff4444);
        }

        .accomplishments-title-wrapper .title-line:last-child {
            background: linear-gradient(90deg, #ff4444, transparent);
        }

        .accomplishments-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .accomplishment-card {
            background: #ffffff;
            border: 2px solid #001a4d;
            border-radius: 20px;
            padding: 2.5rem 1.5rem;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .accomplishment-card:hover {
            transform: translateY(-15px) scale(1.02);
            border-color: #ff4444;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .accomplishment-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ff4444 0%, #cc0000 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 5px 20px rgba(255, 68, 68, 0.4);
        }

        .accomplishment-icon i {
            font-size: 2rem;
            color: #ffffff;
        }

        .accomplishment-card:hover .accomplishment-icon {
            transform: rotate(360deg) scale(1.1);
            box-shadow: 0 8px 30px rgba(255, 68, 68, 0.6);
        }

        .accomplishment-number {
            font-size: 3rem;
            font-weight: 800;
            color: #001a4d;
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .accomplishment-card:nth-child(1) .accomplishment-number { color: #ff4444; }
        .accomplishment-card:nth-child(2) .accomplishment-number { color: #ffd700; }
        .accomplishment-card:nth-child(3) .accomplishment-number { color: #00d4ff; }
        .accomplishment-card:nth-child(4) .accomplishment-number { color: #ff9a9e; }

        .accomplishment-label {
            color: #333333;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        @keyframes floatIcon {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .accomplishment-icon { animation: floatIcon 3s ease-in-out infinite; }

        @keyframes pulseIn {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .accomplishment-card:hover .accomplishment-number {
            animation: pulseIn 0.5s ease-in-out;
        }

        /* Info Section */
        .info-section {
            background: #b2bcd3;
            padding: 4rem 0;
        }
        .info-section h2 {
            color: #383434;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .info-section p {
            color: #fefefe;
            line-height: 1.8;
            text-align: justify;
        }

        @media (max-width: 991px) {
            .accomplishments-grid { grid-template-columns: repeat(2, 1fr); }
            .accomplishments-section .section-title { font-size: 2rem; }
        }

        @media (max-width: 576px) {
            .accomplishments-grid { grid-template-columns: 1fr; gap: 1.5rem; }
            .accomplishments-section { padding: 3rem 0; }
            .accomplishments-section .section-title { font-size: 1.5rem; }
            .accomplishment-number { font-size: 2.5rem; }
            .accomplishment-icon { width: 60px; height: 60px; }
            .accomplishment-icon i { font-size: 1.5rem; }
            .page-title { font-size: 2rem; }
        }
    </style>
</head>
<body>
    <x-navbar />



    <!-- Accomplishments Section -->
    <section class="accomplishments-section">
        <div class="container">
            <div class="accomplishments-title-wrapper">
                <span class="title-line"></span>
                <h2 class="section-title">PESO Accomplishments</h2>
                <span class="title-line"></span>
            </div>
            
            <p class="section-subtitle">Making a difference in Manolo Fortich through employment services and community development</p>
            
            <div class="accomplishments-grid">
                <div class="accomplishment-card">
                    <div class="accomplishment-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="accomplishment-number" data-target="1250">0</div>
                    <div class="accomplishment-label">Jobs Posted</div>
                </div>
                
                <div class="accomplishment-card">
                    <div class="accomplishment-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="accomplishment-number" data-target="890">0</div>
                    <div class="accomplishment-label">Job Seekers Placed</div>
                </div>
                
                <div class="accomplishment-card">
                    <div class="accomplishment-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="accomplishment-number" data-target="156">0</div>
                    <div class="accomplishment-label">Training Programs</div>
                </div>
                
                <div class="accomplishment-card">
                    <div class="accomplishment-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="accomplishment-number" data-target="78">0</div>
                    <div class="accomplishment-label">Employers Partnered</div>
                </div>
            </div>
        </div>
    </section>

    {{--  <!-- Info Section -->
    <section class="info-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>About Our Programs</h2>
                    <p>The Public Employment Service Office (PESO) Manolo Fortich is dedicated to bridging the gap between job seekers and employers. Through our comprehensive programs, we have successfully facilitated thousands of job placements, organized numerous training sessions, and established partnerships with local businesses to promote economic growth in our community.</p>
                    <p>Our accomplishments reflect our unwavering commitment to serving the people of Manolo Fortich and helping them achieve their career goals. We continue to innovate and expand our services to meet the evolving needs of the labor market.</p>
                </div>
            </div>
        </div>
    </section>  --}}

    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = { threshold: 0.2, rootMargin: '0px' };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const numberElement = entry.target.querySelector('.accomplishment-number');
                        if (numberElement && numberElement.dataset.target) {
                            animateCounter(numberElement);
                        }
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('.accomplishment-card').forEach(card => {
                observer.observe(card);
            });
            
            function animateCounter(element) {
                const target = parseInt(element.dataset.target);
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;
                
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        element.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);
            }
        });
    </script>
</body>
</html>
