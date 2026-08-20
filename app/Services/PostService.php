<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function getAllPosts(): Collection
    {
        return Post::latest()->get();
    }

    public function createPost(array $data, ?UploadedFile $image = null): Post
    {
        if ($image) {
            $data['image_url'] = $image->store('posts', 'public');
        }

        return Post::create($data);
    }

    public function getPostById(int $id): Post
    {
        return Post::findOrFail($id);
    }

    public function updatePost(int $id, array $data, ?UploadedFile $image = null): Post
    {
        $post = $this->getPostById($id);

        if ($image) {
            if ($post->image_url) {
                Storage::disk('public')->delete($post->image_url);
            }
            $data['image_url'] = $image->store('posts', 'public');
        }

        $post->update($data);

        return $post;
    }

    public function deletePost(int $id): bool
    {
        $post = $this->getPostById($id);

        if ($post->image_url) {
            Storage::disk('public')->delete($post->image_url);
        }

        return $post->delete();
    }
}
