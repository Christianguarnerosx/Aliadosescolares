<?php

include("../../Servidor/Conexion.php"); /* Nos conectamos a la bd */

if (isset($_POST['busqueda']) && !empty($_POST['busqueda']) && $_POST['busqueda'] != "") {
    $busqueda = $_POST['busqueda'];
    $query = "SELECT * FROM usuarios WHERE canalizado = 1 AND (nombre LIKE '%$busqueda%' OR apellidop LIKE '%$busqueda%' OR apellidom LIKE '%$busqueda%')";
} else {
    $query = "SELECT * FROM usuarios WHERE canalizado = 1";
}

$ejecutar = mysqli_query($conexion, $query);

if (mysqli_num_rows($ejecutar) > 0) { /*si la consulta devuelve algo*/
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>ID</th>";
    echo "<th scope='col'>Nombre</th>";
    echo "<th scope='col'>Apellido Paterno</th>";
    echo "<th scope='col'>Apellido Materno</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($data = mysqli_fetch_array($ejecutar)) { /* Creas la variable row para guardar los datas de los registros que se iteraran en el while (los ira recorriendo) */
        echo "<tr>";
        echo "<th scope='row'>" . $data['id_usuario'] . "</th>";
        echo "<td>" . $data['nombre'] . "</td>";
        echo "<td>" . $data['apellidop'] . "</td>";
        echo "<td>" . $data['apellidom'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p class='text-c txt-titulo'>No se encontraron usuarios</p>";
}
