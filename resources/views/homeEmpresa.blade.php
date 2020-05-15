@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/css/homeEmpresa.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="row titol justify-content-center"><h1><u>InstaJob</u></h1></div>
        <div class="row  justify-content-center">
            <div class="col-6 imatge">
                <img src="/recursos/edifici1.jpg" alt="Moustiers Sainte Marie">
            </div>
            <div class="col-6 venbinguda">
                <h3>Benvingut al teu espai personal com a empresa!</h3>
            </div>
        </div>
        <div class="row  justify-content-center">
            <div class="col-5">
                <!--Boto per crear una oferta de treball-->
                <a href="http://localhost:8000/ofertesCreades" class="thumbnail">
                <img src="/recursos/piezaOfertes.png" alt="Moustiers Sainte Marie" style="z-index:1;float:right;width:80%;height:auto">
                </a>
            </div>
            <div class="col-5">
                <!--Boto per veure les ofertes que la empresa ha creat-->
                <a href="http://localhost:8000/ofertes" class="thumbnail">
                <img src="/recursos/piezaNovaOferta.png" alt="Cinque Terre" style="z-index:-1;width:80%;height:auto">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
