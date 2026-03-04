<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>PESO Manolo Fortich</title>
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
        .card {
            background-color: #f8f9fa;
            color: #333333;
            border: 2px solid #001a4d;
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
        
        /* Main content sections - white background */
        main {
            background: #ffffff;
        }
        
        /* WHITE SECTION (Mission & Vision) */
        .white-section {
            background: #ffffff;
            color: #333333;
            padding: 4rem 0;
        }

        .white-section h1,
        .white-section h2,
        .white-section h3 {
            color: #001a4d;
        }

        /* About section - white background */
        .about {
            background: #ffffff;
            padding: 4rem 0;
        }

        /* Services section - solid dark blue background */
        .features {
            background: #001a4d !important;
            padding: 4rem 0;
        }

        /* Make text readable on dark blue */
        .features h2,
        .features h3,
        .features p {
            color: #ffffff;
        }

        .features .section-title {
            color: #ffd700;
        }

        .features .card {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            border: 2px solid #ffd700;
        }

        .features .card h3 {
            color: #ffd700;
        }

        .features .card p {
            color: #ffffff;
        }

        /* Legal Section */
        .legal-section {
            background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)), url('{{ asset("images/LogoPNG.png") }}');
            background-size: 700px;
            background-position: center;
            background-repeat: no-repeat;
            padding: 4rem 0;
            padding-top: 2rem;
            border-left: 5px solid #001a4d;
            position: relative;
            z-index: 1;
            margin-top: 2rem;
        }
        
        /* Ensure proper spacing between sections */
        .mvo-section {
            margin-bottom: 0;
        }
        
        .legal-section h2 {
            color: #001a4d;
            font-weight: bold;
        }

        .legal-section p {
            color: #333333;
            line-height: 1.8;
            text-align: justify;
        }

        /* Transparent cards for Republic Acts */
        .legal-section .card {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .legal-section .row {
            justify-content: center;
        }

        .peso-container {
            display: flex;
            max-height: 250px;
            max-width: 100%;
        }

        /* Carousel responsive */
        .carousel-item img {
            height: 655px;
            object-fit: cover;
            object-position: center;
        }

        /* Mission/Vision/Logo section responsive */
        .mvo-section {
            display: flex;
            width: 100%;
            min-height: 40vh;
            margin-bottom: 0;
        }
        
        .mvo-section + .legal-section {
            margin-top: 3rem;
        }

        .mvo-section .mission {
            flex: 1;
            background-color: #02205c;
            padding: 40px;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .mvo-section .logo-section {
            flex: 1;
            background-color: #f5f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .mvo-section .vision {
            flex: 1;
            background-color: #011a4d;
            padding: 40px;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .mvo-section h1 {
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
            color: #f8ce00;
        }

        .mvo-section p {
            font-size: 16px;
            line-height: 1.8;
            margin: 0;
        }

        /* Hero section responsive */
        .hero-inner {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 2rem;
        }

        .hero-copy {
            flex: 1 1 320px;
            min-width: 280px;
        }

        .hero-media {
            flex: 0 0 300px;
            display: flex;
            justify-content: center;
        }

        /* Cards responsive */
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
        }

        .cards .card {
            flex: 1 1 280px;
            max-width: 350px;
            min-width: 250px;
            padding: 1.5rem;
        }

        /* About grid responsive */
        .about-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-top: 2rem;
        }

        .about-grid > div {
            flex: 1 1 280px;
            min-width: 250px;
        }

        /* Mobile responsive styles */
        @media (max-width: 991px) {
            .mvo-section {
                flex-direction: column;
            }
            
            .mvo-section .mission,
            .mvo-section .vision,
            .mvo-section .logo-section {
                padding: 30px 20px;
                min-height: auto;
            }
            
            .mvo-section h1 {
                font-size: 24px;
            }
            
            .mvo-section p {
                font-size: 14px;
            }
            
            .hero-media {
                flex: 0 0 100%;
                max-width: 300px;
                margin: 0 auto;
            }
            
            .carousel-item img {
                height: 400px;
            }
        }

        @media (max-width: 576px) {
            .mvo-section .mission,
            .mvo-section .vision {
                padding: 25px 15px;
            }
            
            .mvo-section h1 {
                font-size: 20px;
                margin-bottom: 15px;
            }
            
            .mvo-section p {
                font-size: 13px;
            }
            
            .carousel-item img {
                height: 300px;
            }
            
            .white-section,
            .about,
            .features,
            .legal-section {
                padding: 3rem 0;
            }
            
            .legal-section {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .cards .card {
                flex: 1 1 100%;
                max-width: 100%;
            }
            
            .site-footer .footer-inner {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <x-navbar />

    <main>

    
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/Pic1.jpg') }}" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="https://web.manolofortich.gov.ph/web/img_lgu/carousel-8.jpg" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="https://www.web.manolofortich.gov.ph/storage/content_image/22f8936a010d95ee468d5be23f72ab16.jpg" class="d-block w-100" alt="Slide 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


 
<div class="mvo-section">

    <!-- Mission -->
    <div class="mission">
        <h1>🎯 Mission</h1>
        <p>To promote economic growth and sustainable development in Manolo Fortich through the implementation of the PESO program, providing employment opportunities and skills development for the community.</p>
    </div>


    <!-- Logo Section -->
    <div class="logo-section">
        <img src="{{ asset('images/LGU.png') }}" 
             alt="logo LGU" 
             style="width: 100%; max-width: 250px; height: auto; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.2));">
    </div>


    <!-- Vision -->
    <div class="vision">
        <h1>🌟 Vision</h1>
        <p>A premier agri-ecotourist destination with people resilient and responsible towards the environment propelled by well-governed institutions responsive to the challenges of development.</p>
    </div>

</div>

        <!-- Republic Act Information -->
        <section class="legal-section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h2 class="section-title">REPUBLIC ACT No. 10691</h2>
                                <p><strong>AN ACT DEFINING THE ROLE OF THE DEPARTMENT OF LABOR AND EMPLOYMENT (DOLE), THE LOCAL GOVERNMENT UNITS (LGUs), AND ACCREDITED NONGOVERNMENT ORGANIZATIONS (NGOs) IN THE ESTABLISHMENT AND OPERATION OF THE PUBLIC EMPLOYMENT SERVICE OFFICE (PESO), AND THE OPERATION OF JOB PLACEMENT OFFICES IN EDUCATIONAL INSTITUTIONs (Els), AMENDING FOR THE PURPOSE SECTIONS 3, 5, 6, 7 AND 9 OF REPUBLIC ACT NO. 8759, OTHERWISE KNOWN AS THE "PUBLIC EMPLOYMENT SERVICE OFFICE ACT OF 1999"</strong></p>
                                <p>This Act aims to strengthen the Public Employment Service Office (PESO) system in the Philippines by clearly defining the roles of DOLE, LGUs, and accredited NGOs in establishing and operating PESOs. It also addresses job placement services in educational institutions, ensuring better coordination between government agencies and local communities in promoting employment opportunities and workforce development.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h2 class="section-title">REPUBLIC ACT No. 8759</h2>
                                <p><strong>February 14, 2000</strong></p>
                                <p><strong>AN ACT INSTITUTIONALIZING A NATIONAL FACILITATION SERVICE NETWORK THROUGH THE ESTABLISHMENT OF A PUBLIC EMPLOYMENT SERVICE OFFICE IN EVERY PROVINCE, KEY CITY AND OTHER STRATEGIC AREAS THROUGHOUT THE COUNTRY</strong></p>
                                <p>This Act institutionalizes a national facilitation service network through the establishment of a Public Employment Service Office (PESO) in every province, key city, and other strategic areas throughout the country. The PESO serves as a linkage between jobseekers and employers, providing employment services such as job matching, career guidance, and information dissemination on labor market trends. This law aims to devolve employment services to the local government level to ensure more accessible and efficient delivery of employment assistance to the Filipino workforce.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

  
        <section id="features" class="hero white-section">
            <div class="container">
                <h2 class="section-title"> Placeholder</h2>
                <div class="cards">
                    <article class="card">
                        <h3>Fast setup</h3>
                        <p>Get started quickly with sensible defaults and clear documentation.</p>
                    </article>
                    <article class="card">
                        <h3>Reliable</h3>
                        <p>Designed for production — performance, security, and stability.</p>
                    </article>
                    <article class="card">
                        <h3>Flexible</h3>
                        <p>Integrates easily with your existing stack and workflows.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="about" class="about">
            <div class="container">
                <h2 class="section-title">About PESO</h2>
                <p class="lead">A legacy of service and excellence, PESO supports communities by connecting people to opportunities and empowering local development.</p>
                <div class="about-grid">
                    <div>
                        <h3>History</h3>
                        <p>Since its inception, PESO has been committed to delivering workforce solutions and community programs that uplift livelihoods and promote inclusive growth.</p>
                    </div>
                    <div>
                        <h3>Mission</h3>
                        <p>We deliver accessible employment services and partner with stakeholders to create sustainable opportunities for all citizens.</p>
                    </div>
                    <div>
                        <h3>Vision</h3>
                        <p>To be the leading catalyst for workforce development and local economic resilience.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="features">
            <div class="container">
                <h2 class="section-title">Services</h2>
                <div class="cards">
                    <article class="card">
                        <h3>Job Matching</h3>
                        <p>Connecting jobseekers with employers through streamlined placement services.</p>
                    </article>
                    <article class="card">
                        <h3>Training & Development</h3>
                        <p>Skill-building programs and trainings that prepare workers for in-demand roles.</p>
                    </article>
                    <article class="card">
                        <h3>Community Programs</h3>
                        <p>Local initiatives that support entrepreneurship, microbusinesses, and livelihood projects.</p>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
