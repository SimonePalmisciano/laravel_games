@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5 d-flex justify-content-center flex-wrap">
            <div class="col-12">
                <div class="card p-3 text-center">
                    <h5>
                        Admin nome:
                        @if ($user !== null)
                            {{ $user['name'] }}
                        @endif
                    </h5>

                    <p>
                        Admin email:
                        @if ($user !== null)
                            {{ $user['email'] }}
                        @endif
                    </p>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-outline-primary w-25" href="{{ url('profile') }}">
                            @if ($user)
                                Profilo
                            @else
                                Login
                            @endif
                        </a>
                    </div>
                </div>
            </div>

            <div class="py-5 d-flex flex-column gap-2 text-center">
                <em>
                    per gestire tutte le risorse presenti vai alla Dashboard Amministratore <br>
                    qui troverai le risorse con la possibilità di modificarle
                </em>
                <a class="btn btn-outline-warning" href="{{ route('dashboard') }}">
                    Dashboard Amministratore
                </a>
            </div>

        </div>
    </div>

@endsection
