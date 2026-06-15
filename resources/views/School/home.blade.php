@extends('school.layout')

@section('title', 'Home')

@section('nav-home', 'active')

@section('content')
<div class="page">
    <h2>Welcome to Great Mercy School</h2>
    <p>We provide holistic, Christ-centered education that nurtures academic excellence, character, and leadership.</p>

    <div class="stats-row">
        <div class="stat-item"><h3>500+</h3><p>Students</p></div>
        <div class="stat-item"><h3>40+</h3><p>Teachers</p></div>
        <div class="stat-item"><h3>30+</h3><p>Classrooms</p></div>
    </div>

    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&auto=format" alt="School campus" style="width:100%; border-radius:12px; margin-top:1rem;">
</div>
@endsection
