<?php

use App\Controllers\TestController;
use App\Core\Route;

// Route::get('/', [TestController::class, 'index']);
Route::get('/', function () {
    view('home', [
        'logo' => 'hello'
    ]);
});
// the method should be called index.this is just a test.
Route::get('/contact', [TestController::class, 'contact']);
Route::post('/contacts', [TestController::class, 'create']);
