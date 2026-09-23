@extends('layouts.app')

@section('title', 'Modifica il Genere: ' . $genre->name)

@section('content')

    <div class="my-2 text-end">
        <a class="btn btn-outline-primary" href="{{ route('genres.show', $genre) }}">
            Torna indietro
        </a>
    </div>
    <div class="d-flex justify-content-center">
        <div class="w-50 border rounded p-3">
            <form action="{{ route('genres.update', $genre) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-control mb-3 d-flex flex-column">
                    <label class="form-label" for="name">Nome Genere</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$genre->name}}" required>
                </div>

                <div class="form-control mb-3 d-flex flex-column">
                    <label class="form-label" for="description">Descrizione Genere</label>
                    <textarea class="form-control" name="description" id="description">{{$genre->description}}</textarea>
                </div>

                <input class="btn btn-outline-primary" type="submit" value="Salva Genere">
            </form>
        </div>
    </div>

@endsection
