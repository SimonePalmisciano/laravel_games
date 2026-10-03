@extends('layouts.app')

@section('title', $game->title)

@section('content')

    <div class="container">
        <x-game-card :game="$game" :genre='$genres' :detail=true></x-game-card>
    </div>
    <div class="d-flex gap-2">
        <a class="btn btn-outline-secondary" href="{{ route('admin.videogames.edit', $game) }}">
            Modifica
        </a>
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#eliminationModal">
            Elimina
        </button>
    </div>

    {{-- 
        MODALE CHE GESTISCE L'ELIMINAZIONE
    --}}

    <div class="modal fade" id="eliminationModal" tabindex="-1" aria-labelledby="eliminationModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminationModalTitle">Elimare {{$game->title}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Elimina per sempre fino all'ultima molecola?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Annulla
                    </button>
                    <form action="{{ route('admin.videogames.destroy', $game) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-outline-danger" type="submit" value="Elimina">
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
