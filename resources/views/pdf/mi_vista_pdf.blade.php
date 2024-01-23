<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Calidad Intimark</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        /* Aquí puedes agregar estilos simples necesarios para tu PDF */
        .titulo {
            text-align: center;
        }
        /* Añade más estilos según sea necesario */

        /* Definir un estilo personalizado llamado "tabla-personalizada" */
        .tabla-personalizada {
            /* width: 100%; */
            border-collapse: collapse;
            font-size: 12px; /* Reduce el tamaño de la fuente */
        }

        .tabla-personalizada th, .tabla-personalizada td {
            border: 1px solid black;
            padding: 8px;
        }

        .tabla-personalizada th {
            background-color: #f2f2f2;
        }
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="contenido">
            <!-- Aquí va el contenido específico del PDF -->
            <table style="width:100%; align:center">
                <tr>
                    <td width=30% style="text-align:center"><img src="images/logo.png" width="100px" heigth="82px" ></td>
                    <td width=30% style="text-align:center; font-size: 14px "><h3>REPORTE AUDITORIA DE CORTE<br>{{$nombrePlanta}}</h3></td>
                    <td style="text-align:center;" ></td>       
                 </tr>
            </table>
            <br>
            {{--En este apartado va la tabla de datos --}}
            <table class="tabla-personalizada">
                <tr>
                    <th>PROVEEDOR</th>
                    <th>ESTILO Y COLOR</th>
                    <th>TALLA</th>
                    <th>N° DE CORTE</th>
                    <th>TOTAL CORTE</th>
                    <th>PZS. BULTO</th>
                    <th>PZS. AUDIT.</th>
                    <th>DEFECTO DE TELA</th>
                    <th>MAL CORTADO</th>
                    <th>MAL CENTRADO</th>
                    <th>TOTAL DE DEFECTOS</th>
                    <th>OBSERVACIONES</th>
                </tr>
                <!-- Aquí irían las filas con los datos, por ejemplo: -->
                <tr>
                    <td>Datos del proveedor</td>
                    <td>Estilo y color</td>
                    <td>Talla</td>
                    <td>Número de corte</td>
                    <td>Total de corte</td>
                    <td>Piezas por bulto</td>
                    <td>Piezas auditadas</td>
                    <td>Defectos de tela</td>
                    <td>Mal cortado</td>
                    <td>Mal centrado</td>
                    <td>Total de defectos</td>
                    <td>Observaciones</td>
                </tr>
                <!-- Repite las filas según sea necesario -->
            </table>
            <hr>
            <table class="tabla-personalizada">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numero Empleado</th>
                        <th>Numero TAG</th>
                        <th>Nombre</th>
                        <th>Planta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($auditores as $auditor)
                        <tr>
                            <td>{{ $auditor->id }}</td>
                            <td>{{ $auditor->Num_Empleado }}</td>
                            <td>{{ $auditor->Num_Tag }}</td>
                            <td>{{ $auditor->Nombre }}</td>
                            @if($auditor->Planta == 'Planta1')
                                <td>Ixtlahuaca</td>
                            @elseif($auditor->Planta == 'Planta2')
                                <td>San Bartolo</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            {{--Datos de prueba--}}
            <table class="tabla-personalizada">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoria_cliente as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->Clientes }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
        </div>
    </div>
</body>
</html>
