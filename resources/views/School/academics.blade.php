@extends('school.layout')

@section('title', 'Academics - Great Mercy School')

@section('nav-academics', 'active')

@section('content')
<div class="academics-page">

    <!-- Hero Section -->
    <section class="academics-hero">
        <div class="academics-hero-content">
            <div class="hero-badge">Excellence in Education</div>
            <h1>Academics</h1>
            <p>From Playgroup to Grade 9 — building strong foundations for lifelong learning.</p>
        </div>
        <div class="hero-wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
                <path fill="#f8f9fc" d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,100L1360,100C1280,100,1120,100,960,100C800,100,640,100,480,100C320,100,160,100,80,100L0,100Z"></path>
            </svg>
        </div>
    </section>

    <!-- Curriculum Overview -->
    <section class="curriculum-section">
        <div class="container">
            <div class="curriculum-content">
                <span class="section-tag">Our Approach</span>
                <h2>Blended Curriculum for Global Success</h2>
                <p>Great Mercy School combines the Kenyan national curriculum with Cambridge international programmes, giving students a competitive edge for both local and global opportunities.</p>
                <div class="curriculum-stats">
                    <div class="stat">
                        <span class="stat-number">15+</span>
                        <span class="stat-label">Years of Excellence</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Students Enrolled</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">40+</span>
                        <span class="stat-label">Qualified Teachers</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Academic Levels - Timeline Style -->
    <section class="levels-section">
        <div class="container">
            <span class="section-tag">Academic Levels</span>
            <h2>Our Learning Journey</h2>

            <div class="levels-timeline">
                <div class="level-item">
                    <div class="level-marker">
                        <span class="level-number">01</span>
                        <div class="level-line"></div>
                    </div>
                    <div class="level-content">
                        <div class="level-header">
                            <div class="level-icon"><i class="fas fa-child"></i></div>
                            <div>
                                <h3>Playgroup</h3>
                                <span class="level-age">Ages 3-4</span>
                            </div>
                        </div>
                        <p>Foundational learning through play-based activities, developing social skills, creativity, and early cognitive abilities.</p>
                    </div>
                </div>

                <div class="level-item">
                    <div class="level-marker">
                        <span class="level-number">02</span>
                        <div class="level-line"></div>
                    </div>
                    <div class="level-content">
                        <div class="level-header">
                            <div class="level-icon"><i class="fas fa-pencil-alt"></i></div>
                            <div>
                                <h3>PP1 - PP2</h3>
                                <span class="level-age">Ages 4-6</span>
                            </div>
                        </div>
                        <p>Early literacy and numeracy skills, creative arts, physical development, and social-emotional learning.</p>
                    </div>
                </div>

                <div class="level-item">
                    <div class="level-marker">
                        <span class="level-number">03</span>
                        <div class="level-line"></div>
                    </div>
                    <div class="level-content">
                        <div class="level-header">
                            <div class="level-icon"><i class="fas fa-book-open"></i></div>
                            <div>
                                <h3>Grade 1 - 3</h3>
                                <span class="level-age">Ages 6-9</span>
                            </div>
                        </div>
                        <p>Core subjects: English, Mathematics, Science, Kiswahili, Social Studies, and Digital Literacy basics.</p>
                    </div>
                </div>

                <div class="level-item">
                    <div class="level-marker">
                        <span class="level-number">04</span>
                        <div class="level-line"></div>
                    </div>
                    <div class="level-content">
                        <div class="level-header">
                            <div class="level-icon"><i class="fas fa-flask"></i></div>
                            <div>
                                <h3>Grade 4 - 6</h3>
                                <span class="level-age">Ages 9-12</span>
                            </div>
                        </div>
                        <p>STEM focus: Science, Mathematics, Technology, Languages, Arts, Social Studies, and introduction to Cambridge curriculum.</p>
                    </div>
                </div>

                <div class="level-item">
                    <div class="level-marker">
                        <span class="level-number">05</span>
                        <div class="level-line"></div>
                    </div>
                    <div class="level-content">
                        <div class="level-header">
                            <div class="level-icon"><i class="fas fa-laptop-code"></i></div>
                            <div>
                                <h3>Grade 7 - 9</h3>
                                <span class="level-age">Ages 12-15</span>
                            </div>
                        </div>
                        <p>Advanced STEM and languages, Cambridge international assessments, career guidance, and leadership development.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us - Pill Style -->
    <section class="features-section">
        <div class="container">
            <span class="section-tag">Why Great Mercy</span>
            <h2>What Makes Us Different</h2>
            <div class="features-pills">
                <div class="pill-item">
                    <div class="pill-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <div>
                        <h3>Qualified Teachers</h3>
                        <p>Experienced, passionate educators who nurture every child's potential.</p>
                    </div>
                </div>
                <div class="pill-item">
                    <div class="pill-icon"><i class="fas fa-book-reader"></i></div>
                    <div>
                        <h3>Modern Curriculum</h3>
                        <p>Blended Kenyan and Cambridge curriculum for global competitiveness.</p>
                    </div>
                </div>
                <div class="pill-item">
                    <div class="pill-icon"><i class="fas fa-laptop"></i></div>
                    <div>
                        <h3>Digital Learning</h3>
                        <p>Technology-integrated classrooms with modern learning resources.</p>
                    </div>
                </div>
                <div class="pill-item">
                    <div class="pill-icon"><i class="fas fa-hand-holding-heart"></i></div>
                    <div>
                        <h3>Character Development</h3>
                        <p>Holistic education that builds character, integrity, and leadership.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="academics-cta">
        <div class="container">
            <div class="cta-content">
                <h2>Start Your Child's Journey Today</h2>
                <p>Give your child the gift of quality education at Great Mercy School.</p>
                <div class="cta-buttons">
                    <a href="{{ route('school.apply') }}" class="cta-primary">Apply Now</a>
                    <a href="{{ route('school.contact') }}" class="cta-secondary">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

