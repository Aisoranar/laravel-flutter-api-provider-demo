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


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/users', [AdminController::class, 'showUsers']);
    Route::post('/user/add', [AdminController::class, 'addUser']);
    Route::post('/user/{id}/edit', [AdminController::class, 'editUser']);
    Route::delete('/user/{id}/delete', [AdminController::class, 'deleteUser']);
});
