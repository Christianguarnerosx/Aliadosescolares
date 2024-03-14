<?Php
/*PARA QUE FUNCION EL CODIGO a donde lo importas se debe iniciar una variable de session de php*/

/*Funcion que obtinene la ruta del avatar del usuario*/
include("../../Servidor/Conexion.php"); /* Para que se importe bien la conexion es necesario que sea SOLO include() porqueeeee si utilizas include_once() marca error*/

$id = $_SESSION['usuario']; /*Obetenemos el id de quien incio la sesion y esta guardada en una vraiable session a la hora de autenticar */

$query = "SELECT avatar from usuarios WHERE id_usuario = $id";/*Obtenemos la info del avatar con el id obtenido */
$consulta = mysqli_query($conexion, $query); /*Ejecutamos la consulta */

if (mysqli_num_rows($consulta) > 0) { /*Si hay algo en la consulta es que si devolvio informacion cuando se hizo */
    $row = mysqli_fetch_array($consulta);

    echo "" . $row["avatar"];
}
mysqli_close($conexion);
