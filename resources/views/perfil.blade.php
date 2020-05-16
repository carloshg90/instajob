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
            <h1 style="text-align: center"><b>Benvingut al teu perfil.</b></h1><br>
            <div class="card">
                <div class="card-header" style="text-align: center" ><h3>Informació del teu perfil</h3></div>
                <div class="card-body">
                    -Nom: {{ Auth::user()->name }}<br></br>
                    -Direcció de correu: {{ Auth::user()->email }}<br></br>
                    -Sector de treball: {{ Auth::user()->sector }}<br></br>
                    -Horari de treball: {{ Auth::user()->horari }}<br></br>
                    -Usuari registrat com: {{ Auth::user()->usuari }}<br></br>
                    -Zona de treball: {{ Auth::user()->zona }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
