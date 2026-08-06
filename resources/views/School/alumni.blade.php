@extends('school.layout')

@section('title', 'Alumni - Great Mercy School')

@section('nav-alumni', 'active')

@section('content')
<div class="page">
    <h2>Our Alumni</h2>
    <p>Great Mercy School alumni are making a difference around the world.</p>

    @if($alumni->count() > 0)
        <div class="alumni-grid">
            @foreach($alumni as $alum)
            <div class="alumni-card">
                @if($alum->image)
                    <img src="{{ asset('storage/' . $alum->image) }}" alt="{{ $alum->name }}" class="alumni-photo">
                @else
                    <div class="alumni-photo-placeholder">👤</div>
                @endif
                <h3>{{ $alum->name }}</h3>
                <span class="year">Class of {{ $alum->graduation_year }}</span>
                <p class="occupation">{{ $alum->current_occupation ?? 'Making a difference' }}</p>
                @if($alum->bio)
                    <p class="bio">{{ $alum->bio }}</p>
                @endif
                @if($alum->message)
                    <div class="alumni-message">
                        <p>"{{ $alum->message }}"</p>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    @else
        <p style="text-align:center; color:#999; padding:2rem;">No alumni added yet.</p>
    @endif
</div>

<style>
    .alumni-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 1.5rem;
    }
    .alumni-card {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        border: 1px solid #e0e7ed;
        text-align: center;
        transition: transform 0.2s;
    }
    .alumni-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    .alumni-photo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 0.8rem;
        border: 3px solid #F5DD00;
        display: block;
    }
    .alumni-photo-placeholder {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #eef2f7;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 0.8rem;
        border: 3px solid #e0e7ed;
        color: #ccc;
    }
    .alumni-card h3 {
        color: #002D62;
        margin-bottom: 0.2rem;
    }
    .year {
        font-size: 0.8rem;
        color: #F5DD00;
        font-weight: 600;
        background: #002D62;
        padding: 0.1rem 0.6rem;
        border-radius: 20px;
        display: inline-block;
    }
    .occupation {
        font-size: 0.85rem;
        color: #555;
        margin: 0.5rem 0;
    }
    .bio {
        font-size: 0.8rem;
        color: #666;
        line-height: 1.4;
        margin-top: 0.3rem;
    }
    .alumni-message {
        background: #f8f9fc;
        padding: 0.8rem;
        border-radius: 8px;
        margin-top: 0.8rem;
        border-left: 3px solid #F5DD00;
    }
    .alumni-message p {
        font-size: 0.8rem;
        color: #555;
        font-style: italic;
        margin: 0;
    }
</style>
@endsection
