<?php
/*PARA QUE FUNCION EL CODIGO a donde lo importas se debe iniciar una variable de session de php*/

/*Funcion para obtener solo el nombre*/
include("../../Servidor/Conexion.php"); /* Para que se importe bien la conexion es necesario que sea SOLO include() porqueeeee si utilizas include_once() marca error*/
$id = $_SESSION['usuario']; /*Mandamos a llamar a la variable sesion y la asignamos a una nieva variable (id)*/
$query = "SELECT nombre, apellidop FROM usuarios WHERE id_usuario = $id OR correo = $id"; /*Declaramos la consulta*/
$consulta = mysqli_query($conexion, $query); /* ejecutamos la consulta mandando la conexion y la consulta*/

if (mysqli_num_rows($consulta) > 0) { /*si la consulta devuelve algo*/
    $row = mysqli_fetch_array($consulta); /*guardamos en la variable row todo lo que nos regreso por campos*/
    /*Se utuliza a row por que almaceno lo obtenido de la consulta y se manda a traer el campo ['campo']*/
    echo "" . $row["nombre"]; /*Mensaje que se va a mostrar*/
}

mysqli_close($conexion);
