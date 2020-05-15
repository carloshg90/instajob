@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1><b>Busca aquí empreses.</b></h1>
            <input type="text" class="form-control" placeholder="Busca aqui a empreses">
            <hr>
            <div class="col-12" id="principal">

            </div>
        </div>

        <div class="col-2">

            <div class="col-12">
                <a href="http://localhost:8000/ofertesSectorZona" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Ofertes per sector i zona.
                </a>
            </div>
            <div class="col-12">
                <a href="http://localhost:8000/ofertesSeguits" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Ofertes de les mepreses que segueixo.
                </a>
            </div>
            <div class="col-12">
                <a href="http://localhost:8000/correusEnviats" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Veure els meus correus enviats.
                </a>
            </div>
            <div class="col-12">
                <a href="http://localhost:8000/buscarEmpreses" class="btn btn-outline-dark" style="margin-bottom: 1em">
                    Buscar empreses.
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
