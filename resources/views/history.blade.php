<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>History - PESO Manolo Fortich</title>
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
        
        /* Timeline Section */
        .timeline-section { padding: 4rem 0; background: #ffffff; }
        
        .timeline { position: relative; padding: 2rem 0; }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, #ffd700, #ff4444);
            border-radius: 2px;
        }
        
        /* Timeline item base state - hidden */
        .timeline-item {
            position: relative;
            margin-bottom: 3rem;
            display: flex;
            justify-content: flex-end;
            padding-right: calc(50% + 40px);
            opacity: 0;
            transform: translateX(-100px);
            transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
        /* Timeline item alternate - from other side */
        .timeline-item:nth-child(even) {
            justify-content: flex-start;
            padding-right: 0;
            padding-left: calc(50% + 40px);
            transform: translateX(100px);
        }
        
        /* Visible state */
        .timeline-item.visible {
            opacity: 1;
            transform: translateX(0);
        }
        
        /* Stagger delays */
        .timeline-item:nth-child(1) { transition-delay: 0.1s; }
        .timeline-item:nth-child(2) { transition-delay: 0.2s; }
        .timeline-item:nth-child(3) { transition-delay: 0.3s; }
        .timeline-item:nth-child(4) { transition-delay: 0.4s; }
        .timeline-item:nth-child(5) { transition-delay: 0.5s; }
        
        .timeline-item:nth-child(even) { transition-delay: 0.15s; }
        
        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 24px;
            height: 24px;
            background: #ffd700;
            border-radius: 50%;
            border: 4px solid #001a4d;
            z-index: 2;
            box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.3);
            opacity: 0;
            transition: opacity 0.5s ease 0.3s, transform 0.3s ease;
        }
        
        .timeline-item.visible .timeline-dot {
            opacity: 1;
        }
        
        .timeline-dot:hover {
            transform: translateX(-50%) scale(1.3);
            background: #ff4444;
        }
        
        .timeline-card {
            background: #ffffff;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            max-width: 450px;
            width: 100%;
        }
        
        /* Card appears with scale */
        .timeline-item.visible .timeline-card {
            animation: cardPopIn 0.5s ease forwards;
            animation-delay: 0.2s;
            opacity: 0;
        }
        
        @keyframes cardPopIn {
            0% { opacity: 0; transform: scale(0.8); }
            100% { opacity: 1; transform: scale(1); }
        }
        
        .timeline-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        }
        
        .timeline-card .card-img-wrapper { 
            position: relative; 
            overflow: hidden;
        }
        
        .timeline-card .card-img-top {
            height: 180px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .timeline-card:hover .card-img-top { 
            transform: scale(1.1); 
        }
        
        /* Image overlay effect */
        .timeline-card .card-img-wrapper::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(0,0,0,0.3));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .timeline-card:hover .card-img-wrapper::after {
            opacity: 1;
        }
        
        .timeline-card .card-date {
            color: #ff4444;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .timeline-card .card-body { padding: 1.5rem; }
        .timeline-card .card-title {
            color: #001a4d;
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: color 0.3s ease;
        }
        
        .timeline-card:hover .card-title {
            color: #ff4444;
        }
        
        .timeline-card .card-title i { 
            color: #ff4444;
            transition: transform 0.3s ease;
        }
        
        .timeline-card:hover .card-title i {
            transform: rotate(360deg);
        }
        
        .timeline-card .card-text { 
            color: #555555; 
            line-height: 1.7; 
            font-size: 0.95rem; 
        }
        
        /* Section Header Animation */
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        .section-header h2 { 
            color: #001a4d; 
            font-size: 2.5rem; 
            font-weight: 700; 
            margin-bottom: 1rem; 
        }
        .section-header .title-line { 
            width: 80px; 
            height: 3px; 
            background: linear-gradient(90deg, #ff4444, #ffd700); 
            margin: 0 auto;
            transform: scaleX(0);
            transition: transform 0.5s ease;
        }
        
        .section-header.visible .title-line {
            transform: scaleX(1);
        }
        
        @media (max-width: 768px) {
            .page-title { font-size: 2rem; }
            .timeline::before { left: 20px; }
            .timeline-item, .timeline-item:nth-child(even) {
                padding-left: 60px;
                padding-right: 0;
                justify-content: flex-start;
                transform: translateX(50px);
            }
            .timeline-item.visible {
                transform: translateX(0);
            }
            .timeline-dot { left: 20px; }
        }
    </style>
</head>
<body>
    <x-navbar />

    <main>
        <section class="timeline-section">
            <div class="container">
                <div class="section-header">
                    <h1 class="page-title">THE HISTORY OF EXCELLENCE</h1>
                    <p class="page-subtitle">A journey of commitment to employment services and community development</p>
                    <div class="title-line"></div>
                </div>
                
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-card">
                            <div class="card-img-wrapper">
                                <img src="{{ asset('images/PESO.png') }}" class="card-img-top" alt="PESO Commencement">
                            </div>
                            <div class="card-body">
                                <div class="card-date">April 13, 2005</div>
                                <h3 class="card-title"><i class="fas fa-building"></i> PESO Commencement</h3>
                                <p class="card-text">The Public Employment Service Office (PESO) of Manolo Fortich officially commenced operations on April 13, 2005, following the approval of Resolution No. 2005-08. This marked a significant milestone in the municipality's commitment to providing employment services to its constituents, establishing a bridge between job seekers and potential employers within the local community and beyond.</p>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-card">
                            <div class="card-img-wrapper">
                                <img src="{{ asset('images/LGU.png') }}" class="card-img-top" alt="Institutionalization">
                            </div>
                            <div class="card-body">
                                <div class="card-date">July 2005</div>
                                <h3 class="card-title"><i class="fas fa-landmark"></i> Institutionalization</h3>
                                <p class="card-text">PESO was formally institutionalized through Sangguniang Bayan Ordinance No. 2005-94, providing it with a legal framework and ensuring sustainable funding from the local government. This ordinance mandated the integration of PESO into the municipal government's organizational structure, guaranteeing its long-term operation and commitment to serving the employment needs of Manolo Fortich's residents.</p>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-card">
                            <div class="card-img-wrapper">
                                <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="DOLE Accreditation">
                            </div>
                            <div class="card-body">
                                <div class="card-date">October 2005</div>
                                <h3 class="card-title"><i class="fas fa-award"></i> DOLE Accreditation</h3>
                                <p class="card-text">PESO Manolo Fortich received official accreditation from the Department of Labor and Employment (DOLE) on October 26, 2005. This accreditation recognized the office's compliance with national standards for public employment service offices, enabling it to participate in DOLE programs and access additional resources for job placement, skills training, and livelihood development initiatives.</p>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-card">
                            <div class="card-img-wrapper">
                                <img src="{{ asset('images/Pic1.jpg') }}" class="card-img-top" alt="Skills Registration">
                            </div>
                            <div class="card-body">
                                <div class="card-date">January 2013</div>
                                <h3 class="card-title"><i class="fas fa-clipboard-list"></i> Skills Registration</h3>
                                <p class="card-text">Under the leadership of Mayor Rogelio N. Quiño, PESO established the Manpower Skills Registration System, a comprehensive database of skilled workers in Manolo Fortich. This initiative enabled better matching of local talent with employment opportunities, facilitated skills mapping of the workforce, and provided valuable data for planning training programs and economic development strategies.</p>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-card">
                            <div class="card-img-wrapper">
                                <img src="{{ asset('images/LogoLGU.png') }}" class="card-img-top" alt="Present Day">
                            </div>
                            <div class="card-body">
                                <div class="card-date">Present</div>
                                <h3 class="card-title"><i class="fas fa-heart"></i> Continuing Our Mission</h3>
                                <p class="card-text">Today, PESO Manolo Fortich continues its unwavering commitment to serving the community through comprehensive employment services, including job matching, career counseling, skills development training, job fair organization, and livelihood program assistance. The office has facilitated thousands of successful job placements and continues to forge partnerships with local businesses and national agencies to create more opportunities for the people of Manolo Fortich.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scroll Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer for scroll animations
            const observerOptions = {
                threshold: 0.15,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);
            
            // Observe all timeline items
            document.querySelectorAll('.timeline-item').forEach(item => {
                observer.observe(item);
            });
            
            // Observe section header
            const headerObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.5 });
            
            const sectionHeader = document.querySelector('.section-header');
            if (sectionHeader) {
                headerObserver.observe(sectionHeader);
            }
        });
    </script>
</body>
</html>
