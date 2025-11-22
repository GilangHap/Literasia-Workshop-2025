<?php

namespace App\Filament\Widgets;

use App\Models\Borrow;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class BorrowsChart extends ChartWidget
{
    protected ?string $heading = 'Trend Peminjaman Buku (6 Bulan Terakhir)';
    
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = $this->getBorrowsPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Peminjaman',
                    'data' => $data['borrowsPerMonth'],
                    'borderColor' => 'rgb(59, 130, 246)',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => true,
                ],
                [
                    'label' => 'Pengembalian',
                    'data' => $data['returnsPerMonth'],
                    'borderColor' => 'rgb(34, 197, 94)',
                    'backgroundColor' => 'rgba(34, 197, 94, 0.1)',
                    'fill' => true,
                ],
            ],
            'labels' => $data['months'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    private function getBorrowsPerMonth(): array
    {
        $months = [];
        $borrowsPerMonth = [];
        $returnsPerMonth = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $months[] = $date->format('M Y');
            
            $borrowsPerMonth[] = Borrow::whereYear('borrow_date', $date->year)
                ->whereMonth('borrow_date', $date->month)
                ->count();
            
            $returnsPerMonth[] = Borrow::whereYear('return_date', $date->year)
                ->whereMonth('return_date', $date->month)
                ->whereNotNull('return_date')
                ->count();
        }

        return [
            'months' => $months,
            'borrowsPerMonth' => $borrowsPerMonth,
            'returnsPerMonth' => $returnsPerMonth,
        ];
    }
}
