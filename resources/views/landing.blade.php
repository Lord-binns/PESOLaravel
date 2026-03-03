<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>PESO Manolo Fortich</title>
    @if (file_exists(public_path('images/logo-peso.png')))
        <link rel="icon" href="{{ asset('images/logo-peso.png') }}" type="image/png">
        <link rel="apple-touch-icon" href="{{ asset('images/logo-peso.png') }}">
    @else
        <link rel="icon" href="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png" type="image/png">
        <link rel="apple-touch-icon" href="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png">
    @endif
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css'])
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
    <style>
        body { background-color: #e0f2ff; }
    </style>
</head>
<body>
    <x-navbar />

    <main>

    

<div id="simple-carousel" class="relative w-full" style="overflow:hidden;">
    <div class="carousel-slides" style="position:relative; height:400px;">
        <img class="carousel-slide" src="https://www.web.manolofortich.gov.ph/storage/content_image/22f8936a010d95ee468d5be23f72ab16.jpg" alt="Slide 1" style="position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover; opacity:0; transition:opacity .5s;">
        <img class="carousel-slide" src="https://web.manolofortich.gov.ph/web/img_lgu/carousel-8.jpg" alt="Slide 2" style="position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover; opacity:0; transition:opacity .5s;">
        <img class="carousel-slide" src="https://via.placeholder.com/1200x400?text=Slide+3" alt="Slide 3" style="position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover; opacity:0; transition:opacity .5s;">
    </div>
</div>

<script>
    (function(){
        const slides = document.querySelectorAll('.carousel-slide');
        let current = 0;
        function show(index){
            slides.forEach((s,i)=> s.style.opacity = i===index ? '1' : '0');
        }
        show(current);
        setInterval(()=>{
            current = (current + 1) % slides.length;
            show(current);
        }, 4000);
    })();
</script>

        <section class="hero">
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

        <section id="features" class="features">
            <div class="container">
                <h2 class="section-title">Powerful features, simple interface</h2>
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

        <section id="establishment" class="establishment">
            <div class="container">
                <h2 class="section-title">Establishment</h2>
                <p>Established under applicable legislation. (Republic Act number and date to be provided.)</p>
            </div>
        </section>

        <section id="contact" class="cta-strip">
            <div class="container cta-inner">
                <div>
                    <h3>Ready to ship something great?</h3>
                    <p>Contact our team and get a personalized plan.</p>
                </div>
                <a class="btn btn-primary" href="#">Contact Us</a>
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
</body>
</html>