<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenresTableSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            'Action',
            'Adventure',
            'RPG',
            'Horror',
            'Racing',
            'Sports',
        ];

        foreach ($genres as $genreName) {
            $genre = new Genre();
            $genre->name = $genreName;
            $genre->slug = Str::slug($genreName);
            $genre->description = 'Genere ' . $genreName;
            $genre->save();
        }
    }
}
