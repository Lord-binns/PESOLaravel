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
            background: linear-gradient(rgba(255, 255, 255, 0.50), rgba(255, 255, 255, 0.50)), url('{{ asset("images/LogoPNG.png") }}');
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
                        <h1>History of PESO Manolo Fortich</h1>
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
                        <h3>PESO Commencement of Operations</h3>
                        <p>The Public Employment Service Office (PESO) of Manolo Fortich commenced its dynamic operations on April 13, 2005, following the approval of Resolution No. 2005-08, which sanctioned the creation of Plantilla positions under the PESO of the Local Government Unit.</p>
                    </div>
                </div>

                <!-- 2005 - Institutionalization -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="date">July 2005</span>
                        <h3>Institutionalization through Ordinance</h3>
                        <p>The PESO was institutionalized through an ordinance under the office of the Municipal Mayor, as per Sangguniang Bayan Resolution No. 2005-94. Recognizing the need for a dedicated institution to address employment challenges, the Manolo Fortich Municipal Mayor's office formalized the PESO's role under the leadership of Mayor Soccoro O. Acosta.</p>
                    </div>
                </div>

                <!-- 2005 - DOLE Agreement -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="date">October 2005</span>
                        <h3>DOLE Accreditation</h3>
                        <p>Three months later, a resolution empowering then Municipal Mayor Hon. Soccoro O. Acosta to enter into an agreement with the Department of Labor and Employment (DOLE) was passed, culminating in the accreditation of the PESO on October 26, 2005. This accreditation opened doors for collaboration with DOLE and other government agencies, enhancing the office's capacity to serve the community.</p>
                    </div>
                </div>

                <!-- 2013 - Skills Registration -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="date">January 2013</span>
                        <h3>Manpower Skills Registration System</h3>
                        <p>As leadership transitioned to Hon. Rogelio N. Quiño, the PESO continued its mission to provide quality employment services. In January 2013, a resolution supporting the establishment of the Manpower Skills Registration System underscored the office's commitment to addressing the evolving needs of job seekers.</p>
                    </div>
                </div>

                <!-- Present -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="date">Present</span>
                        <h3>Continuing Our Mission</h3>
                        <p>PESO Manolo Fortich continues to serve the community by providing employment services, job matching, skills development, and career guidance. The office remains committed to connecting jobseekers with employers and supporting the economic development of Manolo Fortich.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission & Vision Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="card-title text-primary">Mission</h3>
                                <p class="card-text">To promote economic growth and sustainable development in Manolo Fortich through the implementation of the PESO program, providing employment opportunities and skills development for the community.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="card-title text-primary">Vision</h3>
                                <p class="card-text">A premier agri-ecotourist destination with people resilient and responsible towards the environment propelled by well-governed institutions responsive to the challenges of development.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <div>© {{ date('Y') }} PESO. All rights reserved.</div>
            <nav class="footer-nav">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
            </nav>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
