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
            background: #f8f9fa;
            padding: 4rem 0;
            border-left: 5px solid #001a4d;
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

        .peso-container {
    display: flex;
    max-height: 250px;
    max-width: 100%;
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
            <img src="{{ asset('images/Pic1.jpg') }}" class="d-block w-100" alt="Slide 1" style="height: 655px; object-fit: cover; object-position: center 20%;">
        </div>
        <div class="carousel-item">
            <img src="https://web.manolofortich.gov.ph/web/img_lgu/carousel-8.jpg" class="d-block w-100" alt="Slide 2" style="height: 655px; object-fit: cover; object-position: center;">
        </div>
        <div class="carousel-item">
            <img src="https://www.web.manolofortich.gov.ph/storage/content_image/22f8936a010d95ee468d5be23f72ab16.jpg" class="d-block w-100" alt="Slide 3" style="height: 655px; object-fit: cover;">
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


{{--  <div class="peso-container" style="background-color: #03163c; padding: 2rem; margin-top: 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-white">
                <div class="left">Left Side</div>
            </div>
            <div class="col-md-4">
                <div class="card mx-auto" style="width: 100%; max-width: 18rem;">
                    <img src="https://i.pinimg.com/originals/5a/dc/ae/5adcae5e3af5cdba2bb417b92e6d05bc.gif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-white">
                <div class="right">Right Side</div>
            </div>
        </div>
    </div>
</div>  --}}
 
<div style="display: flex; width: 100%; min-height: 40vh;">

    <!-- Mission -->
    <div style="flex: 1; background-color: #02205c; padding: 40px; color: white; font-family: Arial, sans-serif; display: flex; flex-direction: column; justify-content: center;">

        <h1 style="font-size: 32px; font-weight: 700; margin-bottom: 20px; color: #f8ce00;">
            🎯 Mission
        </h1>

        <p style="font-size: 16px; line-height: 1.8; margin: 0;">
            To promote economic growth and sustainable development in Manolo Fortich through the implementation of the PESO program, providing employment opportunities and skills development for the community.
        </p>

    </div>


    <!-- Logo Section -->
    <div style="flex: 1; background-color: #f5f4f4; display: flex; align-items: center; justify-content: center; padding: 20px;">

        <img src="{{ asset('images/LGU.png') }}" 
             alt="logo LGU" 
             style="width: 100%; max-width: 250px; height: auto; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.2));">

    </div>


    <!-- Vision -->
    <div style="flex: 1; background-color: #011a4d; padding: 40px; color: white; font-family: Arial, sans-serif; display: flex; flex-direction: column; justify-content: center;">

        <h1 style="font-size: 32px; font-weight: 700; margin-bottom: 20px; color: #f8ce00;">
            🌟 Vision
        </h1>

        <p style="font-size: 16px; line-height: 1.8; margin: 0;">
            A premier agri-ecotourist destination with people resilient and responsible towards the environment propelled by well-governed institutions responsive to the challenges of development.
        </p>

    </div>

</div>

        <!-- Republic Act Information -->
        <section class="legal-section">
            <div class="container">
                <h2 class="section-title">REPUBLIC ACT No. 10691</h2>
                <p><strong>AN ACT DEFINING THE ROLE OF THE DEPARTMENT OF LABOR AND EMPLOYMENT (DOLE), THE LOCAL GOVERNMENT UNITS (LGUs), AND ACCREDITED NONGOVERNMENT ORGANIZATIONS (NGOs) IN THE ESTABLISHMENT AND OPERATION OF THE PUBLIC EMPLOYMENT SERVICE OFFICE (PESO), AND THE OPERATION OF JOB PLACEMENT OFFICES IN EDUCATIONAL INSTITUTIONs (Els), AMENDING FOR THE PURPOSE SECTIONS 3, 5, 6, 7 AND 9 OF REPUBLIC ACT NO. 8759, OTHERWISE KNOWN AS THE "PUBLIC EMPLOYMENT SERVICE OFFICE ACT OF 1999"</strong></p>
                <p>This Act aims to strengthen the Public Employment Service Office (PESO) system in the Philippines by clearly defining the roles of DOLE, LGUs, and accredited NGOs in establishing and operating PESOs. It also addresses job placement services in educational institutions, ensuring better coordination between government agencies and local communities in promoting employment opportunities and workforce development.</p>
            </div>
        </section>

       <section class="hero white-section">
            <div class="container hero-inner" style="display:flex; flex-wrap:wrap; align-items:center; gap:2rem;">
                <div class="hero-copy" style="flex:1 1 320px; min-width:280px;">
                    <h1 class="hero-title">Mission</h1>
                    <p class="hero-sub">To promote economic growth and sustainable development in Manolo Fortich through the implementation of the PESO program, providing employment opportunities and skills development for the community.</p>
                    <div class="hero-cta">
                        <a class="btn btn-primary" href="#contact">Get Started</a>
                        <a class="btn btn-outline" href="#features">Learn More</a>
                    </div>
                </div>

                <div class="hero-copy" style="flex:1 1 320px; min-width:280px;">
                    <h1 class="hero-title">Vision</h1>
                    <p class="hero-sub">A premier agri-ecotourist destination with people resilient and responsible towards the environment propelled by well-governed institutions responsive to the challenges of development</p>
                    <div class="hero-cta">
                        <a class="btn btn-primary" href="#contact">Get Started</a>
                        <a class="btn btn-outline" href="#features">Learn More</a>
                    </div>
                </div>

                <div class="hero-media" aria-hidden="true" style="flex:0 0 300px; display:flex; justify-content:center;">
                    <div class="device-mock" style="background: transparent; padding: 0;">
                        <div class="screen">
                            <img src="{{ asset('images/LogoLGU.png') }}" 
                                 alt="logo LGU" 
                                 style="width: 100%; height: auto; max-width: 300px; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));">
                        </div>
                    </div>
                </div>
            </div>
        </section>

     
        <section id="features" class="hero white-section">
            <div class="container">
                <h2 class="section-title">Gutom naman</h2>
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
