@extends('posts.layout')

@section('content')
    <a href="{{ route('admin.posts.index') }}">&larr; Back to Admin</a>

    <h2>Edit Post</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="form-group">
            <label>Content</label><br>
            <textarea name="content" rows="10" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <button type="submit" class="btn">Update Post</button>
    </form>
@endsection
