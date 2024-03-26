<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminApiController;
use App\Http\Controllers\Api\UserApiController;

// Rutas para administradores
Route::prefix('admin')->group(function () {
    Route::get('/users', [AdminApiController::class, 'getUsers']);
    Route::get('/users/{id}', [AdminApiController::class, 'getUserById']);
    Route::delete('/users/{id}', [AdminApiController::class, 'deleteUserById']);

    Route::get('/posts', [AdminApiController::class, 'getPosts']);
    Route::get('/posts/{id}', [AdminApiController::class, 'getPostById']);
    Route::delete('/posts/{id}', [AdminApiController::class, 'deletePostById']);
});

// Rutas para usuarios
Route::prefix('user')->group(function () {
    Route::get('/profile', [UserApiController::class, 'profile']);
    Route::post('/post', [UserApiController::class, 'createPost']);
    Route::get('/posts', [UserApiController::class, 'getUserPosts']); // Obtener todas las publicaciones del usuario
    Route::get('/all-posts', [UserApiController::class, 'getAllUserPosts']); // Obtener todas las publicaciones del usuario (incluidas las pendientes de aprobación)
});


// Rutas de autenticación y registro para usuarios
Route::post('/register', [UserApiController::class, 'register']);
Route::post('/login', [UserApiController::class, 'login']);
Route::post('/logout', [UserApiController::class, 'logout']);
