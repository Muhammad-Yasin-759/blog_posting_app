<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Public Posts Routes
Route::resource('posts', PostController::class)->only(['index', 'show']);

// Admin Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('admin', [PostController::class, 'admin'])->name('admin.posts.index');
    Route::resource('posts', PostController::class)->except(['index', 'show']);
});
