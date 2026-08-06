@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <img src="{{ $heroUrl ?? asset('hero.jpeg') }}" alt="Great Mercy campus" class="hero-image">
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
            <div class="card" onclick="window.open('{{ route('school.home') }}', '_blank')"><h3>🏢 School</h3><p>To nurture all round competent and transformed children that make a difference in the community.</p></div>
            <div class="card" onclick="window.open('{{ route('orphanage.home') }}', '_blank')"><h3>🏠 Orphanage</h3><p>Providing shelter, education, food and spiritual nourishment to orphaned and vulnerable children.</p></div>
            <div class="card" onclick="window.open('{{ route('clinic.home') }}', '_blank')"><h3>🏥 Clinic</h3><p>Healthy communities, Healthy futures.</p></div>
            <div class="card" onclick="window.open('{{ route('chapel.home') }}', '_blank')"><h3>⛪ Chapel</h3><p>Light, Love and Life in Christ.</p></div>
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

    <!-- News Section - EXACT ADMIN STYLE CARDS (without edit/delete) -->
    <section class="section news">
        <h2 class="title">Latest News & Events</h2>
        <div class="home-news-grid">
            @if($news->count() > 0)
                @foreach($news as $item)
                <div class="home-news-card">
                    @if($item->image && file_exists(public_path($item->image)))
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                    @else
                        <div class="home-news-no-image">📰</div>
                    @endif
                    <div class="home-news-body">
                        <h3>{{ $item->title }}</h3>
                        <p>{{ Str::limit($item->content, 100) }}</p>
                        <div class="home-news-date">
                            <i class="fas fa-calendar-alt"></i> {{ $item->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p style="text-align:center; color:#999; grid-column: 1 / -1; padding:2rem;">No news items yet.</p>
            @endif
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

<style>
    /* Hero Section */
    .hero {
        position: relative;
        width: 100%;
        height: 90vh;
        min-height: 550px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        overflow: hidden;
    }

    .hero-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
    }

    .hero-content {
        position: relative;
        z-index: 1;
        max-width: 850px;
        width: 90%;
        padding: 1.5rem;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 20px;
        animation: fadeInUp 0.8s ease-out;
    }

    .hero h1 {
        font-size: 3.8rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color: white;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
    }

    .hero p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        color: rgba(255, 255, 255, 0.95);
        font-weight: 500;
    }

    .hero-logo {
        text-align: center;
        margin: 0.8rem 0;
    }

    .hero-logo img {
        max-width: 80px;
        border-radius: 50%;
        background: white;
        padding: 5px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(25px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .btn {
        display: inline-block;
        background: #F5DD00;
        color: #001B3A;
        text-decoration: none;
        padding: 0.9rem 2.2rem;
        border-radius: 40px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.25s ease;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn:hover {
        transform: translateY(-3px);
        background: #ffea3a;
    }

    /* ADDED: Make cards clickable with pointer cursor */
    .card {
        cursor: pointer;
    }

    /* Home News - EXACT ADMIN STYLE */
    .home-news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .home-news-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        border: 1px solid #e0e7ed;
        transition: transform 0.2s;
    }

    .home-news-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    .home-news-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .home-news-no-image {
        height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        background: #eee;
        color: #ccc;
    }

    .home-news-body {
        padding: 1.2rem;
    }

    .home-news-body h3 {
        font-size: 1rem;
        color: #002D62;
        margin-bottom: 0.3rem;
        font-weight: 700;
    }

    .home-news-body p {
        font-size: 0.8rem;
        color: #666;
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .home-news-date {
        font-size: 0.7rem;
        color: #999;
        padding-top: 0.5rem;
        border-top: 1px solid #eee;
    }

    .home-news-date i {
        margin-right: 4px;
    }

    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.2rem;
        }
        .hero p {
            font-size: 0.95rem;
        }
        .hero-logo img {
            max-width: 60px;
        }
        .home-news-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        .home-news-card img {
            height: 130px;
        }
        .home-news-no-image {
            height: 130px;
        }
    }

    @media (max-width: 500px) {
        .home-news-grid {
            grid-template-columns: 1fr;
        }
        .home-news-card img {
            height: 160px;
        }
        .home-news-no-image {
            height: 160px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const enrollBtn = document.getElementById('enrollBtn');
        const modal = document.getElementById('enrollModal');
        const closeBtn = document.getElementById('closeModalBtn');
        const homeProgramBtn = document.getElementById('homeProgramBtn');
        const schoolProgramBtn = document.getElementById('schoolProgramBtn');

        if (enrollBtn) {
            enrollBtn.addEventListener('click', function() {
                modal.classList.add('active');
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                modal.classList.remove('active');
            });
        }

        if (homeProgramBtn) {
            homeProgramBtn.addEventListener('click', function() {
                window.location.href = "{{ route('home.program') }}";
            });
        }

        if (schoolProgramBtn) {
            schoolProgramBtn.addEventListener('click', function() {
                window.location.href = "{{ route('school.program') }}";
            });
        }

        // Close modal on overlay click
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
        }
    });
</script>
