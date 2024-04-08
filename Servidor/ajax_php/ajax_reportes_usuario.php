<?php
include_once("../Conexion.php");

session_start();

$id = $_SESSION['usuario'];

$query = "SELECT t.nombre_tipo_reporte,
                  COUNT(*) as numeroreportes
            FROM tipo_reportes as t 
            INNER JOIN reportes as r
            ON t.id_tipo_reporte = r.id_tipo_reporte
            AND r.id_usuario = $id
            GROUP BY t.nombre_tipo_reporte";

$consulta = mysqli_query($conexion, $query);

if (mysqli_num_rows($consulta) > 0) {
    while ($row = mysqli_fetch_array($consulta)) {
        $reportes[] = array(
            'nombrereporte' => $row['nombre_tipo_reporte'], // Cambio aquí
            'numeroreportes' => $row['numeroreportes'] // Cambio aquí
        );
    }
} else {
    echo "No encontrar nada crack";
}

// Imprimir los datos recuperados en formato JSON
echo json_encode($reportes);
