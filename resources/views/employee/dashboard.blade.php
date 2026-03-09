<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Employee Dashboard - PESO Manolo Fortich</title>
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
    <style>
        body { 
            background-color: #ffffff;
            color: #333333;
        }
        
        /* Header */
        .page-header {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            padding: 60px 20px;
            text-align: center;
            color: white;
        }
        
        .page-header h1 {
            color: #ffd700;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .page-header p {
            color: white;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Main content */
        main {
            background: #ffffff;
            padding: 60px 20px;
        }
        
        /* Cards - Landing page style */
        .custom-card {
            background-color: #f8f9fa;
            color: #333333;
            border: 2px solid #001a4d;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        
        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .custom-card h3 {
            color: #001a4d;
            font-weight: 600;
        }
        
        .custom-card .card-icon {
            font-size: 40px;
            color: #001a4d;
            margin-bottom: 15px;
        }
        
        /* Action cards with red accent - landing page style */
        .action-card {
            background: #001a4d !important;
            color: white;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            height: 100%;
            transition: all 0.3s;
        }
        
        .action-card:hover {
            background: #02205c !important;
            transform: translateY(-5px);
        }
        
        .action-card h3 {
            color: #ffd700;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .action-card p {
            color: white;
            margin-bottom: 20px;
        }
        
        .action-card .btn {
            background: linear-gradient(90deg, #ff4444, #cc0000);
            border: none;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
        }
        
        .action-card .btn:hover {
            background: #cc0000;
        }
        
        /* Table */
        .table-container {
            background-color: rgba(255, 255, 255, 0.25);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .table {
            background: white;
        }
        
        .table thead th {
            background: #001a4d;
            color: white;
            border: none;
        }
        
        .table td {
            vertical-align: middle;
        }
        
        /* Status badges */
        .status-badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-interview {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .status-hired {
            background: #dcfce7;
            color: #166534;
        }
        
        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }
        
        .status-not-selected {
            background: #fee2e2;
            color: #991b1b;
        }
        
        /* Buttons */
        .btn-action {
            background: linear-gradient(90deg, #ff4444, #cc0000);
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
        }
        
        .btn-action:hover {
            background: #cc0000;
            color: white;
        }
        
        .btn-success-custom {
            background: #28a745;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
        }
        
        .btn-success-custom:hover {
            background: #218838;
            color: white;
        }
        
        /* Profile card */
        .profile-card {
            background-color: #f8f9fa;
            border: 2px solid #001a4d;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
        }
        
        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            margin: 0 auto 15px;
        }
        
        .profile-card h5 {
            color: #001a4d;
            margin-bottom: 5px;
        }
        
        .profile-info {
            text-align: left;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
        }
        
        .profile-info .info-item {
            padding: 8px 0;
        }
        
        .profile-info label {
            color: #6b7280;
            font-size: 12px;
            text-transform: uppercase;
        }
        
        .profile-info p {
            color: #001a4d;
            margin: 0;
            font-weight: 500;
        }
        
        /* Job card */
        .job-card {
            background-color: #f8f9fa;
            border: 2px solid #001a4d;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .job-card h5 {
            color: #001a4d;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .job-card .company {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .job-card .details {
            display: flex;
            gap: 20px;
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 15px;
        }
        
        /* Clearance card */
        .clearance-card {
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%);
            border-radius: 10px;
            padding: 30px;
            color: white;
        }
        
        .clearance-card h4 {
            color: #ffd700;
            margin-bottom: 10px;
        }
        
        .clearance-card .validity {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('components.employee-navbar')
    

    
    <!-- Main Content -->
    <main>
        <div class="container" style="max-width: 1200px;">
            
            <!-- Stats Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="custom-card text-center">
                        <div class="card-icon"><i class="fas fa-briefcase"></i></div>
                        <h3>15</h3>
                        <p style="margin: 0; color: #6b7280;">Available Jobs</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-card text-center">
                        <div class="card-icon"><i class="fas fa-paper-plane"></i></div>
                        <h3>5</h3>
                        <p style="margin: 0; color: #6b7280;">Applications Sent</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-card text-center">
                        <div class="card-icon"><i class="fas fa-calendar-check"></i></div>
                        <h3>2</h3>
                        <p style="margin: 0; color: #6b7280;">Interview Scheduled</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-card text-center">
                        <div class="card-icon"><i class="fas fa-file-alt"></i></div>
                        <h3>1</h3>
                        <p style="margin: 0; color: #6b7280;">Clearance Issued</p>
                    </div>
                </div>
            </div>
            
            <!-- Action Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="action-card">
                        <h3><i class="fas fa-search me-2"></i>Find Jobs</h3>
                        <p>Browse available job vacancies in your area.</p>
                        <button class="btn">Search Jobs</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="action-card">
                        <h3><i class="fas fa-user-edit me-2"></i>Edit Profile</h3>
                        <p>Update your profile information and skills.</p>
                        <button class="btn">Update Profile</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="action-card">
                        <h3><i class="fas fa-file-download me-2"></i>Get Clearance</h3>
                        <p>Download or print your PESO clearance.</p>
                        <button class="btn">Download</button>
                    </div>
                </div>
            </div>
            
            <div class="row g-4">
                <!-- Profile Section -->
                <div class="col-md-4">
                    <div class="profile-card">
                        <div class="profile-avatar">JS</div>
                        <h5>John Smith</h5>
                        <p style="color: #6b7280; margin-bottom: 15px;">Job Seeker</p>
                        <button class="btn-action">Edit Profile</button>
                        
                        <div class="profile-info">
                            <div class="info-item">
                                <label>Email</label>
                                <p>john.smith@email.com</p>
                            </div>
                            <div class="info-item">
                                <label>Phone</label>
                                <p>0912 345 6789</p>
                            </div>
                            <div class="info-item">
                                <label>Location</label>
                                <p>Manolo Fortich, Bukidnon</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Main Content -->
                <div class="col-md-8">
                    <!-- Application Status Table -->
                    <h2 style="display:flex; align-items:center; text-align:center; width:100%; margin-bottom: 30px;">
                        <span style="flex:1; height:3px; background:#FF2D2D;"></span>
                        <span style="padding:0 15px; font-weight:700; color: #001a4d;">
                            My Applications
                        </span>
                        <span style="flex:1; height:3px; background:#FF2D2D;"></span>
                    </h2>
                    
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>Company</th>
                                        <th>Date Applied</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Software Developer</td>
                                        <td>Tech Corp Inc.</td>
                                        <td>Jan 15, 2025</td>
                                        <td><span class="status-badge status-interview"> Interview</span></td>
                                    </tr>
                                    <tr>
                                        <td>Graphic Designer</td>
                                        <td>Creative Studios</td>
                                        <td>Jan 14, 2025</td>
                                        <td><span class="status-badge status-pending">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>Marketing Manager</td>
                                        <td>Business Solutions</td>
                                        <td>Jan 10, 2025</td>
                                        <td><span class="status-badge status-hired">Hired</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Available Jobs -->
                    <h2 style="display:flex; align-items:center; text-align:center; width:100%; margin-bottom: 30px; margin-top: 40px;">
                        <span style="flex:1; height:3px; background:#FF2D2D;"></span>
                        <span style="padding:0 15px; font-weight:700; color: #001a4d;">
                            Latest Job Vacancies
                        </span>
                        <span style="flex:1; height:3px; background:#FF2D2D;"></span>
                    </h2>
                    
                    <div class="job-card">
                        <div class="row">
                            <div class="col-md-9">
                                <h5>Senior Software Engineer</h5>
                                <p class="company">Tech Innovations Philippines</p>
                                <div class="details">
                                    <span><i class="fas fa-map-marker-alt"></i> Manolo Fortich</span>
                                    <span><i class="fas fa-money-bill-wave"></i> ₱45,000 - ₱60,000</span>
                                    <span><i class="fas fa-clock"></i> Full Time</span>
                                </div>
                            </div>
                            <div class="col-md-3 text-end">
                                <button class="btn-success-custom">Apply Now</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="job-card">
                        <div class="row">
                            <div class="col-md-9">
                                <h5>Marketing Coordinator</h5>
                                <p class="company">Growth Marketing Inc.</p>
                                <div class="details">
                                    <span><i class="fas fa-map-marker-alt"></i> Manolo Fortich</span>
                                    <span><i class="fas fa-money-bill-wave"></i> ₱25,000 - ₱35,000</span>
                                    <span><i class="fas fa-clock"></i> Full Time</span>
                                </div>
                            </div>
                            <div class="col-md-3 text-end">
                                <button class="btn-success-custom">Apply Now</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="job-card">
                        <div class="row">
                            <div class="col-md-9">
                                <h5>Customer Service Representative</h5>
                                <p class="company">Global Support Services</p>
                                <div class="details">
                                    <span><i class="fas fa-map-marker-alt"></i> Manolo Fortich</span>
                                    <span><i class="fas fa-money-bill-wave"></i> ₱18,000 - ₱22,000</span>
                                    <span><i class="fas fa-clock"></i> Full Time</span>
                                </div>
                            </div>
                            <div class="col-md-3 text-end">
                                <button class="btn-success-custom">Apply Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- PESO Clearance -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="clearance-card">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4><i class="fas fa-file-alt me-2"></i>PESO Clearance</h4>
                                <p class="validity mb-0">Your PESO Clearance is valid and active. You can download or print it anytime.</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <p class="mb-1"><strong>Date Issued:</strong> December 15, 2024</p>
                                <p class="mb-3"><strong>Valid Until:</strong> December 15, 2025</p>
                                <button class="btn" style="background: white; color: #001a4d;">
                                    <i class="fas fa-download me-2"></i> Download Clearance
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
    
    <!-- Footer -->
    @include('components.footer')
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
