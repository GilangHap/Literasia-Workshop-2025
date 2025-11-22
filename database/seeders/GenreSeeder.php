<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['name' => 'Fiksi'],
            ['name' => 'Non-Fiksi'],
            ['name' => 'Novel'],
            ['name' => 'Roman'],
            ['name' => 'Fantasi'],
            ['name' => 'Misteri'],
            ['name' => 'Thriller'],
            ['name' => 'Biografi'],
            ['name' => 'Sejarah'],
            ['name' => 'Sains'],
            ['name' => 'Teknologi'],
            ['name' => 'Pengembangan Diri'],
            ['name' => 'Bisnis'],
            ['name' => 'Psikologi'],
            ['name' => 'Filsafat'],
            ['name' => 'Sastra Indonesia'],
            ['name' => 'Komik'],
            ['name' => 'Puisi'],
            ['name' => 'Drama'],
            ['name' => 'Ensiklopedia'],
        ];

        foreach ($genres as $genre) {
            \App\Models\Genre::create($genre);
        }
    }
}
