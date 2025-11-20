<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        return PostResource::collection(Post::all())->resolve();
    }

    public function show(Post $post)
    {
        return PostResource::make($post)->resolve();
    }

    public function store()
    {
        $data = [
            'title' => 'second post',
            'content' => 'content post'
        ];

        $post = Post::create($data);

        return PostResource::make($post)->resolve();
    }

    public function update(Post $post)
    {
        $date = md5(now());
        $data = [
            'title' => 'title post edited' . $date,
            'content' => 'content post'
        ];

        $post->update($data);
        return PostResource::make($post)->resolve();
    }

    public function destroy(Post $post)
    {
        $post->delete($post);
        return response(['message' => 'post deleted']);
    }
}
