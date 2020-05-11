@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Aquestes son les ofertes de les empreses a les que segueixes</h1>
            <hr>
            @foreach ($ofertes1 as $oferta)
            @if( $oferta->id == null )

                <h1>Encara no segueixes a cap empresa, a que estas esperant?</h1>

            @else
                <div>
                    <a href="{{ url('/perfilAlie/'.$oferta->idEmpresa) }}"><h3>{{$oferta->nomEmpresa}}</h3></a>
                    <h5>{{$oferta->zona}}</h5>
                    <h5>{{$oferta->horari}}</h5>
                    <h5>{{$oferta->cos}}</h5>
                <!--Botó per deixar de seguir a una empresa-->
                <form action="{{ action('seguidorController@noSeguirSeguits', $oferta->idEmpresa) }}" method="POST" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" style="display:inline">
                    <span class="glyphicon glyphicon-remove"></span>Deixar de seguir
                    </button>
                </form>
                </div>
                <hr>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
