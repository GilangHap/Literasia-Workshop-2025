<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Author;
use App\Models\Genre;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author_id',
        'genre_id',
        'isbn',
        'year',
        'description',
        'cover',
        'stock_total',
        'stock_available',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
