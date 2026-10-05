@extends('layouts.app')

@section('title', 'Crea un nuovo Genere')

@section('content')

    <div class="my-2 text-end">
        <a class="btn btn-info" href="{{ route('admin.videogames.index') }}">
            Torna indietro
        </a>
    </div>
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="d-flex justify-content-center">
        <div class="w-50 bg-white border rounded p-4">
            <form action="{{ route('admin.videogames.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-control mb-3 d-flex flex-column">
                    <label class="form-label" for="title">Nome VideoGioco</label>
                    <input class="form-control" type="text" name="title" id="name" required>
                </div>

                <div class="form-control mb-3 d-flex flex-column">
                    <label class="form-label" for="description">Descrizione VideoGioco</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>

                <div class="form-control mb-3 d-flex flex-column">
                    <label class="form-label" for="genre_id">Genere VideoGioco</label>
                    <select name="genre_id" id="genre_id" class="form-select">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-control mb-3 d-flex flex-column">
                    <label class="form-label" for="developer">Casa di Sviluppo</label>
                    <input class="form-control" type="text" name="developer" id="developer">
                </div>

                <div class="form-control mb-3 d-flex flex-column">
                    <label class="form-label" for="release_date">Data Uscita</label>
                    <input class="form-control" type="date" name="release_date" id="release_date">
                </div>

                <div class="form-control mb-3 d-flex flex-column">
                    <label class="form-label" for="price">Prezzo</label>
                    <input class="form-control" type="number" step="0.01" min="0" placeholder="0.00"
                        name="price" id="price">
                </div>

                <div class="form-control mb-3 d-flex flex-column">
                    <label class="form-label" for="cover_image">Immagine VideoGioco</label>
                    <input class="form-control" type="file" name="cover_image" id="cover_image">
                </div>

                <input class="btn btn-primary" type="submit" value="Salva VideoGioco">
            </form>
        </div>
    </div>

@endsection
