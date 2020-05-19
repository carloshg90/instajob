@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/css/homeTreballador.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="row titol justify-content-center"><h1><u>InstaJob</u></h1></div>
        <div class="row  justify-content-center">
            <div class="col-6 imatge">
                <img src="/recursos/treballador.jpg" alt="Moustiers Sainte Marie">
            </div>
            <div class="col-6 venbinguda">
                <h3>Benvingut al teu espai personal com a treballador!</h3>
            </div>
        </div>
        <div class="row opcions justify-content-center col-12">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ url('/ofertesSectorZona') }}" class="btn btn-dark">Descobrir ofertes relacionades amb el meu sector i zona de treball.
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ url('/ofertesSeguits') }}" class="btn  btn-dark">Veure les ofertes de les empreses a les que segueixo.
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ url('/correusEnviats') }}" class="btn  btn-dark">Veure l'historial de missatges enviats.
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ url('/buscarEmpreses') }}" class="btn  btn-dark">Buscar empreses.
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
