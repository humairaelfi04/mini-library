@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm p-4">
        <div class="row">
            <!-- Cover Image -->
            <div class="col-md-3 text-center">
                @if($book->cover)
                    <img src="{{ asset('covers/' . $book->cover) }}" alt="Cover" class="img-fluid" style="max-height: 350px;">
                @else
                    <img src="https://via.placeholder.com/150x220?text=No+Image" alt="No cover" class="img-fluid">
                @endif
            </div>

            <!-- Book Detail -->
            <div class="col-md-9">
                <h2 class="mb-3">{{ $book->title }}</h2>
                <p class="text-muted">{{ $book->description }}</p>
                <p><strong>Publisher:</strong> {{ $book->publisher }}</p>
                <p><strong>Penulis:</strong> {{ $book->author }}</p>
                <p><strong>Kategori:</strong> {{ $book->category->name ?? '-' }}</p>
                <p><strong>Tahun:</strong> {{ $book->year }}</p>

                <a href="{{ route('public.index') }}" class="btn btn-custom mt-3">← Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
