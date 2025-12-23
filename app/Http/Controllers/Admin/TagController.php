<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $tags = TagResource::collection($tags)->resolve();

        return inertia("Admin/Tags/Index", compact("tags"));
    }

    public function show(Tag $tag)
    {
        $tag = TagResource::make($tag)->resolve();

        return inertia("Admin/Tags/Show", compact("tag"));
    }

    public function create()
    {
        return inertia("Admin/Tags/Create");
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $tag = Tag::create($data);
        return TagResource::make($tag)->resolve();
    }
}
