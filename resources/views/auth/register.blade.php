@extends('posts.layout')

@section('content')
    <h2>Create New User</h2>

    @if ($errors->any())
        <div class="error" style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST" style="max-width: 400px;">
        @csrf
        <div class="form-group" style="margin-bottom: 15px;">
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Email Address</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Password</label><br>
            <input type="password" name="password" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Confirm Password</label><br>
            <input type="password" name="password_confirmation" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <button type="submit" class="btn" style="padding: 10px 15px; cursor: pointer;">Register</button>
    </form>
@endsection
