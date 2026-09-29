<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        return view('videogames.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();

        return view('videogames.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $newGame = new Videogame();

        $newGame->genre_id = $data['genre_id'];
        $newGame->slug = Str::slug($data['title']);
        $newGame->title = $data['title'];
        $newGame->description = $data['description'];
        if (array_key_exists('cover_image', $data)) {
            $url_img = Storage::putFile('videogames', $data['cover_image']);

            $newGame->cover_image = $url_img;
        }
        $newGame->price = $data['price'];
        $newGame->release_date = $data['release_date'];
        $newGame->developer = $data['developer'];

        $newGame->save();

        return redirect(route('videogames.show', $newGame));
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        $genres = Genre::all();

        return view('videogames.show', ['game' => $videogame], compact('genres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $videogame)
    {
        return view('videogames.edit', $videogame);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $videogame)
    {
        $data = $request->all();
        dd($data);

        $videogame = new Videogame();

        $videogame->genre_id = $data['genre'];
        $videogame->slug = Str::slug($data['title']);
        $videogame->title = $data['title'];
        $videogame->description = $data['description'];
        $videogame->cover_image = $data['cover_image'];
        $videogame->price = $data['price'];
        $videogame->release_date = $data['release_date'];
        $videogame->developer = $data['developer'];

        $videogame->update();

        return redirect(route('videogames.show', $videogame));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        $videogame->delete();

        return redirect(route('videogames.index'));
    }
}
