@extends('admin.layout')

@section('title', 'Message #' . $message->id)
@section('nav-messages', 'active')

@section('content')
<div class="message-detail">
    <div class="header-actions">
        <h3>Message Details</h3>
        <a href="{{ route('admin.messages.index') }}" class="btn-back">← Back to Messages</a>
    </div>

    <div class="message-card">
        <div class="message-header">
            <div class="sender-info">
                <h4>{{ $message->name }}</h4>
                <p><strong>Email:</strong> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
                <p><strong>Subject:</strong> {{ $message->subject }}</p>
                <p><strong>Received:</strong> {{ $message->created_at->format('d M Y H:i') }}</p>
            </div>
            <div class="message-status">
                <span class="status-badge {{ $message->is_read ? 'read' : 'unread' }}">
                    {{ $message->is_read ? '✓ Read' : '● New' }}
                </span>
                @if($message->replied_at)
                    <span class="replied-badge">✓ Replied on {{ $message->replied_at->format('d M Y H:i') }}</span>
                @endif
            </div>
        </div>

        <div class="message-body">
            <h5>Message:</h5>
            <div class="message-content">
                {{ $message->message }}
            </div>
        </div>

        @if($message->reply)
            <div class="reply-section">
                <h5>Your Reply:</h5>
                <div class="reply-content">
                    {{ $message->reply }}
                </div>
            </div>
        @endif

        <div class="reply-form">
            <h5>Reply to {{ $message->name }}</h5>
            <form method="POST" action="{{ route('admin.messages.reply', $message) }}">
                @csrf
                <div class="form-group">
                    <textarea name="reply" rows="5" placeholder="Type your reply here..." required>{{ old('reply') }}</textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-send">Send Reply</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .message-detail {
        max-width: 800px;
        margin: 0 auto;
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
    .btn-back {
        background: #eee;
        color: #333;
        padding: 0.4rem 1rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.8rem;
    }
    .btn-back:hover { background: #ddd; }
    .message-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
        margin-bottom: 1.5rem;
    }
    .sender-info h4 {
        font-size: 1.2rem;
        color: #002D62;
        margin-bottom: 0.3rem;
    }
    .sender-info p {
        font-size: 0.85rem;
        color: #555;
        margin: 0.2rem 0;
    }
    .sender-info a {
        color: #002D62;
        text-decoration: none;
    }
    .sender-info a:hover { text-decoration: underline; }
    .message-status {
        text-align: right;
    }
    .status-badge {
        display: inline-block;
        padding: 0.2rem 0.8rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .status-badge.unread { background: #dc3545; color: white; }
    .status-badge.read { background: #d4edda; color: #155724; }
    .replied-badge {
        display: inline-block;
        padding: 0.2rem 0.8rem;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
        background: #d4edda;
        color: #155724;
        margin-top: 0.3rem;
    }
    .message-body {
        margin-bottom: 1.5rem;
    }
    .message-body h5 {
        font-size: 0.9rem;
        color: #333;
        margin-bottom: 0.5rem;
    }
    .message-content {
        background: #f8f9fc;
        padding: 1rem;
        border-radius: 8px;
        border-left: 3px solid #002D62;
        font-size: 0.9rem;
        color: #555;
        line-height: 1.6;
        white-space: pre-wrap;
    }
    .reply-section {
        margin-bottom: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid #eee;
    }
    .reply-section h5 {
        font-size: 0.9rem;
        color: #333;
        margin-bottom: 0.5rem;
    }
    .reply-content {
        background: #e8f5e9;
        padding: 1rem;
        border-radius: 8px;
        border-left: 3px solid #28a745;
        font-size: 0.9rem;
        color: #555;
        line-height: 1.6;
        white-space: pre-wrap;
    }
    .reply-form {
        padding-top: 1rem;
        border-top: 1px solid #eee;
    }
    .reply-form h5 {
        font-size: 0.9rem;
        color: #333;
        margin-bottom: 0.8rem;
    }
    .form-group textarea {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.9rem;
        resize: vertical;
    }
    .form-group textarea:focus {
        outline: none;
        border-color: #002D62;
    }
    .form-actions {
        margin-top: 1rem;
    }
    .btn-send {
        background: #002D62;
        color: white;
        padding: 0.6rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }
    .btn-send:hover { background: #003e7c; }
    @media (max-width: 768px) {
        .message-header {
            flex-direction: column;
            gap: 1rem;
        }
        .message-status {
            text-align: left;
        }
    }
</style>
@endsection
