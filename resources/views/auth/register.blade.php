@extends('posts.layout')

@section('content')
    <h2>Create New User</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST" style="max-width: 400px;">
        @csrf
        <div class="form-group">
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
            <label>Email Address</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label>Password</label><br>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <label>Confirm Password</label><br>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn">Register</button>
    </form>
@endsection
