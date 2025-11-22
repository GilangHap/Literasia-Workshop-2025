<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Laskar Pelangi',
                'author_id' => 1,
                'genre_id' => 16,
                'isbn' => '9789793062792',
                'year' => 2005,
                'description' => 'Novel tentang perjuangan anak-anak di Belitung untuk mendapatkan pendidikan.',
                'stock_total' => 5,
                'stock_available' => 3,
            ],
            [
                'title' => 'Bumi Manusia',
                'author_id' => 2,
                'genre_id' => 16,
                'isbn' => '9789799731234',
                'year' => 1980,
                'description' => 'Novel sejarah tentang kehidupan pribumi di masa kolonial Belanda.',
                'stock_total' => 4,
                'stock_available' => 2,
            ],
            [
                'title' => 'Pulang',
                'author_id' => 3,
                'genre_id' => 3,
                'isbn' => '9786020822112',
                'year' => 2015,
                'description' => 'Kisah tentang pencarian jati diri dan makna pulang.',
                'stock_total' => 6,
                'stock_available' => 4,
            ],
            [
                'title' => 'Perahu Kertas',
                'author_id' => 4,
                'genre_id' => 4,
                'isbn' => '9786028519670',
                'year' => 2009,
                'description' => 'Roman tentang dua anak muda yang mengejar mimpi mereka.',
                'stock_total' => 5,
                'stock_available' => 5,
            ],
            [
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'author_id' => 8,
                'genre_id' => 5,
                'isbn' => '9780747532699',
                'year' => 1997,
                'description' => 'Petualangan Harry Potter di dunia sihir.',
                'stock_total' => 8,
                'stock_available' => 6,
            ],
            [
                'title' => '1984',
                'author_id' => 9,
                'genre_id' => 1,
                'isbn' => '9780451524935',
                'year' => 1949,
                'description' => 'Distopia tentang masyarakat totaliter.',
                'stock_total' => 4,
                'stock_available' => 3,
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author_id' => 10,
                'genre_id' => 1,
                'isbn' => '9780061120084',
                'year' => 1960,
                'description' => 'Novel klasik tentang rasisme dan keadilan.',
                'stock_total' => 3,
                'stock_available' => 2,
            ],
            [
                'title' => 'The Alchemist',
                'author_id' => 15,
                'genre_id' => 1,
                'isbn' => '9780062315007',
                'year' => 1988,
                'description' => 'Kisah inspiratif tentang mengejar impian.',
                'stock_total' => 7,
                'stock_available' => 5,
            ],
            [
                'title' => 'Sapiens',
                'author_id' => 19,
                'genre_id' => 9,
                'isbn' => '9780062316097',
                'year' => 2011,
                'description' => 'Sejarah singkat umat manusia.',
                'stock_total' => 5,
                'stock_available' => 3,
            ],
            [
                'title' => 'The Da Vinci Code',
                'author_id' => 14,
                'genre_id' => 6,
                'isbn' => '9780307474278',
                'year' => 2003,
                'description' => 'Thriller misteri tentang pencarian rahasia tersembunyi.',
                'stock_total' => 6,
                'stock_available' => 4,
            ],
        ];

        foreach ($books as $book) {
            \App\Models\Book::create($book);
        }
    }
}
