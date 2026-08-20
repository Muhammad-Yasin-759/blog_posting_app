@extends('posts.layout')

@section('content')
    <a href="{{ route('admin.posts.index') }}" style="color: #325E6A; text-decoration: none; font-weight: 500;">&larr; Back to Admin</a>

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

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
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

        <div class="form-group">
            <label>Image <span style="color:#999; font-weight:400;">(optional)</span></label><br>
            @if ($post->image_url)
                <div style="margin-bottom: 10px;">
                    <img src="{{ Storage::url($post->image_url) }}" alt="Current image" style="max-width: 300px; border-radius: 4px; border: 1px solid #eef2f3;">
                    <p style="font-size:0.85em; color:#666; margin-top:4px;">Current image. Upload a new one to replace it.</p>
                </div>
            @endif
            <input type="file" name="image" accept="image/*">
            <small style="color:#666;">Max 4MB. JPG, PNG, GIF, WebP.</small>
        </div>

        <button type="submit" class="btn">Update Post</button>
    </form>
@endsection
