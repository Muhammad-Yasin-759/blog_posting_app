<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('posts.index');
});


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');


Route::middleware('auth')->group(function () {
    Route::get('admin', [PostController::class, 'admin'])->name('admin.posts.index');
    Route::resource('posts', PostController::class)->except(['index', 'show']);
});


Route::resource('posts', PostController::class)->only(['index', 'show']);
