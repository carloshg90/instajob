@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Llistat de les teves ofertes</h1>
            @foreach ($ofertes as $oferta)

                <div>
                    <h3>{{$oferta->cos}}</h3>
                    <form action="{{ action('ofertaController@borrarOferta', $oferta->id) }}" method="POST" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" style="display:inline">
                    <span class="glyphicon glyphicon-remove"></span>Eliminar oferta
                    </button>
                    </form>
                    <a class="btn btn-warning" href="{{ url('editarOferta/'.$oferta->id)}}">Editar oferta</a>
                    <hr>
                </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
