@extends('admin.layout')

@section('title', 'Students Highlights')
@section('nav-students', 'active')

@section('content')
<div class="students-index">
    <div class="header-actions">
        <h3>Student Highlights</h3>
        <a href="{{ route('admin.students.create') }}" class="btn-primary">+ Add Highlight</a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Class</th>
                    <th>Achievement</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($highlights as $highlight)
                <tr>
                    <td>
                        @if($highlight->image)
                            <img src="{{ asset('storage/' . $highlight->image) }}" alt="{{ $highlight->title }}" style="width:50px; height:50px; object-fit:cover; border-radius:8px;">
                        @else
                            <div style="width:50px; height:50px; border-radius:8px; background:#eee; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">📷</div>
                        @endif
                    </td>
                    <td>{{ $highlight->title }}</td>
                    <td>{{ $highlight->class ?? 'N/A' }}</td>
                    <td>{{ $highlight->achievement ?? 'N/A' }}</td>
                    <td>
                        <span class="badge {{ $highlight->is_active ? 'active' : 'inactive' }}">
                            {{ $highlight->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.students.edit', $highlight) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.students.destroy', $highlight) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Delete this highlight?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" style="text-align:center; padding:2rem; color:#999;">No student highlights added yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .students-index { background: white; border-radius: 12px; padding: 1.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
    .header-actions { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
    .header-actions h3 { color: #002D62; font-size: 1.2rem; }
    .btn-primary { background: #002D62; color: white; padding: 0.5rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; }
    .btn-primary:hover { background: #003e7c; }
    .table-wrapper { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; font-size: 0.85rem; }
    th, td { padding: 0.7rem 0.8rem; text-align: left; border-bottom: 1px solid #eee; }
    th { background: #f8f9fc; color: #333; font-weight: 600; }
    .badge { padding: 0.2rem 0.6rem; border-radius: 20px; font-size: 0.65rem; font-weight: 600; }
    .badge.active { background: #d4edda; color: #155724; }
    .badge.inactive { background: #f8d7da; color: #721c24; }
    .btn-edit { background: #F5DD00; color: #001B3A; padding: 0.2rem 0.6rem; border-radius: 4px; text-decoration: none; font-size: 0.65rem; font-weight: 600; }
    .btn-delete { background: #dc3545; color: white; padding: 0.2rem 0.6rem; border: none; border-radius: 4px; font-size: 0.65rem; font-weight: 600; cursor: pointer; }
</style>
@endsection
