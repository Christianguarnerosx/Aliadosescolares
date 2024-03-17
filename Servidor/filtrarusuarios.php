<?php
/*Para el ajax/json para conectar con el js de reportesdinamicos*/

//incluimos la conexion hacia la base de datos 
include_once("../../Servidor/Conexion.php");

// Obtener grado y grupo seleccionados
$grado = $_POST['grado'];
$grupo = $_POST['grupo'];

// Consulta SQL para obtener usuarios según grado y grupo
$query = "SELECT u.id_usuario,
                 u.nombre,
                 u.apellidop,
                 u.apellidom 
          FROM usuarios as u
          INNER JOIN alumnos as a ON a.id_usuario = u.id_usuario
          WHERE a.id_grado = $grado AND a.id_grupo = $grupo";
$consulta = mysqli_query($conexion, $query);

// Verificar si se obtuvieron resultados
if (mysqli_num_rows($consulta) > 0) {
    // Mostrar los usuarios
    while ($row = mysqli_fetch_array($consulta)) {
        $id_usu = $row['id_usuario'];
        $nom_usu = $row['nombre'] . " " . $row['apellidop'] . " " . $row['apellidom'];
        echo "<div class='opcion-reporte usuarios hover-btn borde-r-c centrar' data-id='" . $id_usu . "'>        
        <div class='row'>
            <div class='col'>
                <div class='row'>
                    <div class='col'>
                        <h2 class='text-m negritam'>" . $nom_usu . "</h2>" . "
                    </div>
                </div>
            </div>
        </div>
            </div>";
    }
} else {
    echo "No se encontraron usuarios para el grado $grado, grupo $grupo";
}
