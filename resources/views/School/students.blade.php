@extends('school.layout')

@section('title', 'Students - Great Mercy School')

@section('nav-students', 'active')

@section('content')
<div class="page">
    <h2>Student Highlights</h2>
    <p>Celebrating the achievements and talents of our students.</p>

    @if($highlights->count() > 0)
        <div class="students-grid">
            @foreach($highlights as $highlight)
            <div class="student-card">
                @if($highlight->image)
                    <img src="{{ asset('storage/' . $highlight->image) }}" alt="{{ $highlight->title }}" class="student-photo">
                @else
                    <div class="student-photo-placeholder">📷</div>
                @endif
                <h3>{{ $highlight->title }}</h3>
                @if($highlight->class)
                    <span class="class">{{ $highlight->class }}</span>
                @endif
                @if($highlight->achievement)
                    <div class="achievement-badge"><i class="fas fa-award"></i> {{ $highlight->achievement }}</div>
                @endif
                @if($highlight->description)
                    <p class="description">{{ $highlight->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
    @else
        <p style="text-align:center; color:#999; padding:2rem;">No student highlights added yet.</p>
    @endif
</div>

<style>
    .students-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 1.5rem;
    }
    .student-card {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        border: 1px solid #e0e7ed;
        text-align: center;
        transition: transform 0.2s;
    }
    .student-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    .student-photo {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
        margin: -1.5rem -1.5rem 0.8rem -1.5rem;
        width: calc(100% + 3rem);
    }
    .student-photo-placeholder {
        height: 100px;
        background: #eef2f7;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        border-radius: 8px 8px 0 0;
        margin: -1.5rem -1.5rem 0.8rem -1.5rem;
        width: calc(100% + 3rem);
        color: #ccc;
    }
    .student-card h3 {
        color: #002D62;
        margin-bottom: 0.2rem;
    }
    .class {
        font-size: 0.8rem;
        color: #666;
        background: #eef2f7;
        padding: 0.1rem 0.6rem;
        border-radius: 20px;
        display: inline-block;
    }
    .achievement-badge {
        font-size: 0.8rem;
        color: #155724;
        background: #d4edda;
        padding: 0.2rem 0.8rem;
        border-radius: 20px;
        display: inline-block;
        margin-top: 0.5rem;
    }
    .achievement-badge i {
        margin-right: 4px;
    }
    .description {
        font-size: 0.85rem;
        color: #555;
        line-height: 1.5;
        margin-top: 0.5rem;
    }
</style>
@endsections
