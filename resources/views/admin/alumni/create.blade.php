@extends('admin.layout')

@section('title', 'Add Alumni')
@section('nav-alumni', 'active')

@section('content')
<div class="form-container">
    <h3>Add Alumni</h3>
    <form method="POST" action="{{ route('admin.alumni.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Full Name *</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-group">
            <label>Graduation Year *</label>
            <input type="number" name="graduation_year" required min="1900" max="{{ date('Y') }}">
        </div>
        <div class="form-group">
            <label>Current Occupation</label>
            <input type="text" name="current_occupation">
        </div>
        <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Achievements</label>
            <textarea name="achievements" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Message to School</label>
            <textarea name="message" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="image" accept="image/*">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="is_active">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Save Alumni</button>
            <a href="{{ route('admin.alumni.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

<style>
    .form-container { max-width: 700px; margin: 0 auto; background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
    .form-container h3 { color: #002D62; margin-bottom: 1.5rem; }
    .form-group { margin-bottom: 1.2rem; }
    .form-group label { display: block; font-weight: 600; font-size: 0.85rem; margin-bottom: 0.3rem; color: #333; }
    .form-group input, .form-group textarea, .form-group select { width: 100%; padding: 0.6rem 1rem; border: 1px solid #ddd; border-radius: 8px; font-family: 'Montserrat', sans-serif; }
    .form-actions { display: flex; gap: 1rem; margin-top: 1.5rem; }
    .btn-submit { background: #002D62; color: white; padding: 0.6rem 1.5rem; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; }
    .btn-submit:hover { background: #003e7c; }
    .btn-cancel { background: #eee; color: #333; padding: 0.6rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; }
    .btn-cancel:hover { background: #ddd; }
</style>
@endsection
