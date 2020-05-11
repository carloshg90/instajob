@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>HomeTreballador</h1>
        <div class="row  justify-content-center">   
            <div class="col-5">
                <a href="http://localhost:8000/ofertesSectorZona" class="thumbnail">
                <img src="/recursos/piezaSectorZona.png" alt="Moustiers Sainte Marie" style="z-index:1;float:right;width:80%;height:auto">
                </a>
            </div>
            <div class="col-5">
                <a href="http://localhost:8000/ofertesSeguits" class="thumbnail">
                <img src="/recursos/piezaSeguidas.png" alt="Cinque Terre" style="z-index:-1;width:80%;height:auto;margin-top:0.7em">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
