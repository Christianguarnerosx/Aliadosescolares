<?php
include_once("../Conexion.php");

session_start();

$id = $_SESSION['usuario'];

$query = "SELECT COUNT(*) as totalreportes
            FROM reportes 
            WHERE id_usuario = $id";

$consulta = mysqli_query($conexion, $query);

if (mysqli_num_rows($consulta) > 0) {
    $row = mysqli_fetch_array($consulta);
    echo json_encode($row['totalreportes']);
} else {
    echo "No encontrar nada crack";
}
