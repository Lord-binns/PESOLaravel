<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>PESO —  Landing Page</title>
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css'])
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            @if (file_exists(public_path('images/logo-peso.png')))
                <a class="brand" href="#">
                    <img src="{{ asset('images/logo-peso.png') }}" alt="PESO logo" class="logo" />
                    <span class="brand-text">PESO</span>
                </a>
            @else
                <a class="brand" href="#">
                    <img src="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png" alt="PESO logo" class="logo" />
                    <span class="brand-text">PESO</span>
                </a>
            @endif
            <nav class="nav">
                <a href="#features">Features</a>
                <a href="#pricing">Pricing</a>
                <a href="#contact">Contact</a>
                <a class="btn btn-ghost" href="#">Sign In</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container hero-inner">
                <div class="hero-copy">
                    <h1 class="hero-title">Design. Deliver. Delight.</h1>
                    <p class="hero-sub">Build beautiful, performant web experiences with tools and workflows that scale with your team.</p>
                    <div class="hero-cta">
                        <a class="btn btn-primary" href="#contact">Get Started</a>
                        <a class="btn btn-outline" href="#features">Learn More</a>
                    </div>
                </div>
                <div class="hero-media" aria-hidden="true">
                    <div class="device-mock">
                        <div class="screen">
                            <svg width="320" height="200" viewBox="0 0 320 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="320" height="200" rx="12" fill="#0f172a" />
                                <rect x="12" y="12" width="296" height="176" rx="8" fill="#0ea5a8" />
                            </svg>
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