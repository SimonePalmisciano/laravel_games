@extends('layouts.app')

@section('title', 'Dashboard Amministratore')

@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5 d-flex justify-content-center">
            <div class="col-6">
                <div class="card p-3 text-center">
                    <h5>
                        Admin nome: {{ $user['name'] }}
                    </h5>

                    <p>
                        Admin email: {{ $user['email'] }}
                    </p>
                    <a class="btn btn-outline-primary" href="{{ url('profile') }}">
                        {{ __('Profilo') }}
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="content">
        <div class="container">

        </div>
    </div>
@endsection
