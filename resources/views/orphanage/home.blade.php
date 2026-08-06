<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Great Mercy Orphanage | Hope & Care</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background: #e8f4f8; color: #2c3e50; line-height: 1.6; }

        /* Breadcrumb */
        .breadcrumb {
            background: #0a3d33;
            padding: 0.5rem 5%;
            font-size: 0.8rem;
        }
        .breadcrumb a { color: white; text-decoration: none; }
        .breadcrumb a:hover { color: #f0b429; }
        .breadcrumb span { color: white; }

        /* Header */
        .orphanage-header {
            background: linear-gradient(135deg, #1a6d5e 0%, #0f5c4e 100%);
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .logo-area { display: flex; align-items: center; gap: 0.8rem; }
        .logo-area img { height: 50px; }
        .logo-area h1 { font-size: 1.3rem; color: white; font-weight: 700; }

        .nav-links { display: flex; gap: 2rem; flex-wrap: wrap; }
        .nav-links a { color: white; text-decoration: none; font-weight: 500; font-size: 0.9rem; transition: 0.2s; }
        .nav-links a:hover { color: #f0b429; }

        .donate-btn {
            background: #f0b429;
            color: #1a6d5e;
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
            transition: 0.2s;
        }
        .donate-btn:hover { background: #ffcc4a; transform: translateY(-2px); }

        /* Hero Section */
        .orphanage-hero {
            position: relative;
            height: 500px;
            background: linear-gradient(135deg, #1a6d5e 0%, #0f5c4e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }
        .hero-overlay { position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.3); }
        .hero-content { position: relative; z-index: 1; max-width: 800px; padding: 2rem; }
        .hero-content h1 { font-size: 3rem; margin-bottom: 1rem; font-weight: 800; }
        .hero-content p { font-size: 1.1rem; margin-bottom: 2rem; }
        .hero-btn {
            background: #f0b429;
            color: #1a6d5e;
            padding: 0.8rem 2rem;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 700;
            margin: 0 0.5rem;
            display: inline-block;
        }
        .hero-btn-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
            padding: 0.8rem 2rem;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 700;
            margin: 0 0.5rem;
            display: inline-block;
        }
        .hero-btn:hover, .hero-btn-outline:hover { transform: translateY(-3px); }

        /* Stats */
        .stats-section { padding: 3rem 5%; background: white; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; text-align: center; max-width: 1200px; margin: 0 auto; }
        .stat-number { font-size: 2.5rem; font-weight: 800; color: #1a6d5e; }
        .stat-label { font-size: 0.85rem; color: #666; }

        /* Mission */
        .mission-section { padding: 4rem 5%; background: #f0f7f5; }
        .mission-container { max-width: 1200px; margin: 0 auto; text-align: center; }
        .mission-container h2 { font-size: 2rem; color: #1a6d5e; margin-bottom: 0.5rem; }
        .section-tag { color: #f0b429; font-size: 0.8rem; letter-spacing: 2px; text-transform: uppercase; }
        .mission-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; margin-top: 2rem; }
        .mission-card { background: white; padding: 2rem; border-radius: 16px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .mission-card i { font-size: 2.5rem; color: #1a6d5e; margin-bottom: 1rem; }
        .mission-card h3 { font-size: 1.2rem; margin-bottom: 0.5rem; color: #1a6d5e; }
        .mission-card p { font-size: 0.85rem; color: #555; }

        /* Help */
        .help-section { padding: 4rem 5%; background: #f0b429; text-align: center; }
        .help-container { max-width: 1000px; margin: 0 auto; }
        .help-container h2 { font-size: 2rem; color: #1a6d5e; margin-bottom: 0.5rem; }
        .help-container p { color: #1a6d5e; margin-bottom: 2rem; }
        .help-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 2rem; }
        .help-card { background: white; padding: 1.5rem; border-radius: 12px; }
        .help-card i { font-size: 2rem; color: #f0b429; margin-bottom: 0.5rem; }
        .help-card h3 { font-size: 1rem; margin-bottom: 0.5rem; color: #1a6d5e; }
        .help-card p { font-size: 0.8rem; color: #666; }

        /* CTA */
        .cta-section { padding: 4rem 5%; background: #1a6d5e; text-align: center; color: white; }
        .cta-container { max-width: 800px; margin: 0 auto; }
        .cta-container h2 { font-size: 1.8rem; margin-bottom: 1rem; }
        .cta-container p { margin-bottom: 2rem; opacity: 0.9; }
        .cta-btn { background: #f0b429; color: #1a6d5e; padding: 0.7rem 2rem; border-radius: 40px; text-decoration: none; font-weight: 700; margin: 0 0.5rem; display: inline-block; }
        .cta-btn-outline { background: transparent; color: white; border: 2px solid white; padding: 0.7rem 2rem; border-radius: 40px; text-decoration: none; font-weight: 700; margin: 0 0.5rem; display: inline-block; }

        /* Footer */
        .orphanage-footer { background: #0a3d33; color: white; padding: 2rem 5%; text-align: center; }
        .footer-content { max-width: 1200px; margin: 0 auto; }
        .footer-content p { font-size: 0.75rem; opacity: 0.8; }

        @media (max-width: 768px) {
            .orphanage-header { flex-direction: column; text-align: center; }
            .hero-content h1 { font-size: 1.8rem; }
            .hero-btn, .hero-btn-outline { margin: 0.5rem; }
            .nav-links { justify-content: center; gap: 1rem; }
        }
    </style>
</head>
<body>


    <div class="orphanage-header">
        <div class="logo-area">
            <img src="{{ asset('logo.png') }}" alt="Logo">
            <h1>Great Mercy Orphanage</h1>
        </div>
        <div class="nav-links">
            <a href="{{ url('/orphanage') }}">Home</a>
            <a href="{{ url('/orphanage/mission') }}">Our Mission</a>
            <a href="{{ url('/orphanage/sponsor') }}">Sponsor a Child</a>
            <a href="{{ url('/orphanage/contact') }}">Contact</a>
        </div>
        <a href="{{ url('/orphanage/sponsor') }}" class="donate-btn">❤️ Sponsor Now</a>
    </div>

    <section class="orphanage-hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Providing Hope & Shelter</h1>
            <p>Every child deserves a loving home, quality education, and a bright future.</p>
            <a href="{{ url('/orphanage/sponsor') }}" class="hero-btn">Sponsor a Child</a>
            <a href="{{ url('/orphanage/contact') }}" class="hero-btn-outline">Make a Donation</a>
        </div>
    </section>

    <section class="stats-section">
        <div class="stats-grid">
            <div class="stat-card"><div class="stat-number">150+</div><div class="stat-label">Children Cared For</div></div>
            <div class="stat-card"><div class="stat-number">25+</div><div class="stat-label">Dedicated Staff</div></div>
            <div class="stat-card"><div class="stat-number">100%</div><div class="stat-label">School Enrollment</div></div>
            <div class="stat-card"><div class="stat-number">15+</div><div class="stat-label">Years of Service</div></div>
        </div>
    </section>

    <section class="mission-section">
        <div class="mission-container">
            <span class="section-tag">Our Purpose</span>
            <h2>Every Child Deserves a Family</h2>
            <div class="mission-grid">
                <div class="mission-card"><i class="fas fa-home"></i><h3>A Safe Home</h3><p>We provide a loving, safe, and nurturing environment for orphaned and vulnerable children.</p></div>
                <div class="mission-card"><i class="fas fa-book"></i><h3>Quality Education</h3><p>All children are enrolled in school with access to books, uniforms, and tuition support.</p></div>
                <div class="mission-card"><i class="fas fa-heart"></i><h3>Spiritual Nourishment</h3><p>We nurture spiritual growth through chapel services and moral guidance.</p></div>
                <div class="mission-card"><i class="fas fa-hands-helping"></i><h3>Skills Development</h3><p>Vocational training and life skills to prepare children for independent living.</p></div>
            </div>
        </div>
    </section>

    <section class="help-section">
        <div class="help-container">
            <h2>How You Can Help</h2>
            <p>Your support transforms lives. Join us in making a difference.</p>
            <div class="help-grid">
                <div class="help-card"><i class="fas fa-hand-holding-heart"></i><h3>Sponsor a Child</h3><p>Support a child's education, food, and care for Ksh 3,000/month</p></div>
                <div class="help-card"><i class="fas fa-gift"></i><h3>Make a Donation</h3><p>One-time or monthly donations for food, medicine, and supplies</p></div>
                <div class="help-card"><i class="fas fa-users"></i><h3>Volunteer</h3><p>Share your time and skills with our children</p></div>
                <div class="help-card"><i class="fas fa-church"></i><h3>Pray for Us</h3><p>Your prayers support our mission and children</p></div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="cta-container">
            <h2>Ready to Make a Difference?</h2>
            <p>Your sponsorship or donation can change a child's life forever.</p>
            <a href="{{ url('/orphanage/sponsor') }}" class="cta-btn">Sponsor a Child</a>
            <a href="{{ url('/orphanage/contact') }}" class="cta-btn-outline">Contact Us</a>
        </div>
    </section>

    <div class="orphanage-footer">
        <div class="footer-content">
            <p>📍 Kitale, Kenya | 📞 +254 727791668 | ✉️ orphanage@greatmercy.org</p>
            <p>&copy; 2026 Great Mercy Orphanage. All rights reserved. | Providing hope, love, and care to vulnerable children.</p>
        </div>
    </div>

</body>
</html>
