<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Listings - PESO Manolo Fortich</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <x-navbar />
    
    <main class="job-listings py-5" style="background: linear-gradient(to bottom, #f8f9fa 0%, #ffffff 100%); min-height: 100vh;">
        <div class="container">
            <!-- Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-primary mb-3" style="color: #001a4d;">
                    <i class="fas fa-briefcase me-3"></i>Job Opportunities
                </h1>
                <p class="lead text-muted">Find your next career with PESO Manolo Fortich. Latest verified job postings.</p>
            </div>

            <!-- Search & Filters -->
            <div class="row g-4 mb-5">
                <div class="col-lg-8">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-end-0" placeholder="Search jobs by title, company, location..." id="jobSearch">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-filter me-1"></i>Filter
                        </button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <select class="form-select" id="jobLocation">
                        <option>All Locations</option>
                        <option>Manolo Fortich</option>
                        <option>Bukidnon</option>
                        <option>Cagayan de Oro</option>
                        <option>Davao City</option>
                    </select>
                </div>
            </div>

            <!-- Job Stats -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="text-center p-3 bg-primary bg-opacity-10 rounded-3">
                        <i class="fas fa-briefcase fa-2x text-primary mb-2"></i>
                        <h4 class="fw-bold" style="color: #001a4d;">{{ $totalJobs ?? 127 }}</h4>
                        <small class="text-muted">Total Jobs</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center p-3 bg-success bg-opacity-10 rounded-3">
                        <i class="fas fa-clock fa-2x text-success mb-2"></i>
                        <h4 class="fw-bold">{{ $newJobs ?? 23 }}</h4>
                        <small class="text-muted">New This Week</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center p-3 bg-warning bg-opacity-10 rounded-3">
                        <i class="fas fa-users fa-2x text-warning mb-2"></i>
                        <h4 class="fw-bold">{{ $applicants ?? 456 }}</h4>
                        <small class="text-muted">Applicants Today</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center p-3 bg-info bg-opacity-10 rounded-3">
                        <i class="fas fa-building fa-2x text-info mb-2"></i>
                        <h4 class="fw-bold">{{ $employers ?? 89 }}</h4>
                        <small class="text-muted">Active Employers</small>
                    </div>
                </div>
            </div>

            <!-- Jobs Grid -->
            <div class="row g-4" id="jobsContainer">
                <!-- Sample Jobs -->
                <div class="col-lg-6 col-xl-4">
                    <div class="job-card h-100 card border-0 shadow-sm hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start mb-3">
                                <div class="job-company-logo me-3">
                                    <img src="https://via.placeholder.com/60x60/001a4d/ffffff?text=ABC" class="rounded-circle" alt="Company">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="job-title fw-bold mb-1">Software Developer</h5>
                                    <h6 class="job-company text-primary mb-1">ABC Tech Solutions</h6>
                                    <div class="job-meta small text-muted">
                                        <i class="fas fa-map-marker-alt me-1"></i>Manolo Fortich
                                        <span class="mx-2">•</span>
                                        <i class="fas fa-dollar-sign me-1"></i>₱25,000 - ₱35,000
                                        <span class="mx-2">•</span>
                                        <i class="fas fa-briefcase me-1"></i>Full Time
                                    </div>
                                </div>
                            </div>
                            <p class="job-description mb-3 text-muted">Develop web applications using Laravel and Vue.js. Join our growing team building innovative solutions for local businesses.</p>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <span class="badge bg-primary">Laravel</span>
                                <span class="badge bg-success">Vue.js</span>
                                <span class="badge bg-info">Remote OK</span>
                                <span class="badge bg-warning">Urgent</span>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-primary flex-fill" data-bs-toggle="modal" data-bs-target="#jobModal">
                                    <i class="fas fa-eye me-1"></i>View Details
                                </a>
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="fas fa-heart me-1"></i>Save
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- More job cards... (repeat structure for 12+ cards) -->
                <!-- Job cards will be dynamically loaded here -->

            </div>

            <!-- Pagination -->
            <nav class="mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </main>

    <x-footer />

    <!-- Job Modal -->
    <div class="modal fade" id="jobModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Software Developer - ABC Tech</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="mb-3 text-primary">Job Description</h6>
                            <p>We're looking for a talented Software Developer to join our team. You'll be working on exciting projects using modern technologies...</p>
                            <h6 class="mb-3 text-primary mt-4">Requirements</h6>
                            <ul>
                                <li>2+ years Laravel/PHP experience</li>
                                <li>Vue.js or React knowledge</li>
                                <li>Bachelor's degree in CS/IT</li>
                                <li>Good communication skills</li>
                            </ul>
                            <h6 class="mb-3 text-primary mt-4">Benefits</h6>
                            <ul>
                                <li>Competitive salary</li>
                                <li>Health insurance</li>
                                <li>Remote work option</li>
                                <li>Professional growth</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0">
                                <div class="card-body text-center p-4">
                                    <img src="https://via.placeholder.com/100x100/001a4d/ffffff?text=ABC" class="rounded-circle mx-auto mb-3" style="width: 100px; height: 100px;">
                                    <h6 class="fw-bold mb-1">ABC Tech Solutions</h6>
                                    <div class="mb-3">
                                        <span class="badge bg-success mb-1 d-block">Verified Employer</span>
                                    </div>
                                    <div class="text-start small text-muted mb-3">
                                        <div><i class="fas fa-map-marker-alt me-1"></i>Manolo Fortich</div>
                                        <div><i class="fas fa-users me-1"></i>50-100 employees</div>
                                        <div><i class="fas fa-star me-1"></i>4.8 rating</div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <a href="#" class="btn btn-primary w-100" data-bs-dismiss="modal">
                                                <i class="fas fa-paper-plane me-1"></i>Apply Now
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" class="btn btn-outline-primary w-100">
                                                <i class="fas fa-heart me-1"></i>Save Job
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Search functionality
        document.getElementById('jobSearch').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const jobCards = document.querySelectorAll('.job-card');
            jobCards.forEach(card => {
                const title = card.querySelector('.job-title').textContent.toLowerCase();
                const company = card.querySelector('.job-company').textContent.toLowerCase();
                card.style.display = (title.includes(searchTerm) || company.includes(searchTerm)) ? '' : 'none';
            });
        });

        // Hover lift effect
        document.querySelectorAll('.job-card').forEach(card => {
            card.addEventListener('mouseenter', () => card.style.transform = 'translateY(-5px)');
            card.addEventListener('mouseleave', () => card.style.transform = 'translateY(0)');
        });
    </script>

    <style>
        .job-card {
            transition: all 0.3s ease;
            border-radius: 15px !important;
        }
        .job-card:hover {
            box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
        }
        .hover-lift {
            transition: transform 0.3s ease !important;
        }
        .job-title {
            color: #001a4d;
            line-height: 1.2;
        }
        .job-company {
            color: #ff4444 !important;
        }
        .badge {
            font-size: 0.75rem;
            padding: 0.4em 0.6em;
        }
    </style>

