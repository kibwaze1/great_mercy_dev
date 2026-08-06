@extends('admin.layout')

@section('title', 'Staff')
@section('nav-staff', 'active')

@section('content')
<div class="staff-index">
    <div class="header-actions">
        <h3>Staff & Faculty</h3>
        <a href="{{ route('admin.staff.create') }}" class="btn-primary">+ Add Staff</a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Category</th>
                    <th>Experience</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($staff as $staffMember)
                <tr>
                    <td>
                        @if($staffMember->image)
                            <img src="{{ asset('storage/' . $staffMember->image) }}" alt="{{ $staffMember->name }}" style="width:50px; height:50px; object-fit:cover; border-radius:50%;">
                        @else
                            <div style="width:50px; height:50px; border-radius:50%; background:#eee; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">👤</div>
                        @endif
                    </td>
                    <td>{{ $staffMember->name }}</td>
                    <td>{{ $staffMember->position }}</td>
                    <td>
                        <span class="category {{ strtolower($staffMember->category) }}">
                            {{ $staffMember->category }}
                        </span>
                    </td>
                    <td>{{ $staffMember->experience_years ?? 'N/A' }} yrs</td>
                    <td>
                        <span class="badge {{ $staffMember->is_active ? 'active' : 'inactive' }}">
                            {{ $staffMember->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.staff.edit', $staffMember) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.staff.destroy', $staffMember) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Delete this staff?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center; padding:2rem; color:#999;">No staff added yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .staff-index { background: white; border-radius: 12px; padding: 1.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
    .header-actions { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
    .header-actions h3 { color: #002D62; font-size: 1.2rem; }
    .btn-primary { background: #002D62; color: white; padding: 0.5rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; }
    .btn-primary:hover { background: #003e7c; }
    .table-wrapper { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; font-size: 0.85rem; }
    th, td { padding: 0.7rem 0.8rem; text-align: left; border-bottom: 1px solid #eee; }
    th { background: #f8f9fc; color: #333; font-weight: 600; }
    .category { padding: 0.15rem 0.5rem; border-radius: 4px; font-size: 0.65rem; font-weight: 600; }
    .category.director { background: #cce5ff; color: #004085; }
    .category.teaching { background: #d4edda; color: #155724; }
    .category.non-teaching { background: #fff3cd; color: #856404; }
    .badge { padding: 0.2rem 0.6rem; border-radius: 20px; font-size: 0.65rem; font-weight: 600; }
    .badge.active { background: #d4edda; color: #155724; }
    .badge.inactive { background: #f8d7da; color: #721c24; }
    .btn-edit { background: #F5DD00; color: #001B3A; padding: 0.2rem 0.6rem; border-radius: 4px; text-decoration: none; font-size: 0.65rem; font-weight: 600; }
    .btn-delete { background: #dc3545; color: white; padding: 0.2rem 0.6rem; border: none; border-radius: 4px; font-size: 0.65rem; font-weight: 600; cursor: pointer; }
</style>
@endsection
