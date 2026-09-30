@extends('layouts.app')

@section('title', 'Tutti i Videogiochi')

@section('content')

    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-3">
        @foreach ($games as $game)
            <div class="col">
                <div class="card">

                    <x-game-card :game="$game" :detail=false></x-game-card>

                    <div>
                        <a class="btn btn-outline-primary" href="{{ route('admin.videogames.show', $game) }}">
                            Visualizza
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
