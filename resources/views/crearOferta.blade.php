@extends('layouts.app')

@section('content')
<link href="{{ asset('css/ofertesTreballador.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center"><h1><b><u>Nova oferta</u></b></h1></div>

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
                    <form method="POST" action="{{ url('ofertes') }}">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="registrar" class="btn btn-success">
                                    {{ __('Crear oferta') }} <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
