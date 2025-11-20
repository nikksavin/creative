<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\MessagesController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::get('/posts', [PostController::class, 'index']);
//Route::get('/posts/{post}', [PostController::class, 'show']);
//Route::post('/posts', [PostController::class, 'store']);
//Route::patch('/posts/{post}', [PostController::class, 'update']);
//Route::delete('/posts/{post}', [PostController::class, 'destroy']);

Route::ApiResource('/posts', PostController::class);

//Route::get('/messages', [MessagesController::class, 'index']);
//Route::get('/messages/{message}', [MessagesController::class, 'show']);
//Route::post('/messages', [MessagesController::class, 'store']);
//Route::patch('/messages/{message}', [MessagesController::class, 'update']);
//Route::delete('/messages/{message}', [MessagesController::class, 'destroy']);

Route::ApiResource('/messages', MessagesController::class);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::patch('/categories/{category}', [CategoryController::class, 'update']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
