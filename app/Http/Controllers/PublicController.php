<?php

namespace App\Http\Controllers;

use App\Models\Book;

class PublicController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->paginate(6);
        return view('public.index', compact('books'));
    }

     public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('public.book.show', compact('book'));
    }
}
