@extends('layouts.app')

@section('title', 'Dashboard Amministratore')

@section('content')
    <div class="container text-black">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Ben tornato: <strong>{{ $user->name }}</strong>
                        </h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>
                            qui puoi gestire tutte le tue risorse
                        </p>
                        <a class="btn btn-outline-primary" href="{{ route('admin.genres.index') }}">
                            Visualizza tutti i Generi
                        </a>
                        <a class="btn btn-outline-primary" href="{{ route('admin.videogames.index') }}">
                            Visualizza tutti i Videogiochi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
