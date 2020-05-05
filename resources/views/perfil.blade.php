@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informació del perfil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Hola {{ Auth::user()->name }}</h1>
                    Nom: {{ Auth::user()->name }}<br></br>
                    Email: {{ Auth::user()->email }}<br></br>
                    Sector: {{ Auth::user()->sector }}<br></br>
                    Horari: {{ Auth::user()->horari }}<br></br>
                    Tipus d'usuari: {{ Auth::user()->usuari }}<br></br>
                    Zona: {{ Auth::user()->zona }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
