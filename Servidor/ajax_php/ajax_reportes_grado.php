<?php

include("../Conexion.php");

$id_grado = $_GET['gradoseleccionado'];

$query = "SELECT COUNT(*) as numeroreportes,
                    g.nombre_grupo
            FROM reportes as r
            LEFT JOIN alumnos as a 
            ON a.id_usuario = r.id_usuario
            LEFT JOIN docentes as d 
            ON d.id_usuario = r.id_usuario
            LEFT JOIN grupos as g 
            ON g.id_grupo = a.id_grupo
            OR g.id_grupo = d.id_grupo
            WHERE a.id_grado = $id_grado
            OR d.id_grado = $id_grado
            GROUP BY g.nombre_grupo";


$consulta = mysqli_query($conexion, $query);

// Crear un array para almacenar los resultados
$resultados = array();

if (mysqli_num_rows($consulta)) {
    while ($row = mysqli_fetch_array($consulta)) {
        // Agregar cada registro al array de resultados
        $resultados[] = array(
            'numeroreportes' => $row['numeroreportes'],
            'nombre_grupo' => $row['nombre_grupo']
        );
    }

    // Codificar el array completo como JSON y enviarlo como respuesta
    echo json_encode($resultados);
} else {
    // Enviar una respuesta JSON indicando que no hay resultados
    echo json_encode(array('mensaje' => 'No se encontraron registros'));
}
