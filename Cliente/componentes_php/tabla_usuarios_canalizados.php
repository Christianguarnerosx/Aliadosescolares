<?php

include("../../Servidor/Conexion.php"); /* Nos conectamos a la bd */

if (isset($_POST['busqueda']) && !empty($_POST['busqueda']) && $_POST['busqueda'] != "") {
    $busqueda = $_POST['busqueda'];
    $query = "SELECT * FROM usuarios WHERE id_tipo_usuario = 3 AND (canalizado = 1 AND nombre LIKE '%$busqueda%') OR (canalizado = 1 AND apellidop LIKE '%$busqueda%') OR (canalizado = 1 AND apellidom LIKE '%$busqueda%')";
} else if (isset($_POST['usuarioscanalizados']) && $_POST['usuarioscanalizados'] == "on") {
    $query = "SELECT * FROM usuarios WHERE id_tipo_usuario = 3 AND canalizado = 1";
} else if (isset($_POST['usuariostodos']) && $_POST['usuariostodos'] == "on") {
    $query = "SELECT * FROM usuarios";
} else if (isset($_POST['usuariossactivos']) && $_POST['usuariossactivos'] == "on") {
    $query = "SELECT * FROM usuarios WHERE id_tipo_usuario = 3 AND activo = 1";
} else if (isset($_POST['usuariosinactivos']) && $_POST['usuariosinactivos'] == "on") {
    $query = "SELECT * FROM usuarios WHERE id_tipo_usuario = 3 AND activo = 0";
} else if (isset($_POST['usuariosmas50registros']) && $_POST['usuariosmas50registros'] == "on") {
    $query = "SELECT u.* FROM usuarios as u INNER JOIN (SELECT id_usuario, COUNT(*) as conteo FROM reportes GROUP BY id_usuario HAVING COUNT(*) > 50) as r ON u.id_usuario = r.id_usuario";
} else if (isset($_POST['usuariostodosregistros']) && $_POST['usuariostodosregistros'] == "on") {
    $query = "SELECT u.* FROM usuarios as u INNER JOIN reportes as r ON u.id_usuario = r.id_usuario";
} else if (isset($_POST['usuariosmasrecientes']) && $_POST['usuariosmasrecientes'] == "on") {
    $query = "SELECT u.* FROM usuarios as u INNER JOIN reportes as r ON u.id_usuario = r.id_usuario ORDER BY r.fecha_reporte DESC";
} else if (isset($_POST['usuariosmenosrecientes']) && $_POST['usuariosmenosrecientes'] == "on") {
    $query = "SELECT u.* FROM usuarios as u INNER JOIN reportes as r ON u.id_usuario = r.id_usuario ORDER BY r.fecha_reporte ASC";
} else {
    $query = "SELECT * FROM usuarios WHERE id_tipo_usuario = 3";
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

