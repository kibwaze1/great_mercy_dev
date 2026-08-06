@extends('school.layout')

@section('title', 'About Us - Great Mercy School')

@section('nav-about', 'active')

@section('content')
<div class="about-page">

    <!-- Hero Section - No Blue Card -->
    <section class="about-hero">
        <div class="about-hero-content">
            <h1>About Great Mercy School</h1>
            <p>Excellence in Education, Character, and Service</p>
        </div>
    </section>

    <!-- Overview -->
    <section class="about-overview">
        <div class="container">
            <div class="overview-grid">
                <div class="overview-text">
                    <h2>Who We Are</h2>
                    <p>Great Mercy Education Centre is a private Christian school in Kitale, Kenya. We provide quality education from Playgroup to Grade 9, combining the Kenyan national curriculum with Cambridge international programmes.</p>
                    <p>Our focus is on academic excellence, character development, and spiritual growth.</p>
                </div>
                <div class="overview-stats">
                    <div class="stat-box">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Students</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-number">40+</span>
                        <span class="stat-label">Teachers</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-number">15+</span>
                        <span class="stat-label">Years</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="mission-vision">
        <div class="container">
            <div class="mv-grid">
                <div class="mv-card">
                    <div class="mv-icon"><i class="fas fa-bullseye"></i></div>
                    <h3>Our Mission</h3>
                    <p>To nurture competent, transformed children who make a difference in the community through quality education, love, and spiritual nourishment.</p>
                </div>
                <div class="mv-card">
                    <div class="mv-icon"><i class="fas fa-eye"></i></div>
                    <h3>Our Vision</h3>
                    <p>To be a center of excellence in holistic education, producing morally upright, innovative, and transformative leaders.</p>
                </div>
                <div class="mv-card">
                    <div class="mv-icon"><i class="fas fa-heart"></i></div>
                    <h3>Core Values</h3>
                    <ul>
                        <li>Integrity & Honesty</li>
                        <li>Excellence</li>
                        <li>Discipline</li>
                        <li>Innovation</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Facts -->
    <section class="quick-facts">
        <div class="container">
            <h2>Quick Facts</h2>
            <div class="facts-grid">
                <div class="fact-item">
                    <i class="fas fa-calendar-check"></i>
                    <span>Founded: 2010</span>
                </div>
                <div class="fact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Location: Kitale, Kenya</span>
                </div>
                <div class="fact-item">
                    <i class="fas fa-certificate"></i>
                    <span>Ministry of Education Registered</span>
                </div>
                <div class="fact-item">
                    <i class="fas fa-hand-holding-heart"></i>
                    <span>Scholarships Available</span>
                </div>
            </div>
        </div>
    </section>

    <!-- History Section - Bottom, Prose Style, Wide -->
    <section class="history-section">
        <div class="container-wide">
            <div class="history-content">
                <h2>Our History</h2>
                <div class="history-text">
                    <p>Great Mercy Education Centre was founded in 2010 as a small community initiative with just 15 students, driven by a vision to provide quality, affordable education to children in Kitale. What started as a humble beginning has grown into a thriving educational institution serving over 500 students today.</p>
                    <p>In 2013, the school expanded to include primary education, growing to 120 students with the addition of new classrooms and qualified teachers. This marked a significant milestone in the school's journey toward becoming a full-fledged educational centre.</p>
                    <p>By 2016, Great Mercy had become a fully registered institution with the Ministry of Education, offering a blended curriculum that combines the Kenyan national curriculum with Cambridge international programmes. This recognition opened doors for greater opportunities and academic excellence.</p>
                    <p>The year 2020 brought modernization to the school with the introduction of computer labs, smart classrooms, and digital learning resources. Technology became a key part of the learning experience, preparing students for the digital age.</p>
                    <p>Today, Great Mercy Education Centre stands as a beacon of hope, serving over 500 students with 40+ dedicated teachers. We offer holistic education from Playgroup to Grade 9, nurturing morally upright, competent, and transformative leaders who make a difference in the community.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="about-cta">
        <div class="container">
            <h2>Join Our Community</h2>
            <p>Enroll your child today for a brighter future.</p>
            <div class="cta-buttons">
                <a href="{{ route('school.apply') }}" class="cta-primary">Apply Now</a>
                <a href="{{ route('school.contact') }}" class="cta-secondary">Contact Us</a>
            </div>
        </div>
    </section>

</div>

