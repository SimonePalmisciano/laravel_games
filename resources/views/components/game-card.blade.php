@props(['game', 'detail' => false, 'genre'])

{{-- @dd($game) --}}

@php
    $coverImageUrl = null;

    if (filled($game->cover_image)) {
        $coverImageUrl = preg_match('/^https?:\/\//i', $game->cover_image)
            ? $game->cover_image
            : asset('storage/' . $game->cover_image);
    }
@endphp

{{-- 
controllo che mi venga richiesta la card dettagliata dalla show 
oppure se mi viene chiamata dalla index gli fornisco la card "semplificata"  
--}}
@if ($detail)
    {{-- @dd($game) --}}

    <div class="">
        <div class="card-header d-flex justify-content-center">
            @if ($coverImageUrl)
                <img class="w-100" src="{{ $coverImageUrl }}" alt="">
            @endif
        </div>
        <div class="card-body">
            <div class="card-title">
                <h3>
                    {{ $game->title }}
                </h3>
                <p>
                    Genere: {{ $genre->find($game->genre)->name }}
                </p>
            </div>
            <p>
                {{ $game->description }}
            </p>
            <p>
                Casa Produttrice: {{$game->developer}}
            </p>
            <small>
                Data uscita: {{ $game->release_date->format('d/m/Y') }}
            </small>
            <p>
                Prezzo: {{ $game->price }} €
            </p>
        </div>
    </div>
@else
    <div class="" >
        <div class="card-header">
            @if ($coverImageUrl)
                <img class="w-100" src="{{ $coverImageUrl }}" alt="">
            @endif
        </div>
        <div class="card-body">
            <div class="card-title">
                <h3>
                    {{ $game->title }}
                </h3>
            </div>
        </div>
    </div>

@endif
