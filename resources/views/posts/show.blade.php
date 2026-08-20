@extends('posts.layout')

@section('content')
    <a href="{{ route('posts.index') }}" style="color: #325E6A; text-decoration: none; font-weight: 500;">&larr; Back to Posts</a>

    <h1>{{ $post->title }}</h1>
    <p class="post-meta">Published on {{ $post->created_at->format('Y-m-d H:i') }}</p>

    @if ($post->image_url)
        <img src="{{ Storage::url($post->image_url) }}" alt="{{ $post->title }}" style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 6px; margin-bottom: 20px;">
    @endif

    <div>
        {!! nl2br(e($post->content)) !!}
    </div>
@endsection
