@extends('admin.layout')

@section('title', 'Dashboard')
@section('nav-dashboard', 'active')

@section('content')
<div class="dashboard">

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-newspaper"></i></div>
            <div class="stat-info">
                <h3>{{ $newsCount }}</h3>
                <p>News & Events</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-users"></i></div>
            <div class="stat-info">
                <h3>{{ $totalApplications }}</h3>
                <p>Applications</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-coins"></i></div>
            <div class="stat-info">
                <h3>KES {{ number_format($admissionFee) }}</h3>
                <p>Admission Fee</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-image"></i></div>
            <div class="stat-info">
                <h3>{{ count(array_filter($heroImages)) }}</h3>
                <p>Hero Images</p>
            </div>
        </div>
    </div>

    <!-- Hero Images Section -->
    <div class="dashboard-section hero-section">
        <h3>🖼️ Current Hero Images</h3>
        <div class="hero-grid">
            @foreach(['home', 'school', 'orphanage', 'clinic', 'chapel'] as $section)
            <div class="hero-card">
                <div class="hero-preview">
                    @php
                        $imagePath = isset($heroImages[$section]) ? $heroImages[$section] : null;
                        $imageUrl = null;

                        if ($imagePath) {
                            // Check if file actually exists before showing
                            if (file_exists(public_path($imagePath))) {
                                $imageUrl = asset($imagePath);
                            } elseif (file_exists(public_path('images/' . basename($imagePath)))) {
                                $imageUrl = asset('images/' . basename($imagePath));
                            } elseif (Storage::disk('public')->exists($imagePath)) {
                                $imageUrl = asset('storage/' . $imagePath);
                            }
                        }
                    @endphp
                    @if($imageUrl)
                        <img src="{{ $imageUrl }}" alt="{{ ucfirst($section) }} Hero">
                        <div class="hero-overlay-label">{{ ucfirst($section) }}</div>
                    @else
                        <div class="no-hero">
                            <i class="fas fa-image"></i>
                            <span>No image set</span>
                        </div>
                    @endif
                </div>
                <div class="hero-info">
                    <span class="hero-label">{{ ucfirst($section) }}</span>
                    @if($imageUrl)
                        <span class="hero-filename">{{ basename($imagePath) }}</span>
                        <a href="{{ $imageUrl }}" target="_blank" class="hero-view-btn">View</a>
                    @else
                        <span class="hero-status-notset">Not Set</span>
                    @endif
                    <a href="{{ route('admin.settings') }}#hero-{{ $section }}" class="hero-change-btn">Change</a>
                </div>
            </div>
            @endforeach
        </div>
        <p style="text-align:center; font-size:0.8rem; color:#999; margin-top:0.5rem;">
            <a href="{{ route('admin.settings') }}" style="color:#002D62;">Go to Settings →</a> to update hero images
        </p>
    </div>

    <!-- Recent News Section -->
    <div class="dashboard-section news-section">
        <div class="section-header">
            <h3>📰 Recent News & Events</h3>
            <a href="{{ route('admin.news.index') }}" class="view-all-btn">View All →</a>
        </div>

        @if($news->count() > 0)
            <div class="news-list">
                @foreach($news as $item)
                <div class="news-item">
                    <div class="news-thumb">
                        @if($item->image && file_exists(storage_path('app/public/' . $item->image)))
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                        @elseif($item->image && file_exists(public_path($item->image)))
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                        @else
                            <div class="news-thumb-placeholder">📰</div>
                        @endif
                    </div>
                    <div class="news-content">
                        <h4>{{ $item->title }}</h4>
                        <p>{{ Str::limit($item->content, 100) }}</p>
                        <div class="news-meta">
                            <span class="news-date"><i class="fas fa-calendar-alt"></i> {{ $item->created_at->format('d M Y') }}</span>
                            <span class="news-status {{ $item->is_active ? 'active' : 'inactive' }}">
                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-newspaper"></i>
                <p>No news items yet.</p>
                <a href="{{ route('admin.news.create') }}" class="btn-primary">Create First News</a>
            </div>
        @endif
    </div>

    <!-- Recent Applications -->
    <div class="dashboard-section applications-section">
        <div class="section-header">
            <h3>📋 Recent Applications</h3>
            <a href="{{ route('admin.applications') }}" class="view-all-btn">View All →</a>
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Grade</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $app)
                    <tr>
                        <td>{{ $app->full_name }}</td>
                        <td>{{ $app->grade }}</td>
                        <td>{{ $app->email }}</td>
                        <td><span class="badge {{ $app->payment_status }}">{{ ucfirst($app->payment_status) }}</span></td>
                        <td>{{ $app->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" style="text-align:center; color:#999;">No applications yet</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<style>
    .dashboard { padding: 1rem 0; }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .stat-icon {
        width: 50px;
        height: 50px;
        background: #eef2f7;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: #002D62;
    }
    .stat-info h3 { font-size: 1.8rem; color: #002D62; }
    .stat-info p { font-size: 0.8rem; color: #666; }

    /* Dashboard Sections */
    .dashboard-section {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        margin-bottom: 1.5rem;
    }
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    .section-header h3 { font-size: 1.1rem; color: #002D62; }
    .view-all-btn {
        background: #eef2f7;
        color: #002D62;
        padding: 0.3rem 0.8rem;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: 600;
    }
    .view-all-btn:hover { background: #dde2ea; }

    /* Hero Images Grid */
    .hero-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1rem;
    }
    .hero-card {
        background: #f8f9fc;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #e0e7ed;
    }
    .hero-preview {
        position: relative;
        height: 120px;
        background: #eef2f7;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .hero-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .hero-overlay-label {
        position: absolute;
        top: 8px;
        left: 8px;
        background: rgba(0, 45, 98, 0.85);
        color: white;
        padding: 0.2rem 0.6rem;
        border-radius: 4px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .no-hero {
        text-align: center;
        color: #bbb;
        padding: 1rem;
    }
    .no-hero i {
        display: block;
        font-size: 2.5rem;
        margin-bottom: 0.3rem;
        color: #ccc;
    }
    .no-hero span {
        font-size: 0.75rem;
        color: #bbb;
    }
    .hero-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0.8rem;
        flex-wrap: wrap;
        gap: 0.3rem;
    }
    .hero-label {
        font-weight: 700;
        font-size: 0.75rem;
        color: #002D62;
        text-transform: capitalize;
    }
    .hero-filename {
        font-size: 0.6rem;
        color: #888;
        background: #eef2f7;
        padding: 0.1rem 0.4rem;
        border-radius: 3px;
        max-width: 80px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .hero-view-btn {
        font-size: 0.65rem;
        color: #002D62;
        text-decoration: none;
        background: #eef2f7;
        padding: 0.1rem 0.5rem;
        border-radius: 3px;
    }
    .hero-view-btn:hover { background: #dde2ea; }
    .hero-status-notset {
        font-size: 0.6rem;
        color: #d32f2f;
        font-weight: 600;
        background: #f8d7da;
        padding: 0.1rem 0.4rem;
        border-radius: 3px;
    }
    .hero-change-btn {
        background: #002D62;
        color: white;
        padding: 0.15rem 0.6rem;
        border-radius: 4px;
        text-decoration: none;
        font-size: 0.65rem;
    }
    .hero-change-btn:hover { background: #003e7c; }

    /* News List */
    .news-list {
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
    }
    .news-item {
        display: flex;
        gap: 1rem;
        padding: 0.8rem;
        background: #f8f9fc;
        border-radius: 8px;
        align-items: flex-start;
    }
    .news-thumb {
        width: 80px;
        height: 80px;
        flex-shrink: 0;
        border-radius: 8px;
        overflow: hidden;
        background: #eee;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .news-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .news-thumb-placeholder { font-size: 2rem; }
    .news-content { flex: 1; }
    .news-content h4 { font-size: 0.95rem; color: #002D62; margin-bottom: 0.2rem; }
    .news-content p { font-size: 0.8rem; color: #666; margin-bottom: 0.3rem; }
    .news-meta { display: flex; gap: 1rem; align-items: center; flex-wrap: wrap; }
    .news-date { font-size: 0.7rem; color: #999; }
    .news-date i { margin-right: 3px; }
    .news-status {
        font-size: 0.65rem;
        padding: 0.15rem 0.5rem;
        border-radius: 20px;
        font-weight: 600;
    }
    .news-status.active { background: #d4edda; color: #155724; }
    .news-status.inactive { background: #f8d7da; color: #721c24; }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 2rem;
        color: #999;
    }
    .empty-state i { font-size: 3rem; display: block; margin-bottom: 0.5rem; }
    .empty-state .btn-primary {
        display: inline-block;
        margin-top: 1rem;
        background: #002D62;
        color: white;
        padding: 0.5rem 1.2rem;
        border-radius: 8px;
        text-decoration: none;
    }

    /* Table */
    .table-wrapper { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; font-size: 0.85rem; }
    th, td { padding: 0.7rem; text-align: left; border-bottom: 1px solid #eee; }
    th { background: #f8f9fc; color: #333; font-weight: 600; }
    .badge {
        padding: 0.2rem 0.6rem;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    .badge.pending { background: #fff3cd; color: #856404; }
    .badge.paid { background: #d4edda; color: #155724; }
    .badge.failed { background: #f8d7da; color: #721c24; }

    @media (max-width: 768px) {
        .hero-grid { grid-template-columns: repeat(2, 1fr); }
        .news-item { flex-direction: column; align-items: center; text-align: center; }
        .news-thumb { width: 100%; height: 120px; }
        .news-meta { justify-content: center; }
    }
</style>
@endsection
