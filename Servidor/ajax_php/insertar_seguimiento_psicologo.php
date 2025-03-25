<?php

include("../Conexion.php");
if (isset($_POST['anotaciones_psicologo']) && isset($_POST['id_usuario'])) {

    $anotaciones_psicologo = $_POST['anotaciones_psicologo'];
    $id_usuario = $_POST['id_usuario'];

    $query = "INSERT INTO citas_psicologo_usuarios (id_usuario_psicologo, id_usuario, fecha_cita, anotaciones_psicologo) VALUES (16, $id_usuario, now(), '$anotaciones_psicologo')";
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo "se registro correctamente";
    } else {
        echo "error";
    }
} else {
    echo "no se recibieron todos los datos";
}
