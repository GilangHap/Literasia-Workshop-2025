<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use Carbon\Carbon;

class MemberBorrowController extends Controller
{
    /**
     * Display member's borrowing history and active borrows
     */
    public function index()
    {
        // Get authenticated user's member data
        $user = auth()->user();
        $member = $user->member;
        
        // Check if user has member profile
        if (!$member) {
            return redirect()->route('beranda')
                ->with('error', 'Anda belum terdaftar sebagai anggota perpustakaan.');
        }
        
        // Get all borrows for this member
        $borrows = Borrow::with(['book.author', 'book.genre'])
            ->where('member_id', $member->id)
            ->orderBy('borrow_date', 'desc')
            ->get();
        
        // Update overdue status automatically
        foreach ($borrows as $borrow) {
            if (Carbon::now()->gt($borrow->due_date) && $borrow->status === 'borrowed') {
                $borrow->status = 'overdue';
                $borrow->save();
            }
        }
        
        // Refresh data after status update
        $borrows = Borrow::with(['book.author', 'book.genre'])
            ->where('member_id', $member->id)
            ->orderBy('borrow_date', 'desc')
            ->get();
        
        // Split by status
        $active = $borrows->where('status', 'borrowed');
        $overdue = $borrows->where('status', 'overdue');
        $returned = $borrows->where('status', 'returned');
        
        // Calculate statistics
        $stats = [
            'borrowed' => $active->count(),
            'returned' => $returned->count(),
            'overdue' => $overdue->count(),
            'total' => $borrows->count(),
        ];
        
        return view('member.peminjaman-saya', compact('stats', 'active', 'overdue', 'returned'));
    }
}
