@extends('admin.layout')

@section('title', 'Edit Alumni')
@section('nav-alumni', 'active')

@section('content')
<div class="form-container">
    <h3>Edit Alumni</h3>
    <form method="POST" action="{{ route('admin.alumni.update', $alumni) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Full Name *</label>
            <input type="text" name="name" value="{{ $alumni->name }}" required>
        </div>
        <div class="form-group">
            <label>Graduation Year *</label>
            <input type="number" name="graduation_year" value="{{ $alumni->graduation_year }}" required min="1900" max="{{ date('Y') }}">
        </div>
        <div class="form-group">
            <label>Current Occupation</label>
            <input type="text" name="current_occupation" value="{{ $alumni->current_occupation }}">
        </div>
        <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" rows="3">{{ $alumni->bio }}</textarea>
        </div>
        <div class="form-group">
            <label>Achievements</label>
            <textarea name="achievements" rows="3">{{ $alumni->achievements }}</textarea>
        </div>
        <div class="form-group">
            <label>Message to School</label>
            <textarea name="message" rows="2">{{ $alumni->message }}</textarea>
        </div>
        <div class="form-group">
            <label>Current Photo</label>
            @if($alumni->image)
                <img src="{{ asset('storage/' . $alumni->image) }}" alt="{{ $alumni->name }}" style="max-width:100px; border-radius:8px; display:block; margin-top:0.5rem;">
            @else
                <p style="color:#999; font-size:0.85rem;">No photo uploaded</p>
            @endif
        </div>
        <div class="form-group">
            <label>Change Photo</label>
            <input type="file" name="image" accept="image/*">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="is_active">
                <option value="1" {{ $alumni->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$alumni->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Update Alumni</button>
            <a href="{{ route('admin.alumni.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection
