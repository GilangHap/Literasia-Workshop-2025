<?php

namespace App\Filament\Resources\Borrows\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;

class BorrowsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('member.user.name')
                    ->label('Nama Peminjam')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('book.title')
                    ->label('Judul Buku')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('borrow_date')
                    ->label('Tanggal Pinjam')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('due_date')
                    ->label('Tanggal Jatuh Tempo')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('return_date')
                    ->label('Tanggal Kembali')
                    ->date('d M Y')
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('status')
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
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('return')
                    ->label('Kembalikan')
                    ->icon('heroicon-o-arrow-uturn-left')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Konfirmasi Pengembalian Buku')
                    ->modalDescription(fn ($record) => 
                        'Apakah Anda yakin ingin mengembalikan buku "' . $record->book->title . '" yang dipinjam oleh ' . $record->member->user->name . '?'
                    )
                    ->modalSubmitActionLabel('Ya, Kembalikan Buku')
                    ->modalCancelActionLabel('Batal')
                    ->action(function ($record) {
                        $record->update([
                            'return_date' => now(),
                            'status' => 'returned',
                        ]);

                        $record->book->increment('stock_available');

                        Notification::make()
                            ->title('Buku Berhasil Dikembalikan!')
                            ->body('Buku "' . $record->book->title . '" telah dikembalikan oleh ' . $record->member->user->name . '. Stok buku telah diperbarui.')
                            ->success()
                            ->send();
                    })
                    ->visible(fn ($record) => in_array($record->status, ['borrowed', 'overdue'])),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
