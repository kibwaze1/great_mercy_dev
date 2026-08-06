@extends('admin.layout')

@section('title', 'Application #' . $application->id)
@section('nav-applications', 'active')

@section('content')
<div class="detail-container">
    <div class="detail-header">
        <h3>Application Details</h3>
        <a href="{{ route('admin.applications') }}" class="btn-back">← Back to List</a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="detail-card">
        <div class="detail-row">
            <span class="detail-label">Full Name:</span>
            <span class="detail-value">{{ $application->full_name }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Date of Birth:</span>
            <span class="detail-value">{{ $application->dob }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Gender:</span>
            <span class="detail-value">{{ $application->gender }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Grade Applied:</span>
            <span class="detail-value">{{ $application->grade }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Address:</span>
            <span class="detail-value">{{ $application->address ?? 'N/A' }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Phone:</span>
            <span class="detail-value">{{ $application->phone }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Email:</span>
            <span class="detail-value">{{ $application->email }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Parent/Guardian:</span>
            <span class="detail-value">{{ $application->parent_name }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Additional Message:</span>
            <span class="detail-value">{{ $application->message ?? 'N/A' }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Payment Status:</span>
            <span class="detail-value">
                <span class="badge {{ $application->payment_status }}">
                    {{ ucfirst($application->payment_status) }}
                </span>
            </span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Application Status:</span>
            <span class="detail-value">
                <span class="badge-status {{ $application->status }}">
                    {{ ucfirst($application->status) }}
                </span>
            </span>
        </div>
        @if($application->mpesa_transaction_id)
        <div class="detail-row">
            <span class="detail-label">M-Pesa Transaction ID:</span>
            <span class="detail-value">{{ $application->mpesa_transaction_id }}</span>
        </div>
        @endif
        <div class="detail-row">
            <span class="detail-label">Submitted:</span>
            <span class="detail-value">{{ $application->created_at->format('d M Y H:i') }}</span>
        </div>
    </div>

    <div class="action-buttons">
        @if($application->status == 'pending')
            @if($application->payment_status == 'paid')
                <form action="{{ route('admin.application.approve', $application) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-approve">✅ Approve Application</button>
                </form>
            @endif
            <form action="{{ route('admin.application.reject', $application) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-reject" onclick="return confirm('Reject this application?')">❌ Reject Application</button>
            </form>
        @else
            <span class="status-message">This application is <strong>{{ ucfirst($application->status) }}</strong></span>
        @endif
    </div>

    <div class="files-section">
        <h4>Uploaded Files</h4>
        <div class="files-grid">
            @if($application->birth_certificate)
                <a href="{{ asset('storage/' . $application->birth_certificate) }}" target="_blank" class="file-link">
                    <i class="fas fa-file-pdf"></i> Birth Certificate
                </a>
            @endif
            @if($application->transfer_letter)
                <a href="{{ asset('storage/' . $application->transfer_letter) }}" target="_blank" class="file-link">
                    <i class="fas fa-file-pdf"></i> Transfer Letter
                </a>
            @endif
            @if(!$application->birth_certificate && !$application->transfer_letter)
                <p style="color:#999;">No files uploaded</p>
            @endif
        </div>
    </div>
</div>

<style>
    .detail-container {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        max-width: 800px;
        margin: 0 auto;
    }
    .detail-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .detail-header h3 {
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
    .alert-success {
        background: #d4edda;
        color: #155724;
        padding: 0.8rem 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
    }
    .detail-card {
        margin-bottom: 1rem;
    }
    .detail-row {
        display: flex;
        padding: 0.5rem 0;
        border-bottom: 1px solid #f0f2f5;
    }
    .detail-label {
        font-weight: 600;
        width: 180px;
        color: #333;
        flex-shrink: 0;
    }
    .detail-value {
        color: #555;
        flex: 1;
    }
    .badge {
        padding: 0.2rem 0.6rem;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    .badge.pending { background: #fff3cd; color: #856404; }
    .badge.paid { background: #d4edda; color: #155724; }
    .badge.failed { background: #f8d7da; color: #721c24; }
    .badge-status {
        padding: 0.2rem 0.6rem;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    .badge-status.pending { background: #fff3cd; color: #856404; }
    .badge-status.approved { background: #d4edda; color: #155724; }
    .badge-status.rejected { background: #f8d7da; color: #721c24; }
    .action-buttons {
        display: flex;
        gap: 1rem;
        margin: 1rem 0;
        flex-wrap: wrap;
    }
    .btn-approve {
        background: #28a745;
        color: white;
        padding: 0.6rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-approve:hover { background: #218838; }
    .btn-reject {
        background: #dc3545;
        color: white;
        padding: 0.6rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-reject:hover { background: #c82333; }
    .status-message {
        font-size: 1rem;
        color: #555;
        padding: 0.5rem 0;
    }
    .files-section {
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #eee;
    }
    .files-section h4 {
        color: #002D62;
        margin-bottom: 0.8rem;
    }
    .files-grid {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
    .file-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #f8f9fc;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        text-decoration: none;
        color: #002D62;
        border: 1px solid #e0e7ed;
        font-size: 0.85rem;
    }
    .file-link:hover {
        background: #eef2f7;
        border-color: #002D62;
    }
    @media (max-width: 768px) {
        .detail-row {
            flex-direction: column;
            gap: 0.2rem;
        }
        .detail-label {
            width: auto;
        }
        .detail-header {
            flex-direction: column;
            gap: 0.5rem;
            align-items: flex-start;
        }
        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endsection
