<?php

use App\Http\Controllers\AdminAuthorController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
	Route::view('/', 'login')->name('login.view');
	Route::post('/', [AuthController::class, 'login'])->name('login.user');
});

Route::middleware('auth')->group(function () {
	Route::resource('books', AdminBookController::class);
	Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user');
	Route::get('/authors', [AdminAuthorController::class, 'index'])->name('authors.index');
});
