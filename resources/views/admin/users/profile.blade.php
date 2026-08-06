@extends('admin.layout')

@section('title', 'My Profile')
@section('nav-profile', 'active')

@section('content')
<div class="form-container">
    <h3>My Profile</h3>

    <form method="POST" action="{{ route('admin.profile.update') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label>New Password (leave blank to keep current)</label>
            <input type="password" name="password" placeholder="Enter new password (min 8 characters)">
        </div>

        <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="password_confirmation" placeholder="Re-enter new password">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Update Profile</button>
            <a href="{{ route('admin.dashboard') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

<style>
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .form-container h3 {
        color: #002D62;
        margin-bottom: 1.5rem;
    }
    .form-group { margin-bottom: 1.2rem; }
    .form-group label {
        display: block;
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 0.3rem;
        color: #333;
    }
    .form-group input {
        width: 100%;
        padding: 0.6rem 1rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-family: 'Montserrat', sans-serif;
    }
    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
    }
    .btn-submit {
        background: #002D62;
        color: white;
        padding: 0.6rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-submit:hover { background: #003e7c; }
    .btn-cancel {
        background: #eee;
        color: #333;
        padding: 0.6rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
    }
    .btn-cancel:hover { background: #ddd; }
</style>
@endsection
