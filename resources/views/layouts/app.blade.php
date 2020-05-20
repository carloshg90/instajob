<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/" style="color:#777"><img style=" heigth: 100px; width: 100px" src="{{ asset('recursos/logo1.png') }}" alt="Logo" class="img-responsive"></a>

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sessió') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registra\'t') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="dropdown">
                                <a class="dropdown-toggle nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                  </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->hasRole('Empresa'))
                                    <a class="dropdown-item" href="{{ url('/homeEmpresa') }}">Inici</a>
                                    @else
                                    <a class="dropdown-item" href="{{ url('/homeTreballador') }}">Inici</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ url('/perfil') }}">Veure el meu perfil</a>
                                    <a class="dropdown-item" href="{{ url('/editarPerfil') }}">Editar informació del perfil</a>
                                    <a class="dropdown-item" href="{{ url('/canviarContrassenya') }}">Canviar contrassenya</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Tancar sessió') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
