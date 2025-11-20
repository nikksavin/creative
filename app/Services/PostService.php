<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public static function createPost(array $data): Post
    {
        return Post::create($data);
    }

    public static function updatePost(array $data, Post $post): Post
    {
        $post->update($data);
        return $post;
    }

    public static function deletePost(Post $post): \Illuminate\Http\JsonResponse
    {
        $post->delete();
        return response()->json([
            'message' => 'Post deleted successfully'
        ], 200);
    }
}
