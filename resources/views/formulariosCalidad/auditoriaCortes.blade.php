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
                                        <label for="nombre" class="col-sm-3 col-form-label">Fecha</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            {{ now()->format('d ') . $mesesEnEspanol[now()->format('n') - 1] . now()->format(' Y') }}
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mesa" class="col-sm-3 col-form-label">MESA</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <select name="mesa" id="mesa" class="form-select" required title="Por favor, selecciona una opción">
                                                <option value="">Selecciona una opción</option>
                                                @foreach ($CategoriaAuditor as $auditor)
                                                    <option value="{{ $auditor->id }}">{{ $auditor->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
                                    <hr>
                                    <div class="col-md-6 mb-3">
                                        <label for="codigo_material" class="col-sm-6 col-form-label">1.  Codigo de material</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="codigo_material" id="codigo_material" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="codigo_color" class="col-sm-6 col-form-label">2.  Codigo de color</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="codigo_color" id="codigo_color" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="info_trazo" class="col-sm-6 col-form-label">3.  Informacion de trazo</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="info_trazo" id="info_trazo" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cantidad_lienzo" class="col-sm-6 col-form-label">4.  Cantidad de lienzos</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="cantidad_lienzo" id="cantidad_lienzo" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="longitud_tendido" class="col-sm-6 col-form-label">5.  Longitud de tendido</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="longitud_tendido" id="longitud_tendido" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ancho_tendido" class="col-sm-6 col-form-label">6.  Ancho de tendido</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="ancho_tendido" id="ancho_tendido" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="material_relajado" class="col-sm-6 col-form-label">7.  Material relajado</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="material_relajado" id="material_relajado" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="material_relajado" class="col-sm-6 col-form-label">Accion correctiva </label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="text" class="form-control me-2" name="material_relajado" id="material_relajado" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-6 mb-3">
                                        <label for="emplame" class="col-sm-6 col-form-label">8.  Empalmes</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="emplame" id="emplame" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cara_material" class="col-sm-6 col-form-label">9.  Cara de material</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="cara_material" id="cara_material" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tono" class="col-sm-6 col-form-label">10.  Tonos</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="tono" id="tono" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="alineacion_tendido" class="col-sm-6 col-form-label">11.  Alineacion de tendido</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="alineacion_tendido" id="alineacion_tendido" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="arruga_tendido" class="col-sm-6 col-form-label">12.  Arrugas de tendido</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="arruga_tendido" id="arruga_tendido" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="defecto_material" class="col-sm-6 col-form-label">13.  defecto de material</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                <label class="form-check-label" for="estado1"> ✔ </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                <label class="form-check-label" for="estado2"> ✖ </label>
                                            </div>
                                            <input type="text" class="form-control me-2" name="defecto_material" id="defecto_material" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="material_relajado" class="col-sm-6 col-form-label">¿Se libera el tendido?</label>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <input type="text" class="form-control me-2" name="material_relajado" id="material_relajado" placeholder=" COMENTARIOS" required />
                                        </div>
                                    </div>
                                    <hr>
                                    <div style="background: #b41873a2">
                                        <h4 style="text-align: center">LECTRA</h4>
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
                                            <label for="nombre" class="col-sm-3 col-form-label">Fecha</label>
                                            <div class="col-sm-12 d-flex align-items-center">
                                                {{ now()->format('d ') . $mesesEnEspanol[now()->format('n') - 1] . now()->format(' Y') }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="mesa" class="col-sm-3 col-form-label">MESA</label>
                                            <div class="col-sm-12 d-flex align-items-center">
                                                <select name="mesa" id="mesa" class="form-select" required title="Por favor, selecciona una opción">
                                                    <option value="">Selecciona una opción</option>
                                                    @foreach ($CategoriaAuditor as $auditor)
                                                        <option value="{{ $auditor->id }}">{{ $auditor->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
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
                                        <hr>
                                        <div class="col-md-6 mb-3">
                                            <label for="simetria_pieza" class="col-sm-6 col-form-label">1.  Simetria de piezas</label>
                                            <div class="col-sm-12 d-flex align-items-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                    <label class="form-check-label" for="estado1"> ✔ </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                    <label class="form-check-label" for="estado2"> ✖ </label>
                                                </div>
                                                <input type="text" class="form-control me-2" name="simetria_pieza_pcs" id="simetria_pieza_pcs" placeholder="Pcs." required />
                                                <input type="text" class="form-control me-2" name="simetria_pieza" id="simetria_pieza" placeholder=" COMENTARIOS" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="codigo_material" class="col-sm-6 col-form-label">2.  piezas completas</label>
                                            <div class="col-sm-12 d-flex align-items-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                    <label class="form-check-label" for="estado1"> ✔ </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                    <label class="form-check-label" for="estado2"> ✖ </label>
                                                </div>
                                                <input type="text" class="form-control me-2" name="codigo_material" id="codigo_material" placeholder="Pcs." required />
                                                <input type="text" class="form-control me-2" name="codigo_material" id="codigo_material" placeholder=" COMENTARIOS" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="codigo_material" class="col-sm-6 col-form-label">3.  Piezas contra patron</label>
                                            <div class="col-sm-12 d-flex align-items-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                    <label class="form-check-label" for="estado1"> ✔ </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                    <label class="form-check-label" for="estado2"> ✖ </label>
                                                </div>
                                                <input type="text" class="form-control me-2" name="codigo_material" id="codigo_material" placeholder="Pcs." required />
                                                <input type="text" class="form-control me-2" name="codigo_material" id="codigo_material" placeholder=" COMENTARIOS" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="codigo_material" class="col-sm-6 col-form-label">4. Ingreso de tikets</label>
                                            <div class="col-sm-12 d-flex align-items-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" required>
                                                    <label class="form-check-label" for="estado1"> ✔ </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" required>
                                                    <label class="form-check-label" for="estado2"> ✖ </label>
                                                </div>
                                                <input type="text" class="form-control me-2" name="codigo_material" id="codigo_material" placeholder="Pcs." required />
                                                <input type="text" class="form-control me-2" name="codigo_material" id="codigo_material" placeholder=" COMENTARIOS" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="codigo_material" class="col-sm-6 col-form-label">Piezas inspeccionadas</label>
                                            <div class="col-sm-12 d-flex align-items-center">
                                                <input type="text" class="form-control me-2" name="codigo_material" id="codigo_material" placeholder=" COMENTARIOS" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="codigo_material" class="col-sm-6 col-form-label">Defectos</label>
                                            <div class="col-sm-12 d-flex align-items-center">
                                                <input type="text" class="form-control me-2" name="codigo_material" id="codigo_material" placeholder=" COMENTARIOS" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="codigo_material" class="col-sm-6 col-form-label">Porcentaje</label>
                                            <div class="col-sm-12 d-flex align-items-center">
                                                <input type="text" class="form-control me-2" name="codigo_material" id="codigo_material" placeholder=" COMENTARIOS" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="codigo_material" class="col-sm-6 col-form-label">Firma de Aprobado</label>
                                            <div class="col-sm-12 d-flex align-items-center">
                                                <input type="text" class="form-control me-2" name="codigo_material" id="codigo_material" placeholder=" COMENTARIOS" required />
                                            </div>
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
