<?php

use Illuminate\Support\Facades\Route;
//apartado para generar el archivo pdf
use App\Http\Controllers\PDFController;
use App\Http\Controllers\FormulariosCalidadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reporte_etiqueta', [App\Http\Controllers\ReporteEtiquetaController::class, 'index'])->name('reporte_etiqueta');
//ruta para generar archivo pdf 
Route::get('/descargar-pdf', [PDFController::class, 'descargarPDF']);
//apartado para el primer formuarlio 
Route::get('/auditoriaEtiquetas', [FormulariosCalidadController::class, 'auditoriaEtiquetas'])->name('formulariosCalidad.auditoriaEtiquetas');
Route::get('/auditoriaCortes', [FormulariosCalidadController::class, 'auditoriaCortes'])->name('formulariosCalidad.auditoriaCortes');
Route::get('/evaluacionCorte', [FormulariosCalidadController::class, 'evaluacionCorte'])->name('formulariosCalidad.evaluacionCorte');
Route::get('/mostrarAuditoriaEtiquetas', [FormulariosCalidadController::class, 'mostrarAuditoriaEtiquetas'])->name('formulariosCalidad.mostrarAuditoriaEtiquetas');
Route::post('/formAuditoriaEtiquetas', [FormulariosCalidadController::class, 'formAuditoriaEtiquetas'])->name('formulariosCalidad.formAuditoriaEtiquetas');
Route::post('/formAuditoriaCortes', [FormulariosCalidadController::class, 'formAuditoriaCortes'])->name('formulariosCalidad.formAuditoriaCortes');
Route::post('/formEvaluacionCorte', [FormulariosCalidadController::class, 'formEvaluacionCorte'])->name('formulariosCalidad.formEvaluacionCorte');
//Apartado para el formulario para mostrar datos filtrados 
Route::get('/filtrarDatosEtiquetas', [FormulariosCalidadController::class, 'filtrarDatosEtiquetas'])->name('formulariosCalidad.filtrarDatosEtiquetas');

//aparado para exportar el archivo de excel 
Route::get('/exportar-excel', [FormulariosCalidadController::class, 'exportarExcel'])->name('exportar-excel');



