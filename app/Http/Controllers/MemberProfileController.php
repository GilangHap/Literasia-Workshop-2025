<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;

class MemberProfileController extends Controller
{
    /**
     * Display the member's profile page
     */
    public function index()
    {
        // Get authenticated user and member data
        $user = auth()->user();
        $member = $user->member;

        // Check if user has member profile
        if (!$member) {
            return redirect()->route('beranda')
                ->with('error', 'Anda belum terdaftar sebagai anggota perpustakaan.');
        }

        // Get recent borrows (last 5)
        $borrows = Borrow::with(['book.author', 'book.genre'])
            ->where('member_id', $member->id)
            ->orderBy('borrow_date', 'desc')
            ->take(5)
            ->get();

        // Calculate borrowing statistics
        $stats = [
            'borrowed' => Borrow::where('member_id', $member->id)->where('status', 'borrowed')->count(),
            'returned' => Borrow::where('member_id', $member->id)->where('status', 'returned')->count(),
            'overdue' => Borrow::where('member_id', $member->id)->where('status', 'overdue')->count(),
        ];

        return view('member.profile', compact('user', 'member', 'borrows', 'stats'));
    }
}