@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1><b>Busca aquí possibles treballadors.</b></h1>
            <input type="text" class="form-control" placeholder="Busca aqui a possibles treballadors">
            <hr>
            <div class="col-12" id="principal">

            </div>
        </div>

        <div class="col-2">

            <div class="col-12">
                <a href="http://localhost:8000/ofertes" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Crear una oferta.
                </a>
            </div>

            <div class="col-12">
                <a href="http://localhost:8000/ofertesCreades" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Les meves ofertes.
                </a>
            </div>

            <div class="col-12">
                <a href="http://localhost:8000/buscarTreballadors" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Buscar treballadors.
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
