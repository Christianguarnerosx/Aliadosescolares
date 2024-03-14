<?php
/*Back que obtiene el id de la url que se manda aqui (desde el js que obtiene el codigo del qr(el js que decifra el qr))*/
/* IMPORTANTE Si marcara error activar en xampp gd en el php.ini de apache (solo quitarle el ';' que tiene antes)*/
$id = $_GET['id'];
$_SESSION['usuario'] = $id;

include_once("Conexion.php");

/* inner que obtiene el tipo de usuruario que corresponde al id obtenido del qr*/
$query1 = "SELECT t.nombre_tipo_usuario
                  from tipo_usuarios as t
                  INNER JOIN usuarios as u ON u.id_usuario = $id
                  AND u.id_tipo_usuario = t.id_tipo_usuario";
$consulta1 = mysqli_query($conexion, $query1); /*Se manda la consulta*/

if (mysqli_num_rows($consulta1) > 0) { /*si devuelve valores */
    $row1 = mysqli_fetch_array($consulta1); /*Guardas en un variable lo que te devuelve */

    $tipo = $row1['nombre_tipo_usuario']; /*pasamos a una variable para comparar mas facil en los if()*/

    if ($tipo !== "Alumno") { /*Si no es un alumno envia a inicio normal*/
        header("Location: Inicionormal.php?autres=noalumno"); /* Manda a inicionormal.php(usuario y contraseña)*/
    } else {
        /*Si el alumno: te quedas en la interfaz*/
        /*y activa la notificacion de que hacer para iniciar sesion*/
    }
}
