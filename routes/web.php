<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/post', [UserController::class, 'post']);
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('/create-post', [UserController::class, 'createPost'])->name('create.post');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [UserController::class, 'register']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login');

// Rutas para el panel de administración
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.users');
    Route::get('/user/add', [AdminController::class, 'showAddUserForm'])->name('admin.user.add.form');
    Route::post('/user/add', [AdminController::class, 'addUser'])->name('admin.user.add');
    Route::get('/user/{id}/edit', [AdminController::class, 'editUserForm'])->name('admin.user.edit.form');
    Route::patch('/user/{id}/edit', [AdminController::class, 'editUser'])->name('admin.user.edit');
    Route::delete('/user/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.user.delete');

    // Rutas para las publicaciones pendientes
    Route::get('/posts/pending', [AdminController::class, 'showPendingPosts'])->name('admin.posts.pending');
    Route::post('/posts/{postId}/approve', [AdminController::class, 'approvePost'])->name('admin.posts.approve');
    Route::post('/posts/{postId}/reject', [AdminController::class, 'rejectPost'])->name('admin.posts.reject');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
