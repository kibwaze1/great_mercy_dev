@extends('admin.layout')

@section('title', 'Add User')
@section('nav-users', 'active')

@section('content')
<div class="form-container">
    <h3>Add New Admin User</h3>

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" required placeholder="Enter full name">
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" required placeholder="Enter email address">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required placeholder="Enter password (min 8 characters)">
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required placeholder="Re-enter password">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Create User</button>
            <a href="{{ route('admin.users.index') }}" class="btn-cancel">Cancel</a>
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
