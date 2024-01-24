<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaAuditor;
use App\Models\CategoriaCliente;
use App\Models\CategoriaEstilo;
use App\Models\CategoriaNoRecibo;
use App\Models\CategoriaTallaCantidad;
use App\Models\CategoriaTamañoMuestra;
use App\Models\CategoriaDefecto;
use App\Models\CategoriaTipoDefecto;
use App\Models\ReporteAuditoriaEtiqueta;

use App\Exports\DatosExport;
use Maatwebsite\Excel\Facades\Excel;

class FormulariosCalidadController extends Controller
{

    // Método privado para cargar las categorías
    private function cargarCategorias() {
        return [
            'CategoriaCliente' => CategoriaCliente::where('estado', 1)->get(),
            'CategoriaEstilo' => CategoriaEstilo::where('estado', 1)->get(),
            'CategoriaNoRecibo' => CategoriaNoRecibo::where('estado', 1)->get(),
            'CategoriaTallaCantidad' => CategoriaTallaCantidad::where('estado', 1)->get(),
            'CategoriaTamañoMuestra' => CategoriaTamañoMuestra::where('estado', 1)->get(),
            'CategoriaDefecto' => CategoriaDefecto::where('estado', 1)->get(),
            'CategoriaTipoDefecto' => CategoriaTipoDefecto::where('estado', 1)->get(),
        ];
    }

    public function auditoriaEtiquetas()
    {
        $categorias = $this->cargarCategorias();

        $mesesEnEspanol = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ];


