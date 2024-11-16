<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register')
    ->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);

// Rutas de recuperación de contraseña
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

// Rutas de contacto (públicas)
Route::get('/contacto', [ContactController::class, 'index'])->name('contacto');
Route::post('/sesion/contactbook', [ContactController::class, 'submit'])->name('contacto.submit');

// Rutas de libros
Route::group(['prefix' => 'books'], function () {
    // Ruta para usuarios no autenticados
    Route::get('/', function () {
        return redirect()->route('login')
            ->with('error', 'Debes iniciar sesión para acceder a la biblioteca.');
    })->middleware('guest');

    // Rutas para usuarios autenticados
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('books');
        Route::get('/{id}', [BookController::class, 'show'])->name('books.show');
        Route::get('/{id}/download', [BookController::class, 'download'])->name('books.download');
    });
});

// Otras rutas protegidas
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', function () {
        return view('auth.profile');
    })->name('profile');
});