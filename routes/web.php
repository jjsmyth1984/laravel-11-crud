<?php

declare(strict_types=1);

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Homepage operations
Route::get('/', function () {
    if (auth()->check()) {
        $posts = [] ?? auth()->user()->relatedPosts()->latest()->get();
        return view('home', ['posts' => $posts]);
    }
    return redirect('login');
});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register-user');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login-submission', [UserController::class, 'loginSubmission'])->name('login-submission');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Blog post operations
Route::post('/create-post', [PostController::class, 'createPost'])->name('create-post');
Route::get('/view-post/{post}', [PostController::class, 'viewPost'])->name('view-post');
Route::put('/edit-post/{post}', [PostController::class, 'editPost'])->name('edit-post');
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost'])->name('delete-post');
