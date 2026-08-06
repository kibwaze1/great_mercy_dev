@extends('admin.layout')

@section('title', 'Manage Users')
@section('nav-users', 'active')

@section('content')
<div class="users-index">
    <div class="header-actions">
        <h3>Admin Users</h3>
        <a href="{{ route('admin.users.create') }}" class="btn-primary">+ Add User</a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        {{ $user->name }}
                        @if($user->id === auth()->guard('admin')->id())
                            <span class="badge-you">You</span>
                        @endif
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                    <td class="actions">
                        @if($user->id !== auth()->guard('admin')->id())
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Delete this user?')">Delete</button>
                            </form>
                        @else
                            <span class="text-muted">You</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align:center; padding:2rem; color:#999;">No users found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .users-index {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .header-actions h3 {
        color: #002D62;
        font-size: 1.2rem;
    }
    .btn-primary {
        background: #002D62;
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
    }
    .btn-primary:hover { background: #003e7c; }
    .table-wrapper { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 0.8rem; text-align: left; border-bottom: 1px solid #eee; }
    th { background: #f8f9fc; color: #333; font-weight: 600; }
    .badge-you {
        background: #d4edda;
        color: #155724;
        padding: 0.15rem 0.5rem;
        border-radius: 20px;
        font-size: 0.65rem;
        font-weight: 600;
        margin-left: 0.5rem;
    }
    .text-muted {
        color: #999;
        font-size: 0.8rem;
    }
    .actions {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    .btn-edit {
        background: #F5DD00;
        color: #001B3A;
        padding: 0.3rem 0.8rem;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .btn-edit:hover { background: #ffe53a; }
    .btn-delete {
        background: #d32f2f;
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 6px;
        border: none;
        font-size: 0.75rem;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-delete:hover { background: #b71c1c; }
    @media (max-width: 768px) {
        .actions { flex-direction: column; }
        .header-actions { flex-direction: column; gap: 1rem; }
    }
</style>
@endsection
