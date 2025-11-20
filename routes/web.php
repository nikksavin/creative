<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/index', [PostController::class, 'index']);
Route::get('/posts/{post}/show', [PostController::class, 'show']);
Route::get('/posts/store', [PostController::class, 'store']);
Route::get('/posts/{post}/update', [PostController::class, 'update']);
Route::get('/posts/{post}/destroy', [PostController::class, 'destroy']);

Route::get('/message/index', [MessageController::class, 'index']);
Route::get('/message/{message}/show', [MessageController::class, 'show']);
Route::get('/message/store', [MessageController::class, 'store']);
Route::get('/message/{message}/update', [MessageController::class, 'update']);
Route::get('/message/{message}/destroy', [MessageController::class, 'destroy']);


Route::get('/category/index', [CategoryController::class, 'index']);
Route::get('/category/{category}/show', [CategoryController::class, 'show']);
Route::get('/category/store', [CategoryController::class, 'store']);
Route::get('/category/{category}/update', [CategoryController::class, 'update']);
Route::get('/category/{category}/destroy', [CategoryController::class, 'destroy']);
