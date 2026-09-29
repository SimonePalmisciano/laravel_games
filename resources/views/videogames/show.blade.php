@extends('layouts.app')

@section('title', $game->title)

@section('content')

    <div class="">
        <x-game-card :game="$game" :genre='$genres' :detail=true></x-game-card>
    </div>

@endsection
