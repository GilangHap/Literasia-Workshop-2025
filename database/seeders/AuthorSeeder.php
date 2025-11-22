<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            ['name' => 'Andrea Hirata'],
            ['name' => 'Pramoedya Ananta Toer'],
            ['name' => 'Tere Liye'],
            ['name' => 'Dee Lestari'],
            ['name' => 'Eka Kurniawan'],
            ['name' => 'Raditya Dika'],
            ['name' => 'Fiersa Besari'],
            ['name' => 'J.K. Rowling'],
            ['name' => 'George Orwell'],
            ['name' => 'Harper Lee'],
            ['name' => 'F. Scott Fitzgerald'],
            ['name' => 'Jane Austen'],
            ['name' => 'Agatha Christie'],
            ['name' => 'Dan Brown'],
            ['name' => 'Paulo Coelho'],
            ['name' => 'Haruki Murakami'],
            ['name' => 'Stephen King'],
            ['name' => 'Gabriel García Márquez'],
            ['name' => 'Yuval Noah Harari'],
            ['name' => 'Malcolm Gladwell'],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
