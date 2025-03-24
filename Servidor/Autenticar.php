<?php
$alert = "";
//Comenzamos una sesion de una vez
session_start();

if (!empty($_SESSION['active'])) { //Si es diferente de vacia
    header("Location: ../Cliente/Principal.php");
} else {
    //Verificar los datos que ingresan en los input sean diferentes de vacios
    if (!empty($_POST)) {
        if (empty($_POST['usuario']) && empty($_POST['contraseña'])) {
            header("Location: ../Cliente/p_generales/Inicionormal.php?autres=vacio");
        } else {
            //incluimos la conexion hacia la base de datos 
            include_once("Conexion.php");
            //Declaramos una consulta que nos devolvera un usuario (si existe)
            $_SESSION['usuario'] = $_POST['usuario']; //Se guarda lo que recibimos de la pagina iniciar en una variable de session 
            $user = $_POST['usuario']; //Se guarda lo que recibimos del campo (id,correo,nombre) de la pagina iniciar
            $pass = $_POST['contraseña']; //Se guarda lo que recibimos del campo (contraseña) de la pagina iniciar
            $query = "SELECT * FROM usuarios WHERE (id_usuario = '$user' OR correo = '$user' OR nombre = '$user') AND contraseña = '$pass' AND id_estatus = 1";
            $consulta = mysqli_query($conexion, $query); //Mandamos a realizar la consulta
            $resultado = mysqli_fetch_array($consulta); //Guardamos la consulta en una variable resultado para poder acceder a los elementos obtenidos del query mediante ella

            if ($resultado > 0) { //Si devuelve algun resultado es que si existe la informacion entonces realizas:

                $_SESSION['id_usuario'] = $resultado['id_usuario']; //Se guarda lo que recibimos de la pagina iniciar en una variable de session
                $_SESSION['tipo_usuario'] = $resultado['id_tipo_usuario']; //Se guarda lo que recibimos de la pagina iniciar en una variable de session

                if ($resultado['avatar'] != "") {
                    header("Location: ../Cliente/p_alumnos/Principalalm.php");
                } else {
                    header("Location: ../Cliente/p_generales/Elegiravatar.php");
                }
            } else {
                header("Location: ../Cliente/p_generales/Inicionormal.php?autres=fracaso");

                session_destroy();
            }
        }
    }
}
