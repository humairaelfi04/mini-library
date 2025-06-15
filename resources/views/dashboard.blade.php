@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4">👋 Selamat datang, {{ Auth::user()->name }}!</h2>
    <p class="text-center text-muted mb-5">Ini adalah halaman dashboard admin. Silakan pilih menu di bawah untuk mengelola perpustakaan.</p>

    <div class="row justify-content-center g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 hover-scale">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-book-half fs-1 text-primary"></i>
                    </div>
                    <h5 class="card-title fw-semibold">Manajemen Buku</h5>
                    <p class="card-text text-muted">Lihat dan kelola semua buku yang tersedia.</p>
                    <a href="{{ route('books.index') }}" class="btn btn-custom">📘 Lihat Buku</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 hover-scale">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-tags fs-1 text-success"></i>
                    </div>
                    <h5 class="card-title fw-semibold">Manajemen Kategori</h5>
                    <p class="card-text text-muted">Kelola daftar kategori buku dengan mudah.</p>
                    <a href="{{ route('categories.index') }}" class="btn btn-success">🏷️ Lihat Kategori</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
