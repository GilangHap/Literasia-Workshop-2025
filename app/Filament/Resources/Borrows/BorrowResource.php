<?php

namespace App\Filament\Resources\Borrows;

use App\Filament\Resources\Borrows\Pages\CreateBorrow;
use App\Filament\Resources\Borrows\Pages\EditBorrow;
use App\Filament\Resources\Borrows\Pages\ListBorrows;
use App\Filament\Resources\Borrows\Schemas\BorrowForm;
use App\Filament\Resources\Borrows\Tables\BorrowsTable;
use App\Models\Borrow;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BorrowResource extends Resource
{
    protected static ?string $model = Borrow::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-arrow-path-rounded-square';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $navigationLabel = 'Peminjaman';

    protected static ?string $modelLabel = 'Peminjaman';

    protected static ?string $pluralModelLabel = 'Peminjaman';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return BorrowForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BorrowsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBorrows::route('/'),
            'create' => CreateBorrow::route('/create'),
            'edit' => EditBorrow::route('/{record}/edit'),
        ];
    }
}