<style>
    .about-page {
        background: #ffffff;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 5%;
    }

    .container-wide {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 5%;
    }

    /* Hero - No Blue Card */
    .about-hero {
        padding: 3rem 2rem 1rem;
        text-align: center;
        background: #ffffff;
    }

    .about-hero-content h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #002D62;
        margin-bottom: 0.5rem;
    }

    .about-hero-content p {
        font-size: 1.1rem;
        color: #555;
        opacity: 0.8;
    }

    /* Overview */
    .about-overview {
        padding: 4rem 0;
        background: #ffffff;
    }

    .overview-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
    }

    .overview-text h2 {
        font-size: 1.8rem;
        color: #002D62;
        margin-bottom: 1rem;
    }

    .overview-text p {
        font-size: 0.95rem;
        color: #555;
        line-height: 1.6;
        margin-bottom: 0.8rem;
    }

    .overview-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .stat-box {
        background: #f8f9fc;
        padding: 1.5rem;
        border-radius: 12px;
        text-align: center;
    }

    .stat-number {
        display: block;
        font-size: 2rem;
        font-weight: 800;
        color: #002D62;
    }

    .stat-label {
        font-size: 0.8rem;
        color: #666;
    }

    /* Mission & Vision */
    .mission-vision {
        padding: 4rem 0;
        background: #f8f9fc;
    }

    .mv-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .mv-card {
        text-align: center;
        padding: 1.5rem;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .mv-icon i {
        font-size: 2rem;
        color: #002D62;
        margin-bottom: 0.5rem;
    }

    .mv-card h3 {
        font-size: 1.1rem;
        color: #002D62;
        margin-bottom: 0.5rem;
    }

    .mv-card p {
        font-size: 0.85rem;
        color: #555;
        line-height: 1.5;
    }

    .mv-card ul {
        list-style: none;
        text-align: left;
        padding-left: 0.5rem;
    }

    .mv-card ul li {
        font-size: 0.85rem;
        color: #555;
        padding: 0.3rem 0;
        position: relative;
        padding-left: 1.2rem;
    }

    .mv-card ul li:before {
        content: '✓';
        color: #F5DD00;
        position: absolute;
        left: 0;
        font-weight: bold;
    }

    /* Quick Facts */
    .quick-facts {
        padding: 4rem 0;
        background: #ffffff;
    }

    .quick-facts h2 {
        text-align: center;
        font-size: 1.8rem;
        color: #002D62;
        margin-bottom: 2rem;
    }

    .facts-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
        max-width: 900px;
        margin: 0 auto;
    }

    .fact-item {
        background: #f8f9fc;
        padding: 1.2rem;
        border-radius: 12px;
        text-align: center;
        border: 1px solid #e0e7ed;
    }

    .fact-item i {
        font-size: 1.5rem;
        color: #F5DD00;
        margin-bottom: 0.3rem;
        display: block;
    }

    .fact-item span {
        font-size: 0.85rem;
        color: #333;
        font-weight: 500;
    }

    /* History Section - Bottom, Prose, Wide */
    .history-section {
        padding: 4rem 0 3rem;
        background: #f8f9fc;
    }

    .history-content h2 {
        text-align: center;
        font-size: 1.8rem;
        color: #002D62;
        margin-bottom: 2rem;
    }

    .history-text {
        background: #ffffff;
        padding: 2.5rem 3rem;
        border-radius: 12px;
        border: 1px solid #e0e7ed;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .history-text p {
        font-size: 0.95rem;
        color: #555;
        line-height: 1.8;
        margin-bottom: 1.2rem;
    }

    .history-text p:last-child {
        margin-bottom: 0;
    }

    /* CTA */
    .about-cta {
        padding: 3rem 0;
        background: #002D62;
        text-align: center;
        color: white;
    }

    .about-cta h2 {
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
    }

    .about-cta p {
        margin-bottom: 1.5rem;
        opacity: 0.8;
    }

    .cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cta-primary {
        background: #F5DD00;
        color: #001B3A;
        padding: 0.6rem 1.8rem;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.2s;
    }

    .cta-primary:hover {
        transform: translateY(-2px);
        background: #ffe53a;
    }

    .cta-secondary {
        background: transparent;
        color: white;
        padding: 0.6rem 1.8rem;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
        border: 2px solid white;
        transition: 0.2s;
    }

    .cta-secondary:hover {
        transform: translateY(-2px);
        background: rgba(255,255,255,0.1);
    }

    @media (max-width: 768px) {
        .history-text {
            padding: 1.5rem 1.5rem;
        }
        .history-text p {
            font-size: 0.9rem;
        }
        .overview-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        .overview-stats {
            grid-template-columns: repeat(3, 1fr);
        }
        .mv-grid {
            grid-template-columns: 1fr;
        }
        .facts-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .about-hero-content h1 {
            font-size: 1.8rem;
        }
        .container-wide {
            padding: 0 4%;
        }
    }

    @media (max-width: 500px) {
        .history-text {
            padding: 1rem;
        }
        .overview-stats {
            grid-template-columns: 1fr;
        }
        .facts-grid {
            grid-template-columns: 1fr;
        }
        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
    }
</style>
@endsection
