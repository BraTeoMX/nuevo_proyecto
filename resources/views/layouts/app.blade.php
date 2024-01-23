<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Intimark-Calidad') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .navbar-bottom {
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 4000;
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        /*Seccion para cambiar las propiedades del color de un boton*/
        .btn-cafe-color {
            background-color: #765341;
            /* Puedes ajustar otros estilos según tus necesidades, como el color del texto, el borde, etc. */
            color: #fff; /* Color del texto en el botón */
            border-color: #765341; /* Color del borde del botón */
        }
        .btn-cafe-color:hover{
            background-color: #aa785f;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Navbar superior -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm custom-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('#') }}">
                    <img src="{{ asset('images/Intimark.png') }}" alt="logo" height="50" width="100">
                    <span class="ms-2">{{ 'Calidad' }}</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Agrega tus elementos de navegación superior aquí si es necesario -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @auth
        <div id="app">
            <!-- Navbar en la parte inferior -->
            <nav class="navbar navbar-bottom navbar-light bg-light">
                <div class="container container-nav">
                    <!-- Botones en la parte inferior -->
                    <a class="navbar-brand" href="#" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <img src="{{ asset('images/buscar.webp') }}" alt="Buscar" height="38" width="38">
                    </a>

                    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="searchModalLabel">Buscar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Contenido de la ventana emergente para la búsqueda -->
                                    <!-- Aquí puedes agregar un formulario de búsqueda -->
                                    <!-- Contenido de la ventana emergente para la búsqueda -->
                                    <form id="searchForm" action="{{ url('search') }}" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Buscar..."
                                                name="query" id="searchInput">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    onclick="searchContent()">Buscar</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- Otros elementos del modal según tus necesidades -->
                            </div>
                        </div>
                    </div>
                    <a class="navbar-brand" href="{{ url('home') }}">
                        <img src="{{ asset('images/inicio.webp') }}" alt="Inicio" height="38" width="38">
                    </a>
                    <a class="navbar-brand" href="#" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <img src="{{ asset('images/analitica.webp') }}" alt="Reporteria" height="38" width="38">
                    </a>
                </div>
            </nav>
        </div>
    @endauth

    <!-- Modal para "Reporteria" -->
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Reporteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido de la ventana emergente para "Reporteria" -->
                    <!-- Puedes agregar tus opciones y contenido aquí -->
                    <div class="table-responsive">
                        <div class="container mt-3">
                            <input class="form-control mb-3" id="searchInput2" type="text" placeholder="Buscar...">
                            <div class="accordion" id="accordionExample">
                                <!-- Elemento del acordeón 1 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            REPORTE AUDITORIA DE ETIQUETAS <br>FCC-014
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <a href="{{ route('formulariosCalidad.mostrarAuditoriaEtiquetas') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                            <a href="{{ url('/descargar-pdf?planta=ixtlahuaca') }}" class="btn btn-cafe-color">Planta 1 - Ixtlahuaca</a>
                                            <a href="{{ url('/descargar-pdf?planta=sanbartolo') }}" class="btn btn-cafe-color">Planta 2 - San Bartolo</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Elemento del acordeón 2 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            REPORTE AUDITORIA DE ALMACEN <br>FCC-004
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <a href="{{ url('/descargar-pdf') }}" class="btn btn-primary">Descargar PDF</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Elemento del acordeón 3 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            REPORTE AUDITORIA DE PRODUCCION <br>FCC-004
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <a href="{{ url('/descargar-pdf') }}" class="btn btn-primary">Descargar PDF</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Elemento del acordeón 4 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            REPORTE AUDITORIA DE CORTE <br>FCC-004
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <a href="{{ url('/descargar-pdf') }}" class="btn btn-primary">Descargar PDF</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Elemento del acordeón 5 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            REPORTE AUDITORIA DE AQL <br>FCC-004
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <a href="{{ url('/descargar-pdf') }}" class="btn btn-primary">Descargar PDF</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Repite para cada elemento del acordeón que tengas -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Otros elementos del modal según tus necesidades -->
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Función para filtrar los elementos del acordeón
            document.getElementById('searchInput2').addEventListener('input', function() {
                var searchValue = this.value.toLowerCase();
                var accordionItems = document.querySelectorAll("#accordionExample .accordion-item");
            
                accordionItems.forEach(function(item) {
                    var title = item.querySelector('.accordion-header button').textContent.toLowerCase();
                    if (title.includes(searchValue)) {
                        item.style.display = ""; // Muestra el elemento si coincide
                    } else {
                        item.style.display = "none"; // Oculta el elemento si no coincide
                    }
                });
            });
        });
        </script>
        
        
</body>

    
</html>
