<?php

use App\Http\Controllers\Admin\VideogamesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/videogames', [VideogamesController::class, 'index']);
Route::get('/videogames/{videogames}', [VideogamesController::class, 'show']);