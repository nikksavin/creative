<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Message\MessageResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return CategoryResource::collection(Category::all())->resolve();
    }

    public function show(Category $category)
    {
        return CategoryResource::make($category)->resolve();
    }

    public function store()
    {
        $data = [
            'title' => 'title 322'
        ];

        $category = Category::create($data);

        return CategoryResource::make($category)->resolve();
    }

    public function update(Category $category)
    {
        $date = md5(now());
        $data = [
            'title' => 'title post edited' . $date,
        ];

        $category->update($data);
        return CategoryResource::make($category)->resolve();
    }

    public function destroy(Category $message)
    {
        $message->delete($message);
        return response(['message' => 'category deleted']);
    }

}
