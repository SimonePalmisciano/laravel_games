<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Videogame;
use Illuminate\Http\Request;

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

        $newGame = new Videogame();

        $newGame->genre_id = $data['genre'];
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $game)
    {
        //
    }
}
