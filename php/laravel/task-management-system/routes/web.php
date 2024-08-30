<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardTaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

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
	Route::view('/register', 'register')->name('register.index');
	Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
	Route::view('/', 'login')->name('login.index');
	Route::post('login', [AuthController::class, 'login'])->name('login.user');
});
Route::middleware('auth')->group(function () {
	Route::get('/tasks', [DashboardTaskController::class, 'index'])->name('task.index');
	Route::get('/tasks/create', [DashboardTaskController::class, 'create'])->name('task.create');
	Route::post('/tasks', [DashboardTaskController::class, 'store'])->name('task.store');
	Route::get('/tasks/{task}', [DashboardTaskController::class, 'show'])->name('task.show');
	Route::get('/tasks/{task}/edit', [DashboardTaskController::class, 'edit'])->name('task.edit');
	Route::put('/tasks/{task}', [DashboardTaskController::class, 'update'])->name('task.update');
	Route::delete('/tasks/{task}', [DashboardTaskController::class, 'destroy'])->name('task.destroy');
	Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user');
	Route::post('/tasks/{task}/complete', [DashboardTaskController::class, 'complete'])->name('task.complete');
});
