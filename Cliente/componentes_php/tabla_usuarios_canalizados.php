<?php

include("../../Servidor/Conexion.php"); /* Nos conectamos a la bd */

$conditions = [];
$order = "ORDER BY u.canalizado DESC";
$limit = "LIMIT 8";

if (isset($_POST['busqueda']) && !empty($_POST['busqueda'])) {
    $busqueda = $_POST['busqueda'];
    $conditions[] = "CONCAT(u.nombre, ' ', u.apellidop, ' ', u.apellidom) LIKE '%$busqueda%' OR CONCAT(usuapa.nombre, ' ', usuapa.apellidop, ' ', usuapa.apellidom) LIKE '%$busqueda%'";
}

if (isset($_POST['usuarioscanalizados'])) {
    $conditions[] = "u.canalizado = 1 OR usuapa.canalizado = 1";
}

if (isset($_POST['usuariossactivos'])) {
    $conditions[] = "u.id_estatus = 1";
}

if (isset($_POST['usuariosinactivos'])) {
    $conditions[] = "u.id_estatus = 2";
}

if (isset($_POST['usuariostodosregistros'])) {
    $limit = "";
} else if (isset($_POST['usuariosmas50registros'])) {
    $limit = "LIMIT 50";
}

//orders
if (isset($_POST['usuariosmasrecientes'])) {
    $order = "ORDER BY u.canalizado DESC";
} else if (isset($_POST['usuariosmenosrecientes'])) {
    $order = "ORDER BY u.canalizado ASC";
}


$conditions[] = "u.id_tipo_usuario != 6 AND u.id_tipo_usuario != 1";

$query = "SELECT u.*,
            gr.nombre_grado,
            g.nombre_grupo,
            tu.nombre_tipo_usuario,
            CONCAT(usuapa.nombre, ' ', usuapa.apellidop, ' ', usuapa.apellidom) as nombre_completo_hijo,
            CONCAT(u.nombre, ' ', u.apellidop, ' ', u.apellidom) as nombre_completo_padre
            FROM usuarios as u 
            LEFT JOIN asignar_psicologo_usuarios as asigps
            ON asigps.id_usuario_canalizado = u.id_usuario
            LEFT JOIN tipo_usuarios as tu
            ON u.id_tipo_usuario = tu.id_tipo_usuario
            LEFT JOIN alumnos as a
            ON u.id_usuario = a.id_usuario
            LEFT JOIN docentes as d
            ON u.id_usuario = d.id_usuario
            LEFT JOIN grupos as g
            ON a.id_grupo = g.id_grupo
            LEFT JOIN grados as gr
            ON a.id_grado = gr.id_grado
            LEFT JOIN padres as pa
            ON u.id_usuario = pa.id_usuario
            LEFT JOIN alumnos as apa
            ON pa.id_hijo = apa.id_alumno
            LEFT JOIN usuarios as usuapa
            ON apa.id_usuario = usuapa.id_usuario
            LEFT JOIN alumnos as apag
            ON usuapa.id_usuario = apag.id_usuario
            LEFT JOIN grupos as gap
            ON apag.id_grupo = gap.id_grupo
            LEFT JOIN grados as grp
            ON apag.id_grado = grp.id_grado
            WHERE " . implode(" AND ", $conditions) . " " . $order . " " . $limit;

$ejecutar = mysqli_query($conexion, $query);

if (mysqli_num_rows($ejecutar) > 0) { /* si la consulta devuelve algo */
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>ID</th>";
    echo "<th scope='col'>Nombre</th>";
    echo "<th scope='col'>Apellido Paterno</th>";
    echo "<th scope='col'>Apellido Materno</th>";
    echo "<th scope='col'>Grado</th>";
    echo "<th scope='col'>Grupo</th>";
    echo "<th scope='col'>Padre del Alumno</th>";
    echo "<th scope='col'>Tipo usuario</th>";

    echo "<th scope='col'>Acciones</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($data = mysqli_fetch_array($ejecutar)) { /* Creas la variable row para guardar los datas de los registros que se iteraran en el while (los ira recorriendo) */
        echo "<tr>";
        echo "<th scope='row'>" . $data['id_usuario'] . "</th>";
        echo "<td>" . $data['nombre'] . "</td>";
        echo "<td>" . $data['apellidop'] . "</td>";
        echo "<td>" . $data['apellidom'] . "</td>";
        echo "<td>" . $data['nombre_grado'] . "</td>";
        echo "<td>" . $data['nombre_grupo'] . "</td>";
        echo "<td>" . $data['nombre_completo_hijo'] . "</td>";
        echo "<td>" . $data['nombre_tipo_usuario'] . "</td>";

        if ($data['canalizado'] == 1) {
            echo "<td class='centrar'> <button type='button' class='btn-acciones btndarseguimiento btn-azul borde-r-c txt-blanco centrar' data-id='" . $data['id_usuario'] . "' >Seguimiento</td>";
        } else {
            echo "<td class='centrar'> <button type='button' class='btn-acciones btncanalizarusuario btn-naranja borde-r-c txt-blanco centrar' data-id='" . $data['id_usuario'] . "' >Canalizar</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p class='text-c txt-titulo'>No se encontraron usuarios</p>";
}
