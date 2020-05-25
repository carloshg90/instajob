@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/css/homeEmpresa.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="row titol justify-content-center"><h1><u>InstaJob</u></h1></div>
        <div class="row  justify-content-center">
            <div class="col-6 imatge">
                <img src="/recursos/empresa.jpg" alt="Moustiers Sainte Marie">
            </div>
            <div class="col-6 venbinguda">
                <h3>Benvingut al teu espai personal com a empresa!</h3>
            </div>
        </div>
        <div class="row opcions justify-content-center col-12">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ url('/ofertes') }}" class="btn  btn-dark">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Crear una nova oferta.
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ url('/ofertesCreades') }}" class="btn btn-dark">
                    <i class="fa fa-briefcase" aria-hidden="true"></i> Gestionar les meves ofertes.
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ url('/correusEnviatsEmpresa') }}" class="btn  btn-dark">
                    <i class="fa fa-envelope" aria-hidden="true"></i> Veure l'historial de missatges enviats.
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ url('/buscarTreballadors') }}" class="btn  btn-dark">
                    <i class="fa fa-search" aria-hidden="true"></i> Buscar empleats potencials.
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
