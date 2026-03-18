<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Republic Acts - PESO Manolo Fortich</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .legal-hero {
            background: linear-gradient(rgba(0,26,77,0.9), rgba(0,26,77,0.9)), url('{{ asset("images/Landing.png") }}');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }
        .act-card {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .act-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .act-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #ff4444, #cc0000);
            color: white;
            padding: 5px 15px;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <x-navbar />
    
    <!-- Hero Section -->
    <section class="legal-hero text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4">Republic Acts</h1>
            <p class="lead mb-5">Legal foundation establishing and governing Public Employment Service Offices (PESO) in the Philippines</p>
            <a href="#acts-section" class="btn btn-warning btn-lg">
                <i class="fas fa-chevron-down me-2"></i>View Legislation
            </a>
        </div>
    </section>

    <main class="py-5 bg-light">
        <div class="container">
            <!-- Introduction -->
            <section class="text-center mb-5">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="display-5 fw-bold mb-4" style="color: #001a4d;">PESO Legal Framework</h2>
                        <p class="lead mb-4">The Public Employment Service Office (PESO) operates under Republic Acts 8759 and 10691, providing the legal basis for employment facilitation services at the local government level.</p>
                        <div class="row g-4 mt-5">
                            <div class="col-md-4">
                                <div class="text-center p-4">
                                    <i class="fas fa-gavel fa-3x text-primary mb-3"></i>
                                    <h5>RA 8759 (2000)</h5>
                                    <p class="text-muted">Institutionalizes PESO in every province and key city</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center p-4">
                                    <i class="fas fa-balance-scale fa-3x text-primary mb-3"></i>
                                    <h5>RA 10691 (2015)</h5>
                                    <p class="text-muted">Strengthens PESO operations and DOLE-LGU collaboration</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center p-4">
                                    <i class="fas fa-handshake fa-3x text-primary mb-3"></i>
                                    <h5>Key Mandate</h5>
                                    <p class="text-muted">Job matching, career guidance, labor market info</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Acts Section -->
            <section id="acts-section">
                <h2 class="text-center mb-5" style="color: #001a4d; font-weight: 700;">
                    <i class="fas fa-file-alt me-3 text-primary"></i>Key Legislation
                </h2>

                <div class="row g-5">
                    <!-- RA 10691 -->
                    <div class="col-lg-6">
                        <div class="act-card card h-100 position-relative overflow-hidden rounded-4">
                            <div class="act-badge">
                                2015
                            </div>
                            <div class="card-body p-5">
                                <h3 class="card-title fw-bold mb-3" style="color: #001a4d; font-size: 1.8rem;">
                                    REPUBLIC ACT NO. 10691
                                </h3>
                                <p class="lead mb-4"><strong>Strengthening the PESO System</strong></p>
                                <p class="card-text mb-4">Defines roles of DOLE, LGUs, and NGOs in PESO establishment and operation. Addresses job placement in educational institutions.</p>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Clear LGU responsibilities</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>PESO in schools/universities</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Standardized operations</li>
                                </ul>
                                <div class="d-flex gap-3">
                                    <a href="#" class="btn btn-primary btn-lg">
                                        <i class="fas fa-file-pdf me-2"></i>Download PDF
                                    </a>
                                    <a href="#contact" class="btn btn-outline-primary btn-lg">
                                        Learn More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RA 8759 -->
                    <div class="col-lg-6">
                        <div class="act-card card h-100 position-relative overflow-hidden rounded-4">
                            <div class="act-badge">
                                2000
                            </div>
                            <div class="card-body p-5">
                                <h3 class="card-title fw-bold mb-3" style="color: #001a4d; font-size: 1.8rem;">
                                    REPUBLIC ACT NO. 8759
                                </h3>
                                <p class="lead mb-4"><strong>PESO Act of 1999</strong></p>
                                <p class="card-text mb-4">Establishes PESO network nationwide as primary employment service mechanism linking job seekers and employers.</p>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Nationwide PESO coverage</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Free employment services</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>LGU devolution</li>
                                </ul>
                                <div class="d-flex gap-3">
                                    <a href="#" class="btn btn-primary btn-lg">
                                        <i class="fas fa-file-pdf me-2"></i>Download PDF
                                    </a>
                                    <a href="#contact" class="btn btn-outline-primary btn-lg">
                                        Learn More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="timeline-section mt-5">
                    <h3 class="text-center mb-5" style="color: #001a4d;">Legislative Timeline</h3>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h5>1999</h5>
                                <p>PESO concept introduced</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <h5>February 14, 2000</h5>
                                <p><strong>RA 8759 signed into law</strong></p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h5>2015</h5>
                                <p><strong>RA 10691 - PESO Strengthening Act</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stats -->
            <section class="stats-section mt-5 text-center">
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="stat-card p-4 rounded-3 shadow">
                            <i class="fas fa-building fa-3x text-primary mb-3"></i>
                            <h3>1000+</h3>
                            <p>PESOs Nationwide</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card p-4 rounded-3 shadow">
                            <i class="fas fa-users fa-3x text-success mb-3"></i>
                            <h3>50M+</h3>
                            <p>Job Placements</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card p-4 rounded-3 shadow">
                            <i class="fas fa-handshake fa-3x text-info mb-3"></i>
                            <h3>500K+</h3>
                            <p>Employers Served</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card p-4 rounded-3 shadow">
                            <i class="fas fa-university fa-3x text-warning mb-3"></i>
                            <h3>100%</h3>
                            <p>LGU Coverage</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA -->
            <section class="cta-section mt-5 text-center py-5">
                <div class="container">
                    <h2 style="color: #001a4d;">Ready to Establish Your PESO?</h2>
                    <p class="lead mb-4">Contact DOLE or your local government unit to learn more about RA 8759 & RA 10691 compliance.</p>
                    <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-phone me-2"></i>Contact DOLE
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-user-plus me-2"></i>Join PESO Network
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

