@extends('admin.layout')

@section('title', 'Edit Student Highlight')
@section('nav-students', 'active')

@section('content')
<div class="form-container">
    <h3>Edit Student Highlight</h3>
    <form method="POST" action="{{ route('admin.students.update', $highlight) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" value="{{ $highlight->title }}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="3">{{ $highlight->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Class</label>
            <input type="text" name="class" value="{{ $highlight->class }}">
        </div>
        <div class="form-group">
            <label>Achievement</label>
            <input type="text" name="achievement" value="{{ $highlight->achievement }}">
        </div>
        <div class="form-group">
            <label>Current Photo</label>
            @if($highlight->image)
                <img src="{{ asset('storage/' . $highlight->image) }}" alt="{{ $highlight->title }}" style="max-width:100px; border-radius:8px; display:block; margin-top:0.5rem;">
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
                <option value="1" {{ $highlight->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$highlight->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Update Highlight</button>
            <a href="{{ route('admin.students.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection
