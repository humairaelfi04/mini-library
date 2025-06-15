@extends('layouts.app')

@section('title', 'Perpustakaan Mini')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center fw-bold">📚 Daftar Buku Tersedia</h2>

    <div class="row">
        @forelse ($books as $book)
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-0 p-3">
                <div class="row g-3">
                    <!-- Kolom Gambar -->
                    <div class="col-4">
                        @if ($book->cover)
                            <img src="{{ asset('covers/' . $book->cover) }}" class="img-fluid rounded" alt="Cover Buku">
                        @else
                            <img src="https://via.placeholder.com/200x300?text=No+Cover" class="img-fluid rounded" alt="No Cover">
                        @endif
                    </div>

                    <!-- Kolom Informasi Buku -->
                    <div class="col-8 d-flex flex-column">
                        <h5 class="fw-bold mb-1">{{ $book->title }}</h5>
                        <p class="text-muted mb-1">{{ $book->author }} &middot; {{ $book->year }}</p>
                        <p class="mb-1">
                            <span class="badge bg-secondary">{{ $book->category->name ?? 'Tanpa Kategori' }}</span>
                        </p>
                        <p class="text-truncate" title="{{ $book->description }}">
                            {{ Str::limit($book->description, 120) }}
                        </p>

                        <div class="mt-auto">
                            <a href="{{ route('public.show', $book->id) }}" class="btn btn-custom btn-sm w-100 mt-2">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">Belum ada buku yang tersedia.</div>
        </div>
        @endforelse
    </div>

    @if ($books->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $books->links() }}
    </div>
    @endif
</div>
@endsection
