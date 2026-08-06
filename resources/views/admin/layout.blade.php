<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f4f6f9;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #002D62;
            color: white;
            padding: 1.5rem;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        .sidebar-brand { margin-bottom: 2rem; }
        .sidebar-brand h2 { font-size: 1.2rem; }
        .sidebar-brand p { font-size: 0.7rem; opacity: 0.7; }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.7rem 1rem;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            border-radius: 8px;
            transition: 0.2s;
            margin-bottom: 0.3rem;
        }
        .sidebar-nav a:hover, .sidebar-nav a.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        .sidebar-nav a i { width: 20px; }
        .badge-notification {
            background: #dc3545;
            color: white;
            border-radius: 50%;
            padding: 0.1rem 0.5rem;
            font-size: 0.6rem;
            font-weight: 700;
            margin-left: auto;
        }
        .main-content {
            margin-left: 250px;
            padding: 2rem;
            width: 100%;
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .topbar h1 { font-size: 1.5rem; color: #002D62; }
        .logout-btn {
            background: #dc3545;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.8rem;
        }
        .logout-btn:hover { background: #c82333; }
        .alert {
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

        @media (max-width: 768px) {
            .sidebar { width: 60px; padding: 1rem; }
            .sidebar-brand h2, .sidebar-brand p, .sidebar-nav a span { display: none; }
            .sidebar-nav a { justify-content: center; padding: 0.7rem; }
            .badge-notification { font-size: 0.5rem; padding: 0.05rem 0.3rem; }
            .main-content { margin-left: 60px; padding: 1rem; }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-brand">
            <h2>⚡ Admin</h2>
            <p>Great Mercy Centre</p>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="@yield('nav-dashboard')">
                <i class="fas fa-chart-pie"></i> <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.news.index') }}" class="@yield('nav-news')">
                <i class="fas fa-newspaper"></i> <span>News & Events</span>
            </a>
            <a href="{{ route('admin.settings') }}" class="@yield('nav-settings')">
                <i class="fas fa-cog"></i> <span>Settings</span>
            </a>
            <a href="{{ route('admin.messages.index') }}" class="@yield('nav-messages')">
                <i class="fas fa-envelope"></i> <span>Messages</span>
                @php
                    $unreadCount = \App\Models\Message::where('is_read', false)->count();
                @endphp
                @if($unreadCount > 0)
                    <span class="badge-notification">{{ $unreadCount }}</span>
                @endif
            </a>
            <a href="{{ route('admin.alumni.index') }}" class="@yield('nav-alumni')">
                <i class="fas fa-user-graduate"></i> <span>Alumni</span>
            </a>
            <a href="{{ route('admin.staff.index') }}" class="@yield('nav-staff')">
                <i class="fas fa-chalkboard-teacher"></i> <span>Staff</span>
            </a>
            <a href="{{ route('admin.students.index') }}" class="@yield('nav-students')">
                <i class="fas fa-users"></i> <span>Students</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="@yield('nav-users')">
                <i class="fas fa-users-cog"></i> <span>Users</span>
            </a>
            <a href="{{ route('admin.profile') }}" class="@yield('nav-profile')">
                <i class="fas fa-user-cog"></i> <span>Profile</span>
            </a>
            <a href="{{ route('admin.applications') }}" class="@yield('nav-applications')">
                <i class="fas fa-file-alt"></i> <span>Applications</span>
            </a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
            </a>
        </nav>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </aside>

    <main class="main-content">
        <div class="topbar">
            <h1>@yield('title')</h1>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>
