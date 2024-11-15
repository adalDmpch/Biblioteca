<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ContactController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de Autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas de Registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rutas de Recuperación de Contraseña
Route::group(['prefix' => 'password'], function () {
    Route::get('/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');
    Route::post('/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('password.email');
    Route::get('/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
        ->name('password.reset');
    Route::post('/reset', [ResetPasswordController::class, 'reset'])
        ->name('password.update');
});

// Rutas de Contacto
Route::get('/contacto', [ContactController::class, 'index'])->name('contacto');
Route::post('/sesion/contactbook', [ContactController::class, 'submit'])->name('contacto.submit');

// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', function () {
        return view('auth.profile');
    })->name('profile');
});