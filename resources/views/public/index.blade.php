@extends('layouts.app')

@section('title', 'Perpustakaan Mini')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Buku Tersedia</h2>

    <div class="row">
        @forelse ($books as $book)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if ($book->cover_image)
                    <img src="{{ asset('covers/' . $book->cover_image) }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/300x250?text=No+Cover" class="card-img-top">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text text-muted">{{ $book->author }} - {{ $book->year }}</p>
                    <p class="card-text"><strong>Kategori:</strong> {{ $book->category->name ?? '-' }}</p>
                    <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">Belum ada buku yang tersedia.</div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>
</div>
@endsection
