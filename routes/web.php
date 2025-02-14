<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// GET 	/posts 	index 	posts.index
// GET 	/posts/create 	create 	posts.create
// POST 	/posts 	store 	posts.store
// GET 	/posts/{post} 	show 	posts.show
// GET 	/posts/{post}/edit 	edit 	posts.edit
// PUT/PATCH 	/posts/{post} 	update 	posts.update
// DELETE 	/posts/{post} 	destroy 	posts.destroy

// Route::resource('posts', PostController::class);

Route::get('/', function () {
    return view('posts.index');
});

Route::get('/posts/create', function () {
    return view('posts.create');
});

Route::get('/posts/edit', function () {
    return view('posts.edit');
});

Route::get('/posts/{post}', function () {
    return view('posts.show');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// Route::middleware()