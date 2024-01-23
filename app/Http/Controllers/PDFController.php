<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; // Importa el Facade de PDF
use App\Models\CategoriaCliente;
use App\Models\CategoriaAuditores;

class PDFController extends Controller
{
    public function descargarPDF(Request $request)
    {
        $planta = $request->query('planta');
        $nombrePlanta = 'Planta Ixtlahuaca'; // Valor por defecto
        $auditores = CategoriaAuditores::where('Planta', 'Planta1')->get();
        if ($planta == 'sanbartolo') {
            $nombrePlanta = 'Planta San Bartolo';
            $auditores = CategoriaAuditores::where('Planta', 'Planta2')->get();
        }

        $categoria_cliente = CategoriaCliente::all();
       
        

        $data = [
            'categoria_cliente' => $categoria_cliente,
            'nombrePlanta' => $nombrePlanta,
            'auditores' => $auditores,
        ]; // Aquí puedes pasar los datos que necesitas para tu vista
        $pdf = PDF::loadView('pdf.mi_vista_pdf', $data);
        // Establecer el papel a tamaño A4 en orientación horizontal
        $pdf->setPaper('A4', 'landscape');

        // Descargar el PDF con un nombre de archivo
        return $pdf->download('mi_archivo_pdf.pdf');
    }
}