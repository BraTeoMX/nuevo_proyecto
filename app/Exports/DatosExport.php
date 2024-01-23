<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\ReporteAuditoriaEtiqueta;

class DatosExport implements FromCollection, WithMapping, WithHeadings
{
    protected $filtros;

    public function __construct($filtros) {
        $this->filtros = $filtros;
    }

    public function collection()
    {
        $query = ReporteAuditoriaEtiqueta::query();

         // Filtro por cliente
         if (!empty($this->filtros['cliente'])) {
            $query->where('cliente_id', $this->filtros['cliente']);
        }

        // Filtro por estilo
        if (!empty($this->filtros['estilo'])) {
            $query->where('estilo_id', $this->filtros['estilo']);
        }

        // Filtro por número de recibo
        if (!empty($this->filtros['no_recibo'])) {
            $query->where('no_recibo_id', $this->filtros['no_recibo']);
        }

        // Filtro por fecha
        if (!empty($this->filtros['fecha'])) {
            $query->whereDate('created_at', $this->filtros['fecha']);
        }

        return $query->get();
    }

    /**
     * @param ReporteAuditoriaEtiqueta $reporte
     * @return array
     */
    public function map($reporte): array
    {
        return [
            optional($reporte->categoriaEstilo)->nombre ?? 'NINGUNO',
            optional($reporte->categoriaNoRecibo)->nombre ?? 'NINGUNO',
            $reporte->talla_cantidad_id ?: 'NINGUNO',
            $reporte->tamaño_muestra_id ?: 'NINGUNO',
            $reporte->defecto_id ?: 'NINGUNO',
            optional($reporte->categoriaTipoDefecto)->nombre ?? 'NINGUNO',
            $this->formatoEstado($reporte->estado),
            // ... otras columnas que deseas incluir ...
        ];
    }

    /**
     * Formatea el estado para mostrar en el Excel.
     *
     * @param mixed $estado
     * @return string
     */
    protected function formatoEstado($estado): string
    {
        if ((int)$estado === 1) {
            return 'APROBADO';
        } elseif ((int)$estado === 0) {
            return 'RECHAZADO';
        }
    
        return 'NONE';
    }

    public function headings(): array
    {
        return [
            'Estilo ID',
            'No. Recibo ID',
            'Talla Cantidad ID',
            'Tamaño Muestra ID',
            'Defecto ID',
            'Tipo Defecto ID',
            'Estado',
            // ... encabezados para las otras columnas ...
        ];
    }
}
