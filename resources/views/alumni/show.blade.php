<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $alumni->name }} - Great Mercy Alumni</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f4f6f9;
            color: #1e2a3e;
        }

        .alumni-nav {
            background: #002D62;
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .alumni-nav .logo-area {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        .alumni-nav .logo-area img {
            height: 45px;
        }
        .alumni-nav .logo-area span {
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
        }
        .alumni-nav .nav-links {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }
        .alumni-nav .nav-links a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: 0.2s;
        }
        .alumni-nav .nav-links a:hover {
            color: #F5DD00;
        }
        .alumni-nav .nav-right {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        .alumni-nav .nav-right a {
            color: white;
            font-size: 1.1rem;
            transition: 0.2s;
        }
        .alumni-nav .nav-right a:hover {
            color: #F5DD00;
        }

        .back-to-main {
            background: #001B3A;
            padding: 0.5rem 5%;
            display: flex;
            justify-content: flex-end;
        }
        .back-to-main a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 0.8rem;
            transition: 0.2s;
        }
        .back-to-main a:hover {
            color: #F5DD00;
        }

        .breadcrumb {
            padding: 1rem 5%;
            background: white;
            border-bottom: 1px solid #e0e7ed;
            font-size: 0.85rem;
        }
        .breadcrumb a {
            color: #002D62;
            text-decoration: none;
        }
        .breadcrumb a:hover {
            color: #F5DD00;
        }
        .breadcrumb span {
            color: #999;
        }

        .profile-section {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 5%;
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2rem;
        }
        .profile-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            text-align: center;
            border: 1px solid #e0e7ed;
            align-self: start;
        }
        .profile-card .profile-image {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 1rem;
            border: 4px solid #F5DD00;
        }
        .profile-card .profile-placeholder {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: #eef2f7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            margin: 0 auto 1rem;
            border: 4px solid #e0e7ed;
            color: #ccc;
        }
        .profile-card h2 {
            color: #002D62;
            font-size: 1.3rem;
        }
        .profile-card .year-badge {
            font-size: 0.8rem;
            color: #F5DD00;
            font-weight: 600;
            background: #002D62;
            padding: 0.2rem 0.8rem;
            border-radius: 20px;
            display: inline-block;
            margin: 0.3rem 0;
        }
        .profile-card .occupation {
            color: #555;
            font-size: 0.9rem;
            margin: 0.5rem 0;
        }
        .profile-card .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }
        .profile-card .social-links a {
            color: #002D62;
            font-size: 1.2rem;
            transition: 0.2s;
        }
        .profile-card .social-links a:hover {
            color: #F5DD00;
        }

        .profile-details {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            border: 1px solid #e0e7ed;
        }
        .profile-details h3 {
            color: #002D62;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            border-bottom: 2px solid #F5DD00;
            padding-bottom: 0.5rem;
        }
        .profile-details .detail-item {
            display: flex;
            padding: 0.8rem 0;
            border-bottom: 1px solid #f0f2f5;
        }
        .profile-details .detail-item .label {
            font-weight: 600;
            width: 140px;
            color: #333;
        }
        .profile-details .detail-item .value {
            color: #555;
            flex: 1;
        }
        .profile-details .bio-text {
            color: #555;
            line-height: 1.6;
            margin-top: 0.5rem;
        }
        .profile-details .message-box {
            background: #f8f9fc;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
            border-left: 4px solid #F5DD00;
        }
        .profile-details .message-box p {
            font-style: italic;
            color: #555;
            font-size: 0.95rem;
        }

        .back-btn {
            display: inline-block;
            margin-top: 1.5rem;
            color: #002D62;
            font-weight: 600;
            text-decoration: none;
            border-bottom: 2px solid #F5DD00;
            padding-bottom: 0.2rem;
            transition: 0.2s;
        }
        .back-btn:hover {
            color: #F5DD00;
        }

        .alumni-footer {
            background: #001B3A;
            color: #cbd5e1;
            text-align: center;
            padding: 1.5rem;
            font-size: 0.8rem;
            margin-top: 2rem;
        }
        .alumni-footer a {
            color: #cbd5e1;
            text-decoration: none;
        }
        .alumni-footer a:hover {
            color: #F5DD00;
        }

        @media (max-width: 768px) {
            .alumni-nav { flex-direction: column; text-align: center; }
            .alumni-nav .nav-links { justify-content: center; gap: 1rem; }
            .profile-section { grid-template-columns: 1fr; }
            .profile-card .profile-image { width: 140px; height: 140px; }
            .profile-card .profile-placeholder { width: 140px; height: 140px; font-size: 3rem; }
            .profile-details .detail-item { flex-direction: column; gap: 0.2rem; }
            .profile-details .detail-item .label { width: auto; }
        }
    </style>
