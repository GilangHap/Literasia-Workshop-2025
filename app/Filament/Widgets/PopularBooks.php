<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class PopularBooks extends TableWidget
{
    protected static ?int $sort = 3;
    
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Buku Paling Populer')
            ->description('10 Buku yang paling sering dipinjam')
            ->query(
                Book::query()
                    ->select('books.*', DB::raw('COUNT(borrows.id) as borrow_count'))
                    ->leftJoin('borrows', 'books.id', '=', 'borrows.book_id')
                    ->groupBy('books.id')
                    ->orderBy('borrow_count', 'desc')
                    ->limit(10)
            )
            ->columns([
                TextColumn::make('row_number')
                    ->label('#')
                    ->rowIndex(),
                ImageColumn::make('cover')
                    ->label('Cover')
                    ->circular()
                    ->defaultImageUrl(url('/img/no-cover.png'))
                    ->getStateUsing(function ($record) {
                        return $record->cover ? asset('storage/' . $record->cover) : null;
                    }),
                TextColumn::make('title')
                    ->label('Judul Buku')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('author.name')
                    ->label('Penulis')
                    ->searchable(),
                TextColumn::make('genre.name')
                    ->label('Genre')
                    ->badge()
                    ->color('info'),
                TextColumn::make('borrow_count')
                    ->label('Total Dipinjam')
                    ->badge()
                    ->color('success')
                    ->suffix(' kali'),
                TextColumn::make('stock_available')
                    ->label('Stok Tersedia')
                    ->badge()
                    ->color(fn ($record) => $record->stock_available > 0 ? 'success' : 'danger'),
            ])
            ->paginated(false);
    }
}
