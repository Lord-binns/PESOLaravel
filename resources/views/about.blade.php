<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>About Us - PESO Manolo Fortich</title>
    @if (file_exists(public_path('images/PESO.png')))
        <link rel="icon" href="{{ asset('images/PESO.png') }}" type="image/png">
        <link rel="apple-touch-icon" href="{{ asset('images/PESO.png') }}">
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
        
        
        /* About Page Styles */
        .about-hero {
            background: linear-gradient(rgba(18, 56, 121, 0.75), rgba(2, 32, 92, 0.75)), url('{{ asset("images/PESO.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 4rem 0;
        
        }
        
        .about-hero h1 {
            color: #ffd700;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        /* About Section */
        .about-section {
            padding: 4rem 0;
            background: linear-gradient(rgba(255, 255, 255, 0.90), rgba(255, 255, 255, 0.90)), url('{{ asset("images/LogoPNG.png") }}');
            background-size: 700px;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .about-section h2 {
            color: #001a4d;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }
        
        .about-section p {
            color: #333333;
            line-height: 1.8;
            text-align: justify;
        }
        
        /* Team Section */
        .team-section {
            padding: 3rem 0;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }
        
        .team-section h2 {
            color: #ffd700;
            font-weight: bold;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .team-card {
            background: #001a4d;
            border: 2px solid #ffd700;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            height: 100%;
            min-height: 160px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            z-index: 10;
        }
        
        .team-card:hover {
            background: #002a6d;
        }
        
        .team-card .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #ffd700;
            margin: 0 auto 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid #001a4d;
            flex-shrink: 0;
        }
        
        .team-card .avatar svg {
            width: 40px;
            height: 40px;
            color: #001a4d;
        }
        
        .team-card h3 {
            color: #ffd700;
            font-size: 0.95rem;
            margin-bottom: 0.2rem;
            line-height: 1.3;
        }
        
        .team-card .position {
            color: #ffffff;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        /* Manager Card - Larger */
        .team-card.manager-card {
            background: rgba(255, 215, 0, 0.2);
            border: 3px solid #ffd700;
            min-height: 190px;
        }
        
        .team-card.manager-card .avatar {
            width: 110px;
            height: 110px;
            border-width: 4px;
        }
        
        .team-card.manager-card h3 {
            font-size: 1.1rem;
        }
        
        /* Pyramid SVG Container */
        .pyramid-svg-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }
        
        .pyramid-svg-container line {
            stroke: #ffd700;
            stroke-width: 3;
            fill: none;
        }
        

        
        .mvo-card {
            background: #ffffff;
            border: 2px solid #001a4d;
            border-radius: 10px;
            padding: 2rem;
            height: 100%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .mvo-card h3 {
            color: #001a4d;
            font-weight: bold;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .mvo-card p {
            color: #333333;
            line-height: 1.8;
        }
        
        @media (max-width: 991px) {
            .team-section .pyramid-svg-container {
                display: none;
            }
        }
        
        @media (max-width: 576px) {
            .about-hero h1 {
                font-size: 2rem;
            }
            
            .team-card {
                padding: 0.75rem;
                min-height: 130px;
            }
            
            .team-card .avatar {
                width: 60px;
                height: 60px;
            }
            
            .team-card .avatar svg {
                width: 30px;
                height: 30px;
            }
            
            .team-card h3 {
                font-size: 0.8rem;
            }
            
            .team-card .position {
                font-size: 0.7rem;
            }
            
            .team-card.manager-card .avatar {
                width: 80px;
                height: 80px;
            }
            
            .team-card.manager-card h3 {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <x-navbar />

    <main>
        <!-- Hero Section -->
        <section class="about-hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h1>PESO Organizational Structure</h1>
                        <p class="lead">Meet the dedicated team behind PESO Manolo Fortich</p>
                    </div>
                </div>
            </div>
        </section>

    

        <!-- Our Team Section - Pyramid Layout 1-1-3-2-2 = 9 -->
        <section class="team-section" id="team-section">
            <!-- SVG Lines Container -->
            <svg class="pyramid-svg-container" id="pyramid-svg">
                <!-- Lines will be drawn by JavaScript -->
            </svg>
            
            <div class="container position-relative" style="z-index: 10;">
              
                
                <!-- Row 1: 1 Manager -->
                <div class="row justify-content-center" data-row="1">
                    <div class="col-md-4" data-card="1-1">
                        <div class="team-card manager-card" id="card-1-1">
                            <div class="avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <h3>LORRAINE A. REQUINTON</h3>
                            <p class="position">MGDH 1 PESO MANAGER</p>
                        </div>
                    </div>
                </div>

                <!-- Row 2: 1 Member -->
                <div class="row justify-content-center mt-4" data-row="2">
                    <div class="col-md-4" data-card="2-1">
                        <div class="team-card" id="card-2-1">
                            <div class="avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <h3>JOANNE B. ABELLA</h3>
                            <p class="position">Administrative Aide IV (Clerk II), Casual</p>
                        </div>
                    </div>
                </div>

                <!-- Row 3: 3 Members -->
                <div class="row justify-content-center mt-4" data-row="3">
                    <div class="col-md-4" data-card="3-1">
                        <div class="team-card" id="card-3-1">
                            <div class="avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <h3>JALOU L. CABUNOC</h3>
                            <p class="position">Administrative Aide IV (Clerk II), Casual</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-card="3-2">
                        <div class="team-card" id="card-3-2">
                            <div class="avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <h3>RUTCHELLE ROSAL</h3>
                            <p class="position">Administrative Aide IV (Clerk II), JO</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-card="3-3">
                        <div class="team-card" id="card-3-3">
                            <div class="avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <h3>JEROME B. SIGONGAN</h3>
                            <p class="position">Administrative Assistant II (Clerk IV), JO</p>
                        </div>
                    </div>
                </div>

                <!-- Row 4: 2 Members -->
                <div class="row justify-content-center mt-4" data-row="4">
                    <div class="col-md-4" data-card="4-1">
                        <div class="team-card" id="card-4-1">
                            <div class="avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <h3>PLaceholder</h3>
                            <p class="position">Vacant</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-card="4-2">
                        <div class="team-card" id="card-4-2">
                            <div class="avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <h3>PLaceholder</h3>
                            <p class="position">Vacant</p>
                        </div>
                    </div>
                </div>

                <!-- Row 5: 2 Members -->
                <div class="row justify-content-center mt-4" data-row="5">
                    <div class="col-md-4" data-card="5-1">
                        <div class="team-card" id="card-5-1">
                            <div class="avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <h3>YOLANDA LAGAT</h3>
                            <p class="position">Administrative Aide I (Utility), JO</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-card="5-2">
                        <div class="team-card" id="card-5-2">
                            <div class="avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <h3>RENELITO A. UBAGAN</h3>
                            <p class="position">Watchman 1, JO</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h2>About PESO Manolo Fortich</h2>
                        <p>The Public Employment Service Office (PESO) of Manolo Fortich is a government office dedicated to providing employment services to the residents of Manolo Fortich, Bukidnon. Established in 2005, PESO has been committed to bridging the gap between jobseekers and employers, offering a range of services including job matching, career counseling, skills training, and job fair organization.</p>
                        <p>Our team consists of dedicated professionals who work tirelessly to ensure that every jobseeker finds suitable employment and every employer finds the right candidate. We collaborate with various government agencies, private sector partners, and community organizations to create opportunities for workforce development and economic growth in our municipality.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Draw Straight Vertical Pyramid Lines -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function drawPyramidLines() {
                const svg = document.getElementById('pyramid-svg');
                const teamSection = document.getElementById('team-section');
                
                if (!svg || !teamSection) return;
                
                // Get SVG dimensions
                const rect = teamSection.getBoundingClientRect();
                svg.setAttribute('width', rect.width);
                svg.setAttribute('height', rect.height);
                
                // Clear existing lines
                svg.innerHTML = '';
                
                // Get card positions relative to team section
                const cards = document.querySelectorAll('[id^="card-"]');
                const cardPositions = {};
                
                cards.forEach(card => {
                    const cardRect = card.getBoundingClientRect();
                    const sectionRect = teamSection.getBoundingClientRect();
                    cardPositions[card.id] = {
                        x: cardRect.left - sectionRect.left + cardRect.width / 2,
                        bottomY: cardRect.bottom - sectionRect.top,
                        topY: cardRect.top - sectionRect.top
                    };
                });
                
                // Draw STRAIGHT VERTICAL lines - no slanting
                const ns = 'http://www.w3.org/2000/svg';
                
                // Row 1 (1) to Row 2 (1) - straight vertical
                if (cardPositions['card-1-1'] && cardPositions['card-2-1']) {
                    const line = document.createElementNS(ns, 'line');
                    line.setAttribute('x1', cardPositions['card-1-1'].x);
                    line.setAttribute('y1', cardPositions['card-1-1'].bottomY);
                    line.setAttribute('x2', cardPositions['card-1-1'].x); // Same X - vertical
                    line.setAttribute('y2', cardPositions['card-2-1'].topY);
                    svg.appendChild(line);
                }
                
                // Row 2 (1) to Row 3 (3) - straight vertical to middle card
                if (cardPositions['card-2-1'] && cardPositions['card-3-2']) {
                    const line = document.createElementNS(ns, 'line');
                    line.setAttribute('x1', cardPositions['card-2-1'].x);
                    line.setAttribute('y1', cardPositions['card-2-1'].bottomY);
                    line.setAttribute('x2', cardPositions['card-2-1'].x); // Same X - vertical
                    line.setAttribute('y2', cardPositions['card-3-2'].topY);
                    svg.appendChild(line);
                }
                
                // Row 3 (3) to Row 4 (2) - vertical from middle card to center, then horizontal split
                if (cardPositions['card-3-1'] && cardPositions['card-3-2'] && cardPositions['card-3-3'] && 
                    cardPositions['card-4-1'] && cardPositions['card-4-2']) {
                    
                    // Calculate center point between row 4 cards
                    const row4CenterX = (cardPositions['card-4-1'].x + cardPositions['card-4-2'].x) / 2;
                    
                    // Vertical line from middle card of row 3 to center of row 4
                    const verticalLine = document.createElementNS(ns, 'line');
                    verticalLine.setAttribute('x1', cardPositions['card-3-2'].x);
                    verticalLine.setAttribute('y1', cardPositions['card-3-2'].bottomY);
                    verticalLine.setAttribute('x2', cardPositions['card-3-2'].x);
                    verticalLine.setAttribute('y2', cardPositions['card-4-1'].topY);
                    svg.appendChild(verticalLine);
                    
                    // Horizontal line from center to card-4-1
                    const hLine1 = document.createElementNS(ns, 'line');
                    hLine1.setAttribute('x1', cardPositions['card-3-2'].x);
                    hLine1.setAttribute('y1', cardPositions['card-4-1'].topY);
                    hLine1.setAttribute('x2', cardPositions['card-4-1'].x);
                    hLine1.setAttribute('y2', cardPositions['card-4-1'].topY);
                    svg.appendChild(hLine1);
                    
                    // Horizontal line from center to card-4-2
                    const hLine2 = document.createElementNS(ns, 'line');
                    hLine2.setAttribute('x1', cardPositions['card-3-2'].x);
                    hLine2.setAttribute('y1', cardPositions['card-4-1'].topY);
                    hLine2.setAttribute('x2', cardPositions['card-4-2'].x);
                    hLine2.setAttribute('y2', cardPositions['card-4-2'].topY);
                    svg.appendChild(hLine2);
                    
                    // Vertical lines down to each row 4 card
                    const vLine1 = document.createElementNS(ns, 'line');
                    vLine1.setAttribute('x1', cardPositions['card-4-1'].x);
                    vLine1.setAttribute('y1', cardPositions['card-4-1'].topY);
                    vLine1.setAttribute('x2', cardPositions['card-4-1'].x);
                    vLine1.setAttribute('y2', cardPositions['card-4-1'].topY + 10);
                    svg.appendChild(vLine1);
                    
                    const vLine2 = document.createElementNS(ns, 'line');
                    vLine2.setAttribute('x1', cardPositions['card-4-2'].x);
                    vLine2.setAttribute('y1', cardPositions['card-4-2'].topY);
                    vLine2.setAttribute('x2', cardPositions['card-4-2'].x);
                    vLine2.setAttribute('y2', cardPositions['card-4-2'].topY + 10);
                    svg.appendChild(vLine2);
                }
                
                // Row 4 (2) to Row 5 (2) - straight vertical lines
                if (cardPositions['card-4-1'] && cardPositions['card-4-2'] && 
                    cardPositions['card-5-1'] && cardPositions['card-5-2']) {
                    
                    // card-4-1 to card-5-1 - vertical
                    const line1 = document.createElementNS(ns, 'line');
                    line1.setAttribute('x1', cardPositions['card-4-1'].x);
                    line1.setAttribute('y1', cardPositions['card-4-1'].bottomY);
                    line1.setAttribute('x2', cardPositions['card-4-1'].x); // Same X - vertical
                    line1.setAttribute('y2', cardPositions['card-5-1'].topY);
                    svg.appendChild(line1);
                    
                    // card-4-2 to card-5-2 - vertical
                    const line2 = document.createElementNS(ns, 'line');
                    line2.setAttribute('x1', cardPositions['card-4-2'].x);
                    line2.setAttribute('y1', cardPositions['card-4-2'].bottomY);
                    line2.setAttribute('x2', cardPositions['card-4-2'].x); // Same X - vertical
                    line2.setAttribute('y2', cardPositions['card-5-2'].topY);
                    svg.appendChild(line2);
                }
            }
            
            // Draw lines on load and resize
            drawPyramidLines();
            window.addEventListener('resize', drawPyramidLines);
        });
    </script>
</body>
</html>
