@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h1 style="text-align: center"><b>Perfil de l'usuari {{ $perfil->name }}</b></h1><br>
    <div class="card">
        <div style="text-align: center" class="card-header"><h3>Informació del perfil</h3></div>
            <div class="card-body">
                -Nom: {{ $perfil->name }}<br></br>
                -Direcció de correu: {{ $perfil->email }}<br></br>
                -Sector de treball: {{ $perfil->sector }}<br></br>
                -Horari de treball: {{ $perfil->horari }}<br></br>
                -Usuari registrat com: {{ $perfil->usuari }}<br></br>
                -Zona de treball: {{ $perfil->zona }}
            </div>
            <a class="btn btn-success" href="/formulariContacte/{{$perfil->id}}">Contactar</a>
        </div>
    </div>
</div>
@endsection
