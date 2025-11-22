<?php

namespace App\Filament\Resources\Books\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Buku')
                    ->description('Masukkan detail informasi buku')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul Buku')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(2),
                                Select::make('author_id')
                                    ->label('Penulis')
                                    ->relationship('author', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->label('Nama Penulis')
                                            ->required(),
                                    ]),
                                Select::make('genre_id')
                                    ->label('Genre')
                                    ->relationship('genre', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->label('Nama Genre')
                                            ->required(),
                                    ]),
                                TextInput::make('isbn')
                                    ->label('ISBN')
                                    ->maxLength(255),
                                TextInput::make('year')
                                    ->label('Tahun Terbit')
                                    ->numeric()
                                    ->minValue(1900)
                                    ->maxValue(date('Y')),
                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columns(1),

                Section::make('Cover Buku')
                    ->description('Upload cover buku (max 2MB)')
                    ->schema([
                        FileUpload::make('cover')
                            ->label('Cover')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '3:4',
                            ])
                            ->maxSize(2048)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Stok Buku')
                    ->description('Kelola stok ketersediaan buku')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('stock_total')
                                    ->label('Total Stok')
                                    ->required()
                                    ->numeric()
                                    ->default(0)
                                    ->minValue(0)
                                    ->suffix('buku'),
                                TextInput::make('stock_available')
                                    ->label('Stok Tersedia')
                                    ->required()
                                    ->numeric()
                                    ->default(0)
                                    ->minValue(0)
                                    ->suffix('buku')
                                    ->helperText('Stok yang dapat dipinjam'),
                            ]),
                    ])
                    ->columns(2),
            ]);
    }
}
