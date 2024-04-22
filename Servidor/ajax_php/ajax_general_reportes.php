<?php
include("../../Servidor/Conexion.php");

$query5 = "SELECT COUNT(*) as contadortiporeportes,
                            t.nombre_tipo_reporte
                    FROM reportes as r
                    INNER JOIN tipo_reportes as t
                    ON t.id_tipo_reporte = r.id_tipo_reporte
                    GROUP BY r.id_tipo_reporte
                    ORDER BY t.nombre_tipo_reporte";

$consulta5 = mysqli_query($conexion, $query5);

$resultados = array();

if (mysqli_num_rows($consulta5) > 0) {
    while ($row = mysqli_fetch_array($consulta5)) {
        $resultados[] = array(
            'contadorreportes' => $row['contadortiporeportes'],
            'tipo_reporte' => $row['nombre_tipo_reporte']
        );
    }

    // Codificar el array completo como JSON y enviarlo como respuesta
    echo json_encode($resultados);
} else {
    // Enviar una respuesta JSON indicando que no hay resultados
    echo json_encode(array('mensaje' => 'No se encontraron registros'));
}
