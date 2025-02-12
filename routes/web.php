<?php

use Illuminate\Support\Facades\Route;

// GET 	/posts 	index 	posts.index
// GET 	/posts/create 	create 	posts.create
// POST 	/posts 	store 	posts.store
// GET 	/posts/{post} 	show 	posts.show
// GET 	/posts/{post}/edit 	edit 	posts.edit
// PUT/PATCH 	/posts/{post} 	update 	posts.update
// DELETE 	/posts/{post} 	destroy 	posts.destroy

// Route::resource('posts', PostController::class);

Route::get('/', function(){
    return view('posts.edit');
    // return redirect('/login');
});

Route::get('/login', function(){
    return view('login');
});


Route::get('/register', function(){
    return view('register');
});