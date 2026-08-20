@extends('posts.layout')

@section('content')
    <h2>Latest Posts</h2>

    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            <div>
                <h3><a href="{{ route('posts.show', $post->id) }}" style="color: #224248; text-decoration:none;">{{ $post->title }}</a></h3>
                <p class="post-meta">Published on {{ $post->created_at->format('Y-m-d') }}</p>
                <p>{{ Str::limit($post->content, 150) }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="btn" style="font-size:0.85em; padding:6px 14px;">Read More</a>
            </div>
            <hr>
        @endforeach
    @else
        <p>No posts available.</p>
    @endif
@endsection
