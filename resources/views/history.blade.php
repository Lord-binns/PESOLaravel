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
        .btn-outline {
            color: #ffd700;
            border-color: #ffd700;
        }
        .btn-outline:hover {
            background-color: #ffd700;
            color: #001a4d;
        }
        .section-title {
            color: #001a4d;
        }
        .site-footer {
            background: linear-gradient(to right, 
                #FF0000 0%, 
                #FF0000 10%, 
                #000000 20%, 
                #030112 30%, 
                #03010f 40%, 
                #09012a 50%, 
                #010135 60%, 
                #02256a 100%
            ) !important;
            border-top: 3px solid #ffd700;
            color: #ffffff;
        }
        h1, h2, h3 {
            color: #001a4d;
        }
        
        
        /* History Page Styles */
        .history-hero {
            background: linear-gradient(rgba(0, 26, 77, 0.85), rgba(2, 32, 92, 0.85)), url('{{ asset("images/history.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 4rem 0;
        
        }
        
        .history-hero h1 {
            color: #ffd700;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .timeline {
            position: relative;
            padding: 2rem 0;
            background: linear-gradient(rgba(255, 255, 255, 0.60), rgba(255, 255, 255, 0.60)), url('{{ asset("images/LogoPNG.png") }}');
            background-size: 700px;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 100%;
            background: #ffd700;
            top: 0;
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 3rem;
            display: flex;
            justify-content: flex-end;
            padding-right: calc(50% + 30px);
        }
        
        .timeline-item:nth-child(even) {
            justify-content: flex-start;
            padding-right: 0;
            padding-left: calc(50% + 30px);
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background: #ffd700;
            border-radius: 50%;
            border: 4px solid #001a4d;
            top: 0;
        }
        
        .timeline-content {
            background: rgba(248, 249, 250, 0.85);
            padding: 2rem;
            border-radius: 10px;
            border-left: 5px solid #ffd700;
            max-width: 500px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .timeline-content h3 {
            color: #001a4d;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .timeline-content .date {
            color: #ff4444;
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .timeline-content p {
            color: #333333;
            line-height: 1.8;
        }
        
        @media (max-width: 768px) {
            .timeline::before {
                left: 20px;
            }
            
            .timeline-item,
            .timeline-item:nth-child(even) {
                padding-left: 60px;
                padding-right: 0;
                justify-content: flex-start;
            }
            
            .timeline-item::before {
                left: 20px;
            }
        }
    </style>
</head>
<body>
    <x-navbar />

    <main>
        <!-- Hero Section -->
        <section class="history-hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h1>THE HISTORY OF EXCELLENCE</h1>
                        <p class="lead">A journey of commitment to employment services and community development</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Timeline Section -->
        <section class="container">
            <div class="timeline">
                <!-- 2005 - PESO Commencement -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="date">April 13, 2005</span>
                        <h3>
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#001a4d" stroke-width="2" style="flex-shrink: 0;">
                                <path d="M3 21h18"/>
                                <path d="M5 21V7l8-4v18"/>
                                <path d="M19 21V11l-6-4"/>
                                <path d="M9 9v.01"/>
                                <path d="M9 12v.01"/>
                                <path d="M9 15v.01"/>
                                <path d="M9 18v.01"/>
                            </svg>
                            PESO Commencement of Operations
                        </h3>
                        <p>The Public Employment Service Office (PESO) of Manolo Fortich commenced its dynamic operations on April 13, 2005, following the approval of Resolution No. 2005-08, which sanctioned the creation of Plantilla positions under the PESO of the Local Government Unit.</p>
                    </div>
                </div>

                <!-- 2005 - Institutionalization -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="date">July 2005</span>
                        <h3>
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#001a4d" stroke-width="2" style="flex-shrink: 0;">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="12" y1="18" x2="12" y2="12"/>
                                <line x1="9" y1="15" x2="15" y2="15"/>
                            </svg>
                            Institutionalization through Ordinance
                        </h3>
                        <p>The PESO was institutionalized through an ordinance under the office of the Municipal Mayor, as per Sangguniang Bayan Resolution No. 2005-94. Recognizing the need for a dedicated institution to address employment challenges, the Manolo Fortich Municipal Mayor's office formalized the PESO's role under the leadership of Mayor Soccoro O. Acosta.</p>
                    </div>
                </div>

                <!-- 2005 - DOLE Agreement -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="date">October 2005</span>
                        <h3>
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#001a4d" stroke-width="2" style="flex-shrink: 0;">
                                <circle cx="12" cy="8" r="7"/>
                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
                            </svg>
                            DOLE Accreditation
                        </h3>
                        <p>Three months later, a resolution empowering then Municipal Mayor Hon. Soccoro O. Acosta to enter into an agreement with the Department of Labor and Employment (DOLE) was passed, culminating in the accreditation of the PESO on October 26, 2005. This accreditation opened doors for collaboration with DOLE and other government agencies, enhancing the office's capacity to serve the community.</p>
                    </div>
                </div>

                <!-- 2013 - Skills Registration -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="date">January 2013</span>
                        <h3>
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#001a4d" stroke-width="2" style="flex-shrink: 0;">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                                <path d="M8 14h.01"/>
                                <path d="M12 14h.01"/>
                                <path d="M16 14h.01"/>
                                <path d="M8 18h.01"/>
                                <path d="M12 18h.01"/>
                                <path d="M16 18h.01"/>
                            </svg>
                            Manpower Skills Registration System
                        </h3>
                        <p>As leadership transitioned to Hon. Rogelio N. Quiño, the PESO continued its mission to provide quality employment services. In January 2013, a resolution supporting the establishment of the Manpower Skills Registration System underscored the office's commitment to addressing the evolving needs of job seekers.</p>
                    </div>
                </div>

                <!-- Present -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="date">Present</span>
                        <h3>
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#001a4d" stroke-width="2" style="flex-shrink: 0;">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                            </svg>
                            Continuing Our Mission
                        </h3>
                        <p>PESO Manolo Fortich continues to serve the community by providing employment services, job matching, skills development, and career guidance. The office remains committed to connecting jobseekers with employers and supporting the economic development of Manolo Fortich.</p>
                    </div>
                </div>
            </div>
        </section>

 <!-- Contact Footer -->
<section id="contact-footer" style="background-color: #03153b; color: white; padding: 40px 20px; font-family: Arial, sans-serif;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; gap: 40px; justify-content: space-between;">

        <!-- Contact Info -->
        <div style="flex: 1 1 250px; min-width: 220px;">
<h2 style="margin-bottom: 15px; font-size: 1.5rem; color: #ffffff; font-weight: 700; display: flex; align-items: center;">
    Contact Us
    <span style="flex: 1; height: 2px; background-color: #FF2D2D; margin-left: 10px;"></span>
</h2>


            <p style="margin: 4px 0;">PESO Manolo Fortich</p>
            <p style="margin: 4px 0;">Manolo Fortich, Bukidnon</p>
            <p style="margin: 4px 0;">Phone: (XXX) XXX-XXXX</p>
            <p style="margin: 4px 0;">Email: <a href="mailto:peso@manolofortich.gov.ph" style="color: #ffd700; text-decoration: none;">peso@manolofortich.gov.ph</a></p>
        </div>

        <!-- Categories -->
        <div style="flex: 1 1 200px; min-width: 200px;">
<h2 style="margin-bottom: 15px; font-size: 1.5rem; color: #ffffff; font-weight: 700; display: flex; align-items: center;">
    Categories
    <span style="flex: 1; height: 2px; background-color: #FF2D2D; margin-left: 10px;"></span>
</h2>

            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 6px;">Employment Services</li>
                <li style="margin-bottom: 6px;">Training Programs</li>
                <li style="margin-bottom: 6px;">Job Fairs</li>
                <li style="margin-bottom: 6px;">Career Counseling</li>
            </ul>
        </div>

        <!-- Useful Pages -->
        <div style="flex: 1 1 200px; min-width: 200px;">
<h2 style="margin-bottom: 15px; font-size: 1.5rem; color: #ffffff; font-weight: 700; display: flex; align-items: center;">
    Useful Pages
    <span style="flex: 1; height: 2px; background-color: #FF2D2D; margin-left: 10px;"></span>
</h2>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 6px;"><a href="#" style="color: #ffd700; text-decoration: none;">Home</a></li>
                <li style="margin-bottom: 6px;"><a href="#" style="color: #ffd700; text-decoration: none;">About Us</a></li>
                <li style="margin-bottom: 6px;"><a href="#" style="color: #ffd700; text-decoration: none;">Services</a></li>
                <li style="margin-bottom: 6px;"><a href="#" style="color: #ffd700; text-decoration: none;">Contact</a></li>
            </ul>
        </div>

    </div>
</section>
    </main>

    <x-footer />
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
