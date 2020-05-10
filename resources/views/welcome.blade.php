<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
        <!-- Styles -->

    </head>
    <body><div class="fondo"></div>
        <div class="flex-center position-ref full-height">
            <div class="content">
            </div>
            <div class="container presentacio text-center" style="display:flex; height: 100vh; justify-content: center; align-items: center;">
                <div class="row">
                <div class="title m-b-md titol">
                    InstaJob

                </div>
                <div class="col">
                    <div class="float-right" >
                        <!--Posem una imatge amb animació-->
                        <img id="esquerra" src="/recursos/pieza2.png">
                        <img id="dreta" src="/recursos/pieza32.png">
                    </div>
                </div>
                    <div class="col-12">
                        <h4>El lloc on trobaràs el que necessites.</h4>
                    </div>
                    <div class="col-12">
                        <p>Necesites feina? Busques algú per la teva empresa? Registra't o inicia sessió i desobreix el que podem fer per tú.</p>
                    </div>
                    @if (Route::has('login'))
                    @auth

                    @if(Auth::user()->hasRole('Empresa'))
                    <button class="btn botoMes"><a href="http://localhost:8000/homeEmpresa">Inici</a></button>
                    @else
                    <button class="btn botoMes"><a href="http://localhost:8000/homeTreballador">Inici</a></button>
                    @endif

                    @else
                    <button class="btn botoMes"><a href="http://localhost:8000/login">Inicia sessió.</a></button>

                    @if (Route::has('register'))
                    <button class="btn botoMes"><a href="http://localhost:8000/register">Registra't!</a></button>
                    @endif
                    @endauth
                </div>
            @endif
                </div>
            </div>
        </div>
    </body>
</html>
