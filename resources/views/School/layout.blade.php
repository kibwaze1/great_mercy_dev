<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Great Mercy School | @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f4f6f9;
            color: #1e2a3e;
            line-height: 1.4;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ========== DESKTOP STYLES (min-width: 769px) ========== */
        .top-navbar-white {
            background: white;
            padding: 0.4rem 2%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            border-bottom: 1px solid #e0e7ed;
        }
        .contact-info {
            display: flex;
            gap: 1.2rem;
            flex-wrap: wrap;
        }
        .contact-info a {
            text-decoration: none;
            font-weight: 500;
            font-size: 0.8rem;
            color: #002D62;
            transition: 0.2s;
        }
        .contact-info a i {
            margin-right: 4px;
        }
        .contact-info a:hover {
            color: #F5DD00;
        }
        .right-group {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            flex-wrap: wrap;
        }
        .links-right {
            display: flex;
            gap: 1.2rem;
        }
        .links-right a {
            text-decoration: none;
            font-weight: 600;
            font-size: 0.8rem;
            color: #002D62;
        }
        .links-right a:hover {
            color: #F5DD00;
        }
        .separator {
            color: #002D62;
            font-size: 0.9rem;
        }
        .social-right {
            display: flex;
            gap: 0.8rem;
        }
        .social-right a {
            color: #002D62;
            font-size: 0.9rem;
            transition: 0.2s;
        }
        .social-right a:hover {
            color: #F5DD00;
            transform: translateY(-2px);
        }

        .main-navbar-blue {
            background: #002D62;
            padding: 0.4rem 2%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            position: relative;
        }
        .logo-area img {
            height: 40px;
        }
        .nav-links {
            display: flex;
            gap: 1.2rem;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            padding: 0.2rem 0;
            border-bottom: 2px solid transparent;
            white-space: nowrap;
        }
        .nav-links a:hover, .nav-links a.active {
            color: #F5DD00;
            border-bottom-color: #F5DD00;
        }
        .right-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .apply-btn {
            background: #F5DD00;
            color: #001B3A;
            padding: 0.3rem 1rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.8rem;
        }
        .apply-btn:hover {
            background: #ffe53a;
            transform: translateY(-2px);
        }
        .search-icon, .hamburger-school {
            background: none;
            border: none;
            color: white;
            font-size: 1.1rem;
            cursor: pointer;
        }
        .search-icon:hover, .hamburger-school:hover {
            color: #F5DD00;
        }
        .hamburger-school {
            display: none; /* hidden on desktop */
        }

        /* Mobile menu – hidden on desktop */
        .mobile-menu {
            display: none;
            background: #002D62;
            width: 100%;
            flex-direction: column;
            border-top: 1px solid rgba(255,255,255,0.2);
        }
        .mobile-menu a {
            color: white;
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            font-size: 0.9rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: block;
        }
        .mobile-menu a:hover {
            background: #003e7c;
            color: #F5DD00;
        }

        /* Main content */
        .school-content {
            flex: 1;
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2%;
            width: 100%;
        }
        .page {
            padding: 1rem 0;
        }
        .page h2 {
            font-size: 1.5rem;
            color: #002D62;
            margin-bottom: 1rem;
            border-left: 4px solid #F5DD00;
            padding-left: 0.8rem;
        }
        .page p, .page li {
            font-size: 0.9rem;
            margin-bottom: 0.8rem;
            line-height: 1.5;
        }
        .stats-row {
            display: flex;
            gap: 1.2rem;
            margin: 1.5rem 0;
            flex-wrap: wrap;
        }
        .stat-item {
            background: #eef2f7;
            padding: 1rem;
            border-radius: 12px;
            text-align: center;
            flex: 1;
        }
        .stat-item h3 {
            font-size: 1.4rem;
            color: #002D62;
        }
        .btn {
            background: #F5DD00;
            color: #001B3A;
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            border: none;
            font-weight: 600;
            cursor: pointer;
        }
        .school-footer {
            background: #001B3A;
            color: #cbd5e1;
            text-align: center;
            padding: 0.8rem;
            font-size: 0.7rem;
        }

        /* ========== MOBILE STYLES (max-width: 768px) ========== */
        @media (max-width: 768px) {
            /* Hide white top navbar completely */
            .top-navbar-white {
                display: none;
            }
            /* Hide centered nav links in blue navbar */
            .nav-links {
                display: none;
            }
            /* Show hamburger */
            .hamburger-school {
                display: block;
            }
            /* Adjust right-actions order */
            .right-actions {
                gap: 0.8rem;
            }
            .search-icon {
                order: 3;
            }
            .hamburger-school {
                order: 2;
            }
            .apply-btn {
                order: 1;
                font-size: 0.7rem;
                padding: 0.3rem 0.8rem;
            }
            /* Blue navbar becomes column wrap for logo & actions */
            .main-navbar-blue {
                flex-wrap: wrap;
                justify-content: space-between;
                padding: 0.4rem 4%;
            }
            /* Mobile menu styling */
            .mobile-menu.show {
                display: flex;
            }
            .school-content {
                padding: 0 4%;
                margin: 1rem auto;
            }
            .page h2 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>

    <!-- Desktop white navbar (hidden on mobile) -->
    <div class="top-navbar-white">
        <div class="contact-info">
            <a href="tel:+254727791668"><i class="fas fa-phone-alt"></i> +254 727791668</a>
            <a href="mailto:school@greatmercy.org"><i class="fas fa-envelope"></i> school@greatmercy.org</a>
        </div>
        <div class="right-group">
            <div class="links-right">
                <a href="#">Alumni</a>
                <a href="#">Students</a>
                <a href="#">Staff & Faculty</a>
                <a href="#">Quicklinks</a>
            </div>
            <span class="separator">|</span>
            <div class="social-right">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Blue navbar (logo + actions) -->
    <div class="main-navbar-blue">
        <div class="logo-area">
            <img src="{{ asset('logo.png') }}" alt="School Logo">
        </div>
        <div class="nav-links" id="desktopNavLinks">
            <a href="{{ route('home') }}" class="@yield('nav-home')">Home</a>
            <a href="{{ route('school.academics') }}" class="@yield('nav-academics')">Academics</a>
            <a href="{{ route('school.admission') }}" class="@yield('nav-admission')">Admission & Fees</a>
            <a href="{{ route('school.about') }}" class="@yield('nav-about')">About Us</a>
            <a href="{{ route('school.contact') }}" class="@yield('nav-contact')">Contact</a>
        </div>
        <div class="right-actions">

            <a href="{{ route('school.apply') }}" class="apply-btn">Apply Now</a>
            <button class="hamburger-school" id="schoolHamburger"><i class="fas fa-bars"></i></button>
            <button class="search-icon" id="searchBtn"><i class="fas fa-search"></i></button>
        </div>
    </div>

    <!-- Mobile menu – hidden by default, toggled by hamburger -->
    <div class="mobile-menu" id="mobileMenu">
        <!-- Links from white navbar -->
        <a href="#">Alumni</a>
        <a href="#">Students</a>
        <a href="#">Staff & Faculty</a>
        <a href="#">Quicklinks</a>
        <!-- Links from blue navbar -->
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('school.academics') }}">Academics</a>
        <a href="{{ route('school.admission') }}">Admission & Fees</a>
        <a href="{{ route('school.about') }}">About Us</a>
        <a href="{{ route('school.contact') }}">Contact</a>
        <!-- Additional contact info & social icons (optional, for better UX) -->
        <a href="tel:+254727791668"><i class="fas fa-phone-alt"></i> +254 727791668</a>
        <a href="mailto:school@greatmercy.org"><i class="fas fa-envelope"></i> school@greatmercy.org</a>
        <div style="padding: 0.8rem 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1);">
            <div class="social-right" style="gap: 1rem; justify-content: center;">
                <a href="#" style="color: white;"><i class="fab fa-facebook-f"></i></a>
                <a href="#" style="color: white;"><i class="fab fa-twitter"></i></a>
                <a href="#" style="color: white;"><i class="fab fa-instagram"></i></a>
                <a href="#" style="color: white;"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <div class="school-content">
        @yield('content')
    </div>

    <div class="school-footer">
        <p>&copy; 2026 Great Mercy School. All rights reserved.</p>
    </div>

    <script>
        const hamburger = document.getElementById('schoolHamburger');
        const mobileMenu = document.getElementById('mobileMenu');
        if (hamburger) {
            hamburger.addEventListener('click', function() {
                mobileMenu.classList.toggle('show');
            });
        }
        const searchBtn = document.getElementById('searchBtn');
        if (searchBtn) {
            searchBtn.addEventListener('click', function() {
                alert('Search feature coming soon.');
            });
        }
    </script>
</body>
</html>
