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
                                        <label for="orden" class="col-sm-3 col-form-label">ORDEN</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="orden" id="orden" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <!--Este apartado debe ser modificado despues -->
                                        <label for="estilo" class="col-sm-3 col-form-label">ESTILO</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="estilo" id="estilo" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pieza" class="col-sm-3 col-form-label">PIEZAS</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="pieza" id="pieza" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="trazo" class="col-sm-3 col-form-label">TRAZO</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="trazo" id="trazo" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="color" class="col-sm-3 col-form-label">COLOR</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="color" id="color" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="material" class="col-sm-3 col-form-label">MATERIAL</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="material" id="material" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lienzo" class="col-sm-3 col-form-label">LIENZOS</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="lienzo" id="lienzo" placeholder="..." required />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div style="background: #db8036a2">
                                    <h4 style="text-align: center">AUDITORIA DE MARCADA</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="yOrden" class="col-sm-3 col-form-label">Yardas en la orden</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="yOrden" id="yOrden" placeholder="..." required />
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="yMarcada" class="col-sm-3 col-form-label">Yardas en la marcada</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="yMarcada" id="yMarcada" placeholder="..." required />
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="yTendido" class="col-sm-3 col-form-label">Yardas en el tendido</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="yTendido" id="yTendido" placeholder="..." required />
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-6 mb-3">
                                        <label for="pieza_bulto" class="col-sm-3 col-form-label">Piezas X Bulto </label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="pieza_bulto" id="pieza_bulto" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pieza_total" class="col-sm-3 col-form-label">Piezas Totales</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="pieza_total" id="pieza_total" placeholder="..." required />
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-6 mb-3">
                                        <label for="talla" class="col-sm-3 col-form-label">Tallas</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="talla" id="talla" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="talla" id="talla" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="talla" id="talla" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="talla" id="talla" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="talla" id="talla" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="talla" id="talla" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bulto" class="col-sm-3 col-form-label"># Bultos</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="bulto" id="bulto" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="bulto" id="bulto" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="bulto" id="bulto" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="bulto" id="bulto" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="bulto" id="bulto" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="total_pieza" class="col-sm-3 col-form-label">Total piezas</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="total_pieza" id="total_pieza" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="total_pieza" id="total_pieza" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="total_pieza" id="total_pieza" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="total_pieza" id="total_pieza" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="total_pieza" id="total_pieza" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="largo_trazo" class="col-sm-3 col-form-label">Largo Trazo </label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="largo_trazo" id="largo_trazo" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ancho_trazo" class="col-sm-3 col-form-label">Ancho Trazo </label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="ancho_trazo" id="ancho_trazo" placeholder="..." required />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div style="background: #32d2d8a2">
                                    <h4 style="text-align: center">AUDITORIA DE TENDIDO</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre" class="col-sm-3 col-form-label">NOMBRE</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <select name="nombre" id="nombre" class="form-select" required title="Por favor, selecciona una opción">
                                                <option value="">Selecciona una opción</option>
                                                @foreach ($CategoriaAuditor as $auditor)
                                                    <option value="{{ $auditor->id }}">{{ $auditor->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="yMarcada" class="col-sm-3 col-form-label">Yardas en la marcada</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="yMarcada" id="yMarcada" placeholder="..." required />
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="yTendido" class="col-sm-3 col-form-label">Yardas en el tendido</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="yTendido" id="yTendido" placeholder="..." required />
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-6 mb-3">
                                        <label for="pieza_bulto" class="col-sm-3 col-form-label">Piezas X Bulto </label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="pieza_bulto" id="pieza_bulto" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pieza_total" class="col-sm-3 col-form-label">Piezas Totales</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="pieza_total" id="pieza_total" placeholder="..." required />
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-6 mb-3">
                                        <label for="talla" class="col-sm-3 col-form-label">Tallas</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="talla" id="talla" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="talla" id="talla" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="talla" id="talla" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="talla" id="talla" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="talla" id="talla" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="talla" id="talla" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bulto" class="col-sm-3 col-form-label"># Bultos</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="bulto" id="bulto" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="bulto" id="bulto" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="bulto" id="bulto" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="bulto" id="bulto" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="bulto" id="bulto" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="total_pieza" class="col-sm-3 col-form-label">Total piezas</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="total_pieza" id="total_pieza" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="total_pieza" id="total_pieza" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="total_pieza" id="total_pieza" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="total_pieza" id="total_pieza" placeholder="..." required />
                                            <input type="number" class="form-control me-2" name="total_pieza" id="total_pieza" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="largo_trazo" class="col-sm-3 col-form-label">Largo Trazo </label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="largo_trazo" id="largo_trazo" placeholder="..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ancho_trazo" class="col-sm-3 col-form-label">Ancho Trazo </label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control me-2" name="ancho_trazo" id="ancho_trazo" placeholder="..." required />
                                        </div>
                                    </div>
                                </div>
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
