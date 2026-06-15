@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section (only once) -->
    <section class="hero">
        <img src="hero.jpeg" alt="Great Mercy campus" class="hero-image">
        <div class="hero-content">
            <h1>Welcome to Great Mercy</h1>
            <div class="hero-logo">
                <img src="{{ asset('logo.png') }}" alt="Great Mercy Logo">
            </div>
            <p>Character will earn you opportunities.</p>
            <button class="btn" id="enrollBtn">✨ Need to Enroll?</button>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="section">
        <h2 class="title">Overview</h2>
        <div class="cards">
            <div class="card"><h3>🏢 School</h3><p>To nurture all round competent and transformed children that make a difference in the community.</p></div>
            <div class="card"><h3>🏠 Orphanage</h3><p>Providing shelter, education, food and spiritual nourishment to orphaned and vulnerable children.</p></div>
            <div class="card"><h3>🏥 Clinic</h3><p>Healthy communities, Healthy futures.</p></div>
            <div class="card"><h3>⛪ Chapel</h3><p>Light, Love and Life in Christ.</p></div>
        </div>
    </section>

    <!-- Stats Section -->
    <div class="stats">
        <div><h2>7000+</h2><p>Children Supported</p></div>
        <div><h2>70+</h2><p>Staff Members</p></div>
        <div><h2>40+</h2><p>Outreach Programs</p></div>
        <div><h2>95%</h2><p>Community Impact</p></div>
    </div>

    <!-- CTA Section -->
    <section class="section cta">
        <h2>🚀 Ready to Make a Difference?</h2>
        <p>Join us in transforming lives through education, healthcare, and spiritual care.</p>
        <a href="#" class="btn">Support Our Work →</a>
    </section>

    <!-- News Section -->
    <section class="section news">
        <h2 class="title">Latest News & Events</h2>
        <div class="cards">
            <div class="card"><h3>💡 Community Outreach 2025</h3><p>Free medical camp and school supplies distribution.</p></div>
            <div class="card"><h3>🎓 Scholarship Drive</h3><p>Sponsorship opportunities for vulnerable children.</p></div>
            <div class="card"><h3>🌍 Spiritual Retreat</h3><p>Annual chapel conference – all are welcome.</p></div>
        </div>
    </section>

    <!-- Enrollment Modal -->
    <div id="enrollModal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header"><h3>Select Enrollment Program</h3><button class="modal-close" id="closeModalBtn">&times;</button></div>
            <div class="modal-body"><p>Which program would you like to enroll in?</p><div class="enroll-options"><button class="enroll-btn" id="homeProgramBtn">🏠 Home Program</button><button class="enroll-btn" id="schoolProgramBtn">📚 School Program</button></div></div>
        </div>
    </div>
@endsection
