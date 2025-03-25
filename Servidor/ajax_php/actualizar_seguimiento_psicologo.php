<?php

include("../Conexion.php");
if (isset($_POST['id_cita']) && isset($_POST['anotaciones_psicologo'])) {

    $id_cita = $_POST['id_cita'];
    $anotaciones_psicologo = $_POST['anotaciones_psicologo'];

    $query = "UPDATE citas_psicologo_usuarios SET anotaciones_psicologo = '$anotaciones_psicologo' WHERE id_citas_psicologo_usuario = $id_cita";
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo "se registro correctamente";
    } else {
        echo "error";
    }
} else {
    echo "no se recibieron todos los datos";
}
