<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    public function getAllPosts(): Collection
    {
        return Post::latest()->get();
    }

    public function createPost(array $data): Post
    {
        return Post::create($data);
    }

    public function getPostById(int $id): Post
    {
        return Post::findOrFail($id);
    }

    public function updatePost(int $id, array $data): Post
    {
        $post = $this->getPostById($id);
        $post->update($data);

        return $post;
    }

    public function deletePost(int $id): bool
    {
        $post = $this->getPostById($id);
        return $post->delete();
    }
}
