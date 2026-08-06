<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni - Great Mercy School</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f4f6f9;
            color: #1e2a3e;
        }

        /* Top Navigation */
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
        .alumni-nav .nav-links a.active {
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

        /* Hero */
        .alumni-hero {
            background: linear-gradient(135deg, #002D62 0%, #004a9a 100%);
            color: white;
            text-align: center;
            padding: 3rem 2rem;
        }
        .alumni-hero h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }
        .alumni-hero p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        .alumni-hero .hero-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }
        .alumni-hero .hero-stats span {
            font-size: 1.5rem;
            font-weight: 700;
            color: #F5DD00;
        }
        .alumni-hero .hero-stats label {
            display: block;
            font-size: 0.8rem;
            opacity: 0.8;
        }

        /* Alumni Grid */
        .alumni-section {
            padding: 3rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }
        .alumni-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }
        .alumni-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: all 0.3s;
            cursor: pointer;
            border: 1px solid #e0e7ed;
        }
        .alumni-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
        .alumni-card .card-image {
            height: 200px;
            background: #eef2f7;
            overflow: hidden;
            position: relative;
        }
        .alumni-card .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .alumni-card .card-image .placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            font-size: 4rem;
            color: #ccc;
        }
        .alumni-card .card-content {
            padding: 1.5rem;
            text-align: center;
        }
        .alumni-card .card-content h3 {
            color: #002D62;
            font-size: 1.1rem;
            margin-bottom: 0.2rem;
        }
        .alumni-card .card-content .year {
            font-size: 0.8rem;
            color: #F5DD00;
            font-weight: 600;
            background: #002D62;
            padding: 0.1rem 0.6rem;
            border-radius: 20px;
            display: inline-block;
        }
        .alumni-card .card-content .occupation {
            font-size: 0.85rem;
            color: #555;
            margin: 0.5rem 0;
        }
        .alumni-card .card-content .bio {
            font-size: 0.8rem;
            color: #666;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .alumni-card .card-content .view-btn {
            display: inline-block;
            margin-top: 0.8rem;
            color: #002D62;
            font-weight: 600;
            font-size: 0.8rem;
            text-decoration: none;
            border-bottom: 2px solid #F5DD00;
            padding-bottom: 0.2rem;
            transition: 0.2s;
        }
        .alumni-card .card-content .view-btn:hover {
            color: #F5DD00;
        }

        .no-alumni {
            text-align: center;
            color: #999;
            padding: 3rem;
            grid-column: 1 / -1;
        }

        /* Footer */
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
            .alumni-hero h1 { font-size: 1.8rem; }
            .alumni-hero .hero-stats { gap: 1.5rem; }
            .alumni-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- REMOVED: Back to Main Site section -->

    <!-- Top Navigation -->
    <nav class="alumni-nav">
        <div class="logo-area">
            <img src="{{ asset('logo.png') }}" alt="Logo">
            <span>Great Mercy Alumni</span>
        </div>
        <div class="nav-links">
            <a href="{{ route('alumni.index') }}" class="active">Home</a>
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

    <!-- Hero -->
    <section class="alumni-hero">
        <h1>Great Mercy Alumni</h1>
        <p>Once a Mercy student, always part of the family.</p>
        <div class="hero-stats">
            <div>
                <span>{{ $alumni->count() }}</span>
                <label>Alumni Registered</label>
            </div>
            <div>
                <span>{{ $alumni->where('graduation_year', '>=', date('Y')-5)->count() }}</span>
                <label>Recent Graduates</label>
            </div>
            <div>
                <span>{{ $alumni->where('graduation_year', '<=', date('Y')-10)->count() }}</span>
                <label>Lifetime Members</label>
            </div>
        </div>
    </section>

    <!-- Alumni Grid -->
    <section class="alumni-section">
        @if($alumni->count() > 0)
            <div class="alumni-grid">
                @foreach($alumni as $alum)
                <div class="alumni-card" onclick="window.location='{{ route('alumni.show', $alum) }}'">
                    <div class="card-image">
                        @if($alum->image)
                            <img src="{{ asset('storage/' . $alum->image) }}" alt="{{ $alum->name }}">
                        @else
                            <div class="placeholder">👤</div>
                        @endif
                    </div>
                    <div class="card-content">
                        <h3>{{ $alum->name }}</h3>
                        <span class="year">Class of {{ $alum->graduation_year }}</span>
                        <p class="occupation">{{ $alum->current_occupation ?? 'Making a difference' }}</p>
                        @if($alum->bio)
                            <p class="bio">{{ Str::limit($alum->bio, 80) }}</p>
                        @endif
                        <span class="view-btn">View Profile →</span>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p class="no-alumni">No alumni added yet.</p>
        @endif
    </section>

    <!-- Footer -->
    <div class="alumni-footer">
        <p>&copy; 2026 Great Mercy School. All rights reserved. | <a href="{{ route('alumni.index') }}">Alumni</a> | <a href="{{ route('alumni.contact') }}">Contact</a></p>
    </div>

</body>
</html>