</head>
<body>

    <!-- Back to Main Site -->
    <div class="back-to-main">
        <a href="{{ route('home') }}"><i class="fas fa-arrow-left"></i> Back to Main Site</a>
    </div>

    <!-- Top Navigation -->
    <nav class="alumni-nav">
        <div class="logo-area">
            <img src="{{ asset('logo.png') }}" alt="Logo">
            <span>Great Mercy Alumni</span>
        </div>
        <div class="nav-links">
            <a href="{{ route('alumni.index') }}">Home</a>
            <a href="{{ route('alumni.about') }}">About Us</a>
            <a href="{{ route('alumni.membership') }}">Membership</a>
            <a href="{{ route('alumni.donate') }}">Donate</a>
            <a href="{{ route('alumni.contact') }}">Contact Us</a>
        </div>
        <div class="nav-right">
            <a href="tel:+254727791668"><i class="fas fa-phone-alt"></i></a>
            <a href="mailto:alumni@greatmercy.org"><i class="fas fa-envelope"></i></a>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ route('alumni.index') }}">Alumni</a>
        <span> / {{ $alumni->name }}</span>
    </div>

    <!-- Profile Section -->
    <section class="profile-section">
        <div class="profile-card">
            @if($alumni->image)
                <img src="{{ asset('storage/' . $alumni->image) }}" alt="{{ $alumni->name }}" class="profile-image">
            @else
                <div class="profile-placeholder">👤</div>
            @endif
            <h2>{{ $alumni->name }}</h2>
            <span class="year-badge">Class of {{ $alumni->graduation_year }}</span>
            <p class="occupation">{{ $alumni->current_occupation ?? 'Making a difference' }}</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>

        <div class="profile-details">
            <h3>About {{ $alumni->name }}</h3>

            <div class="detail-item">
                <span class="label">Full Name</span>
                <span class="value">{{ $alumni->name }}</span>
            </div>
            <div class="detail-item">
                <span class="label">Graduation Year</span>
                <span class="value">{{ $alumni->graduation_year }}</span>
            </div>
            @if($alumni->current_occupation)
            <div class="detail-item">
                <span class="label">Current Occupation</span>
                <span class="value">{{ $alumni->current_occupation }}</span>
            </div>
            @endif
            @if($alumni->achievements)
            <div class="detail-item">
                <span class="label">Achievements</span>
                <span class="value">{{ $alumni->achievements }}</span>
            </div>
            @endif

            @if($alumni->bio)
                <h3 style="margin-top:1rem;">Biography</h3>
                <p class="bio-text">{{ $alumni->bio }}</p>
            @endif

            @if($alumni->message)
                <div class="message-box">
                    <p>"{{ $alumni->message }}"</p>
                </div>
            @endif

            <a href="{{ route('alumni.index') }}" class="back-btn">← Back to Alumni</a>
        </div>
    </section>

    <!-- Footer -->
    <div class="alumni-footer">
        <p>&copy; 2026 Great Mercy School. All rights reserved. | <a href="{{ route('alumni.index') }}">Alumni</a> | <a href="{{ route('alumni.contact') }}">Contact</a></p>
    </div>

</body>
</html>
