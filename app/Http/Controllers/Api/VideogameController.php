<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Videogame;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $videogames = Videogame::query() // query builder di Eloquent ci permette 
            //di accumulare condizioni prima di comunicare con il DB
            ->with('genre') // ->with() dice a laravel di caricare in un'unica query anche i dati della tabella genres

            //$request->filled('title') verifica due condizioni contemporaneamente
            // parametro title esista e che non sia vuoto, se la condizione è falsa salta tutto il blocco
            ->when($request->filled('title'), function ($query) use ($request) { // use ($request) permette di richimare la variabile all'interno dello scope della funzione
                $query->where('title', 'LIKE', '%' . $request->title . '%');
            })
            ->where($request->filled('genre_id'), function ($query) use ($request) {
                $query->where('genre_id', $request->genre_id);
            })
            ->where($request->filled('release_date'), function ($query) use ($request) {
                $query->where('release_date', 'LIKE', '%' . $request->release_date . '%');
            })
            ->get();

        return response()->json([
            'success' => true,
            'response' => $videogames
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        // carichiamo il singolo gioco con il suo genere
        $videogame->load('genre');

        // dd($videogame);

        return response()->json([
            'success' => true,
            'response' => $videogame
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
