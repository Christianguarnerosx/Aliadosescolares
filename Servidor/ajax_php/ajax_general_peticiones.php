<?php
include("../../Servidor/Conexion.php");

$query5 = "SELECT COUNT(*) as contadortipoia,
                            t.nombre_ia
                    FROM peticiones as p
                    INNER JOIN tipo_ia as t
                    ON t.id_tipo_ia = p.id_tipo_ia
                    GROUP BY p.id_tipo_ia
                    ORDER BY t.nombre_ia";

$consulta5 = mysqli_query($conexion, $query5);

$resultados = array();

if (mysqli_num_rows($consulta5) > 0) {
    while ($row = mysqli_fetch_array($consulta5)) {
        $resultados[] = array(
            'contadorpeticionesia' => $row['contadortipoia'],
            'tipo_ia' => $row['nombre_ia']
        );
    }

    // Codificar el array completo como JSON y enviarlo como respuesta
    echo json_encode($resultados);
} else {
    // Enviar una respuesta JSON indicando que no hay resultados
    echo json_encode(array('mensaje' => 'No se encontraron registros'));
}
