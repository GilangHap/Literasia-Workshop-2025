<?php

namespace App\Filament\Resources\Books\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BooksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover')
                    ->label('Cover')
                    ->square()
                    ->defaultImageUrl(url('/img/cover_buku.png'))
                    ->getStateUsing(function ($record) {
                        return $record->cover ? asset('storage/' . $record->cover) : null;
                    })
                    ->size(60),
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->weight('bold'),
                TextColumn::make('author.name')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('genre.name')
                    ->label('Genre')
                    ->searchable()
                    ->badge()
                    ->color('info'),
                TextColumn::make('isbn')
                    ->label('ISBN')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable()
                    ->alignCenter(),
                TextColumn::make('stock_total')
                    ->label('Total Stok')
                    ->numeric()
                    ->sortable()
                    ->alignCenter()
                    ->suffix(' buku'),
                TextColumn::make('stock_available')
                    ->label('Tersedia')
                    ->numeric()
                    ->sortable()
                    ->alignCenter()
                    ->badge()
                    ->color(fn (int $state): string => match (true) {
                        $state === 0 => 'danger',
                        $state < 5 => 'warning',
                        default => 'success',
                    })
                    ->suffix(' buku'),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('author_id')
                    ->label('Penulis')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('genre_id')
                    ->label('Genre')
                    ->relationship('genre', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('availability')
                    ->label('Ketersediaan')
                    ->options([
                        'available' => 'Tersedia',
                        'low_stock' => 'Stok Menipis',
                        'out_of_stock' => 'Habis',
                    ])
                    ->query(function ($query, $state) {
                        return match ($state['value'] ?? null) {
                            'available' => $query->where('stock_available', '>=', 5),
                            'low_stock' => $query->whereBetween('stock_available', [1, 4]),
                            'out_of_stock' => $query->where('stock_available', 0),
                            default => $query,
                        };
                    }),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
