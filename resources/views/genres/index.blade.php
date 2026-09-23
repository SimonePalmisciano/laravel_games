@extends('layouts.app')

@section('title', 'Tutti i Generi')
    
@section('content')
    
            <div class="row g-4 row-cols-1 row-cols-md-3 row-cols-lg-4">
            @foreach ($genres as $genre)
                <div class="col">
                    <div class="card">
                        <div class="m-2 text-center card-head">
                            <h2>
                                {{ $genre->name }}
                            </h2>
                        </div>
                        
                        <div class="card-body">
                            <p>
                                {{ $genre->description }}
                            </p>
                            <a class="btn btn-outline-primary" href="{{ route('genres.show', $genre->id) }}">
                                Visualizza
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>


@endsection