</div>

<style>
    .academics-page {
        background: #ffffff;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 5%;
    }

    .section-tag {
        display: inline-block;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #F5DD00;
        background: #002D62;
        padding: 0.2rem 0.8rem;
        border-radius: 30px;
        margin-bottom: 0.5rem;
    }

    /* Hero */
    .academics-hero {
        position: relative;
        padding: 3rem 2rem 0;
        text-align: center;
        background: linear-gradient(135deg, #f8f9fc 0%, #ffffff 100%);
        overflow: hidden;
    }

    .hero-badge {
        display: inline-block;
        background: #002D62;
        color: white;
        padding: 0.2rem 1rem;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .academics-hero-content h1 {
        font-size: 2.8rem;
        font-weight: 800;
        color: #002D62;
        margin-bottom: 0.5rem;
    }

    .academics-hero-content p {
        font-size: 1.1rem;
        color: #555;
        opacity: 0.8;
        max-width: 600px;
        margin: 0 auto;
    }

    .hero-wave {
        position: relative;
        margin-top: 2rem;
        line-height: 0;
    }

    /* Curriculum */
    .curriculum-section {
        padding: 3rem 0 2rem;
        background: #f8f9fc;
    }

    .curriculum-content {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    .curriculum-content h2 {
        font-size: 1.8rem;
        color: #002D62;
        margin-bottom: 0.8rem;
    }

    .curriculum-content p {
        font-size: 1rem;
        color: #555;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    .curriculum-stats {
        display: flex;
        justify-content: center;
        gap: 3rem;
        flex-wrap: wrap;
    }

    .stat {
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

    /* Levels - Timeline Style */
    .levels-section {
        padding: 3rem 0;
    }

    .levels-section h2 {
        text-align: center;
        font-size: 1.8rem;
        color: #002D62;
        margin-bottom: 2rem;
    }

    .levels-timeline {
        max-width: 800px;
        margin: 0 auto;
    }

    .level-item {
        display: flex;
        gap: 2rem;
        margin-bottom: 1.5rem;
        position: relative;
    }

    .level-marker {
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 60px;
    }

    .level-number {
        width: 45px;
        height: 45px;
        background: #002D62;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .level-line {
        width: 2px;
        flex: 1;
        background: #e0e7ed;
        margin-top: 0.3rem;
    }

    .level-item:last-child .level-line {
        display: none;
    }

    .level-content {
        flex: 1;
        padding-bottom: 0.5rem;
    }

    .level-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 0.3rem;
    }

    .level-icon i {
        font-size: 1.5rem;
        color: #F5DD00;
        width: 35px;
        text-align: center;
    }

    .level-header h3 {
        font-size: 1.1rem;
        color: #002D62;
        margin: 0;
    }

    .level-age {
        font-size: 0.7rem;
        color: #999;
        font-weight: 500;
        display: block;
    }

    .level-content p {
        font-size: 0.85rem;
        color: #555;
        line-height: 1.5;
        margin: 0;
        padding-left: 4rem;
    }

    /* Features - Pill Style */
    .features-section {
        padding: 3rem 0;
        background: #f8f9fc;
    }

    .features-section h2 {
        text-align: center;
        font-size: 1.8rem;
        color: #002D62;
        margin-bottom: 2rem;
    }

    .features-pills {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        max-width: 800px;
        margin: 0 auto;
    }

    .pill-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        background: white;
        padding: 1.2rem;
        border-radius: 16px;
        border: 1px solid #e0e7ed;
        transition: transform 0.2s;
    }

    .pill-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    .pill-icon i {
        font-size: 1.5rem;
        color: #002D62;
        min-width: 35px;
        margin-top: 0.2rem;
    }

    .pill-item h3 {
        font-size: 0.95rem;
        color: #002D62;
        margin: 0 0 0.2rem;
    }

    .pill-item p {
        font-size: 0.8rem;
        color: #555;
        margin: 0;
        line-height: 1.4;
    }

    /* CTA */
    .academics-cta {
        padding: 3rem 0;
        background: linear-gradient(135deg, #002D62 0%, #004a9a 100%);
        text-align: center;
        color: white;
    }

    .cta-content h2 {
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
    }

    .cta-content p {
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
        padding: 0.7rem 2rem;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.2s;
    }

    .cta-primary:hover {
        transform: translateY(-2px);
        background: #ffe53a;
    }

    .cta-secondary {
        background: transparent;
        color: white;
        padding: 0.7rem 2rem;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 700;
        border: 2px solid white;
        transition: 0.2s;
    }

    .cta-secondary:hover {
        transform: translateY(-2px);
        background: rgba(255,255,255,0.1);
    }

    @media (max-width: 768px) {
        .academics-hero-content h1 {
            font-size: 2rem;
        }
        .curriculum-stats {
            gap: 1.5rem;
        }
        .stat-number {
            font-size: 1.5rem;
        }
        .level-item {
            gap: 1rem;
        }
        .level-content p {
            padding-left: 0;
        }
        .level-header {
            flex-wrap: wrap;
        }
        .features-pills {
            grid-template-columns: 1fr;
        }
        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
    }

    @media (max-width: 500px) {
        .level-number {
            width: 35px;
            height: 35px;
            font-size: 0.7rem;
        }
        .level-header h3 {
            font-size: 0.95rem;
        }
    }
</style>
@endsection
