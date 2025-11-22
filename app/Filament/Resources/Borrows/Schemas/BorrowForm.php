<?php

namespace App\Filament\Resources\Borrows\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BorrowForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('member_id')
                    ->relationship('member', 'id')
                    ->required(),
                Select::make('book_id')
                    ->relationship('book', 'title')
                    ->required(),
                DatePicker::make('borrow_date')
                    ->required(),
                DatePicker::make('due_date')
                    ->required(),
                DatePicker::make('return_date'),
                TextInput::make('status')
                    ->required()
                    ->default('borrowed'),
            ]);
    }
}
