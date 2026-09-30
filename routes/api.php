<?php

use App\Http\Controllers\Api\VideogameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/videogames', [VideogameController::class, 'index']);
Route::get('/videogames/{videogame}', [VideogameController::class, 'show']);