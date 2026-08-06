@extends('admin.layout')

@section('title', 'Edit Staff')
@section('nav-staff', 'active')

@section('content')
<div class="form-container">
    <h3>Edit Staff</h3>
    <form method="POST" action="{{ route('admin.staff.update', $staff) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Full Name *</label>
            <input type="text" name="name" value="{{ $staff->name }}" required>
        </div>
        <div class="form-group">
            <label>Position *</label>
            <input type="text" name="position" value="{{ $staff->position }}" required>
        </div>
        <div class="form-group">
            <label>Category *</label>
            <select name="category" required>
                <option value="Director" {{ $staff->category == 'Director' ? 'selected' : '' }}>Director</option>
                <option value="Teaching" {{ $staff->category == 'Teaching' ? 'selected' : '' }}>Teaching</option>
                <option value="Non-Teaching" {{ $staff->category == 'Non-Teaching' ? 'selected' : '' }}>Non-Teaching</option>
            </select>
        </div>
        <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" rows="3">{{ $staff->bio }}</textarea>
        </div>
        <div class="form-group">
            <label>Qualification</label>
            <input type="text" name="qualification" value="{{ $staff->qualification }}">
        </div>
        <div class="form-group">
            <label>Years of Experience</label>
            <input type="number" name="experience_years" value="{{ $staff->experience_years }}" min="0">
        </div>
        <div class="form-group">
            <label>Current Photo</label>
            @if($staff->image)
                <img src="{{ asset('storage/' . $staff->image) }}" alt="{{ $staff->name }}" style="max-width:100px; border-radius:8px; display:block; margin-top:0.5rem;">
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
                <option value="1" {{ $staff->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$staff->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Update Staff</button>
            <a href="{{ route('admin.staff.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection
