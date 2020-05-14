@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1><b>Nova oferta</b></h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Oferta creada per l'empresa: {{ Auth::user()->name }}</h3>
                    <h3>En el sector: {{ Auth::user()->sector }}</h3>
                    <h3>Per la zona: {{ Auth::user()->zona }}</h3>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('ofertes') }}">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="horari" class="col-md-4 col-form-label text-md-right">{{ __('Horari de treball.') }}</label>
                            <div class="col-md-6">
                            <select name="horari" id="horari" class="form-control" required>
                                <option value="Mati">Mati</option>
                                <option value="Tarda">Tarda</option>
                                <option value="Nit">Nit</option>
                                <option value="Matí i tarda">Matí i tarda</option>
                                <option value="Tarda i nit">Tarda i nit</option>
                                <option value="Matí i nit">Matí i nit</option>
                                <option value="Mati, tarda i nit">Mati,tarda i nit</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cos" class="col-md-4 col-form-label text-md-right">{{ __('Detalls de la teva oferta:') }}</label>

                            <div class="col-md-6">
                                <input id="cos" type="text" class="form-control" name="cos" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="registrar" class="btn btn-success">
                                    {{ __('Crear oferta') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="col-11">
                <a href="http://localhost:8000/ofertes" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Crear una oferta.
                </a>
            </div>

            <div class="col-11">
                <a href="http://localhost:8000/ofertesCreades" class="btn btn-outline-dark">
                Les meves ofertes.
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
