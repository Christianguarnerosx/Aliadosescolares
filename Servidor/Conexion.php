<?php 
/*si utilizas otro servidor tendras que poner el purto en el que esta ":3310" */
/*Datos de la conexion*/
$hostname="localhost:3310";
$username="root";
$password="";
$database="escuela";

/*Hacemos la conexion a la base de datos con los datos que guardamos*/
$conexion = mysqli_connect($hostname, $username, $password, $database);

/* */
if (!$conexion) {
    die("Error al conectar" . mysqli_connect_error());
}else{
//    echo "Conectado";
}
?>