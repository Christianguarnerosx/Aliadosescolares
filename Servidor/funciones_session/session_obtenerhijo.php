<?php
include("../../Servidor/Conexion.php");

$id = $_SESSION['usuario'];

$query = "SELECT    u.nombre, 
                    p.id_padre
            from usuarios as u
            INNER JOIN padres as p ON p.id_usuario = $id
            INNER JOIN alumnos as a ON a.id_padre = p.id_padre
            AND a.id_usuario = u.id_usuario";

$consulta = mysqli_query($conexion, $query);

if (mysqli_num_rows($consulta)) {
    $row = mysqli_fetch_array($consulta);
    echo $row['nombre'];
} else {
    echo "no se encontro tu chavito";
}
