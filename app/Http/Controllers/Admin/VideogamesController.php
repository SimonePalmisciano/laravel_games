<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideogamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Videogame::all();

        return view('videogames.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::all();

        return view('videogames.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);

        $newGame = new Videogame();

        $newGame->genre_id = $data['genre'];
        $newGame->slug = Str::slug($data['name']);
        $newGame->title = $data['title'];
        $newGame->description = $data['description'];
        $newGame->cover_image = $data['cover_image'];
        $newGame->price = $data['price'];
        $newGame->release_date = $data['release_date'];
        $newGame->developer = $data['developer'];

        $newGame->save();

        return redirect(route('videogames.show', $newGame));
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $game)
    {
        return view('videogames.show', $game);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $game)
    {
        return view('videogames.edit', $game);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $game)
    {
        $data = $request->all();
        dd($data);

        $game = new Videogame();

        $game->genre_id = $data['genre'];
        $game->slug = Str::slug($data['name']);
        $game->title = $data['title'];
        $game->description = $data['description'];
        $game->cover_image = $data['cover_image'];
        $game->price = $data['price'];
        $game->release_date = $data['release_date'];
        $game->developer = $data['developer'];

        $game->update();

        return redirect(route('videogames.show', $game));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $game)
    {
        $game->delete();

        return redirect(route('videogames.index'));
    }
}
