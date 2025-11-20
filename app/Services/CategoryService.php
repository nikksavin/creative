<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryService
{
    public static function createCategory(array $data): Category
    {
        return Category::create($data);
    }

    public static function updateCategory(array $data, Category $category): Category
    {
        $category->update($data);
        return $category;
    }

    public static function deleteCategory(Category $category): JsonResponse
    {
        $category->delete();
        return response()->json([
            'message' => 'Post deleted successfully'
        ], 200);
    }
}
