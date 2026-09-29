<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    public function genre() {
        return $this->belongsTo(Genre::class);
    }


    // trasforma automaticamente un dato nel momento in cui passa dal
    // DB al codice PHP e viceversa
    protected function casts(): array
    {
        return [
            'release_date' => 'date', // in automatico viene detto a Laravel di trasformarlo in un oggetto data (classe Carbon)
            // ex: $game->release_date = Carbon::parse("2026-09-29");
        ];
    }
}
