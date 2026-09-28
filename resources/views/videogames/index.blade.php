@extends('layouts.app')

@section('title', 'Tutti i Videogiochi')

@section('content')
    
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-3">
        @foreach ($games as $game)
            
        @endforeach
    </div>

@endsection