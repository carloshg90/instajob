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
                    <h1>Hola {{ $perfil->name }}</h1>
                    Nom: {{ $perfil->name }}<br></br>
                    Email: {{ $perfil->email }}<br></br>
                    Sector: {{ $perfil->sector }}<br></br>
                    Horari: {{ $perfil->horari }}<br></br>
                    Tipus d'usuari: {{ $perfil->usuari }}<br></br>
                    Zona: {{ $perfil->zona }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
