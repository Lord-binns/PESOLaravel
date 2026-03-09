<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Admin Dashboard - PESO Manolo Fortich</title>
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
        
        .status-verified {
            background: #dcfce7;
            color: #166534;
        }
        
        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }
        
        .status-rejected {
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
        
        .btn-success-action {
            background: #28a745;
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
        }
        
        .btn-danger-action {
            background: #dc3545;
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
        }
        
        .btn-view-action {
            background: #001a4d;
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
        }
        
        /* Company info */
        .company-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .company-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #001a4d;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('components.dashboard-navbar')
    

    
    <!-- Main Content -->
    <main>
        <div class="container" style="max-width: 1200px;">
            
            <!-- Stats Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="custom-card text-center">
                        <div class="card-icon"><i class="fas fa-building"></i></div>
                        <h3>25</h3>
                        <p style="margin: 0; color: #6b7280;">Registered Employers</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-card text-center">
                        <div class="card-icon"><i class="fas fa-users"></i></div>
                        <h3>150</h3>
                        <p style="margin: 0; color: #6b7280;">Registered Job Seekers</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-card text-center">
                        <div class="card-icon"><i class="fas fa-briefcase"></i></div>
                        <h3>45</h3>
                        <p style="margin: 0; color: #6b7280;">Active Job Postings</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-card text-center">
                        <div class="card-icon"><i class="fas fa-file-alt"></i></div>
                        <h3>80</h3>
                        <p style="margin: 0; color: #6b7280;">PESO Clearances Issued</p>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="action-card">
                        <h3><i class="fas fa-user-plus me-2"></i>Manage Job Seekers</h3>
                        <p>View and manage registered job seekers in the system.</p>
                        <button class="btn">View Job Seekers</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="action-card">
                        <h3><i class="fas fa-briefcase me-2"></i>Manage Job Postings</h3>
                        <p>Review and approve job postings from employers.</p>
                        <button class="btn">View Postings</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="action-card">
                        <h3><i class="fas fa-file-alt me-2"></i>PESO Clearances</h3>
                        <p>Issue and manage PESO clearances for job seekers.</p>
                        <button class="btn">Manage Clearances</button>
                    </div>
                </div>
            </div>
            
            <!-- Employer Verification Table -->
            <h2 style="display:flex; align-items:center; text-align:center; width:100%; margin-bottom: 30px;">
                <span style="flex:1; height:3px; background:#FF2D2D;"></span>
                <span style="padding:0 15px; font-weight:700; color: #001a4d;">
                    Employer Verification
                </span>
                <span style="flex:1; height:3px; background:#FF2D2D;"></span>
            </h2>
            
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Industry</th>
                                <th>Contact Person</th>
                                <th>Date Registered</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="company-info">
                                        <div class="company-avatar">TC</div>
                                        <span>Tech Corp Inc.</span>
                                    </div>
                                </td>
                                <td>Information Technology</td>
                                <td>John Manager</td>
                                <td>Jan 15, 2025</td>
                                <td><span class="status-badge status-verified">Verified</span></td>
                                <td>
                                    <button class="btn-view-action" title="View Details"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="company-info">
                                        <div class="company-avatar">GM</div>
                                        <span>Global Marketing</span>
                                    </div>
                                </td>
                                <td>Marketing</td>
                                <td>Sarah Director</td>
                                <td>Jan 14, 2025</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>
                                    <button class="btn-success-action" title="Approve"><i class="fas fa-check"></i></button>
                                    <button class="btn-danger-action" title="Reject"><i class="fas fa-times"></i></button>
                                    <button class="btn-view-action" title="View Details"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="company-info">
                                        <div class="company-avatar">FS</div>
                                        <span>Finance Solutions</span>
                                    </div>
                                </td>
                                <td>Finance</td>
                                <td>Mike Finance</td>
                                <td>Jan 13, 2025</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>
                                    <button class="btn-success-action" title="Approve"><i class="fas fa-check"></i></button>
                                    <button class="btn-danger-action" title="Reject"><i class="fas fa-times"></i></button>
                                    <button class="btn-view-action" title="View Details"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="company-info">
                                        <div class="company-avatar">HC</div>
                                        <span>HealthCare Plus</span>
                                    </div>
                                </td>
                                <td>Healthcare</td>
                                <td>Dr. Emily</td>
                                <td>Jan 10, 2025</td>
                                <td><span class="status-badge status-rejected">Rejected</span></td>
                                <td>
                                    <button class="btn-view-action" title="View Details"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
