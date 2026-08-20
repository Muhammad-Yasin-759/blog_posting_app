@extends('posts.layout')

@section('content')
    <a href="{{ route('admin.posts.index') }}">&larr; Back to Admin</a>

    <h2>Create New Post</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label>Content</label><br>
            <textarea name="content" rows="10" required>{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="btn">Publish Post</button>
    </form>
@endsection
