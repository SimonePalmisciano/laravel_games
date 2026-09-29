@props(['game', 'detail' => false])

{{-- 
controllo che mi venga richiesta la card dettagliata dalla show 
oppure se mi viene chiamata dalla index gli fornisco la card "semplificata"  
--}}
@if ($detail)
    {{-- @dd($game) --}}

    <div class="">
        <div class="card-header d-flex justify-content-center">
            @if ($game->cover_image !== '')
                <img src="{{ $game->cover_image }}" alt="">
            @endif
        </div>
        <div class="card-body">
            <div class="card-title">
                <h3>
                    {{ $game->title }}
                </h3>
                <small>
                    Data uscita: {{ $game->release_date->format('d/m/Y') }}
                </small>
            </div>
            <p>
                {{ $game->description }}
            </p>
            <p>
                Prezzo: {{ $game->price }} €
            </p>
        </div>
    </div>
@else
    <div class="">
        <div class="card-header">
            @if ($game->cover_image !== '')
                <img src="{{ $game->cover_image }}" alt="">
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
