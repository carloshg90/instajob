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
        <div class="row opcions justify-content-center col-12">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <a href="http://localhost:8000/ofertesCreades" class="btn btn-dark">Gestionar les meves ofertes.
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <a href="http://localhost:8000/ofertes" class="btn  btn-dark">Crear una nova oferta.
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <a href="http://localhost:8000/buscarTreballadors" class="btn  btn-dark">Buscar empleats potencials.
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
