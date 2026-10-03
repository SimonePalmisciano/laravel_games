<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideogameRequest;
use App\Http\Requests\UpdateVideogameRequest;
use App\Models\Genre;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideogamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Videogame::all();

        return view('admin.videogames.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();

        return view('admin.videogames.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideogameRequest $request)
    {
        $data = $request->validated();
        // dd($data);

        $newGame = new Videogame();

        $newGame->genre_id = $data['genre_id'];

        // Prende una stringa di testo qualsiasi e la trasforma
        // Converte tutte le lettere in minuscolo. Sostituisce tutti gli spazi bianchi con un trattino (-).
        // Rimuove i caratteri speciali, i simboli e le lettere accentate (ad esempio à diventa a).
        $newGame->slug = Str::slug($data['title']);
        $newGame->title = $data['title'];
        $newGame->description = $data['description'];

        // controllo che l'utente sta inviando l'immagine
        if (array_key_exists('cover_image', $data)) {

            // carico la nuova immagine
            $url_img = Storage::putFile('videogames', $data['cover_image']);

            // aggiorno il db con la nuova immagine
            $newGame->cover_image = $url_img;
        }
        $newGame->price = $data['price'];
        $newGame->release_date = $data['release_date'];
        $newGame->developer = $data['developer'];

        $newGame->save();

        return redirect(route('admin.videogames.show', $newGame))
            ->with('success', 'Videogioco creato con successo!');// serve a inviare un messaggio flash
            // i dati flash sono dati temporanei che rimangono vivi esattamente per una sola richiesta HTTP
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        $genres = Genre::all();

        return view('admin.videogames.show', ['game' => $videogame], compact('genres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $videogame)
    {
        $genres = Genre::all();

        return view('admin.videogames.edit', ['game' => $videogame], compact('genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideogameRequest $request, Videogame $videogame)
    {
        $data = $request->all();
        // dd($data);

        $videogame->genre_id = $data['genre'];
        $videogame->slug = Str::slug($data['title']);
        $videogame->title = $data['title'];
        $videogame->description = $data['description'];

        // controllo che l'utente sta inviando l'immagine
        if (array_key_exists('cover_image', $data)) {

            // elimino l'immagine che era presente 
            Storage::delete($videogame->cover_image);

            // carico la nuova immagine
            $url_img = Storage::putFile('videogames', $data['cover_image']);

            // aggiorno il db con la nuova immagine
            $videogame->cover_image = $url_img;
        }
        $videogame->price = $data['price'];
        $videogame->release_date = $data['release_date'];
        $videogame->developer = $data['developer'];

        $videogame->update();

        return redirect(route('admin.videogames.show', $videogame));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        Storage::delete($videogame->cover_image);

        $videogame->delete();

        return redirect(route('admin.videogames.index'));
    }
}