        return view('formulariosCalidad.auditoriaEtiquetas', array_merge($categorias, ['mesesEnEspanol' => $mesesEnEspanol]));
    }

    public function formAuditoriaEtiquetas(Request $request)
    {
        $auditoriaEtiqueta = new ReporteAuditoriaEtiqueta();
        $defecto = $request->input('defecto', ''); // Obtener el valor del campo 'defecto'
        // Asignacion con relacion de modelos 
        
        $auditoriaEtiqueta->categoriaCliente()->associate(CategoriaCliente::find($request->input('cliente')));
        $auditoriaEtiqueta->categoriaEstilo()->associate(CategoriaEstilo::find($request->input('estilo')));
        $auditoriaEtiqueta->categoriaNoRecibo()->associate(CategoriaNoRecibo::find($request->input('no_recibo')));
        $auditoriaEtiqueta->talla_cantidad_id = $request->input('talla_cantidad');
        $auditoriaEtiqueta->tamaño_muestra_id = $request->input('muestra');
        // Verificar si el valor es nulo o está en blanco
        if ($defecto === null || $defecto === '') {
            $auditoriaEtiqueta->defecto_id = '0'; // Establecer '0' como valor predeterminado
        } else {
            $auditoriaEtiqueta->defecto_id = $defecto; // Usar el valor ingresado
        }
        $auditoriaEtiqueta->categoriaTipoDefecto()->associate(CategoriaTipoDefecto::find($request->input('tipo_defecto')));
        $auditoriaEtiqueta->estado = $request->input('estado');
        // Guarda el registro en la base de datos
        $auditoriaEtiqueta->save();
        // Redirecciona de vuelta a la página con un mensaje de éxito o lo que consideres necesario
        return back()->with('success', 'Datos guardados correctamente.')->withInput();
    }

    public function mostrarAuditoriaEtiquetas()
    {
        $mostrarAuditoriaEtiquetas = ReporteAuditoriaEtiqueta::all();
        $CategoriaCliente = CategoriaCliente::where('estado', 1)->get();
        $CategoriaEstilo = CategoriaEstilo::where('estado', 1)->get();
        $CategoriaNoRecibo = CategoriaNoRecibo::where('estado', 1)->get();

        return view('formulariosCalidad.mostrarAuditoriaEtiquetas', compact('mostrarAuditoriaEtiquetas', 'CategoriaCliente', 'CategoriaEstilo', 'CategoriaNoRecibo'));
    }

    public function filtrarDatosEtiquetas(Request $request)
    {
        $CategoriaCliente = CategoriaCliente::where('estado', 1)->get();
        $CategoriaEstilo = CategoriaEstilo::where('estado', 1)->get();
        $CategoriaNoRecibo = CategoriaNoRecibo::where('estado', 1)->get();
        $clienteId = $request->get('cliente');
        $estiloId = $request->get('estilo');
        $noReciboId = $request->get('no_recibo');
        $fecha = $request->get('fecha');

        // Realiza la consulta con los filtros aplicados
        $mostrarAuditoriaEtiquetas = ReporteAuditoriaEtiqueta::when($estiloId, function ($query) use ($estiloId) {
            return $query->where('estilo_id', $estiloId);
        })->when($noReciboId, function ($query) use ($noReciboId) {
            return $query->where('no_recibo_id', $noReciboId);
        })->when($clienteId, function ($query) use ($clienteId) {
            return $query->where('cliente_id', $clienteId);
        })->when($fecha, function ($query) use ($fecha) {
            // Comparar solo la parte de fecha de la columna 'created_at'
            return $query->whereDate('created_at', '=', $fecha);
        })->get();

        // Pasar los datos filtrados a la vista
        return view('formulariosCalidad.mostrarAuditoriaEtiquetas', compact('mostrarAuditoriaEtiquetas', 'CategoriaCliente', 'CategoriaEstilo', 'CategoriaNoRecibo'));
    }

    public function exportarExcel(Request $request) 
    {
        $filtros = [
            'cliente' => $request->get('cliente'),
            'estilo' => $request->get('estilo'),
            'no_recibo' => $request->get('no_recibo'),
            'fecha' => $request->get('fecha'),
            // ... otros filtros que puedas tener
        ];

        return Excel::download(new DatosExport($filtros), 'datos.xlsx');
    }


    public function auditoriaCortes()
    {
        $CategoriaAuditor = CategoriaAuditor::where('estado', 1)->get();
        $CategoriaCliente = CategoriaCliente::where('estado', 1)->get();
        $CategoriaEstilo = CategoriaEstilo::where('estado', 1)->get();
        $CategoriaNoRecibo = CategoriaNoRecibo::where('estado', 1)->get();
        $CategoriaTallaCantidad = CategoriaTallaCantidad::where('estado', 1)->get();
        $CategoriaTamañoMuestra = CategoriaTamañoMuestra::where('estado', 1)->get();
        $CategoriaDefecto = CategoriaDefecto::where('estado', 1)->get();
        $CategoriaTipoDefecto = CategoriaTipoDefecto::where('estado', 1)->get();


        

        $mesesEnEspanol = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ];


        return view('formulariosCalidad.auditoriaCortes', compact('mesesEnEspanol', 'CategoriaCliente', 
                'CategoriaEstilo', 'CategoriaNoRecibo', 'CategoriaTallaCantidad', 'CategoriaTamañoMuestra', 
                'CategoriaDefecto', 'CategoriaTipoDefecto', 'CategoriaAuditor'));
    }

    public function formAuditoriaCortes(Request $request)
    {
        $auditoriaEtiqueta = new ReporteAuditoriaEtiqueta();
        $defecto = $request->input('defecto', ''); // Obtener el valor del campo 'defecto'
        // Asignacion con relacion de modelos 
        
        $auditoriaEtiqueta->categoriaCliente()->associate(CategoriaCliente::find($request->input('cliente')));
        $auditoriaEtiqueta->categoriaEstilo()->associate(CategoriaEstilo::find($request->input('estilo')));
        $auditoriaEtiqueta->categoriaNoRecibo()->associate(CategoriaNoRecibo::find($request->input('no_recibo')));
        $auditoriaEtiqueta->talla_cantidad_id = $request->input('talla_cantidad');
        $auditoriaEtiqueta->tamaño_muestra_id = $request->input('muestra');
        // Verificar si el valor es nulo o está en blanco
        if ($defecto === null || $defecto === '') {
            $auditoriaEtiqueta->defecto_id = '0'; // Establecer '0' como valor predeterminado
        } else {
            $auditoriaEtiqueta->defecto_id = $defecto; // Usar el valor ingresado
        }
        $auditoriaEtiqueta->categoriaTipoDefecto()->associate(CategoriaTipoDefecto::find($request->input('tipo_defecto')));
        $auditoriaEtiqueta->estado = $request->input('estado');
        // Guarda el registro en la base de datos
        $auditoriaEtiqueta->save();
        // Redirecciona de vuelta a la página con un mensaje de éxito o lo que consideres necesario
        return back()->with('success', 'Datos guardados correctamente.');
    }


    public function evaluacionCorte()
    {
        $CategoriaAuditor = CategoriaAuditor::where('estado', 1)->get();
        $CategoriaCliente = CategoriaCliente::where('estado', 1)->get();
        $CategoriaEstilo = CategoriaEstilo::where('estado', 1)->get();
        $CategoriaNoRecibo = CategoriaNoRecibo::where('estado', 1)->get();
        $CategoriaTallaCantidad = CategoriaTallaCantidad::where('estado', 1)->get();
        $CategoriaTamañoMuestra = CategoriaTamañoMuestra::where('estado', 1)->get();
        $CategoriaDefecto = CategoriaDefecto::where('estado', 1)->get();
        $CategoriaTipoDefecto = CategoriaTipoDefecto::where('estado', 1)->get();


        

        $mesesEnEspanol = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ];


        return view('formulariosCalidad.evaluacionCorte', compact('mesesEnEspanol', 'CategoriaCliente', 
                'CategoriaEstilo', 'CategoriaNoRecibo', 'CategoriaTallaCantidad', 'CategoriaTamañoMuestra', 
                'CategoriaDefecto', 'CategoriaTipoDefecto', 'CategoriaAuditor'));
    }

    public function formEvaluacionCorte(Request $request)
    {
        $auditoriaEtiqueta = new ReporteAuditoriaEtiqueta();
        $defecto = $request->input('defecto', ''); // Obtener el valor del campo 'defecto'
        // Asignacion con relacion de modelos 
        
        $auditoriaEtiqueta->categoriaCliente()->associate(CategoriaCliente::find($request->input('cliente')));
        $auditoriaEtiqueta->categoriaEstilo()->associate(CategoriaEstilo::find($request->input('estilo')));
        $auditoriaEtiqueta->categoriaNoRecibo()->associate(CategoriaNoRecibo::find($request->input('no_recibo')));
        $auditoriaEtiqueta->talla_cantidad_id = $request->input('talla_cantidad');
        $auditoriaEtiqueta->tamaño_muestra_id = $request->input('muestra');
        // Verificar si el valor es nulo o está en blanco
        if ($defecto === null || $defecto === '') {
            $auditoriaEtiqueta->defecto_id = '0'; // Establecer '0' como valor predeterminado
        } else {
            $auditoriaEtiqueta->defecto_id = $defecto; // Usar el valor ingresado
        }
        $auditoriaEtiqueta->categoriaTipoDefecto()->associate(CategoriaTipoDefecto::find($request->input('tipo_defecto')));
        $auditoriaEtiqueta->estado = $request->input('estado');
        // Guarda el registro en la base de datos
        $auditoriaEtiqueta->save();
        // Redirecciona de vuelta a la página con un mensaje de éxito o lo que consideres necesario
        return back()->with('success', 'Datos guardados correctamente.');
    }

}
