<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
	Route::view('/', 'login')->name('login.view');
	Route::post('login', [AuthController::class, 'login'])->name('login.user');

	Route::view('register', 'register')->name('register.view');
	Route::post('register', [RegisterController::class, 'store'])->name('registration.store');

	Route::view('/forgot-password', 'forgot-password')->name('password.request');

	Route::controller(PasswordResetController::class)->group(function () {
		Route::post('/forgot-password', 'sendResetLink')->name('password.email');
		Route::get('/reset-password/{token}', 'showResetForm')->name('password.reset');
		Route::post('/reset-password', 'update')->name('password.update');
	});
});

Route::view('notice', 'reset-notice')->name('reset.notice');
Route::view('confirmed', 'confirmed')->name('email.confirmed');
Route::get('/email/verify/{id}/{token}', [VerifyEmailController::class, 'verifyEmail'])->name('verification.verify');
Route::view('/email/verify', 'verify-notice')->name('verification.notice');

Route::middleware(['auth', 'verified'])->group(function () {
	Route::controller(CountryController::class)->group(function () {
		Route::get('dashboard', 'index')->name('dashboard.view');
		Route::get('dashboard/{columnName}/{sort}', 'sortByColumn')->name('sort.columns');
	});
	Route::post('logout', [AuthController::class, 'logout'])->name('logout.user');
});

Route::get('/change-locale/{locale}', [LanguageController::class, 'change'])->name('locale.change');
