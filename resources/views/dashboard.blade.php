@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h2>Selamat datang, {{ Auth::user()->name }}!</h2>
    <p class="lead">Ini adalah halaman dashboard admin.</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Buku</h5>
                    <p class="card-text">Lihat dan kelola semua buku.</p>
                    <a href="{{ route('books.index') }}" class="btn btn-light">Lihat Buku</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Kategori</h5>
                    <p class="card-text">Kelola daftar kategori buku.</p>
                    <a href="{{ route('categories.index') }}" class="btn btn-light">Lihat Kategori</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
