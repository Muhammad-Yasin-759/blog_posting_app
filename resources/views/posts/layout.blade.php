<!DOCTYPE html>
<html>
<head>
    <title>Simple Blog</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; line-height: 1.6; }
        nav { margin-bottom: 20px; border-bottom: 1px solid #ccc; padding-bottom: 10px; }
        nav a { margin-right: 15px; text-decoration: none; color: #0066cc; }
        .alert { color: green; margin-bottom: 20px; font-weight: bold; }
        .error { color: red; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        .form-group { margin-bottom: 15px; }
        input[type="text"], input[type="email"], input[type="password"], textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button, .btn { padding: 8px 12px; background: #eee; border: 1px solid #ccc; cursor: pointer; text-decoration: none; color: #333; display: inline-block; }
        .btn-danger { background: #fcc; border-color: #f00; color: #900; }
        .post-meta { font-size: 0.9em; color: #666; }
        hr { border: 0; border-top: 1px solid #eee; margin: 20px 0; }
    </style>
</head>
<body>
    <nav>
        <strong><a href="{{ route('posts.index') }}" style="color: #333;">Simple Blog</a></strong>
        |
        <a href="{{ route('posts.index') }}">Home</a>
        @auth
            <a href="{{ route('admin.posts.index') }}">Admin</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </nav>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @yield('content')
</body>
</html>
