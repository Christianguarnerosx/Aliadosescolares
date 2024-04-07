<?php
/*PARA QUE FUNCION EL CODIGO a donde lo importas se debe iniciar una variable de session de php*/

/*Funcion para obtener el nombre y apellido paterno*/
include("../../Servidor/Conexion.php"); /*Incluimos la conexion (OJOOOO se debe calcular la ruta desde donde se manda atraer no desde aqui) */
/* Para que se importe bien la conexion es necesario que sea SOLO include() porqueeeee si utilizas include_once() marca error*/

$id = $_SESSION['usuario']; /*Mandamos a llamar a la variable sesion y la asignamos a una nieva variable (id)*/
$query = "SELECT t.nombre_tipo_usuario
            FROM tipo_usuarios as t
            INNER JOIN usuarios as u
            ON t.id_tipo_usuario = u.id_tipo_usuario
            AND id_usuario = $id"; /*Declaramos la consulta*/

$consulta = mysqli_query($conexion, $query); /* ejecutamos la consulta mandando la conexion y la consulta*/

if (mysqli_num_rows($consulta) > 0) { /*si la consulta devuelve algo*/
    $row = mysqli_fetch_array($consulta); /*guardamos en la variable row todo lo que nos regreso por campos*/
    /*Se utuliza a row por que almaceno lo obtenido de la consulta y se manda a traer el campo ['campo']*/
    echo "" . $row['nombre_tipo_usuario']; /*Mensaje que se va a mostrar*/
}
mysqli_close($conexion);
