@extends('posts.layout')

@section('content')
    <a href="{{ route('posts.index') }}" style="color: #325E6A; text-decoration: none; font-weight: 500;">&larr; Back to Posts</a>

    <h1>{{ $post->title }}</h1>
    <p class="post-meta">Published on {{ $post->created_at->format('Y-m-d H:i') }}</p>
    
    <div style="margin-top: 20px;">
        {!! nl2br(e($post->content)) !!}
    </div>
@endsection
