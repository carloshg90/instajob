@extends('layouts.app')

@section('content')
<link href="{{ asset('css/ofertesTreballador.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
    <div class="card">
        <div style="text-align: center" class="card-header"><h1><b>Perfil de l'usuari {{ $perfil->name }}</b></h1></div>
            <div class="card-body">
                <b>-Nom:</b> {{ $perfil->name }}<br>
                <b>-Adreça de correu:</b> {{ $perfil->email }}<br>
                <b>-Sector de treball:</b> {{ $perfil->sector }}<br>
                <b>-Horari de treball:</b> {{ $perfil->horari }}<br>
                <b>-Usuari registrat com:</b> {{ $perfil->usuari }}<br>
                <b>-Zona de treball:</b> {{ $perfil->zona }}
            </div>
            <div class="divBotons">
            <a class="btn btn-success" href="/formulariContacte/{{$perfil->id}}">Contactar <i class="fa fa-envelope" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
