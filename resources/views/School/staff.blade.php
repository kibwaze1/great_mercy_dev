@extends('school.layout')

@section('title', 'Staff - Great Mercy School')

@section('nav-staff', 'active')

@section('content')
<div class="page">
    <h2>Our Staff & Faculty</h2>
    <p>Meet the dedicated team behind Great Mercy School.</p>

    @php
        $categories = ['Director', 'Teaching', 'Non-Teaching'];
    @endphp

    @if($staff->count() > 0)
        @foreach($categories as $category)
            @php
                $staffMembers = $staff->where('category', $category)->where('is_active', true);
            @endphp
            @if($staffMembers->count() > 0)
                <h3 class="category-title">{{ $category }} Staff</h3>
                <div class="staff-grid">
                    @foreach($staffMembers as $member)
                    <div class="staff-card">
                        @if($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="staff-photo">
                        @else
                            <div class="staff-photo-placeholder">👤</div>
                        @endif
                        <h3>{{ $member->name }}</h3>
                        <p class="position">{{ $member->position }}</p>
                        @if($member->qualification)
                            <p class="qualification"><i class="fas fa-graduation-cap"></i> {{ $member->qualification }}</p>
                        @endif
                        @if($member->experience_years)
                            <p class="experience"><i class="fas fa-clock"></i> {{ $member->experience_years }} years</p>
                        @endif
                        @if($member->bio)
                            <p class="bio">{{ $member->bio }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    @else
        <p style="text-align:center; color:#999; padding:2rem;">No staff added yet.</p>
    @endif
</div>

<style>
    .category-title {
        font-size: 1.2rem;
        color: #002D62;
        margin: 1.5rem 0 1rem;
        border-left: 3px solid #F5DD00;
        padding-left: 0.8rem;
    }
    .staff-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }
    .staff-card {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        border: 1px solid #e0e7ed;
        text-align: center;
        transition: transform 0.2s;
    }
    .staff-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    .staff-photo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 0.8rem;
        border: 3px solid #F5DD00;
        display: block;
    }
    .staff-photo-placeholder {
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
    .staff-card h3 {
        color: #002D62;
        margin-bottom: 0.2rem;
    }
    .position {
        font-size: 0.85rem;
        color: #F5DD00;
        font-weight: 600;
    }
    .qualification, .experience {
        font-size: 0.8rem;
        color: #666;
        margin: 0.3rem 0;
    }
    .qualification i, .experience i {
        width: 16px;
    }
    .bio {
        font-size: 0.8rem;
        color: #555;
        line-height: 1.4;
        margin-top: 0.3rem;
    }
</style>
@endsection
