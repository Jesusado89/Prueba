<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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

// Ruta de la página de inicio
Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Route::get(
    '/home',
    function () {
        $user = auth()->user();
        //dd($user);
        return view('home', compact('user'));
    }
);

// Rutas de autenticación
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Rutas de registro
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');

// Rutas de restablecimiento de contraseña
Route::get('/password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');

// Rutas de verificación de correo electrónico
Route::get('/email/verify', 'App\Http\Controllers\Auth\VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}', 'App\Http\Controllers\Auth\VerificationController@verify')->name('verification.verify');
Route::get('/email/resend', 'App\Http\Controllers\Auth\VerificationController@resend')->name('verification.resend');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
//require base_path('routes/quotes.php');
// in routes/web.php
Route::middleware('auth', 'is_admin')->group(
    function () {
        Route::get('/admin', [AdminController::class, 'index']);
    }
);
