@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/css/homeTreballador.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="row titol justify-content-center"><h1><u>InstaJob</u></h1></div>
        <div class="row  justify-content-center">
            <div class="col-6 imatge">
                <img src="/recursos/treballador1.jpg" alt="Moustiers Sainte Marie">
            </div>
            <div class="col-6 venbinguda">
                <h3>Benvingut al teu espai personal com a treballador!</h3>
            </div>
        </div>
        <div class="row  justify-content-center">
            <div class="col-6">
                <a href="http://localhost:8000/ofertesSectorZona" class="thumbnail">
                <img src="/recursos/piezaSectorZona.png" alt="Moustiers Sainte Marie" style="z-index:1;float:right;width:80%;height:auto">
                </a>
            </div>
            <div class="col-6">
                <a href="http://localhost:8000/ofertesSeguits" class="thumbnail">
                <img src="/recursos/piezaSeguidas.png" alt="Cinque Terre" style="z-index:-1;width:80%;height:auto;margin-top:0.7em">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
