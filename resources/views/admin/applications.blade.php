<!DOCTYPE html>
<html>
<head>
    <title>Admin – Applications</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f6f9; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #002D62; color: white; }
        .btn { display: inline-block; padding: 5px 10px; background: #F5DD00; color: #001B3A; text-decoration: none; border-radius: 5px; }
        .search { margin-bottom: 20px; }
        .pagination { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>School Applications</h1>
    <div class="search">
        <form method="GET">
            <input type="text" name="search" placeholder="Search by name, email, phone" value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>
    </div>
    <table>
        <thead>
            <tr><th>ID</th><th>Full Name</th><th>Parent</th><th>Grade</th><th>Phone</th><th>Submitted</th><th>Action</th></tr>
        </thead>
        <tbody>
            @foreach($applications as $app)
            <tr>
                <td>{{ $app->id }}</td>
                <td>{{ $app->full_name }}</td>
                <td>{{ $app->parent_name }}</td>
                <td>{{ $app->grade }}</td>
                <td>{{ $app->phone }}</td>
                <td>{{ $app->created_at->format('d M Y') }}</td>
                <td><a href="{{ route('admin.application.show', $app) }}" class="btn">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">{{ $applications->links() }}</div>
</body>
</html>
