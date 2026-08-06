<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Great Mercy</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #002D62 0%, #004a9a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .login-logo img {
            max-width: 80px;
            height: auto;
            margin-bottom: 0.5rem;
        }
        .login-logo h1 {
            font-size: 1.5rem;
            color: #002D62;
        }
        .login-logo p {
            font-size: 0.8rem;
            color: #666;
        }
        .form-group { margin-bottom: 1.2rem; }
        .form-group label {
            display: block;
            font-weight: 600;
            font-size: 0.85rem;
            color: #333;
            margin-bottom: 0.3rem;
        }
        input {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 0.9rem;
            transition: 0.2s;
        }
        input:focus { outline: none; border-color: #002D62; }

        .password-wrapper {
            position: relative;
        }
        .password-wrapper input {
            padding-right: 3rem;
        }
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #999;
            font-size: 1.1rem;
            padding: 5px;
            transition: 0.2s;
        }
        .toggle-password:hover {
            color: #002D62;
        }

        .btn {
            width: 100%;
            padding: 0.8rem;
            background: #002D62;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn:hover { background: #003e7c; transform: translateY(-2px); }
        .error { color: #d32f2f; font-size: 0.8rem; margin-top: 0.5rem; text-align: center; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
            <img src="{{ asset('logo.png') }}" alt="Great Mercy Logo">
            <h1>Admin Login</h1>
            <p>Great Mercy Development Centre</p>
        </div>

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="admin@greatmercy.org" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                    <button type="button" class="toggle-password" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
