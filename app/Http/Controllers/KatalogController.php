<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['author', 'genre']);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('author', function($q) use ($searchTerm) {
                      $q->where('name', 'like', '%' . $searchTerm . '%');
                  });
            });
        }

        // Genre filter
        if ($request->has('genre') && $request->genre) {
            $query->where('genre_id', $request->genre);
        }

        // Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'popular':
                    $query->withCount('borrows')->orderBy('borrows_count', 'desc');
                    break;
                case 'az':
                    $query->orderBy('title', 'asc');
                    break;
                case 'author':
                    $query->join('authors', 'books.author_id', '=', 'authors.id')
                          ->orderBy('authors.name', 'asc')
                          ->select('books.*');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $books = $query->paginate(12);
        $genres = Genre::orderBy('name')->get();

        return view('katalog', compact('books', 'genres'));
    }
}
