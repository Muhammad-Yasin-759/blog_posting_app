<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    /**
     * Get all posts.
     *
     * @return Collection
     */
    public function getAllPosts(): Collection
    {
        return Post::latest()->get();
    }

    /**
     * Create a new post.
     *
     * @param array $data
     * @return Post
     */
    public function createPost(array $data): Post
    {
        return Post::create($data);
    }

    /**
     * Get a single post by ID.
     *
     * @param int $id
     * @return Post
     */
    public function getPostById(int $id): Post
    {
        return Post::findOrFail($id);
    }

    /**
     * Update an existing post.
     *
     * @param int $id
     * @param array $data
     * @return Post
     */
    public function updatePost(int $id, array $data): Post
    {
        $post = $this->getPostById($id);
        $post->update($data);

        return $post;
    }

    /**
     * Delete a post.
     *
     * @param int $id
     * @return bool
     */
    public function deletePost(int $id): bool
    {
        $post = $this->getPostById($id);
        return $post->delete();
    }
}
