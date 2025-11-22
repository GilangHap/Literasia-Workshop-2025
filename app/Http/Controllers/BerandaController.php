<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

class BerandaController extends Controller
{
    public function index()
    {
        // Get 8 latest books
        $latestBooks = Book::with(['author', 'genre'])
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        // Get 8 most popular books (most borrowed)
        $popularBooks = Book::with(['author', 'genre'])
            ->withCount('borrows')
            ->orderBy('borrows_count', 'desc')
            ->take(8)
            ->get();

        // Get all genres
        $genres = Genre::orderBy('name')->get();

        // Get member data if logged in
        $member = auth()->check() ? auth()->user()->member : null;

        return view('beranda', compact('latestBooks', 'popularBooks', 'genres', 'member'));
    }
}
