<?php
include_once 'Conexion.php'; // Llamamos a el uso la base
session_start();
//if para obtener los datos dentro del AJAX
if (isset($_POST['rutafon'])) { //Verifica Si, hay datos en la variable enviada en post desde el AJAX 
    $fondo = $_POST['rutafon']; //Se guarda en la variable avatar (si todo sale bien en el if)
    $usuario = $_SESSION['usuario'];
    $query = "UPDATE usuarios SET fondo = '$fondo' WHERE id_usuario = $usuario or correo = $usuario"; //Se guarda una consulta
    $consulta = mysqli_query($conexion, $query); //se ejecuta la consulta
} else {
    echo "No se hizo nada crack, venga puedes";
}
