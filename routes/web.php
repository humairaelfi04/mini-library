<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublicController;

// Halaman Publik
Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/book/{id}', [PublicController::class, 'show'])->name('public.book.show');

// Autentikasi
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (setelah login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Manajemen Buku
    Route::resource('/books', BookController::class);

    // Manajemen Kategori
    Route::resource('/categories', CategoryController::class);
});
