@extends('layouts.app')

@section('title', 'Genere: ' . $genre->name)

@section('content')

    <div class="my-2 text-end">
        <a class="btn btn-outline-primary" href="{{ route('genres.index') }}">
            Torna indietro
        </a>
    </div>

    <div class="container my-5">
        <div class="row">

            <div class="card">
                <div class="m-2 card-head">
                    <h2>
                        {{ $genre->name }}
                    </h2>
                    <p>
                        {{ $genre->description }}
                    </p>
                </div>
                <div class="d-flex gap-2 py-3">
                    <a class="btn btn-outline-secondary" href="{{ route('genres.edit', $genre) }}">
                        Modifica
                    </a>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#eliminationModal">
                        Elimina
                    </button>
                </div>
        </div>

        <div class="modal fade" id="eliminationModal" tabindex="-1" aria-labelledby="modalLable" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalLable">Vuoi Eliminare il Genere?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Eliminare per sempre?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Annulla
                        </button>
                        <form action="{{ route('genres.destroy', $genre) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-outline-danger" type="submit" value="Elimina">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
