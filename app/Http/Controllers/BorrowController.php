<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BorrowController extends Controller
{
    /**
     * Show the borrow form for a specific book
     */
    public function create($bookId)
    {
        // Get book with relationships
        $book = Book::with(['author', 'genre'])->findOrFail($bookId);
        
        // Get authenticated user's member data
        $user = auth()->user();
        $member = $user->member;
        
        // Check if user has member profile
        if (!$member) {
            return redirect()->route('book.detail', $bookId)
                ->with('error', 'Anda belum terdaftar sebagai anggota perpustakaan.');
        }
        
        // Check if user already has active borrow for this book
        $hasActiveBorrow = Borrow::where('member_id', $member->id)
            ->where('book_id', $book->id)
            ->where('status', 'borrowed')
            ->exists();
            
        if ($hasActiveBorrow) {
            return redirect()->route('book.detail', $bookId)
                ->with('error', 'Anda sedang meminjam buku ini. Harap kembalikan terlebih dahulu sebelum meminjam kembali.');
        }
        
        // Check if stock is available
        if ($book->stock_available <= 0) {
            return redirect()->route('book.detail', $bookId)
                ->with('error', 'Maaf, stok buku ini sedang habis.');
        }
        
        // Check if user has member profile
        if (!$member) {
            return redirect()->route('book.detail', $bookId)
                ->with('error', 'Anda belum terdaftar sebagai anggota perpustakaan.');
        }
        
        // Calculate dates
        $borrowDate = Carbon::now();
        $dueDate = Carbon::now()->addDays(7);
        
        return view('borrow.create', compact('book', 'user', 'member', 'borrowDate', 'dueDate'));
    }
    
    /**
     * Store the borrow record
     */
    public function store(Request $request, $bookId)
    {
        // Get book
        $book = Book::findOrFail($bookId);
        
        // Get member
        $member = auth()->user()->member;
        
        if (!$member) {
            return redirect()->route('book.detail', $bookId)
                ->with('error', 'Anda belum terdaftar sebagai anggota perpustakaan.');
        }
        
        // Check if user already has active borrow for this book
        $hasActiveBorrow = Borrow::where('member_id', $member->id)
            ->where('book_id', $book->id)
            ->where('status', 'borrowed')
            ->exists();
            
        if ($hasActiveBorrow) {
            return redirect()->route('book.detail', $bookId)
                ->with('error', 'Anda sedang meminjam buku ini. Harap kembalikan terlebih dahulu sebelum meminjam kembali.');
        }
        
        // Check stock availability
        if ($book->stock_available <= 0) {
            return redirect()->route('book.detail', $bookId)
                ->with('error', 'Maaf, stok buku ini sedang habis.');
        }
        
        // Use database transaction
        DB::beginTransaction();
        
        try {
            // Create borrow record
            Borrow::create([
                'member_id' => $member->id,
                'book_id' => $book->id,
                'borrow_date' => Carbon::now(),
                'due_date' => Carbon::now()->addDays(7),
                'status' => 'borrowed',
            ]);
            
            // Decrease stock
            $book->decrement('stock_available');
            
            DB::commit();
            
            return redirect()->route('book.detail', $bookId)
                ->with('success', 'Buku berhasil dipinjam! Jangan lupa dikembalikan sebelum tanggal jatuh tempo.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->route('book.detail', $bookId)
                ->with('error', 'Terjadi kesalahan saat meminjam buku. Silakan coba lagi.');
        }
    }
}
