@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/register.css') }}">
<div id="fondo"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ __('Formulari de registre') }}</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><b>{{ __('Nom') }}</b></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><b>{{ __('Correu electrònic') }}</b></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><b>{{ __('Contrassenya') }}</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><b>{{ __('Confirma la teva contrassenya') }}</b></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sector" class="col-md-4 col-form-label text-md-right"><b>{{ __('Sector de treball') }}</b></label>

                            <div class="col-md-6">
                            <select name="sector" id="sector" class="form-control" required>
                                <option value="Hostaleria">Hostaleria</option>
                                <option value="Mecànica">Mecànica</option>
                                <option value="Construcció">Construcció</option>
                                <option value="Banca">Banca</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="horari" class="col-md-4 col-form-label text-md-right"><b>{{ __('Horari de treball') }}</b></label>
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
                            <label for="zona" class="col-md-4 col-form-label text-md-right"><b>{{ __('Zona de treball') }}</b></label>

                            <div class="col-md-6">
                            <select name="zona" id="zona" class="form-control" required>
                            </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="Usuari" class="col-md-4 col-form-label text-md-right"><b>{{ __('Tipus d\'usuari') }}</b></label>
                            <input type="radio" id="Empresa" name="usuari" value="Empresa" checked>
                            <label for="Empresa"><b>Empresa</b></label>
                            <input type="radio" id="Treballador" name="usuari" value="Treballador">
                            <label for="Treballador"><b>Treballador</b></label>
                        </div>

                        <div class="form-group ">
                            <div class=" offset-md-4">
                                <label><input type="checkbox" id="politica" value="politica"><b>Accepto la <a href="{{ url('/politicaPrivacitat') }}">política de privacitat</a>.</b> </label><br>
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="registrar" class="btn btn-primary" disabled>
                                    {{ __('Confirmar registre') }}
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

@section('scripts')
<script src="{{ asset('scripts/scriptsDeRegistre.js') }}" defer></script>
@endsection
