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
    background: linear-gradient(rgba(255, 255, 255, 0.68), rgba(255, 255, 255, 0.68)), 
            url('https://blancco.com/wp-content/uploads/2024/07/DPA-blog-resized.jpg');

            background-size: 1600px;
            background-position: center;
            background-repeat: no-repeat;
     
            padding-top: 2rem;
            
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
            background-color: rgba(255, 255, 255, 0.25);
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
        overflow: hidden;
    }

    /* Delayed Fade In Animation for Mission Vision */
    .mvo-section .mission {
        animation: fadeInLeft 1.5s ease-out 1s both;
    }

    .mvo-section .logo-section {
        animation: fadeInUp 1.5s ease-out 1.8s both;
    }

    .mvo-section .vision {
        animation: fadeInRight 1.5s ease-out 2.6s both;
    }

    @keyframes fadeInLeft {
        0% {
            opacity: 0;
            transform: translateX(-30px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        0% {
            opacity: 0;
            transform: translateX(30px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
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
        .contact-title{
    color: #ffd700;
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
        
        /* ============================================
           PESO ACCOMPLISHMENTS SECTION - ANIMATED CARDS
           ============================================ */

        /* Accomplishments Section Base */
        .accomplishments-section {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 50%, #03157a 100%);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        /* Background decorative elements */
        .accomplishments-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,215,0,0.05) 0%, transparent 50%);
            animation: rotateBg 30s linear infinite;
        }

        .accomplishments-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #ff4444, #ffd700, #ff4444);
        }

        @keyframes rotateBg {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Section Title */
        .accomplishments-section .section-title {
            color: #ffd700;
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
            z-index: 1;
        }

        .accomplishments-section .section-subtitle {
            color: rgba(255, 255, 255, 0.8);
            text-align: center;
            margin-bottom: 3rem;
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }

        /* Title decorative line */
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
            background: linear-gradient(90deg, transparent, #ffd700);
        }

        .accomplishments-title-wrapper .title-line:last-child {
            background: linear-gradient(90deg, #ffd700, transparent);
        }

        /* Accomplishment Cards Container */
        .accomplishments-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        /* Individual Card */
        .accomplishment-card {
            background: linear-gradient(145deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 215, 0, 0.3);
            border-radius: 20px;
            padding: 2.5rem 1.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            opacity: 0;
            transform: translateY(50px);
        }

        /* Card Animation - Slide In */
        .accomplishment-card.animate-in {
            opacity: 1;
            transform: translateY(0);
        }

        /* Stagger animation delays */
        .accomplishment-card:nth-child(1) { animation-delay: 0.1s; }
        .accomplishment-card:nth-child(2) { animation-delay: 0.2s; }
        .accomplishment-card:nth-child(3) { animation-delay: 0.3s; }
        .accomplishment-card:nth-child(4) { animation-delay: 0.4s; }

        /* Card hover effect */
        .accomplishment-card:hover {
            transform: translateY(-15px) scale(1.02);
            border-color: #ffd700;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3), 
                        0 0 30px rgba(255, 215, 0, 0.2);
            background: linear-gradient(145deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0.1) 100%);
        }

        /* Card glow effect on hover */
        .accomplishment-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,215,0,0.2), transparent);
            transition: left 0.5s;
        }

        .accomplishment-card:hover::before {
            left: 100%;
        }

        /* Icon Container */
        .accomplishment-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ffd700 0%, #ffaa00 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            position: relative;
            transition: all 0.4s ease;
            box-shadow: 0 5px 20px rgba(255, 215, 0, 0.4);
        }

        .accomplishment-icon i {
            font-size: 2rem;
            color: #001a4d;
            transition: all 0.4s ease;
        }

        /* Icon animation on card hover */
        .accomplishment-card:hover .accomplishment-icon {
            transform: rotate(360deg) scale(1.1);
            box-shadow: 0 8px 30px rgba(255, 215, 0, 0.6);
        }

        .accomplishment-card:hover .accomplishment-icon i {
            transform: scale(1.2);
        }

        /* Number Counter */
        .accomplishment-number {
            font-size: 3rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            line-height: 1;
        }

        .accomplishment-card:nth-child(1) .accomplishment-number {
            background: linear-gradient(135deg, #ff4444, #ff6b6b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .accomplishment-card:nth-child(2) .accomplishment-number {
            background: linear-gradient(135deg, #ffd700, #ffed4a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .accomplishment-card:nth-child(3) .accomplishment-number {
            background: linear-gradient(135deg, #00d4ff, #00ff88);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .accomplishment-card:nth-child(4) .accomplishment-number {
            background: linear-gradient(135deg, #ff9a9e, #fecfef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Label */
        .accomplishment-label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Decorative corner elements */
        .accomplishment-card::after {
            content: '';
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            border-top: 2px solid rgba(255, 215, 0, 0.5);
            border-right: 2px solid rgba(255, 215, 0, 0.5);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .accomplishment-card:hover::after {
            opacity: 1;
        }

        /* Floating animation for icons */
        @keyframes floatIcon {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .accomplishment-icon {
            animation: floatIcon 3s ease-in-out infinite;
        }

        /* Responsive Design */
        @media (max-width: 991px) {
            .accomplishments-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .accomplishments-section .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .accomplishments-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .accomplishments-section {
                padding: 3rem 0;
            }
            
            .accomplishments-section .section-title {
                font-size: 1.5rem;
            }
            
            .accomplishment-number {
                font-size: 2.5rem;
            }
            
            .accomplishment-icon {
                width: 60px;
                height: 60px;
            }
            
            .accomplishment-icon i {
                font-size: 1.5rem;
            }
        }

        /* Pulse animation for numbers */
        @keyframes pulseIn {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .accomplishment-card:hover .accomplishment-number {
            animation: pulseIn 0.5s ease-in-out;
        }
    /* Center Learn More buttons and News titles */
    #features .card-title { text-align: center !important; }
    #features .card .card-body,
    #skills-services .card .card-body { 
        text-align: center !important; 
    }
    #features .btn.btn-danger,
    #skills-services .btn.btn-danger {
        padding: 12px 24px !important;
        margin-top: 10px;
        display: inline-block;
    }
    
    </style>
</head>
<body>
    <x-navbar />

    

  
<div class="hero-hero" style="position: relative; min-height: 85vh; overflow: hidden;">

    <img src="{{ asset('images/Landing.png') }}" 
         class="d-block w-100"
         style="height: 90vh; object-fit: contain; object-position: center top;"
         alt="PESO Landing">

    <div style="
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%, -50%);
        text-align:center;
        width:100%;
        padding:20px;
    ">

        <h1 style="font-size:3.5rem; font-weight:800; margin-bottom:10px;">
            <span style="color:#1f4e79;">Welcome to</span>
            <span style="color:#ff0000;">PESO</span>
        </h1>

        <h2 style="font-size:3rem; font-weight:800; color:#ff0000; margin-bottom:20px;">
            Manolo Fortich
        </h2>

        <p style="
            font-size:1.3rem;
            color:#1f4e79;
            margin-bottom:30px;
        ">
            Your gateway to employment, livelihood, and skills development
        </p>

        <div>
<button onclick="openServicesModal()" style="
                padding:12px 28px;
                border-radius:30px;
                border:2px solid red;
                background:white;
                color:red;
                font-weight:600;
                margin-right:10px;
                cursor:pointer;
            ">
                Learn More
            </button>

<button onclick="openServicesModal()" style="
                padding:12px 28px;
                border-radius:30px;
                border:2px solid #1f4e79;
                background:white;
                color:#1f4e79;
                font-weight:600;
                cursor:pointer;
            ">
                Our Services
            </button>
        </div>

    </div>

</div>


</section>



<div class="mvo-section">

    <!-- Mission -->
    <div class="mission">
        <h1><i class="fas fa-bullseye" style="margin-right: 10px;"></i> Mission</h1>
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
        <h1><i class="fas fa-lightbulb" style="margin-right: 10px;"></i> Vision</h1>
        <p>A premier agri-ecotourist destination with people resilient and responsible towards the environment propelled by well-governed institutions responsive to the challenges of development.</p>
    </div>

</div>




    <section class="py-5 py-lg-5" style="background-color: #ffffff; padding-bottom: 6rem !important;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div style="width:100%; height:800px;">
                        <x-leaflet-map />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 
 
<section id="features" class="hero white-section">
    <div class="container">
      <h2 style="display:flex; align-items:center; text-align:center; width:100%;">
    
    <span style="flex:1; height:1px; background:#FF2D2D;"></span>
    
    <span style="padding:0 5px; font-weight:700;">
        News & Updates
    </span>
    
    <span style="flex:1; height:3px; background:#FF2D2D;"></span>

</h2>
<div class="cards" style="display:flex; gap:90px; justify-content:center; flex-wrap:wrap;">

    <div class="card" style="width:18rem; border-bottom:4px solid #FF2D2D;">
        <img src="https://i.pinimg.com/originals/80/9a/3d/809a3de812b7389316cc4c4edb0a3c05.gif" class="card-img-top" alt="Feature 1" style="width:100%; height:200px; object-fit:cover;">
        <div class="card-body" style="padding:15px;">
        <h5 class="card-title">Events</h5>
            <p class="card-text">Upcoming PESO events and job fairs.</p>
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#fastSetupModal">Learn More</a>
        </div>
    </div>

    <div class="card" style="width:18rem; border-bottom:4px solid #FF2D2D;">
        <img src="https://i.pinimg.com/originals/5c/87/17/5c871720baf04c9bb0330801f0101137.gif" class="card-img-top" alt="Feature 2" style="width:100%; height:200px; object-fit:cover;">
        <div class="card-body" style="padding:15px;">
        <h5 class="card-title">Announcements</h5>
            <p class="card-text">Latest Announcements.</p>
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reliableModal">Learn More</a>
        </div>
    </div>

    <div class="card" style="width:18rem; border-bottom:4px solid #FF2D2D;">
        <img src="https://i.pinimg.com/originals/d6/74/e7/d674e764a10d6b4f8cdd011f030c886f.gif" class="card-img-top" alt="Feature 3" style="width:100%; height:200px; object-fit:cover;">
        <div class="card-body" style="padding:15px;">
        <h5 class="card-title">Community</h5>
            <p class="card-text">Community initiatives.</p>
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#flexibleModal">Learn More</a>
        </div>
    </div>

</div>

</div>


</section>

<!-- Skills Section -->
<section id="skills-services" class="skills-section" style="background: linear-gradient(135deg, #001a4d 0%, #02205c 100%); padding: 60px 20px;">
    <div class="container">
        <h2 style="display: flex; align-items: center; text-align: center; width: 100%; margin-bottom: 40px; color: #ffd700; font-weight: 700;">
            <span style="flex: 1; height: 3px; background: #ffd700;"></span>
            <span style="padding: 0 20px; font-size: 2rem;">Our Skills & Services</span>
            <span style="flex: 1; height: 3px; background: #ffd700;"></span>
        </h2>
        
        <div class="cards" style="display:flex; gap:20px; justify-content:center; flex-wrap:wrap;">
            <!-- Skill Card 1 -->
            <div class="card" style="width:18rem; border-bottom:4px solid #FF2D2D;">
                <img src="https://i.pinimg.com/originals/a9/a7/03/a9a7034c548a23df4e3e9e823a898998.gif" class="card-img-top" alt="Job Placement" style="width:100%; height:200px; object-fit:cover;">
                <div class="card-body" style="padding:15px;">
                    <h5 class="card-title" style="color:#001a4d; font-weight:700;">Job Placement</h5>
                    <p class="card-text" style="color:#333333;">Connecting qualified job seekers with leading employers. We help bridge the gap between talent and opportunity.</p>
                    <a href="#" class="btn btn-danger">Learn More</a>
                </div>
            </div>
            
            <!-- Skill Card 2 -->
            <div class="card" style="width:18rem; border-bottom:4px solid #FF2D2D;">
                <img src="https://i.pinimg.com/originals/64/03/cd/6403cd601259fdaa7ca8664283c3b563.gif" class="card-img-top" alt="Skills Training" style="width:100%; height:200px; object-fit:cover;">
                <div class="card-body" style="padding:15px;">
                    <h5 class="card-title" style="color:#001a4d; font-weight:700;">Skills Training</h5>
                    <p class="card-text" style="color:#333333;">Comprehensive training programs to enhance employability and professional development skills.</p>
                    <a href="#" class="btn btn-danger">Learn More</a>
                </div>
            </div>
            
            <!-- Skill Card 3 -->
            <div class="card" style="width:18rem; border-bottom:4px solid #FF2D2D;">
                <img src="https://i.pinimg.com/originals/e3/1b/75/e31b752875679b64fce009922f9f0dda.gif" class="card-img-top" alt="Career Counseling" style="width:100%; height:200px; object-fit:cover;">
                <div class="card-body" style="padding:15px;">
                    <h5 class="card-title" style="color:#001a4d; font-weight:700;">Career Counseling</h5>
                    <p class="card-text" style="color:#333333;">Professional guidance to help you make informed career decisions and achieve your goals.</p>
                    <a href="#" class="btn btn-danger">Learn More</a>
                </div>
            </div>

            <!-- Skill Card 4 -->
            <div class="card" style="width:18rem; border-bottom:4px solid #FF2D2D;">
                <img src="https://i.pinimg.com/originals/17/78/18/1778180ab18a432d192c16aba4bbe51f.gif" class="card-img-top" alt="Job Matching" style="width:100%; height:200px; object-fit:cover;">
                <div class="card-body" style="padding:15px;">
                    <h5 class="card-title" style="color:#001a4d; font-weight:700;">Job Matching</h5>
                    <p class="card-text" style="color:#333333;">Advanced matching system to pair the right candidate with the right job position.</p>
                    <a href="#" class="btn btn-danger">Learn More</a>
                </div>
            </div>
            
            <!-- Skill Card 5 -->
            <div class="card" style="width:18rem; border-bottom:4px solid #FF2D2D;">
                <img src="https://i.pinimg.com/originals/1c/91/25/1c91250424a728f4ea55cb0494e9716b.gif" class="card-img-top" alt="Interview Coaching" style="width:100%; height:200px; object-fit:cover;">
                <div class="card-body" style="padding:15px;">
                    <h5 class="card-title" style="color:#001a4d; font-weight:700;">Interview Coaching</h5>
                    <p class="card-text" style="color:#333333;">Prepare for interviews with our expert coaching and mock interview sessions.</p>
                    <a href="#" class="btn btn-danger">Learn More</a>
                </div>
            </div>
            
            <!-- Skill Card 6 -->
            <div class="card" style="width:18rem; border-bottom:4px solid #FF2D2D;">
                <img src="https://i.pinimg.com/originals/e2/93/99/e29399a80c780b68929cd57c6ec792ae.gif" class="card-img-top" alt="Employer Services" style="width:100%; height:200px; object-fit:cover;">
                <div class="card-body" style="padding:15px;">
                    <h5 class="card-title" style="color:#001a4d; font-weight:700;">Employer Services</h5>
                    <p class="card-text" style="color:#333333;">Help employers find qualified candidates through our extensive recruitment network.</p>
                    <a href="#" class="btn btn-danger">Learn More</a>
                </div>
            </div>
        </div>
</div>
</section>




<!-- CHATBOT FLOATING BUTTON & MODAL -->
<div id="chatbot-toggle" class="chatbot-toggle">
    <i class="fas fa-comments"></i>
</div>

<div class="modal fade" id="chatbotModal" tabindex="-1" data-bs-backdrop="true" data-bs-keyboard="true">
    <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-centered modal-lg">
        <div class="modal-content border-0 d-flex flex-column" style="height: 80vh; max-height: 600px; border-radius: 20px;">
            <div class="modal-header bg-gradient" style="background: linear-gradient(135deg, #001a4d 0%, #ff4444 100%); color: white; border: none; flex-shrink: 0;">
                <h5 class="modal-title mb-0">
                    <i class="fas fa-robot me-2"></i>PESO Chat Assistant
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0 d-flex flex-column" style="flex: 1; min-height: 0;">
<div id="chat-messages" class="chat-messages flex-grow-1 p-4 overflow-y-auto" style="background: #f8f9fa; min-height: 0;">
                    <div class="message bot-message mb-3">
                        <div class="message-bubble">
                            <strong>PESO Bot:</strong> Hello! I'm here to help with PESO services.<br>Type <strong>"faq"</strong> for Frequently Asked Questions, "menu" for options, or ask anything!
                        </div>
                    </div>
                    <div class="faq-preview mb-3 p-3" style="background: white; border-radius: 15px; border-left: 4px solid #ff4444; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        <h6 style="margin: 0 0 10px 0; color: #001a4d;"><i class="fas fa-question-circle me-2"></i>Quick FAQ:</h6>
                        <ul style="margin: 0; padding-left: 20px; font-size: 0.9rem;">
                            <li><strong>How to apply?</strong> Register → Apply online.</li>
                            <li><strong>Free?</strong> Yes, all services free.</li>
                            <li><strong>Office hours?</strong> Mon-Fri 8AM-5PM.</li>
                            <li><strong>Training?</strong> TESDA accredited - type "training".</li>
                        </ul>
                        <small class="text-muted">Type "faq" for full list</small>
                    </div>
                </div>
                <div class="chat-input-container p-3 border-top" style="background: white; flex-shrink: 0;">
                    <div class="input-group">
                        <input type="text" id="chat-input" class="form-control border-0" placeholder="Type your message..." autocomplete="off">
                        <button class="btn btn-primary" id="send-chat" style="background: linear-gradient(135deg, #ff4444, #cc0000); border: none;">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




  
       

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
    


    <!-- Modals for Learn More buttons -->
    
    <!-- Job Placement Modal -->
    <div class="modal fade" id="jobPlacementModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #001a4d; color: white;">
                    <h5 class="modal-title"><i class="fas fa-briefcase me-2"></i>Job Placement Services</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>PESO Manolo Fortich provides comprehensive job placement services to connect qualified job seekers with leading employers in the municipality and beyond.</p>
                    <h6>Our Job Placement Services Include:</h6>
                    <ul>
                        <li>Job matching and referral system</li>
                        <li>Pre-employment orientation</li>
                        <li>Resume building assistance</li>
                        <li>Direct referral to employers</li>
                        <li>Follow-up and monitoring</li>
                    </ul>
                    <p class="mt-3">Visit our office or register online to access these services.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Skills Training Modal -->
    <div class="modal fade" id="skillsTrainingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #001a4d; color: white;">
                    <h5 class="modal-title"><i class="fas fa-graduation-cap me-2"></i>Skills Training Programs</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>We offer comprehensive training programs designed to enhance your employability and professional skills.</p>
                    <h6>Available Training Programs:</h6>
                    <ul>
                        <li>Computer Literacy Training</li>
                        <li>Customer Service Skills</li>
                        <li>Technical and Vocational Courses</li>
                        <li>Entrepreneurship Development</li>
                        <li>Resume Writing Workshop</li>
                        <li>Communication Skills</li>
                    </ul>
                    <p class="mt-3">Training schedules vary. Please contact our office for the latest program offerings.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Career Counseling Modal -->
    <div class="modal fade" id="careerCounselingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #001a4d; color: white;">
                    <h5 class="modal-title"><i class="fas fa-user-tie me-2"></i>Career Counseling</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Our professional career counselors provide guidance to help you make informed decisions about your career path.</p>
                    <h6>Career Counseling Services:</h6>
                    <ul>
                        <li>Career assessment and testing</li>
                        <li>Career path planning</li>
                        <li>Job search strategy development</li>
                        <li>Interview preparation</li>
                        <li>Work-life balance guidance</li>
                    </ul>
                    <p class="mt-3">Schedule an appointment with our career counselors today.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Matching Modal -->
    <div class="modal fade" id="jobMatchingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #001a4d; color: white;">
                    <h5 class="modal-title"><i class="fas fa-handshake me-2"></i>Job Matching System</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Our advanced job matching system pairs the right candidate with the right job position based on skills, qualifications, and employer requirements.</p>
                    <h6>How It Works:</h6>
                    <ul>
                        <li>Create your profile in our system</li>
                        <li>Upload your resume and credentials</li>
                        <li>Our system matches you with suitable positions</li>
                        <li>Receive personalized job alerts</li>
                        <li>Direct referral to hiring employers</li>
                    </ul>
                    <p class="mt-3">Register online or visit our office to get started.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Interview Coaching Modal -->
    <div class="modal fade" id="interviewCoachingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #001a4d; color: white;">
                    <h5 class="modal-title"><i class="fas fa-comments me-2"></i>Interview Coaching</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Prepare for success with our expert interview coaching and mock interview sessions.</p>
                    <h6>Interview Coaching Services:</h6>
                    <ul>
                        <li>Mock interview sessions</li>
                        <li>Interview tips and techniques</li>
                        <li>Common interview questions practice</li>
                        <li>Body language guidance</li>
                        <li>Dressing for success</li>
                        <li>Follow-up strategies</li>
                    </ul>
                    <p class="mt-3">Book a session with our career coaches to boost your interview skills.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Employer Services Modal -->
    <div class="modal fade" id="employerServicesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #001a4d; color: white;">
                    <h5 class="modal-title"><i class="fas fa-building me-2"></i>Employer Services</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>We help employers find qualified candidates through our extensive recruitment network.</p>
                    <h6>Services for Employers:</h6>
                    <ul>
                        <li>Free job posting services</li>
                        <li>Pre-screening of applicants</li>
                        <li>Reference checking assistance</li>
                        <li>Interview scheduling</li>
                        <li>On-site recruitment assistance</li>
                        <li>Labor market information</li>
                    </ul>
                    <p class="mt-3">Partner with PESO Manolo Fortich for your recruitment needs.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('login') }}" class="btn btn-primary">Employer Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- NEW: Comprehensive Services Overview Modal -->
    <div class="modal fade" id="servicesOverviewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(135deg, #001a4d, #ff4444); color: white;">
                    <h4 class="modal-title mb-0"><i class="fas fa-concierge-bell me-2"></i>Complete PESO Services Overview</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h6><i class="fas fa-briefcase text-primary me-2"></i>Core Employment Services</h6>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-handshake me-1 text-success"></i>Job Placement & Matching</li>
                                <li><i class="fas fa-graduation-cap me-1 text-warning"></i>Skills Training Programs</li>
                                <li><i class="fas fa-user-tie me-1 text-info"></i>Career Counseling</li>
                                <li><i class="fas fa-comments me-1 text-danger"></i>Interview Coaching</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6><i class="fas fa-users-cog text-primary me-2"></i>Special Programs</h6>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-users me-1 text-success"></i>Job Fairs & Recruitment Events</li>
                                <li><i class="fas fa-building me-1 text-warning"></i>Employer Recruitment Services</li>
                                <li><i class="fas fa-chart-line me-1 text-info"></i>Labor Market Information</li>
                                <li><i class="fas fa-shield-alt me-1 text-danger"></i>Worker Rights Protection</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center mt-4">
                        <h5 class="text-primary mb-3">Ready to Get Started?</h5>
                        <p class="lead mb-4">All services are <strong>FREE</strong> for Manolo Fortich residents!</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#jobPlacementModal">
                                <i class="fas fa-play me-2"></i>Explore Job Placement
                            </button>
                            <a href="{{ route('register') }}" class="btn btn-lg btn-primary">
                                <i class="fas fa-user-plus me-2"></i>Register Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- News Modals -->
    <!-- Fast Setup Modal -->

    <div class="modal fade" id="fastSetupModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #ff4444; color: white;">
                    <h5 class="modal-title"><i class="fas fa-rocket me-2"></i>Quick & Easy Process</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Our streamlined registration process gets you started quickly:</p>
                    <ol>
                        <li>Create your account online or visit our office</li>
                        <li>Complete your profile with your skills and experience</li>
                        <li>Browse available job listings</li>
                        <li>Apply with just a few clicks</li>
                        <li>Track your application status in real-time</li>
                    </ol>
                    <p class="mt-3">Get started today and land your dream job tomorrow!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Reliable Modal -->
    <div class="modal fade" id="reliableModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #ff4444; color: white;">
                    <h5 class="modal-title"><i class="fas fa-shield-alt me-2"></i>Trusted & Reliable</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>PESO Manolo Fortich is a government-accredited employment service office dedicated to serving our community.</p>
                    <h6>Why Trust Us:</h6>
                    <ul>
                        <li>DOLE Accredited since 2005</li>
                        <li>Verified employer partnerships</li>
                        <li>Secure data handling</li>
                        <li>Professional career guidance</li>
                        <li>Free services for job seekers</li>
                    </ul>
                    <p class="mt-3">Your career success is our priority.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Flexible Modal -->
    <div class="modal fade" id="flexibleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #ff4444; color: white;">
                    <h5 class="modal-title"><i class="fas fa-expand me-2"></i>Flexible Services</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>We offer flexible services tailored to your needs:</p>
                    <h6>Our Flexible Options:</h6>
                    <ul>
                        <li>Online and offline registration</li>
                        <li>Part-time and full-time job listings</li>
                        <li>Local and overseas opportunities</li>
                        <li>Various skill levels accommodated</li>
                        <li>Multiple job applications</li>
                    </ul>
                    <p class="mt-3">Find the perfect job that fits your schedule and goals.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('register') }}" class="btn btn-primary">Explore Jobs</a>
                </div>
            </div>
        </div>
    </div>

    <x-footer />

    <script>
function openServicesModal() {
    alert("PESO Manolo Fortich provides employment services, job matching, livelihood assistance, and skills development programs.");
}
</script>
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    
    <!-- Contact Form Handler -->
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type=\"submit\"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
            submitBtn.disabled = true;
            
            // Simulate form submission
            setTimeout(() => {
                alert('Thank you for your message! We will get back to you within 24-48 hours.');
                this.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 1500);
        });
    </script>

    <!-- Chatbot Functionality -->
    <script>
        // Chatbot Toggle
        document.getElementById('chatbot-toggle').addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById('chatbotModal'));
            modal.show();
        });

        document.getElementById('chatbotModal').addEventListener('shown.bs.modal', function() {
            scrollChatToBottom();
        });

        function openChatbot() {
            document.getElementById('chatbot-toggle').click();
        }

        // Chatbot Logic
        const chatbotResponses = {
            'hello': 'Hi there! Welcome to PESO Manolo Fortich. How can I help you today?',
            'hi': 'Hello! What PESO service can I help you with?',
            'jobs': 'We have exciting job opportunities! Register at <a href="{{ route("register") }}">our portal</a> or visit our office.',
            'job': 'Check current openings via our <a href="{{ route("register") }}">registration portal</a>. New jobs posted weekly!',
            'training': 'We offer skills training programs. Check our services section or contact us for schedule.',
            'tesda': 'TESDA accredited courses available. Free training for eligible residents. Type "training" for more.',
            'register': 'Click <a href="{{ route("register") }}">here to register</a> and create your account.',
            'account': 'Create your free account at <a href="{{ route("register") }}">registration page</a> to apply for jobs.',
            'contact': 'Office: (088) 232-3232 | Email: peso@manolofortich.gov.ph | Mon-Fri 8AM-5PM',
            'jobfair': 'Next job fair: May 15, 2025 at Manolo Fortich Plaza. Pre-register now!',
            'menu': 'Menu: jobs, jobfair, training, tesda, register, account, contact, services, about, help',
            'services': 'PESO Services: Job placement, career counseling, skills training, job fairs, employer assistance.',
            'about': 'PESO Manolo Fortich connects job seekers and employers. Government-run employment service.',
            'help': 'Commands: jobs, training, register, contact, jobfair, menu. Type keyword for info.',
            'faq': '<strong>Frequently Asked Questions:</strong><br>❓ How to apply? Register online at our portal or visit office.<br>❓ Is it free? Yes! All PESO services are free for locals.<br>❓ Office hours? Monday-Friday, 8AM-5PM<br>❓ What training available? TESDA-accredited skills training<br>❓ How to get job updates? Register to receive notifications<br>Type "training", "jobs", or "register" for more details!',
            'okay': 'Great! What would you like to know? Try: jobs, training, register, jobfair, or type "menu" for all options.',
            'ok': 'Great! What would you like to know? Try: jobs, training, register, jobfair, or type "menu" for all options.',
            'sure': 'Wonderful! How can I assist you further? Ask about jobs, training, registration, or type "menu".',
            'yes': 'Excellent! What service interests you? Choose from: jobs, training, career counseling, or type "menu".',
            'no': 'No problem! Is there anything else I can help you with? Try: jobs, training, register, or "menu".',
            'thanks': 'You\'re welcome! Feel free to ask about jobs, training, registration, or anything else. Type "menu" for options.',
            'thank': 'You\'re welcome! Feel free to ask about jobs, training, registration, or anything else. Type "menu" for options.',
            'thanks!': 'You\'re welcome! Feel free to ask about jobs, training, registration, or anything else. Type "menu" for options.',
            'bye': 'Thank you for chatting! Feel free to reach out anytime. Type "menu" to explore more services!',
            'goodbye': 'Thank you for chatting! Feel free to reach out anytime. Type "menu" to explore more services!',
            'how': 'Good question! What would you like to know how to do? Ask about: jobs, training, register, applying, or anything else!',
            'what': 'Great question! What would you like to know about? Try: jobs, training, services, contact, or type "menu".',
            'when': 'Good timing question! Our office hours: Mon-Fri 8AM-5PM. Next job fair: May 15, 2025. Need more info?',
            'where': 'We\'re located in Manolo Fortich, Bukidnon. Phone: (088) 232-3232 | Email: peso@manolofortich.gov.ph',
            'why': 'PESO Manolo Fortich helps job seekers find employment and employers find qualified candidates. Free services for all!',
            'interview': 'We offer expert interview coaching! Mock interviews, tips, common questions, body language guidance. Ask us for schedule!',
            'coaching': 'Yes! We provide interview coaching & career counseling. Contact us or type "training" to learn more.',
            'counseling': 'We offer professional career counseling services including career assessment, job search strategy, and interview prep!',
            'overseas': 'Great question! We have opportunities for overseas employment. Register to explore international job listings!',
            'application': 'Applying is easy! Register → Complete profile → Browse jobs → Apply. Visit our portal or office for assistance.',
            'apply': 'Good! <a href="{{ route("register") }}">Register here</a> and you can start applying for jobs immediately!',
            'resume': 'We help with resume building! Visit our office for assistance or register online to upload your resume.',
            'skills': 'Building skills is important! We offer TESDA-accredited training programs. Type "training" to learn more!',
            'default': 'I\'m here to help! Try asking about: jobs, training, register, contact, or type "menu" for all options. 😊'
        };

        document.getElementById('send-chat').addEventListener('click', sendChatMessage);
        document.getElementById('chat-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') sendChatMessage();
        });

        function sendChatMessage() {
            const input = document.getElementById('chat-input');
            const message = input.value.trim().toLowerCase();
            if (!message) return;

            addMessage(message, 'user');
            input.value = '';

            setTimeout(() => {
                const response = getChatbotResponse(message);
                addMessage(response, 'bot');
            }, 1000);
        }

        function getChatbotResponse(message) {
            for (let key in chatbotResponses) {
                if (message.includes(key)) {
                    return chatbotResponses[key];
                }
            }
            return chatbotResponses.default;
        }

        function scrollChatToBottom() {
            const messages = document.getElementById('chat-messages');
            if (!messages) return;

            messages.scrollTop = messages.scrollHeight;

            requestAnimationFrame(() => {
                messages.scrollTop = messages.scrollHeight;
            });

            setTimeout(() => {
                messages.scrollTop = messages.scrollHeight;
            }, 120);
        }

        function addMessage(text, sender) {
            const messages = document.getElementById('chat-messages');
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${sender}-message mb-3`;
            
            if (sender === 'user') {
                messageDiv.innerHTML = `<div class="message-bubble ms-auto text-end" style="max-width: 70%; background: linear-gradient(135deg, #ff4444, #cc0000); color: white; padding: 12px 16px; border-radius: 20px 20px 5px 20px; margin-left: auto;"><strong>You:</strong> ${text}</div>`;
            } else {
                messageDiv.innerHTML = `<div class="message-bubble" style="max-width: 70%; background: white; color: #333; padding: 12px 16px; border-radius: 20px 20px 20px 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);"><strong>PESO Bot:</strong> ${text}</div>`;
            }
            
            messages.appendChild(messageDiv);
            messageDiv.scrollIntoView({ behavior: 'smooth', block: 'end' });
            scrollChatToBottom();
        }

        // Smooth scrolling for nav links
        document.querySelectorAll('a[href^=\"#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>

    <!-- Update Learn More buttons to open modals -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // News & Updates - Learn More buttons
            document.querySelectorAll('#features .card .btn').forEach(function(btn, index) {
                btn.setAttribute('data-bs-toggle', 'modal');
                if (index === 0) btn.setAttribute('data-bs-target', '#fastSetupModal');
                if (index === 1) btn.setAttribute('data-bs-target', '#reliableModal');
                if (index === 2) btn.setAttribute('data-bs-target', '#flexibleModal');
            });
            
            // Skills & Services - Learn More buttons
            const skillButtons = document.querySelectorAll('#skills-services .card .btn');
            const modalIds = ['#jobPlacementModal', '#skillsTrainingModal', '#careerCounselingModal', '#jobMatchingModal', '#interviewCoachingModal', '#employerServicesModal'];
            
            skillButtons.forEach(function(btn, index) {
                if (modalIds[index]) {
                    btn.setAttribute('data-bs-toggle', 'modal');
                    btn.setAttribute('data-bs-target', modalIds[index]);
                }
            });
        });
    </script>

    <!-- Chatbot Toggle Styles -->
    <style>
        .chatbot-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ff4444, #cc0000);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(255,68,68,0.4);
            z-index: 1060;
            transition: all 0.3s ease;
            border: 3px solid white;
        }
        .chatbot-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(255,68,68,0.6);
        }
        .chatbot-toggle i {
            font-size: 1.5rem;
            color: white;
        }
        .chat-messages {
            min-height: 0;
            background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"grain\" width=\"100\" height=\"100\" patternUnits=\"userSpaceOnUse\"><circle cx=\"25\" cy=\"25\" r=\"1\" fill=\"%23f0f0f0\" opacity=\"0.1\"/><circle cx=\"75\" cy=\"75\" r=\"1\" fill=\"%23f0f0f0\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23grain)\"/></svg>');
        }
        .message-bubble {
            animation: messageSlide 0.3s ease-out;
            user-select: none;
            pointer-events: none;
        }
        @keyframes messageSlide {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 768px) {
            .chatbot-toggle { bottom: 20px; right: 20px; width: 55px; height: 55px; }
        }
        .contact-us-section { border-top: 5px solid #ff4444; }
        .contact-icon { transition: all 0.3s ease; }
        .contact-icon:hover { transform: rotate(10deg) scale(1.05); }
    </style>
</body>
</html>
