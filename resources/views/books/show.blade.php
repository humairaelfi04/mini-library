@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->title }}</h1>
    <p><strong>Penulis:</strong> {{ $book->author }}</p>
    <p><strong>Penerbit:</strong> {{ $book->publisher }}</p>
    <p><strong>Tahun:</strong> {{ $book->year }}</p>
    
    <p><strong>Kategori:</strong> {{ $book->category->name ?? '-' }}</p>
    <p><strong>Deskripsi:</strong> {{ $book->description }}</p>
    @if($book->cover_image)
        <p><strong>Cover:</strong><br>
            <img src="{{ asset('covers/' . $book->cover_image) }}" alt="Cover" width="150">
        </p>
    @endif
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
