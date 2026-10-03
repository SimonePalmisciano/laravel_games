<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Videogame;
use App\Models\Genre;

class RawgVideogameSeeder extends Seeder
{
    public function run(): void
    {
        $apiKey = env('RAWG_API_KEY');

        // chiamata per la lista di videogiochi
        $response = Http::get("https://api.rawg.io/api/games", [
            'key' => $apiKey,
            'page_size' => 20,
        ])->throw();

        $games = $response->json('results', []);

        foreach ($games as $gameData) {

            $slug = Str::slug($gameData['name']);
            // Gestione dei generi restituiti da RAWG (viene restituito un array)
            $genreId = null;
            if (!empty($gameData['genres'])) {
                // Prendiamo il primo genere associato al gioco su RAWG
                $firstGenre = $gameData['genres'][0];
                $genreName = $firstGenre['name'];
                $genreSlug = Str::slug($genreName);

                // Cerchiamo il genere nel nostro DB o lo creiamo se non esiste
                $genre = Genre::firstOrCreate(
                    ['name' => $genreName],
                    ['slug' => $genreSlug]
                );
                $genreId = $genre->id;
            }

            // Chiamata di dettaglio per recuperare la descrizione completa.
            $detailResponse = Http::get("https://api.rawg.io/api/games/{$gameData['id']}", [
                'key' => $apiKey,
            ])->throw();

            $description = $detailResponse->json('description_raw')
                ?: strip_tags($detailResponse->json('description', ''));
            $description = trim(html_entity_decode($description, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            $description = $description !== '' ? $description : 'Nessuna descrizione disponibile.';

            $developer = 'Sconosciuto';

            // Salvataggio o aggiornamento del videogioco per evitare duplicati
            Videogame::updateOrCreate(
                ['slug' => $slug], // Usiamo lo slug come chiave di ricerca per evitare doppioni
                [
                    'genre_id' => $genreId,
                    'slug' => $slug,
                    'title' => $gameData['name'],
                    'description' => substr($description, 0, 65535),
                    'cover_image' => $gameData['background_image'] ?? null,
                    'price' => rand(19, 69) + 0.99, // Genera un prezzo casuale (es. 19.99, 59.99)
                    'release_date' => $gameData['released'] ?? null,
                    'developer' => $developer,
                ]
            );
        }
    }
}
