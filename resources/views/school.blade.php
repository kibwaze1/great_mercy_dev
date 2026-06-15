<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Great Mercy School | Official Website</title>
    <!-- Font Awesome (optional, for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- School‑specific CSS (completely independent) -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Roboto, 'Montserrat', sans-serif;
            background: #f5f7fc;
            color: #1e2a3e;
            line-height: 1.5;
        }

        /* School Header (top bar) */
        .school-header {
            background: #002D62;  /* navy blue */
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .logo-area {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        .logo-area img {
            height: 55px;
        }
        .logo-area h1 {
            font-size: 1.6rem;
            color: white;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .contact-icons {
            display: flex;
            gap: 1.2rem;
        }
        .contact-icons a {
            color: white;
            font-size: 1.3rem;
            transition: 0.2s;
        }
        .contact-icons a:hover {
            color: #F5DD00; /* gold */
        }

        /* Horizontal Navigation (Top Menu) */
        .school-nav {
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border-bottom: 1px solid #e0e7ed;
        }
        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            gap: 2rem;
            padding: 0.8rem 5%;
            flex-wrap: wrap;
        }
        .nav-container a {
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            padding: 0.5rem 0;
            color: #002D62;
            border-bottom: 3px solid transparent;
            transition: 0.2s;
        }
        .nav-container a i {
            margin-right: 6px;
        }
        .nav-container a:hover, .nav-container a.active {
            color: #F5DD00;
            border-bottom-color: #F5DD00;
        }

        /* Main Content Area */
        .school-content {
            max-width: 1200px;
            margin: 2.5rem auto;
            padding: 0 5%;
            background: white;
            border-radius: 28px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            min-height: 60vh;
        }
        .page {
            display: none;
            padding: 2rem;
            animation: fadeIn 0.3s ease;
        }
        .page.active-page {
            display: block;
        }
        .page h2 {
            font-size: 2rem;
            color: #002D62;
            margin-bottom: 1.2rem;
            border-left: 6px solid #F5DD00;
            padding-left: 1rem;
        }
        .page p, .page li {
            font-size: 1rem;
            margin-bottom: 0.8rem;
            color: #2d3e50;
        }
        .stats-grid {
            display: flex;
            gap: 1.5rem;
            margin: 2rem 0;
            flex-wrap: wrap;
        }
        .stat-card {
            flex: 1;
            background: #f0f4f9;
            border-radius: 20px;
            padding: 1.5rem;
            text-align: center;
        }
        .stat-card h3 {
            font-size: 2.2rem;
            color: #002D62;
            margin-bottom: 0.3rem;
        }
        .btn {
            background: #F5DD00;
            color: #001B3A;
            padding: 0.6rem 1.5rem;
            border-radius: 40px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            margin-top: 0.5rem;
            transition: 0.2s;
        }
        .btn:hover {
            transform: translateY(-2px);
            background: #ffe53a;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(12px);}
            to { opacity: 1; transform: translateY(0);}
        }

        /* School Footer */
        .school-footer {
            background: #001B3A;
            color: #cbd5e1;
            text-align: center;
            padding: 1.5rem;
            margin-top: 2rem;
            font-size: 0.85rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .school-header {
                flex-direction: column;
                text-align: center;
            }
            .nav-container {
                gap: 1rem;
            }
            .nav-container a {
                font-size: 0.85rem;
            }
            .page {
                padding: 1rem;
            }
            .page h2 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>

    <!-- School Header (Top) -->
    <div class="school-header">
        <div class="logo-area">
            <img src="{{ asset('logo.png') }}" alt="School Logo">
            <h1>Great Mercy School</h1>
        </div>
        <div class="contact-icons">
            <a href="mailto:school@greatmercy.org"><i class="fas fa-envelope"></i></a>
            <a href="tel:+254727791668"><i class="fas fa-phone-alt"></i></a>
        </div>
    </div>

    <!-- Horizontal Navigation (Top Links) -->
    <div class="school-nav">
        <div class="nav-container">
            <a href="#" data-page="home" class="active"><i class="fas fa-home"></i> Home</a>
            <a href="#" data-page="academics"><i class="fas fa-book-open"></i> Academics</a>
            <a href="#" data-page="admission"><i class="fas fa-dollar-sign"></i> Admission & Fees</a>
            <a href="#" data-page="about"><i class="fas fa-info-circle"></i> About Us</a>
            <a href="#" data-page="contact"><i class="fas fa-envelope"></i> Contact</a>
        </div>
    </div>

    <!-- Main Content (Pages) -->
    <div class="school-content">
        <!-- Home Page -->
        <div id="page-home" class="page active-page">
            <h2>Welcome to Great Mercy School</h2>
            <p>We provide holistic, Christ-centered education that nurtures academic excellence, character, and leadership.</p>
            <div class="stats-grid">
                <div class="stat-card"><h3>500+</h3><p>Students</p></div>
                <div class="stat-card"><h3>40+</h3><p>Teachers</p></div>
                <div class="stat-card"><h3>30+</h3><p>Classrooms</p></div>
            </div>
            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&auto=format" alt="School campus" style="width:100%; border-radius:20px; margin-top:1rem;">
        </div>

        <!-- Academics Page -->
        <div id="page-academics" class="page">
            <h2>Academics</h2>
            <p>Our curriculum blends the Kenyan national curriculum with Cambridge international programmes. We emphasize STEM, arts, and digital literacy.</p>
            <ul style="margin-left: 1.5rem;">
                <li>Early Years (Playgroup – PP2)</li>
                <li>Primary (Grade 1–6)</li>
                <li>Junior Secondary (Grade 7–9)</li>
                <li>Senior Secondary (IGCSE / KCSE)</li>
            </ul>
        </div>

        <!-- Admission & Fees Page -->
        <div id="page-admission" class="page">
            <h2>Admission & Fees</h2>
            <p>Admission is open throughout the year. Contact the admissions office for fee structure and application forms.</p>
            <p><strong>Fee ranges:</strong> Ksh 15,000 – 45,000 per term (depending on grade & boarding/day).</p>
            <p>Scholarships available for needy and high-achieving students.</p>
            <button class="btn" onclick="alert('Contact admissions: +254727791668')">Request Fee Structure</button>
        </div>

        <!-- About Us Page -->
        <div id="page-about" class="page">
            <h2>About Great Mercy School</h2>
            <p>Founded in 2010, our mission is to raise morally upright, competent, and transformative leaders. We integrate faith, knowledge, and service.</p>
            <p>Accredited by the Ministry of Education and a member of the Kenya Private Schools Association.</p>
        </div>

        <!-- Contact Page -->
        <div id="page-contact" class="page">
            <h2>Contact School</h2>
            <p><i class="fas fa-map-marker-alt"></i> Kitale, Trans-Nzoia County, Kenya</p>
            <p><i class="fas fa-phone"></i> +254 727791668</p>
            <p><i class="fas fa-envelope"></i> school@greatmercy.org</p>
            <p><i class="fas fa-clock"></i> Mon–Fri: 8:00am – 5:00pm, Sat: 9:00am – 1:00pm</p>
        </div>
    </div>

    <!-- School Footer -->
    <div class="school-footer">
        <p>&copy; 2026 Great Mercy School. All rights reserved.</p>
    </div>

    <!-- JavaScript for top navigation (no sidebar) -->
    <script>
        // Get all nav links and all page divs
        const navLinks = document.querySelectorAll('.nav-container a');
        const pages = document.querySelectorAll('.page');

        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                // Remove active class from all nav links
                navLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                // Hide all pages
                pages.forEach(page => page.classList.remove('active-page'));
                // Show the selected page
                const pageId = 'page-' + this.getAttribute('data-page');
                document.getElementById(pageId).classList.add('active-page');
            });
        });
    </script>
</body>
</html>
