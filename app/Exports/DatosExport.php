<?php
namespace App\Exports;

use App\Models\CategoriaCliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use App\Models\ReporteAuditoriaEtiqueta;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;


class DatosExport implements FromCollection, WithMapping, WithEvents, WithStyles, WithCustomStartCell
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

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Ajustar el tamaño de las filas para la imagen y el título
                $event->sheet->getRowDimension('1')->setRowHeight(40); // Ajusta la altura para la imagen
                $event->sheet->getRowDimension('2')->setRowHeight(40); // Continuación de la imagen
                $event->sheet->getRowDimension('3')->setRowHeight(20); // Espacio para el título
    
                // Agregar imagen
                $drawing = new Drawing();
                $drawing->setPath(public_path('\images\logo.png')); // Ruta a la imagen
                $drawing->setHeight(100); // Altura de la imagen
                $drawing->setCoordinates('A1'); // Ubicación de la imagen en la hoja
                $drawing->setWorksheet($event->sheet->getDelegate());
    
                // Agregar título
                $event->sheet->mergeCells('E1:K1'); // Fusionar celdas para el título
                $event->sheet->setCellValue('E1', 'REPORTE AUDITORIA DE ETIQUETAS');
                $event->sheet->getStyle('E1')->getFont()->setSize(20);

                // Agregar Cliente
                $event->sheet->mergeCells('A3:B3'); // Fusionar celdas para el cliente
                $clienteId = $this->filtros['cliente'];
                $cliente = 'Cliente: ' . CategoriaCliente::find($clienteId)->nombre; // Suponiendo que el nombre del cliente está en el campo 'nombre' de la tabla 'clientes'
                $event->sheet->setCellValue('A3', $cliente);

                // Agregar Fecha
                $event->sheet->mergeCells('E3:F3'); // Fusionar celdas para la fecha
                if($this->filtros['fecha'] == NULL){
                    $fecha = 'Fecha: NULL' ; // Formatear la fecha en formato numérico
                }else{ 
                $fecha = 'Fecha: ' . date('d - m - Y', strtotime($this->filtros['fecha'])); // Formatear la fecha en formato numérico
                }
                $event->sheet->setCellValue('E3', $fecha);
                // Mover los encabezados de la tabla hacia abajo
                // Asegúrate de ajustar las coordenadas en tus otros métodos (headings, map) si es necesario
                // Escribir los encabezados manualmente en la fila 5
                $encabezados = [
                    'Estilo ID', 'No. Recibo ID', 'Talla Cantidad ID', 
                    'Tamaño Muestra ID', 'Defecto ID', 'Tipo Defecto ID', 'Estado'
                ];

                $columna = 'A';
                $fila = 5; // La fila donde comienzan los encabezados
                foreach ($encabezados as $encabezado) {
                    $event->sheet->setCellValue($columna.$fila, $encabezado);
                    $columna++; // Avanza a la siguiente columna
                }

                $event->sheet->getStyle('A5:G5')->getFont()->setBold(true);
            },
            ];
    }

    /**
     * @return string
     */
    public function startCell(): string
    {
        return 'A6';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilos para los encabezados
            'A5'  => ['font' => ['bold' => true]], // Asumiendo que los encabezados comienzan en la fila 2
            // Puedes agregar más estilos aquí
        ];
    }
}
