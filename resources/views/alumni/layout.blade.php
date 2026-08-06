<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Great Mercy Alumni</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Same styles as index.blade.php */
    </style>
</head>
<body>
    <!-- Back to Main Site -->
    <div class="back-to-main">
        <a href="{{ route('home') }}"><i class="fas fa-arrow-left"></i> Back to Main Site</a>
    </div>

    <!-- Top Navigation -->
    <nav class="alumni-nav">
        <div class="logo-area">
            <img src="{{ asset('logo.png') }}" alt="Logo">
            <span>Great Mercy Alumni</span>
        </div>
        <div class="nav-links">
            <a href="{{ route('alumni.index') }}" class="@yield('nav-home')">Home</a>
            <a href="{{ route('alumni.about') }}" class="@yield('nav-about')">About Us</a>
            <a href="{{ route('alumni.membership') }}" class="@yield('nav-membership')">Membership</a>
            <a href="{{ route('alumni.donate') }}" class="@yield('nav-donate')">Donate</a>
            <a href="{{ route('alumni.contact') }}" class="@yield('nav-contact')">Contact Us</a>
        </div>
        <div class="nav-right">
            <a href="tel:+254727791668"><i class="fas fa-phone-alt"></i></a>
            <a href="mailto:alumni@greatmercy.org"><i class="fas fa-envelope"></i></a>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <div class="alumni-footer">
        <p>&copy; 2026 Great Mercy School. All rights reserved. | <a href="{{ route('alumni.index') }}">Alumni</a> | <a href="{{ route('alumni.contact') }}">Contact</a></p>
    </div>
</body>
</html>
