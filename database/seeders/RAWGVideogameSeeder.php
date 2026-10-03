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
        ]);

        if ($response->successful()) {
            $games = $response->json()['results'];

            foreach ($games as $gameData) {

                $slug = Str::slug($gameData['name']);
                // Gestione dei generi restituiti da RAWG (viene restituito un array)
                $genreId = null;
                if (!empty($gameData['genres'])) {
                    // Prendiamo il primo genere associato al gioco su RAWG
                    $firstGenre = $gameData['genres'][0];
                    $genreName = $firstGenre['name'];

                    // Cerchiamo il genere nel nostro DB o lo creiamo se non esiste
                    $genre = Genre::firstOrCreate(['name' => $genreName]);
                    $genreId = $genre->id;
                }

                // chiamata di dettaglio per recuperare la descrizione completa
                $detailResponse = Http::get("https://api.rawg.io/api/games/{$gameData['id']}", [
                    'key' => $apiKey,
                ]);

                $description = 'Nessuna descrizione disponibile.';
                $developer = 'Sconosciuto';

                // Salvataggio o aggiornamento del videogioco per evitare duplicati
                Videogame::updateOrCreate(
                    ['slug' => $slug], // Usiamo lo slug come chiave di ricerca per evitare doppioni
                    [
                        'genre_id' => $genreId,
                        'slug' => $slug,
                        'title' => $gameData['name'],
                        'description' => substr($description, 0, 65535), // Tagliamo se troppo lungo per un campo text
                        'cover_image' => $gameData['background_image'] ?? null,
                        'price' => rand(19, 69) + 0.99, // Genera un prezzo casuale (es. 19.99, 59.99)
                        'release_date' => $gameData['released'] ?? null,
                        'developer' => $developer,
                    ]
                );
            }
        }
    }
}
