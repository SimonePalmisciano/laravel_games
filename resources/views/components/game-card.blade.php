@props(['game'])

<div class="col">


    <div class="card">
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
                <small>
                    {{ $game->release_date }}
                </small>
            </div>
            <p>
                {{ $game->description }}
            </p>
            <p>
                {{ $game->price }}
            </p>
        </div>
    </div>
</div>
