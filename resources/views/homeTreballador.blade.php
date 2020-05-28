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
                <a href="{{ url('/ofertesSectorZona') }}" class="btn btn-dark">
                    <i class="fa fa-map-marker" aria-hidden="true"></i> Ofertes per sector i zona
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ url('/ofertesSeguits') }}" class="btn  btn-dark"><i class="fa fa-heart" aria-hidden="true"></i> Empreses que segueixo
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ url('/correusEnviats') }}" class="btn  btn-dark"><i class="fa fa-envelope" aria-hidden="true"></i> Correus enviats
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ url('/buscarEmpreses') }}" class="btn  btn-dark"><i class="fa fa-search" aria-hidden="true"></i> Buscar empreses
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
