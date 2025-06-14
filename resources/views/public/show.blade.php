<!-- resources/views/public/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detail Buku</title>
</head>
<body>
    <h1>{{ $book->title }}</h1>
    <p><strong>Penulis:</strong> {{ $book->author }}</p>
    <p><strong>Tahun:</strong> {{ $book->year }}</p>
    <p><strong>Kategori:</strong> {{ $book->category->name }}</p>
    <a href="{{ route('public.index') }}">← Kembali ke daftar buku</a>
</body>
</html>
