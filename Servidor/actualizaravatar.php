<?php
include_once 'Conexion.php'; // Llamamos a el uso la base
session_start();
//if para obtener los datos dentro del AJAX
if (isset($_POST['rutaav'])) { //Verifica Si, hay datos en la variable enviada en post desde el AJAX 
    $avatar = $_POST['rutaav']; //Se guarda en la variable avatar (si todo sale bien en el if)
    $usuario = $_SESSION['usuario'];
    $query1 = "UPDATE usuarios SET avatar = '$avatar' WHERE id_usuario = $usuario or correo = $usuario"; //Se guarda una consulta
    $consulta1 = mysqli_query($conexion, $query1); //se ejecuta la consulta
} else {
    echo "No se hizo nada crack, venga puedes";
}
