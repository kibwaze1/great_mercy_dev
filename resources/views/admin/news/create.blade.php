@extends('admin.layout')

@section('title', 'Add News')
@section('nav-news', 'active')

@section('content')
<form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" required>
    </div>
    <div class="form-group">
        <label>Content</label>
        <textarea name="content" rows="5" required></textarea>
    </div>
    <div class="form-group">
        <label>Image (optional)</label>
        <input type="file" name="image" accept="image/*">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select name="is_active">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn-submit">Save News</button>
    <a href="{{ route('admin.news.index') }}" class="btn-cancel">Cancel</a>
</form>

<style>
    .form-group { margin-bottom: 1.2rem; }
    label { display: block; font-weight: 600; font-size: 0.85rem; margin-bottom: 0.3rem; color: #333; }
    input, textarea, select { width: 100%; padding: 0.6rem 1rem; border: 1px solid #ddd; border-radius: 8px; font-family: 'Montserrat', sans-serif; }
    .btn-submit { background: #002D62; color: white; padding: 0.6rem 1.5rem; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; }
    .btn-cancel { background: #eee; color: #333; padding: 0.6rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-block; margin-left: 0.5rem; }
</style>
@endsection
