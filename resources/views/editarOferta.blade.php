@extends('layouts.app')

@section('content')
<link href="{{ asset('css/ofertesTreballador.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center"><h1><b><u>Editar oferta</u></b></h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3><b>Empresa:</b> {{ Auth::user()->name }}</h3>
                    <h3><b>Sector:</b> {{ Auth::user()->sector }}</h3>
                    <h3><b>Zona:</b> {{ Auth::user()->zona }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('editarOferta/'.$oferta->id) }}">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="horari" class="col-md-4 col-form-label text-md-right"><b>{{ __('Horari de treball:') }}</b></label>
                            <div class="col-md-6">
                            <select name="horari" id="horari" class="form-control" required>
                                <option value="Mati">Matí</option>
                                <option value="Tarda">Tarda</option>
                                <option value="Nit">Nit</option>
                                <option value="Matí i tarda">Matí i tarda</option>
                                <option value="Tarda i nit">Tarda i nit</option>
                                <option value="Matí i nit">Matí i nit</option>
                                <option value="Mati, tarda i nit">Matí, tarda i nit</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cos" class="col-md-4 col-form-label text-md-right"><b>{{ __('Descripció de la teva oferta:') }}</b></label>

                            <div class="col-md-6">
                                <input id="cos" type="text" class="form-control" name="cos" required>
                            </div>
                        </div>
                        <div class="form-group row" style="display:flex;align-items: center;justify-content: center;">
                        <form action="{{ action('OfertaController@editarOferta', $oferta->id) }}" method="POST" style="display:flex;">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-success">
                            Confirmar canvis <i class="fa fa-check" aria-hidden="true"></i>
                            </button>
                        </form>
                        <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
