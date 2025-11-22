<?php

namespace App\Filament\Widgets;

use App\Models\Borrow;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestBorrows extends TableWidget
{
    protected static ?int $sort = 4;
    
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Aktivitas Peminjaman Terkini')
            ->description('10 Transaksi peminjaman dan pengembalian terbaru')
            ->query(
                Borrow::query()
                    ->with(['member.user', 'book.author'])
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                TextColumn::make('member.user.name')
                    ->label('Peminjam')
                    ->searchable()
                    ->icon('heroicon-m-user'),
                TextColumn::make('member.nim')
                    ->label('NIM')
                    ->searchable(),
                TextColumn::make('book.title')
                    ->label('Buku')
                    ->searchable()
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->book->title),
                TextColumn::make('book.author.name')
                    ->label('Penulis')
                    ->searchable(),
                TextColumn::make('borrow_date')
                    ->label('Tgl. Pinjam')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('due_date')
                    ->label('Jatuh Tempo')
                    ->date('d M Y')
                    ->color(fn ($record) => $record->status === 'overdue' ? 'danger' : 'gray'),
                TextColumn::make('return_date')
                    ->label('Tgl. Kembali')
                    ->date('d M Y')
                    ->placeholder('-')
                    ->color('success'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'borrowed' => 'warning',
                        'returned' => 'success',
                        'overdue' => 'danger',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'borrowed' => 'Dipinjam',
                        'returned' => 'Dikembalikan',
                        'overdue' => 'Terlambat',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'borrowed' => 'heroicon-m-arrow-right-circle',
                        'returned' => 'heroicon-m-check-circle',
                        'overdue' => 'heroicon-m-exclamation-circle',
                    }),
            ])
            ->paginated(false);
    }
}
