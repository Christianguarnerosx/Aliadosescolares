<?php /*Utilizada para obtener qr en menu/paginaprincipal */
/*Se importa la biblioteca PHP QR Code*/
require '../../Servidor/lib/phpqrcode/qrlib.php';


/*Funcion que obtinene la ruta del avatar del usuario*/
include("../../Servidor/Conexion.php"); /* Para que se importe bien la conexion es necesario que sea SOLO include() porqueeeee si utilizas include_once() marca error*/

$id = $_SESSION['usuario']; /*Obetenemos el id de quien incio la sesion y esta guardada en una vraiable session a la hora de autenticar */

$query = "SELECT id_usuario, contraseña from usuarios WHERE id_usuario = $id";
$consulta = mysqli_query($conexion, $query);

if (mysqli_num_rows($consulta) > 0) {
    $row = mysqli_fetch_array($consulta);
    $usuario = $row['id_usuario'];
    /* $contraseña = $row['contraseña']; se hace asi y no solo se manda a traer la variables session por si necesitan otras cosas para enviar por qr del usuario


    /*Nombre del archivo donde se guardará el código QR (puedes ajustar esto según tus necesidades)*/
    $nombreArchivo = 'codigo_qr.png';
    /*Ruta completa del archivo en la carpeta "Downloads"*/
    $rutaArchivo = '../imagenes/qrs/' . $nombreArchivo;
    /*Genera el código QR*/
    QRcode::png($usuario, $rutaArchivo);

    /*Muestra el código QR en la página*/
    echo '<img src="' . $rutaArchivo . '" alt="Código QR">';
} else {
    echo "No se pudo generar tu qr mi pana";
}
