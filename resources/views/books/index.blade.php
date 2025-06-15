@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1 class="mb-4 fw-bold">Daftar Buku</h1>
    <a href="{{ route('books.create') }}" class="btn btn-custom mb-4">Tambah Buku</a>

    <div class="row">
        @foreach($books as $book)
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm p-3">
                <div class="row g-3">
                    <!-- Cover -->
                    <div class="col-4">
                        @if ($book->cover)
                            <img src="{{ asset('covers/' . $book->cover) }}" class="img-fluid rounded" alt="Cover Buku">
                        @else
                            <img src="https://via.placeholder.com/200x300?text=No+Cover" class="img-fluid rounded" alt="No Cover">
                        @endif
                    </div>

                    <!-- Detail -->
                    <div class="col-8">
                        <h5 class="fw-bold">{{ $book->title }}</h5>
                        <p class="mb-1">{{ Str::limit($book->description, 120) }}</p>
                        <p class="mb-1"><strong>Penulis:</strong> {{ $book->author }}</p>
                        <p class="mb-1"><strong>Kategori:</strong> {{ $book->category->name ?? '-' }}</p>
                        <p class="mb-2"><strong>Tahun:</strong> {{ $book->year }}</p>

                        <div class="d-flex gap-2">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-success btn-sm">Lihat</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
