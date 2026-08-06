@extends('admin.layout')

@section('title', 'Messages')
@section('nav-messages', 'active')

@section('content')
<div class="messages-index">
    <div class="header-actions">
        <h3>Messages</h3>
        <div class="actions">
            @if($unreadCount > 0)
                <form action="{{ route('admin.messages.mark-all-read') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-mark-read">Mark All Read</button>
                </form>
            @endif
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Replied</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                <tr class="{{ !$msg->is_read ? 'unread' : '' }}">
                    <td>
                        @if(!$msg->is_read)
                            <span class="status-unread">● New</span>
                        @else
                            <span class="status-read">● Read</span>
                        @endif
                    </td>
                    <td>{{ $msg->name }}</td>
                    <td>{{ $msg->email }}</td>
                    <td>{{ Str::limit($msg->subject, 30) }}</td>
                    <td>{{ $msg->created_at->format('d M Y H:i') }}</td>
                    <td>
                        @if($msg->replied_at)
                            <span class="replied">✓ Replied</span>
                        @else
                            <span class="not-replied">—</span>
                        @endif
                    </td>
                    <td class="actions">
                        <a href="{{ route('admin.messages.show', $msg) }}" class="btn-view">View</a>
                        <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Delete this message?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center; padding:2rem; color:#999;">No messages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .messages-index {
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
    .actions {
        display: flex;
        gap: 0.5rem;
    }
    .btn-mark-read {
        background: #28a745;
        color: white;
        padding: 0.3rem 1rem;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        font-size: 0.8rem;
    }
    .btn-mark-read:hover { background: #218838; }
    .table-wrapper { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; font-size: 0.85rem; }
    th, td { padding: 0.7rem 0.8rem; text-align: left; border-bottom: 1px solid #eee; }
    th { background: #f8f9fc; color: #333; font-weight: 600; }
    tr.unread { background: #f0f7ff; }
    tr.unread td { font-weight: 600; }
    .status-unread { color: #dc3545; font-weight: 600; }
    .status-read { color: #6c757d; }
    .replied { color: #28a745; font-weight: 600; }
    .not-replied { color: #999; }
    .actions { display: flex; gap: 0.3rem; }
    .btn-view {
        background: #F5DD00;
        color: #001B3A;
        padding: 0.2rem 0.6rem;
        border-radius: 4px;
        text-decoration: none;
        font-size: 0.65rem;
        font-weight: 600;
    }
    .btn-view:hover { background: #ffe53a; }
    .btn-delete {
        background: #dc3545;
        color: white;
        padding: 0.2rem 0.6rem;
        border: none;
        border-radius: 4px;
        font-size: 0.65rem;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-delete:hover { background: #c82333; }
    @media (max-width: 768px) {
        .header-actions { flex-direction: column; align-items: flex-start; gap: 1rem; }
    }
</style>
@endsection
