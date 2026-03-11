<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Post a Job - PESO Manolo Fortich</title>
    @if (file_exists(public_path('images/LogoPNG.png')))
        <link rel="icon" href="{{ asset('images/LogoPNG.png') }}" type="image/png">
    @else
        <link rel="icon" href="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png" type="image/png">
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Sticky Footer Layout */
        html, body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
        }
        
        body { 
            background-color: #f5f5f5; 
            color: #333333; 
            padding-top: 80px;
        }
        
        /* Fixed Sidebar */
        .dashboard-sidebar {
            position: fixed;
            left: 0;
            top: 80px;
            width: 80px;
            height: calc(100vh - 80px);
            background: linear-gradient(to bottom, #001a4d, #000000);
            border-right: 3px solid #ffd700;
            z-index: 999;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
        }
        
        .dashboard-sidebar.collapsed {
            width: 0;
            padding: 20px 0;
            overflow: hidden;
            border-right: none;
        }
        
        .sidebar-icon-btn {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            background: rgba(255,255,255,0.1);
            border: none;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .sidebar-icon-btn:hover {
            background: rgba(255,215,0,0.2);
            color: #ffd700;
            transform: scale(1.05);
        }
        
        .sidebar-icon-btn.active {
            background: #ffd700;
            color: #001a4d;
        }
        
        .sidebar-icon-btn i { font-size: 20px; margin-bottom: 2px; }
        .sidebar-icon-btn span { font-size: 9px; font-weight: 500; text-transform: uppercase; }
        .sidebar-divider { width: 40px; height: 2px; background: rgba(255,255,255,0.2); margin: 5px 0; }
        
        .main-wrapper { 
            margin-left: 80px; 
            padding: 20px; 
            flex: 1;
            transition: margin-left 0.3s ease;
        }
        
        .main-wrapper.expanded {
            margin-left: 0;
        }
        
        .form-header { 
            background: linear-gradient(135deg, #001a4d 0%, #02205c 100%); 
            color: white; 
            padding: 20px; 
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .form-header .logo-img {
            width: 80px;
            height: auto;
            margin-bottom: 10px;
        }
        .form-container { background: white; border-radius: 0 0 10px 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .section-title { background: #001a4d; color: white; padding: 10px 15px; font-weight: 600; margin: 20px 0 15px 0; border-radius: 5px; }
        .section-title:first-child { margin-top: 0; }
        .form-label { font-weight: 600; color: #001a4d; }
        .form-control, .form-select { border: 1px solid #ced4da; border-radius: 5px; padding: 10px; }
        .form-control:focus, .form-select:focus { border-color: #ffd700; box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25); }
        .checkbox-label { font-weight: normal; cursor: pointer; }
        .btn-submit { background: linear-gradient(90deg, #ff4444, #cc0000); border: none; color: white; padding: 12px 40px; border-radius: 8px; font-weight: 600; font-size: 16px; }
        .btn-submit:hover { background: linear-gradient(90deg, #cc0000, #aa0000); }
        .btn-cancel { background: #6c757d; border: none; color: white; padding: 12px 40px; border-radius: 8px; font-weight: 600; }
        .required-field::after { content: " *"; color: red; }
        .nsrp-header { text-align: center; margin-bottom: 15px; }
        .nsrp-header h5 { margin: 0; font-weight: 700; }
        .nsrp-header p { margin: 5px 0 0 0; font-size: 14px; }
        .instructions { background: #fff3cd; border: 1px solid #ffc107; border-radius: 5px; padding: 15px; margin-bottom: 20px; font-size: 14px; }
        .signature-box { border: 2px dashed #001a4d; border-radius: 5px; padding: 20px; text-align: center; background: #f8f9fa; }
        .checkbox-group { display: grid; grid-template-columns: repeat(2, 1fr); gap: 5px; }
        @media (max-width: 768px) {
            body { padding-top: 70px; }
            .form-header { padding: 15px 10px; }
            .form-header h4 { font-size: 16px; }
            .checkbox-group { grid-template-columns: 1fr; }
            .main-wrapper { margin-left: 0; padding: 10px; }
            .dashboard-sidebar { display: none; }
        }
    </style>
</head>
<body>
    @include('components.employer-navbar')
    
    <!-- Sidebar -->
    <div class="dashboard-sidebar" id="dashboardSidebar">
        <a href="{{ url('/employer/dashboard') }}" class="sidebar-icon-btn"><i class="fas fa-th-large"></i><span>Home</span></a>
        <a href="{{ url('/employer/post-job') }}" class="sidebar-icon-btn active"><i class="fas fa-plus-circle"></i><span>Post</span></a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-briefcase"></i><span>Posts</span></a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-users"></i><span>Applicants</span></a>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-chart-line"></i><span>Analytics</span></a>
        <div class="sidebar-divider"></div>
        <a href="{{ url('/employer/archive') }}" class="sidebar-icon-btn"><i class="fas fa-archive"></i><span>Archive</span></a>
        <div class="sidebar-divider"></div>
        <a href="#" class="sidebar-icon-btn"><i class="fas fa-cog"></i><span>Settings</span></a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="sidebar-icon-btn" style="border: none; cursor: pointer;">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
            </button>
        </form>
    </div>
    
    <div class="main-wrapper" id="mainWrapper">
        <div class="container" style="max-width: 900px;">
            <div class="form-header">
                <img src="{{ asset('images/LogoPNG.png') }}" alt="PESO Logo" class="logo-img" onerror="this.style.display='none'">
                
                <div class="nsrp-header">
                    <h5>Republic of the Philippines</h5>
                    <p>Department of Labor and Employment</p>
                    <h5 style="color: #ffd700;">NATIONAL SKILLS REGISTRATION PROGRAM</h5>
                    <p><strong>ESTABLISHMENT REGISTRATION FORM</strong></p>
                    <p>NSRP Form 2 | September 2020</p>
                </div>
            </div>
            
            <div class="form-container p-4">
                <div class="instructions">
                    <strong><i class="fas fa-info-circle"></i> INSTRUCTIONS:</strong> Please fill out the form legibly in block letters with a ballpoint pen. Check appropriate boxes. Please do not leave any items unanswered. Indicate "NA" if not applicable. You may use extra sheet if needed. Submit accomplished form to the Public Employment Service Office (PESO) Manager or Officer in your city/municipality.
                </div>
                
                <form action="{{ route('employer.post-job.store') }}" method="POST">
                    @csrf
                    
                    <!-- ESTABLISHMENT DETAILS -->
                    <div class="section-title">I. ESTABLISHMENT DETAILS</div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label required-field">Business Name</label>
                            <input type="text" class="form-control" name="business_name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Trade Name</label>
                            <input type="text" class="form-control" name="trade_name">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Acronym/Abbreviation</label>
                            <input type="text" class="form-control" name="acronym">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label required-field">Establishment Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="establishment_type" value="main" id="mainOffice">
                                <label class="form-check-label checkbox-label" for="mainOffice">Main Office</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="establishment_type" value="branch" id="branch">
                                <label class="form-check-label checkbox-label" for="branch">Branch</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label required-field">Tax Identification Number</label>
                            <input type="text" class="form-control" name="tin" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-field">Employer Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="employer_type" value="public" id="public">
                                <label class="form-check-label checkbox-label" for="public">Public</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="employer_type" value="private" id="private">
                                <label class="form-check-label checkbox-label" for="private">Private</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">If Public, specify:</label>
                            <div class="checkbox-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_national_gov" id="nationalGov">
                                    <label class="form-check-label checkbox-label" for="nationalGov">National Government Agency</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_lgu" id="lgu">
                                    <label class="form-check-label checkbox-label" for="lgu">Local Government Unit</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_gocc" id="gocc">
                                    <label class="form-check-label checkbox-label" for="gocc">Government-owned and Controlled Corporation</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_suc" id="suc">
                                    <label class="form-check-label checkbox-label" for="suc">State/Local University or College</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-field">Total Work Force</label>
                            <select class="form-select" name="workforce_size" required>
                                <option value="">Select...</option>
                                <option value="micro">Micro (1-9)</option>
                                <option value="small">Small (10-99)</option>
                                <option value="medium">Medium (100-199)</option>
                                <option value="large">Large (200 and up)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">If Private, specify:</label>
                            <div class="checkbox-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_direct_hire" id="directHire">
                                    <label class="form-check-label checkbox-label" for="directHire">Direct Hire</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_local_recruit" id="localRecruit">
                                    <label class="form-check-label checkbox-label" for="localRecruit">Local Recruitment Agency</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_overseas_recruit" id="overseasRecruit">
                                    <label class="form-check-label checkbox-label" for="overseasRecruit">Overseas Recruitment Agency</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_do174" id="do174">
                                    <label class="form-check-label checkbox-label" for="do174">D.O. 174</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Line of Business/Industry</label>
                            <input type="text" class="form-control" name="line_of_business" placeholder="Specify industry classification">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Street/Village</label>
                            <input type="text" class="form-control" name="street">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Barangay</label>
                            <input type="text" class="form-control" name="barangay">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Municipal/City</label>
                            <input type="text" class="form-control" name="municipality">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Province</label>
                            <input type="text" class="form-control" name="province">
                        </div>
                    </div>
                    
                    <!-- ESTABLISHMENT CONTACT DETAILS -->
                    <div class="section-title">II. ESTABLISHMENT CONTACT DETAILS</div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label required-field">Name of Owner/President</label>
                            <input type="text" class="form-control" name="owner_name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-field">Contact Person</label>
                            <input type="text" class="form-control" name="contact_person" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-field">Position</label>
                            <input type="text" class="form-control" name="contact_position" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Telephone Number</label>
                            <input type="text" class="form-control" name="telephone">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label required-field">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fax Number</label>
                            <input type="text" class="form-control" name="fax">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label required-field">E-mail Address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                    
                    <!-- VACANCY DETAILS -->
                    <div class="section-title">III. VACANCY DETAILS</div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label required-field">Position Title</label>
                            <input type="text" class="form-control" name="position_title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-field">Vacancy Count</label>
                            <input type="number" class="form-control" name="vacancy_count" min="1" value="1" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label required-field">Job Description</label>
                            <textarea class="form-control" name="job_description" rows="4" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label required-field">Nature of Work</label>
                            <div class="checkbox-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nature_of_work" value="permanent" id="permanent" required>
                                    <label class="form-check-label checkbox-label" for="permanent">Permanent</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nature_of_work" value="contractual" id="contractual">
                                    <label class="form-check-label checkbox-label" for="contractual">Contractual</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nature_of_work" value="project" id="project">
                                    <label class="form-check-label checkbox-label" for="project">Project-based</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nature_of_work" value="internship" id="internship">
                                    <label class="form-check-label checkbox-label" for="internship">Internship/OJT</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nature_of_work" value="parttime" id="parttime">
                                    <label class="form-check-label checkbox-label" for="parttime">Part-time</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nature_of_work" value="workfromhome" id="workfromhome">
                                    <label class="form-check-label checkbox-label" for="workfromhome">Work from home</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label required-field">Place of Work</label>
                            <input type="text" class="form-control" name="place_of_work" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-field">Salary</label>
                            <input type="text" class="form-control" name="salary" placeholder="e.g. ₱25,000 - ₱35,000" required>
                        </div>
                    </div>
                    
                    <!-- QUALIFICATION REQUIREMENTS -->
                    <div class="section-title">IV. QUALIFICATION REQUIREMENTS</div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Educational Level</label>
                            <select class="form-select" name="education_level">
                                <option value="">Select...</option>
                                <option value="elementary">Elementary Graduate</option>
                                <option value="highschool">High School Graduate</option>
                                <option value="vocational">Vocational Graduate</option>
                                <option value="college">College Graduate</option>
                                <option value="postgrad">Post Graduate</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Course/SHS Strand</label>
                            <input type="text" class="form-control" name="course">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Work Experience</label>
                            <input type="text" class="form-control" name="work_experience" placeholder="e.g. 12 months">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">License/Eligibility</label>
                            <input type="text" class="form-control" name="license_eligibility">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Certification</label>
                            <input type="text" class="form-control" name="certification">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Language/Dialect Spoken</label>
                            <input type="text" class="form-control" name="language_spoken">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Other Qualifications</label>
                            <textarea class="form-control" name="other_qualifications" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Accepts PWD?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="accepts_pwd" value="1" id="pwdYes">
                                <label class="form-check-label checkbox-label" for="pwdYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="accepts_pwd" value="0" id="pwdNo" checked>
                                <label class="form-check-label checkbox-label" for="pwdNo">No</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Accepts OFW?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="accepts_ofw" value="1" id="ofwYes">
                                <label class="form-check-label checkbox-label" for="ofwYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="accepts_ofw" value="0" id="ofwNo" checked>
                                <label class="form-check-label checkbox-label" for="ofwNo">No</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- POSTING DETAILS -->
                    <div class="section-title">V. POSTING DETAILS</div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label required-field">Posting Date</label>
                            <input type="date" class="form-control" name="posting_date" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-field">Valid Until</label>
                            <input type="date" class="form-control" name="valid_until" required>
                        </div>
                    </div>
                    
                    <!-- CERTIFICATION -->
                    <div class="section-title">VI. CERTIFICATION/AUTHORIZATION</div>
                    
                    <div class="signature-box mb-4">
                        <p class="mb-3">This is to certify that all data/information provided in this form are true to the best of my knowledge.</p>
                        
                        <div class="row g-3 mt-3">
                            <div class="col-md-6">
                                <label class="form-label">Signature</label>
                                <input type="text" class="form-control" name="signature_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" name="signature_date" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- SUBMIT BUTTONS -->
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-submit me-2">
                                <i class="fas fa-paper-plane"></i> Submit Job Posting
                            </button>
                            <button type="button" class="btn btn-cancel" onclick="history.back()">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @include('components.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar Toggle Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggler = document.getElementById('sidebarToggler');
            const dashboardSidebar = document.getElementById('dashboardSidebar');
            const mainWrapper = document.getElementById('mainWrapper');
            
            if (sidebarToggler && dashboardSidebar && mainWrapper) {
                sidebarToggler.addEventListener('click', function(e) {
                    e.preventDefault();
                    dashboardSidebar.classList.toggle('collapsed');
                    mainWrapper.classList.toggle('expanded');
                });
            }
        });
    </script>
</body>
</html>
