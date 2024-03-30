<?php
/*Para el ajax/json para conectar con el js de reportesdinamicos*/

//incluimos la conexion hacia la base de datos 
include_once("../Conexion.php");
session_start(); /* Iniciamos la session para obetener el id de quien esta loggeado */

$id_usuario = $_SESSION['usuario']; // Se obtiene el id de quien esta iniciado sesion
$jsondata = $_POST['data']; // obetenemos los datos enviados por el js por el metodo que envia el ajax y lo guardamos en una variable cualquiera
$Array = json_decode($jsondata); /* Deciframos los datos y los guardamos en un array (vienen del js en un array) */

// Obtener grado y grupo seleccionados
$tipousuario = $Array[0]; /* Primera posicion del array trae el tipo de usuario que buscaremos */
$grado = $Array[1]; /* Segunda posicion del array trae el grado en que buscaremos */
$grupo = $Array[2]; /* Tercera posicion del array trae el grupo en que buscaremos */

// Consulta SQL para obtener usuarios según grado y grupo con LEFT JOIN que une 3 tablas con un condicional Ó para ver si es alumno o docente 
$query = "SELECT u.id_usuario,
                 u.nombre,
                 u.apellidop,
                 u.apellidom 
          FROM usuarios as u
          LEFT JOIN alumnos as a ON a.id_usuario = u.id_usuario
          LEFT JOIN docentes as d ON d.id_usuario = u.id_usuario
          WHERE (u.id_tipo_usuario = $tipousuario  AND a.id_grado = $grado AND a.id_grupo = $grupo AND u.id_usuario != $id_usuario) 
          OR (u.id_tipo_usuario = $tipousuario  AND d.id_grado = $grado AND d.id_grupo = $grupo AND u.id_usuario != $id_usuario)
          ORDER BY LEFT(u.nombre, 1) ASC";

$consulta = mysqli_query($conexion, $query); // Se ejecuta la consulta

/* Al ajax regresara todo lo que este con 'echo' para despues insertar el en codigo (con js) de tipo html*/
/* Asi que se crea el componente de html desde aqui*/
echo "<h1 class='espacio-top-g'>¿Quien?</h1>";
echo "<div class='row centrar alinear-center espacio-top-c'>";

// Verificar si se obtuvieron resultados
if (mysqli_num_rows($consulta) > 0) {
    // Genera el elemento HTML para mostrar al usuario
    while ($row = mysqli_fetch_array($consulta)) {
        $id_usu = $row['id_usuario'];
        $nom_usu = $row['nombre'] . " " . $row['apellidop'] . " " . $row['apellidom'];
        /* Parte 2 que se crea el componente de html*/
        echo "<div class='opcion-reporte usuarios hover-btn borde-r-c centrar' data-id='" . $id_usu . "'>";
        echo "<div class='row'>";
        echo "<div class='col'>";
        echo "<h2 class='text-m negritam txt-blanco'>" . $nom_usu . "</h2>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No se encontraron usuarios para el $grado grado , $grupo grupo "; /* Si despues de filtrar con esos parametros no hay nada en ese grado y grupo*/
}
