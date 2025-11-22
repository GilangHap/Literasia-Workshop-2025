<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrow;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalBooks = Book::count();
        $totalMembers = Member::count();
        $activeBorrows = Borrow::whereIn('status', ['borrowed', 'overdue'])->count();
        $overdueBooks = Borrow::where('status', 'overdue')->count();
        $returnedToday = Borrow::where('status', 'returned')
            ->whereDate('return_date', today())
            ->count();
        $borrowedThisMonth = Borrow::whereMonth('borrow_date', now()->month)
            ->whereYear('borrow_date', now()->year)
            ->count();

        // Trend calculation
        $lastMonthBorrows = Borrow::whereMonth('borrow_date', now()->subMonth()->month)
            ->whereYear('borrow_date', now()->subMonth()->year)
            ->count();
        $borrowTrend = $lastMonthBorrows > 0 
            ? round((($borrowedThisMonth - $lastMonthBorrows) / $lastMonthBorrows) * 100, 1)
            : 0;

        return [
            Stat::make('Total Buku', $totalBooks)
                ->description('Koleksi buku perpustakaan')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('success')
                ->chart([7, 12, 18, 25, 32, 38, $totalBooks]),
            
            Stat::make('Total Anggota', $totalMembers)
                ->description('Anggota terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info')
                ->chart([5, 10, 15, 20, 25, 30, $totalMembers]),
            
            Stat::make('Buku Dipinjam', $activeBorrows)
                ->description($overdueBooks > 0 ? "$overdueBooks buku terlambat" : 'Semua tepat waktu')
                ->descriptionIcon($overdueBooks > 0 ? 'heroicon-m-exclamation-triangle' : 'heroicon-m-check-circle')
                ->color($overdueBooks > 0 ? 'warning' : 'success'),
            
            Stat::make('Peminjaman Bulan Ini', $borrowedThisMonth)
                ->description($borrowTrend >= 0 ? "↑ {$borrowTrend}% dari bulan lalu" : "↓ " . abs($borrowTrend) . "% dari bulan lalu")
                ->descriptionIcon($borrowTrend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($borrowTrend >= 0 ? 'success' : 'danger')
                ->chart(array_map(fn($day) => Borrow::whereDate('borrow_date', now()->startOfMonth()->addDays($day))->count(), range(0, min(now()->day, 6)))),
            
            Stat::make('Dikembalikan Hari Ini', $returnedToday)
                ->description('Pengembalian hari ini')
                ->descriptionIcon('heroicon-m-arrow-uturn-left')
                ->color('info'),
        ];
    }
}
