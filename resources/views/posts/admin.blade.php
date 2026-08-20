@extends('posts.layout')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Manage Posts</h2>
        <div>
            <a href="{{ route('posts.create') }}" class="btn">Create New Post</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline; margin-left:10px;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    @if ($posts->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn" style="font-size:0.85em; padding:5px 10px;">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="font-size:0.85em; padding:5px 10px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No posts yet.</p>
    @endif
@endsection
