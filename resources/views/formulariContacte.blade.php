@extends('layouts.app')

@section('content')
<link href="{{ asset('css/ofertesTreballador.css') }}" rel="stylesheet">
<div class="container col-md-6">
    <h1 align="center"><b><u>Formulari de contacte.</u></b></h1>
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
    <form method="post" action="{{url('enviar')}}">
     {{ csrf_field() }}
        <!--Enviem el nom de la persona que rebrà el correu-->
        <input style="display: none" type="text" name="nomReceptor" class="form-control" value="{{$receptor->name}}"/>
    <h3>
        Dades que li facilitarem al receptor del missatge.
    </h3>
        <label>-El teu nom: <b>{{Auth::user()->name}}</b></label>
        <input style="display: none" type="text" name="nameTreballador" class="form-control" value="{{Auth::user()->name}}"/><br>
        <input style="display: none" type="text" name="email" class="form-control" value="{{$receptor->email}}"/>
        <label>-El teu email de contacte: <b>{{Auth::user()->email}}</b></label>
        <input style="display: none" type="text" name="emailContacte" class="form-control" value="{{Auth::user()->email}}"/><br>
    <div class="form-group">
        <h3>
            Missatge per {{$receptor->name}}:
        </h3>
      <label>Escrui aquí el teu missatge:</label>
      <textarea name="message" class="form-control" placeholder="Escriu aquí el teu missatge"></textarea>
    </div>
     <div class="form-group divBotons">
      <input type="submit" name="send" class="btn btn-success" value="Enviar " />
     </div>
    </form>
@endsection
