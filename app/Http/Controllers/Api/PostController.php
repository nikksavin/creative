<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\StoreRequest;
use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return PostResource::collection(Post::all())->resolve();
    }

    public function show(Post $post)
    {
        return PostResource::make($post)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = PostService::createPost($data);
        return PostResource::make($post)->resolve();
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = PostService::updatePost($data, $post);
        return PostResource::make($post)->resolve();
    }

    public function destroy(Post $post)
    {
       return PostService::deletePost($post);
    }
}
