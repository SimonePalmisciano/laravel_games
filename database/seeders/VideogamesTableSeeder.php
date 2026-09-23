<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Videogame;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class VideogamesTableSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $genres = Genre::all();

        for ($i = 0; $i < 10; $i++) {
            $title = $faker->unique()->words(3, true);

            $videogame = new Videogame();
            $videogame->genre_id = $genres->random()->id;
            $videogame->slug = Str::slug($title) . '-' . $faker->unique()->numberBetween(1, 9999);
            $videogame->title = ucfirst($title);
            $videogame->description = $faker->paragraph(3);
            $videogame->cover_image = 'https://placehold.co/600x800?text=';
            $videogame->price = $faker->randomFloat(2, 19, 79);
            $videogame->release_date = $faker->date();
            $videogame->developer = $faker->company();
            $videogame->save();
        }
    }
}
