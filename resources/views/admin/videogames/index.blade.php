@extends('layouts.app')

@section('title', 'Tutti i Videogiochi')

@section('content')

    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-3">
        @foreach ($games as $game)
            <div class="col">
                <div class="card-game">
                    <a href="{{ route('admin.videogames.show', $game) }}">
                        <x-game-card :game="$game" :detail=false></x-game-card>
                    </a>

                </div>
            </div>
        @endforeach
    </div>

@endsection
