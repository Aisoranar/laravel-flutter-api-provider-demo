<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminApiController;
use App\Http\Controllers\Api\UserApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and are assigned the "api"
| middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes for AdminApiController
Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->group(function () {
    Route::get('/users', [AdminApiController::class, 'getUsers']);
    Route::get('/users/{id}', [AdminApiController::class, 'getUserById']);
    Route::delete('/users/{id}', [AdminApiController::class, 'deleteUserById']);

    Route::get('/posts', [AdminApiController::class, 'getPosts']);
    Route::get('/posts/{id}', [AdminApiController::class, 'getPostById']);
    Route::delete('/posts/{id}', [AdminApiController::class, 'deletePostById']);
});

// Routes for UserApiController
Route::middleware('auth:sanctum')->prefix('user')->group(function () {
    Route::get('/profile', [UserApiController::class, 'profile']);
    Route::post('/post', [UserApiController::class, 'createPost']);
    Route::get('/posts', [UserApiController::class, 'getUserPosts']);
});

// Authentication routes
Route::post('/register', [UserApiController::class, 'register']);
Route::post('/login', [UserApiController::class, 'login']);
Route::post('/logout', [UserApiController::class, 'logout']);
