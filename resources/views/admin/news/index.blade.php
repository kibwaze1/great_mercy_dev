@extends('admin.layout')

@section('title', 'News & Events')
@section('nav-news', 'active')

@section('content')
<div class="news-index">
    <div class="header-actions">
        <a href="{{ route('admin.news.create') }}" class="btn-primary">+ Add News</a>
    </div>

    <div class="news-grid">
        @forelse($news as $item)
        <div class="news-card">
            @if($item->image)
                @php
                    // Check if image exists in storage
                    $imagePath = $item->image;
                    if (Storage::disk('public')->exists($imagePath)) {
                        $imageUrl = asset('storage/' . $imagePath);
                    } elseif (file_exists(public_path($imagePath))) {
                        $imageUrl = asset($imagePath);
                    } else {
                        $imageUrl = null;
                    }
                @endphp
                @if($imageUrl)
                    <img src="{{ $imageUrl }}" alt="{{ $item->title }}">
                @else
                    <div class="no-image">📰</div>
                @endif
            @else
                <div class="no-image">📰</div>
            @endif
            <div class="news-body">
                <h3>{{ $item->title }}</h3>
                <p>{{ Str::limit($item->content, 100) }}</p>
                <div class="news-actions">
                    <a href="{{ route('admin.news.edit', $item) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('admin.news.destroy', $item) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Delete this news?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p style="text-align:center; color:#999; padding:2rem;">No news items yet.</p>
        @endforelse
    </div>
</div>

<style>
    .header-actions { display: flex; justify-content: space-between; margin-bottom: 1.5rem; }
    .btn-primary { background: #002D62; color: white; padding: 0.5rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; }
    .news-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem; }
    .news-card { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
    .news-card img { width: 100%; height: 180px; object-fit: cover; }
    .no-image { height: 180px; display: flex; align-items: center; justify-content: center; font-size: 3rem; background: #eee; }
    .news-body { padding: 1.2rem; }
    .news-body h3 { font-size: 1rem; color: #002D62; margin-bottom: 0.3rem; }
    .news-body p { font-size: 0.8rem; color: #666; margin-bottom: 0.8rem; }
    .news-actions { display: flex; gap: 0.5rem; }
    .btn-edit { background: #F5DD00; color: #001B3A; padding: 0.3rem 0.8rem; border-radius: 6px; text-decoration: none; font-size: 0.75rem; font-weight: 600; }
    .btn-delete { background: #d32f2f; color: white; padding: 0.3rem 0.8rem; border-radius: 6px; border: none; font-size: 0.75rem; font-weight: 600; cursor: pointer; }
</style>
@endsection
