<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CategoryController;


// Halaman Publik
Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/book/{id}', [PublicController::class, 'show'])->name('public.show');

// Autentikasi
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Dashboard (setelah login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Manajemen Buku
    Route::resource('/books', BookController::class);

    // Manajemen Kategori
    Route::resource('/categories', CategoryController::class);
});

