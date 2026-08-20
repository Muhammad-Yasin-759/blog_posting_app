<!DOCTYPE html>
<html>
<head>
    <title>Simple Blog</title>
    <style>
        body { 
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; 
            background-color: #f4f7f8; 
            color: #333; 
            margin: 0; 
            padding: 40px 20px; 
            line-height: 1.6; 
        }
        .container { 
            max-width: 800px; 
            margin: 0 auto; 
            background: #ffffff; 
            padding: 30px; 
            border-radius: 8px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); 
        }
        h1, h2, h3 { 
            color: #224248; 
            margin-top: 0; 
        }
        nav { 
            margin-bottom: 30px; 
            border-bottom: 2px solid #eef2f3; 
            padding-bottom: 15px; 
            font-size: 1.1em;
        }
        nav a { 
            margin-right: 15px; 
            text-decoration: none; 
            color: #325E6A; 
            font-weight: 500;
            transition: color 0.2s ease;
        }
        nav a:hover { 
            color: #FF9A00; 
        }
        nav strong a { 
            color: #224248 !important; 
            font-weight: 700;
        }
        .alert { 
            background-color: #e8f7f8; 
            color: #224248; 
            border-left: 4px solid #44A1A4; 
            padding: 12px 15px; 
            margin-bottom: 20px; 
            border-radius: 4px; 
            font-weight: 500; 
        }
        .error { 
            background-color: #fff3e0; 
            color: #b75c00; 
            border-left: 4px solid #FF9A00; 
            padding: 12px 15px; 
            margin-bottom: 20px; 
            border-radius: 4px; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th { 
            background-color: #f4f7f8; 
            color: #224248; 
            font-weight: 600; 
            border-bottom: 2px solid #eef2f3;
        }
        th, td { 
            padding: 12px 15px; 
            text-align: left; 
            border-bottom: 1px solid #eef2f3;
        }
        .form-group { 
            margin-bottom: 20px; 
        }
        .form-group label {
            display: inline-block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #224248;
        }
        input[type="text"], input[type="email"], input[type="password"], textarea { 
            width: 100%; 
            padding: 10px 12px; 
            border: 1px solid #c9d6d8; 
            border-radius: 4px; 
            box-sizing: border-box; 
            font-size: 1em;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, textarea:focus { 
            border-color: #44A1A4; 
            box-shadow: 0 0 0 3px rgba(68, 161, 164, 0.15); 
            outline: none;
        }
        button, .btn { 
            padding: 10px 18px; 
            background-color: #44A1A4; 
            border: none; 
            border-radius: 4px; 
            color: #ffffff; 
            font-weight: 600; 
            cursor: pointer; 
            text-decoration: none; 
            display: inline-block; 
            transition: background-color 0.2s ease;
            font-size: 0.95em;
        }
        button:hover, .btn:hover { 
            background-color: #325E6A; 
        }
        .btn-danger { 
            background-color: #FF9A00; 
        }
        .btn-danger:hover { 
            background-color: #e08800; 
        }
        .post-meta { 
            font-size: 0.9em; 
            color: #666; 
            margin-bottom: 15px;
        }
        hr { 
            border: 0; 
            border-top: 1px solid #eef2f3; 
            margin: 30px 0; 
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <strong><a href="{{ route('posts.index') }}">Simple Blog</a></strong>
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
    </div>
</body>
</html>
