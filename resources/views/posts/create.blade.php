@extends('posts.layout')

@section('content')
    <a href="{{ route('admin.posts.index') }}" style="color: #325E6A; text-decoration: none; font-weight: 500;">&larr; Back to Admin</a>

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

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label>Content</label><br>
            <textarea name="content" rows="10" required>{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label>Image <span style="color:#999; font-weight:400;">(optional)</span></label><br>
            <input type="file" name="image" accept="image/*">
            <small style="color:#666;">Max 4MB. JPG, PNG, GIF, WebP.</small>
        </div>

        <button type="submit" class="btn">Publish Post</button>
    </form>
@endsection
