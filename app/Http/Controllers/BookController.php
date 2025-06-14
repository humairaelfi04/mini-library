<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'author' => 'required',
            'publisher' => 'nullable',
            'year' => 'required|digits:4',
            'isbn' => 'nullable',
            'description' => 'nullable',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $coverName = null;
        if ($request->hasFile('cover_image')) {
            $coverName = time() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('covers'), $coverName);
        }

        Book::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'cover_image' => $coverName
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'author' => 'required',
            'publisher' => 'nullable',
            'year' => 'required|digits:4',
            'isbn' => 'nullable',
            'description' => 'nullable',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $coverName = $book->cover_image;
        if ($request->hasFile('cover_image')) {
            if ($coverName && file_exists(public_path('covers/' . $coverName))) {
                unlink(public_path('covers/' . $coverName));
            }
            $coverName = time() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('covers'), $coverName);
        }

        $book->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'cover_image' => $coverName
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate!');
    }

    public function destroy(Book $book)
    {
        if ($book->cover_image && file_exists(public_path('covers/' . $book->cover_image))) {
            unlink(public_path('covers/' . $book->cover_image));
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}
