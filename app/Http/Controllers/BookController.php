<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;

class BookController extends Controller
{
    public function show($id)
    {
        // Get book with relationships
        $book = Book::with(['author', 'genre', 'borrows'])->findOrFail($id);
        
        // Count total borrows
        $totalBorrowed = $book->borrows->count();
        
        // Check if authenticated user has active borrow for this book
        $hasActiveBorrow = false;
        if (auth()->check() && auth()->user()->member) {
            $hasActiveBorrow = Borrow::where('member_id', auth()->user()->member->id)
                ->where('book_id', $book->id)
                ->where('status', 'borrowed')
                ->exists();
        }
        
        // Get related books by same genre
        $relatedBooks = Book::with(['author', 'genre'])
            ->where('genre_id', $book->genre_id)
            ->where('id', '!=', $book->id)
            ->inRandomOrder()
            ->take(6)
            ->get();
        
        // Get books by same author
        $authorBooks = Book::with(['author', 'genre'])
            ->where('author_id', $book->author_id)
            ->where('id', '!=', $book->id)
            ->inRandomOrder()
            ->take(4)
            ->get();
        
        return view('book.detail', compact('book', 'totalBorrowed', 'relatedBooks', 'authorBooks', 'hasActiveBorrow'));
    }
}
