@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Aquestes son les ofertes que coincideixen amb el teu sector i zona</h1>
            <hr>
            @foreach ($ofertes as $oferta)
                <div>
                    <!--Link per veure el perfil de una empresa-->
                    <a href="{{ url('/perfilAlie/'.$oferta->idEmpresa) }}"><h3>{{$oferta->nomEmpresa}}</h3></a>
                    <h5>{{$oferta->zona}}</h5>
                    <h5>{{$oferta->horari}}</h5>
                    <h5>{{$oferta->cos}}</h5>
                <!--Botó per seguir a una empresa-->
                <form action="{{ action('seguidorController@seguirZona', $oferta->idEmpresa) }}" method="POST" style="display:inline">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success" style="display:inline">
                    <span class="glyphicon glyphicon-remove"></span>Seguir emprresa
                    </button>
                </form>
                <!--Botó per deixar de seguir a una empresa-->
                <form action="{{ action('seguidorController@noSeguirZona', $oferta->idEmpresa) }}" method="POST" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" style="display:inline">
                    <span class="glyphicon glyphicon-remove"></span>Deixar de seguir
                    </button>
                </form>
                </div>
                <hr>
            @endforeach
    </div>
</div>
@endsection
