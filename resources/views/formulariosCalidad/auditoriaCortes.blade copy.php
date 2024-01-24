@extends('layouts.app')

    @section('content')
    {{-- ... dentro de tu vista ... --}}
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if(session('success'))
    <div class="alert alerta-exito">
        {{ session('success') }}
        @if(session('sorteo'))
            <br>{{ session('sorteo') }}
        @endif
    </div>
    @endif
    @if(session('status')) {{-- A menudo utilizado para mensajes de estado genéricos --}}
        <div class="alert alert-secondary">
            {{ session('status') }}
        </div>
    @endif
    <style>
    .alerta-exito {
        background-color: #28a745; /* Color de fondo verde */
        color: white; /* Color de texto blanco */
        padding: 20px;
        border-radius: 15px;
        font-size: 20px;
    }
    </style>
    {{-- ... el resto de tu vista ... --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <!--Aqui se edita el encabezado que es el que se muestra -->
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h2>CONTROL DE CALIDAD EN CORTE</h2>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('formulariosCalidad.formAuditoriaCortes') }}"> 
                            @csrf
                            <hr>
                            <div class="card-body">
                                <!--Desde aqui inicia la edicion del codigo para mostrar el contenido-->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fecha" class="col-sm-3 col-form-label">FECHA</label>
                                        <div class="col-sm-12">
                                            {{ now()->format('d ') . $mesesEnEspanol[now()->format('n') - 1] . now()->format(' Y') }}
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <!--Este apartado debe ser modificado despues -->
                                        <label for="no_recibo" class="col-sm-3 col-form-label">AREA</label>
                                        <div class="col-sm-12">
                                            <select name="no_recibo" id="no_recibo" class="form-select" required title="Por favor, selecciona una opción">
                                                <option value="">Selecciona una opción</option>
                                                @foreach ($CategoriaNoRecibo as $no_recibo)
                                                    <option value="{{ $no_recibo->id }}">{{ $no_recibo->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="estilo" class="col-sm-3 col-form-label">ESTILO</label>
                                        <div class="col-sm-12">
                                            <select name="estilo" id="estilo" class="form-select" required title="Por favor, selecciona una opción">
                                                <option value="">Selecciona una opción</option>
                                                @foreach ($CategoriaEstilo as $estilo)
                                                    <option value="{{ $estilo->id }}">{{ $estilo->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="talla_cantidad" class="col-sm-3 col-form-label">TURNO</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="talla_cantidad" id="talla_cantidad" placeholder="Ingresa talla " required title="Por favor, selecciona una opción" oninput="this.value = this.value.toUpperCase()">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="supervisor" class="col-sm-3 col-form-label">SUPERVISOR</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="supervisor" id="supervisor" placeholder="Ingresa Tamaño de supervisor" required title="Por favor, selecciona una opción"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tipo_defecto" class="col-sm-3 col-form-label">AUDITOR</label>
                                        <div class="col-sm-12">
                                            <select name="tipo_defecto" id="tipo_defecto" class="form-select" required title="Por favor, selecciona una opción">
                                                <option value="">Selecciona una opción</option>
                                                @foreach ($CategoriaTipoDefecto as $tipo_defecto)
                                                    <option value="{{ $tipo_defecto->id }}">{{ $tipo_defecto->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <div class="row mb-3">
                                        <!--Este apartado debe ser modificado despues -->
                                        <label for="nombre" class="col-sm-3 col-form-label">NOMBRE</label>
                                        <div class="col-sm-9">
                                            <select name="no_recibo" id="no_recibo" class="form-select" required title="Por favor, selecciona una opción">
                                                <option value="">Selecciona una opción</option>
                                                @foreach ($CategoriaNoRecibo as $no_recibo)
                                                    <option value="{{ $no_recibo->id }}">{{ $no_recibo->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="operacion" class="col-sm-3 col-form-label">OPERACION</label>
                                        <div class="col-sm-9">
                                            <select name="estilo" id="estilo" class="form-select" required title="Por favor, selecciona una opción">
                                                <option value="">Selecciona una opción</option>
                                                @foreach ($CategoriaEstilo as $estilo)
                                                    <option value="{{ $estilo->id }}">{{ $estilo->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                <!--Fin de la edicion del codigo para mostrar el contenido-->
                            </div>
                        <form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
