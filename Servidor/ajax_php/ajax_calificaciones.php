<?php

include("../../Servidor/Conexion.php");

session_start();

$id = $_SESSION['usuario'];

$query = "SELECT m.nombre_materia,
                 c.calificacion
            FROM materias as m
            INNER JOIN calificaciones as c ON m.id_materia = c.id_materia
            INNER JOIN alumnos as a ON c.id_alumno = a.id_alumno
            AND a.id_usuario = $id
            AND c.id_grado = a.id_grado";

$consulta = mysqli_query($conexion, $query);

if (mysqli_num_rows($consulta) > 0) {
    while ($row = mysqli_fetch_array($consulta)) {
        $calificaciones[] = array(
            'nombremateria' => $row['nombre_materia'],
            'calificacionmateria' => $row['calificacion']
        );
    }
} else {
    echo "No esta bien tu consulta crack";
}

/* Convertimos el array que tiene los datos en json para que se pueda mandar al ajax*/
echo json_encode($calificaciones);
