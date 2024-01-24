@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="text-align: center">{{ __('Juntos por un mejor Intimark.') }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="container mt-3">
                            <div class="row">
                                <!-- Opción 1 -->
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/Intimark.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">REPORTE AUDITORIA DE ETIQUETAS <br>FCC-014</h5>
                                            <a href="{{ route('formulariosCalidad.auditoriaEtiquetas') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Opción 2 -->
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/Intimark.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">CONTROL DE CALIDAD EN CORTE <br>FCC-010</h5>
                                            <a href="{{ route('formulariosCalidad.auditoriaCortes') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/Intimark.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">EVALUACION  DE CORTE CONTRA PATRON <br>F-4</h5>
                                            <a href="{{ route('formulariosCalidad.evaluacionCorte') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/Intimark.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">EVALUACION  DE CORTE CONTRA PATRON <br>FORMATO  F-4</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/Intimark.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">CONTROL DE CALIDAD EN CORTE <br>FCC-010</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/Intimark.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">SISTEMA SEMAFORO <br>FCC-016-C</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/Intimark.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Pedir Accesos</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/Intimark.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Pedir Accesos</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/Intimark.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Pedir Accesos</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Repite para cada opción que tengas -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
