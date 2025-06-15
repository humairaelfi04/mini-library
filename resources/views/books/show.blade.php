@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card p-4">
        <div class="row">
            {{-- Cover Image --}}
            <div class="col-md-4 text-center">
                @if($book->cover)
                    <img src="{{ asset('covers/' . $book->cover) }}" alt="Cover" class="img-fluid" style="max-height: 350px;">
                @else
                    <img src="https://via.placeholder.com/150x220?text=No+Image" alt="No cover" class="img-fluid">
                @endif
            </div>

            {{-- Book Details --}}
            <div class="col-md-8">
                <h3>{{ $book->title }}</h3>
                <p>{{ $book->description }}</p>
                <p><strong>Penulis:</strong> {{ $book->author }}</p>
                <p><strong>Publisher:</strong> {{ $book->publisher }}</p>
                <p><strong>Kategori:</strong> {{ $book->category->name ?? '-' }}</p>
                <p><strong>Tahun:</strong> {{ $book->year }}</p>

                <a href="{{ route('books.index') }}" class="btn btn-success mt-3">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
