@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Buku</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}">
        </div>
        <div class="mb-3">
            <label for="publisher" class="form-label">Penerbit</label>
            <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}">
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="text" name="year" class="form-control" value="{{ $book->year }}">
        </div>
        
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control">{{ $book->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover (biarkan kosong jika tidak diubah)</label>
            <input type="file" name="cover_image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
