<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileContoller;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth',  ]], function () {
    Route::get('posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');
    Route::post('posts', [PostController::class, 'store'])->name('admin.posts.store');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::get('categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::post('categories', [CategoryController::class, 'store'])->name('admin.categories.store');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('admin/tags', [TagController::class, 'index'])->name('admin.tags.index');
    Route::get('admin/tags/create', [TagController::class, 'create'])->name('admin.tags.create');
    Route::get('admin/tags/{tag}', [TagController::class, 'show'])->name('admin.tags.show');
    Route::post('admin/tags', [TagController::class, 'store'])->name('admin.tags.store');
});


Route::get('admin/profiles', [ProfileContoller::class, 'index'])->name('admin.profiles.index');
Route::get('admin/profiles/{profile}', [ProfileContoller::class, 'show'])->name('admin.profiles.show');
