@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($ofertes as $oferta)
                <div>
                    <h1>{{$oferta->cos}}</h1>
                </div>
                <form action="{{ action('ofertaController@borrarOferta', $oferta->id) }}" method="POST" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" style="display:inline">
                    <span class="glyphicon glyphicon-remove"></span>Eliminar oferta
                    </button>
                </form>
                <a class="btn btn-warning" href="{{ url('editarOferta/'.$oferta->id)}}">Editar oferta</a>
                <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
