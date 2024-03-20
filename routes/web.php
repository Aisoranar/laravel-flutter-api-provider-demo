<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/post', [UserController::class, 'post']);
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
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.users');
    Route::get('/user/add', [AdminController::class, 'showAddUserForm'])->name('admin.user.add.form');
    Route::post('/user/add', [AdminController::class, 'addUser'])->name('admin.user.add');
    Route::get('/user/{id}/edit', [AdminController::class, 'editUserForm'])->name('admin.user.edit.form');
    Route::patch('/user/{id}/edit', [AdminController::class, 'editUser'])->name('admin.user.edit');
    Route::delete('/user/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
});