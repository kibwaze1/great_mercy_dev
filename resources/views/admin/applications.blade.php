@extends('admin.layout')

@section('title', 'Applications')
@section('nav-applications', 'active')

@section('content')
<div class="applications-index">
    <div class="header-actions">
        <h3>School Applications</h3>
        <div class="stats-badges">
            <span class="stat-badge pending">Pending: {{ $totalPending ?? 0 }}</span>
            <span class="stat-badge approved">Approved: {{ $totalApproved ?? 0 }}</span>
            <span class="stat-badge paid">Paid: {{ $totalPaid ?? 0 }}</span>
        </div>
    </div>

    <div class="search-box">
        <form method="GET" id="filterForm">
            <input type="text" name="search" placeholder="Search by name, email, phone" value="{{ request('search') }}">

            <select name="status">
                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>

            <select name="payment">
                <option value="all" {{ request('payment') == 'all' ? 'selected' : '' }}>All Payment</option>
                <option value="pending" {{ request('payment') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ request('payment') == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="failed" {{ request('payment') == 'failed' ? 'selected' : '' }}>Failed</option>
            </select>

            <button type="submit" class="btn-search">Filter</button>
            <a href="{{ route('admin.applications') }}" class="btn-reset">Reset</a>
        </form>
    </div>

    <div class="bulk-actions">
        <button type="button" class="btn-bulk-approve" onclick="bulkApprove()">Bulk Approve Selected</button>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll" onclick="toggleAll(this)"></th>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Parent</th>
                    <th>Grade</th>
                    <th>Phone</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                <tr>
                    <td><input type="checkbox" class="app-checkbox" value="{{ $app->id }}"></td>
                    <td>{{ $app->id }}</td>
                    <td>{{ $app->full_name }}</td>
                    <td>{{ $app->parent_name }}</td>
                    <td>{{ $app->grade }}</td>
                    <td>{{ $app->phone }}</td>
                    <td>
                        <span class="badge {{ $app->payment_status }}">
                            {{ ucfirst($app->payment_status) }}
                        </span>
                    </td>
                    <td>
                        <span class="badge-status {{ $app->status }}">
                            {{ ucfirst($app->status) }}
                        </span>
                    </td>
                    <td>{{ $app->created_at->format('d M Y') }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.application.show', $app) }}" class="btn-view">View</a>
                        @if($app->status == 'pending' && $app->payment_status == 'paid')
                            <form action="{{ route('admin.application.approve', $app) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-approve">Approve</button>
                            </form>
                        @endif
                        @if($app->status == 'pending')
                            <form action="{{ route('admin.application.reject', $app) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-reject" onclick="return confirm('Reject this application?')">Reject</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="10" style="text-align:center; padding:2rem; color:#999;">No applications yet</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">
            {{ $applications->links() }}
        </div>
    </div>
</div>

<style>
    .applications-index {
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
        flex-wrap: wrap;
        gap: 1rem;
    }
    .header-actions h3 {
        color: #002D62;
        font-size: 1.2rem;
    }
    .stats-badges {
        display: flex;
        gap: 0.8rem;
        flex-wrap: wrap;
    }
    .stat-badge {
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .stat-badge.pending { background: #fff3cd; color: #856404; }
    .stat-badge.approved { background: #d4edda; color: #155724; }
    .stat-badge.paid { background: #cce5ff; color: #004085; }
    .search-box {
        margin-bottom: 1rem;
    }
    .search-box form {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    .search-box input, .search-box select {
        padding: 0.6rem 1rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        min-width: 150px;
        flex: 1;
    }
    .btn-search {
        background: #002D62;
        color: white;
        padding: 0.6rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-search:hover { background: #003e7c; }
    .btn-reset {
        background: #eee;
        color: #333;
        padding: 0.6rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
    }
    .btn-reset:hover { background: #ddd; }
    .bulk-actions {
        margin-bottom: 1rem;
    }
    .btn-bulk-approve {
        background: #28a745;
        color: white;
        padding: 0.4rem 1.2rem;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-bulk-approve:hover { background: #218838; }
    .table-wrapper { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; font-size: 0.85rem; }
    th, td { padding: 0.6rem 0.8rem; text-align: left; border-bottom: 1px solid #eee; }
    th { background: #f8f9fc; color: #333; font-weight: 600; }
    .badge {
        padding: 0.2rem 0.6rem;
        border-radius: 20px;
        font-size: 0.65rem;
        font-weight: 600;
    }
    .badge.pending { background: #fff3cd; color: #856404; }
    .badge.paid { background: #d4edda; color: #155724; }
    .badge.failed { background: #f8d7da; color: #721c24; }
    .badge-status {
        padding: 0.2rem 0.6rem;
        border-radius: 20px;
        font-size: 0.65rem;
        font-weight: 600;
    }
    .badge-status.pending { background: #fff3cd; color: #856404; }
    .badge-status.approved { background: #d4edda; color: #155724; }
    .badge-status.rejected { background: #f8d7da; color: #721c24; }
    .actions {
        display: flex;
        gap: 0.3rem;
        flex-wrap: wrap;
    }
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
    .btn-approve {
        background: #28a745;
        color: white;
        padding: 0.2rem 0.6rem;
        border: none;
        border-radius: 4px;
        font-size: 0.65rem;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-approve:hover { background: #218838; }
    .btn-reject {
        background: #dc3545;
        color: white;
        padding: 0.2rem 0.6rem;
        border: none;
        border-radius: 4px;
        font-size: 0.65rem;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-reject:hover { background: #c82333; }
    .pagination {
        margin-top: 1rem;
        text-align: center;
    }
    @media (max-width: 768px) {
        .search-box form {
            flex-direction: column;
        }
        .search-box input, .search-box select {
            min-width: auto;
        }
        .header-actions {
            flex-direction: column;
            align-items: flex-start;
        }
        .stats-badges {
            width: 100%;
            justify-content: flex-start;
        }
    }
</style>

<script>
    function toggleAll(source) {
        document.querySelectorAll('.app-checkbox').forEach(checkbox => {
            checkbox.checked = source.checked;
        });
    }

    function bulkApprove() {
        const selected = document.querySelectorAll('.app-checkbox:checked');
        if (selected.length === 0) {
            alert('Please select at least one application.');
            return;
        }

        if (confirm('Approve all selected applications?')) {
            const ids = Array.from(selected).map(cb => cb.value);
            fetch('{{ route("admin.applications.bulk-approve") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ ids: ids })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message);
                }
            });
        }
    }
</script>
@endsection
