<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminBookController;


Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login') 
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register')
    ->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/contacto', [ContactController::class, 'index'])->name('contacto');
Route::post('/sesion/contactbook', [ContactController::class, 'submit'])->name('contacto.submit');


Route::group(['prefix' => 'books'], function () {
    Route::get('/', function () {
        return redirect()->route('login')
            ->with('error', 'Debes iniciar sesión para acceder a la biblioteca.');
    })->middleware('guest');

    Route::middleware(['auth'])->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('books');
        Route::get('/{id}', [BookController::class, 'show'])->name('books.show');
        Route::get('/{id}/download', [BookController::class, 'download'])->name('books.download');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', function () {
        return view('auth.profile');
    })->name('profile');
});

Route::middleware(['auth', 'admin'])->prefix('admin/books')->name('admin.books.')->group(function () {
    Route::get('/', [AdminBookController::class, 'index'])->name('index');
    Route::get('/create', [AdminBookController::class, 'create'])->name('create');
    Route::post('/', [AdminBookController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [AdminBookController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AdminBookController::class, 'update'])->name('update');
    Route::delete('/{id}', [AdminBookController::class, 'destroy'])->name('destroy');
});

Route::get('/offline', function () {
    return view('vendor.laravelpwa.offline');
});