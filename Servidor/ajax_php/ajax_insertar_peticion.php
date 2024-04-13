<?php
include("../Conexion.php");
session_start();

$id = $_SESSION['usuario'];

$peticion = $_POST['prompt'];
$tipotutoria = $_POST['idtutoria'];

// Obtener la fecha y hora actual
$fecha = date("Y-m-d H:i:s"); /* SI INSERTA MAL EL DIA Y FECHA, Cambiar en php.ini datetime*/

$query = "INSERT INTO peticiones (id_peticion, id_tipo_ia, id_usuario, consulta, fecha) VALUES (NULL, $tipotutoria, $id, '$peticion', '$fecha')";

$consulta = mysqli_query($conexion, $query);

if ($consulta) {
    echo json_encode("Se inserto con exito");
} else {
    echo json_encode("Te fallo crack");
}