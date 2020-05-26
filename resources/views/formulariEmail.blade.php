@extends('layouts.app')

@section('content')
<link href="{{ asset('css/ofertesTreballador.css') }}" rel="stylesheet">
<div class="container col-md-8">
    <h1 align="center"><b>Has decidit contactar amb l'empresa {{$empresa->name}}</b></h1>
    <br/>
    @if (count($errors) > 0)
     <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <ul>
       @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
       @endforeach
      </ul>
     </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
     <button type="button" class="close" data-dismiss="alert">×</button>
       <strong>{{ $message }}</strong>
    </div>
    @endif
    <form method="post" action="{{url('send')}}">
     {{ csrf_field() }}
     <h3>
         <u>Oferta</u>
     </h3>

        <label>Empresa: <b>{{$empresa->name}}</b></label>
        <input style="display: none" type="text" name="nomReceptor" class="form-control" value="{{$empresa->name}}"/><br>

        <label>Zona: <b>{{$oferta->zona}}</b></label>
        <input style="display: none" type="text" name="zonaOferta" class="form-control" value="{{$oferta->zona}}"/><br>

        <label>Horari: <b>{{$oferta->horari}}</b></label>
        <input style="display: none" type="text" name="horariOferta" class="form-control" value="{{$oferta->horari}}"/><br>

        <label>Sector: <b>{{$oferta->sector}}</b></label>
        <input style="display: none" type="text" name="sectorOferta" class="form-control" value="{{$oferta->sector}}"/><br>

        <label>Detalls: <b>{{$oferta->cos}}</b></label>
        <input style="display: none" type="text" name="cosOferta" class="form-control" value="{{$oferta->cos}}"/><br>

        <hr>
    <h3>
        <u>Solicitant</u>
    </h3>

        <label>Nom: <b>{{Auth::user()->name}}</b></label>
        <input style="display: none" type="text" name="nameTreballador" class="form-control" value="{{Auth::user()->name}}"/><br>

        <input style="display: none" type="text" name="email" class="form-control" value="{{$empresa->email}}"/>

        <label>Email de contacte: <b>{{Auth::user()->email}}</b></label>
        <input style="display: none" type="text" name="emailContacte" class="form-control" value="{{Auth::user()->email}}"/><br>

    <div class="form-group">
      <label>Missatge per l'empresa:</label>
      <textarea name="message" class="form-control"></textarea>
    </div>
     <div class="form-group divBotons">
      <input type="submit" name="send" class="btn btn-success" value="Enviar" />
     </div>
    </form>
@endsection
