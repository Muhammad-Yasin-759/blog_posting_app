@extends('posts.layout')

@section('content')
    <h2>Admin Login</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST" style="max-width: 400px;">
        @csrf
        <div class="form-group">
            <label>Email Address</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label>Password</label><br>
            <input type="password" name="password" required>
        </div>

        <button type="submit" class="btn">Login</button>
    </form>
@endsection
