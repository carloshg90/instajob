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
                <div class="card-header" style="text-align: center" ><h1>Informació del teu perfil</h1></div>
                <div class="card-body">
                    <b>-Nom:</b> {{ Auth::user()->name }}<br>
                    <b>-Direcció de correu:</b> {{ Auth::user()->email }}<br>
                    <b>-Sector de treball:</b> {{ Auth::user()->sector }}<br>
                    <b>-Horari de treball:</b> {{ Auth::user()->horari }}<br>
                    <b>-Tipus d'usuari:</b> {{ Auth::user()->usuari }}<br>
                    <b>-Zona de treball:</b> {{ Auth::user()->zona }}<br>
                    <div class="divBotons">
                        <a class="btn btn-warning" href="{{ url('/editarPerfil') }}"><i class="fa fa-pencil" aria-hidden="true"></i> Editar perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
