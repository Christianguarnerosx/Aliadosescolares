<?php

include("../Conexion.php"); /* Nos conectamos a la bd */


if (isset($_POST['idusuario'])) {
    $idusuario = $_POST['idusuario']; /* Detectamos que usuario esta conectado */

    //insertamos en tabla asignar_psicologo_usuarios con campos id_asignar_psicologo_usuarios	id_usuario_psicologo	id_usuario_canalizado
    $query = "INSERT INTO asignar_psicologo_usuarios (id_asignar_psicologo_usuarios, id_usuario_psicologo, id_usuario_canalizado) VALUES (NULL, 16, $idusuario)";

    $ejecutar = (mysqli_query($conexion, $query)); /* Se ejecuta la consulta con la base de datos*/

    if ($ejecutar) {
        //actualizamos el campo canalizado de usuarios con 1
        $query2 = "UPDATE usuarios SET canalizado = 1 WHERE id_usuario = $idusuario";
        $ejecutar2 = (mysqli_query($conexion, $query2)); /* Se ejecuta la consulta con la base de datos*/

        if ($ejecutar2) {
            echo "canalizado correctamente";
        } else {
            echo "Error al actualizar campo canalizado";
        }
    } else {
        echo "Error al canalizar";
    }
} else {
    echo "No se obtuvo";
}
