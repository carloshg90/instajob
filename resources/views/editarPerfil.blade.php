@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar perfil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Editar perfil de {{ Auth::user()->name }}</h1>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('editarPerfil') }}">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correu electrònic') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sector" class="col-md-4 col-form-label text-md-right">{{ __('Sector de treball') }}</label>

                            <div class="col-md-6">
                            <select name="sector" id="sector" class="form-control" required>
                                <option value="{{ Auth::user()->sector }}">{{ Auth::user()->sector }}</option>
                                <option value="Hostelería">Hostelería</option>
                                <option value="Mecànica">Mecànica</option>
                                <option value="Construcció">Construcció</option>
                                <option value="Banca">Banca</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="horari" class="col-md-4 col-form-label text-md-right">{{ __('Horari de treball') }}</label>
                            <div class="col-md-6">
                            <select name="horari" id="horari" class="form-control" required>
                                <option value="{{ Auth::user()->horari }}">{{ Auth::user()->horari }}</option>
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
                            <label for="zona" class="col-md-4 col-form-label text-md-right">{{ __('Zona de treball') }}</label>

                            <div class="col-md-6">
                            <select name="zona" id="zona" class="form-control" required>
                                <option value="{{ Auth::user()->zona }}">{{ Auth::user()->zona }}</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contrassenya') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="registrar" class="btn btn-primary">
                                    {{ __('Confirmar canvis') }}
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
<script src="{{ asset('scripts/scriptsDeEdicio.js') }}" defer></script>
@endsection

