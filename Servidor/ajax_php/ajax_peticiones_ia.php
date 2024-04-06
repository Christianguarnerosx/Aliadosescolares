<?php
include_once("../Conexion.php");

session_start();

$id = $_SESSION['usuario'];

$query = "SELECT i.nombre_ia, 
                COUNT(*) as numeropeticiones
                FROM tipo_ia as i
                INNER JOIN peticiones as p
                ON i.id_tipo_ia = p.id_tipo_ia
                AND p.id_usuario = $id
                GROUP BY i.nombre_ia";

$consulta = mysqli_query($conexion, $query);

if (mysqli_num_rows($consulta) > 0) {
    while ($row = mysqli_fetch_array($consulta)) {
        $peticiones[] = array(
            'nombreia' => $row['nombre_ia'], // Cambio aquí
            'numeropeticiones' => $row['numeropeticiones'] // Cambio aquí
        );
    }
} else {
    echo "No encontrar nada crack";
}

// Imprimir los datos recuperados en formato JSON
echo json_encode($peticiones);