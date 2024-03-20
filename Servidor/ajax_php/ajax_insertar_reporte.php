<?php
/*Para el ajax/json para conectar con el js de reportesdinamicos*/

//incluimos la conexion hacia la base de datos 
include_once("../Conexion.php");
session_start(); /* Iniciamos la session para obetener el id de quien esta loggeado */

$id_usuario = $_SESSION['usuario']; // Se obtiene el id de quien esta iniciado sesion

// Obtener la fecha y hora actual
$fecha = date("Y-m-d H:i:s"); /* SI INSERTA MAL EL DIA Y FECHA, Cambiar en php.ini datetime*/

$query = ""; //declaramos una consulta vacia para que posteriormente se llene segun los parametros que se ocupen

//Con este if else verificaremos que tipos de datos fueron enviados, 
//si fueron tipo blob (con un formatdata.appned)
//si fueron tipo texto (con un array[])
/* Y dependiendo de cual sera como se guarden los datos en las variables que se utilizaran en los querys de insert para insertar */


//BLOB (audio)
// Verifica si se recibió un archivo de audio
if (!empty($_FILES['audio'])) {

    // Obtén los datos enviados mediante el formulario FormData
    $id_tipo_reporte = $_POST['id_tiporeporte'];
    $id_tipo_usuario = $_POST['id_tipousuario'];
    $id_grado = $_POST['id_grado'];
    $id_grupo = $_POST['id_grupo'];
    $id_usuario_reportado = $_POST['id_usuarioreportado'];

    // Define la carpeta de destino donde se guardará el archivo de audio
    $carpeta_destino = '../../Cliente/sonidos/reportes/';

    /* Se asigna el nombre final del audio (mp3) de quien lo hizo y cuando y donde */
    /* Se cambio los cracteres de hora,dia, minutos en lugar de los ':' dos punto por que cada qwue se insertava como ruta marcaba error por el tipo de caracteres*/
    $nombre_audio = "Reporte_de_" . $id_usuario . "_el_" . str_replace(':', '_', $fecha) . ".mp3";

    // Ruta completa del archivo de audio en el servidor
    $ruta_audio = $carpeta_destino . $nombre_audio;

    $contenidoreporte = $ruta_audio;

    // Intenta mover el archivo de audio a la carpeta de destino
    if (move_uploaded_file($_FILES['audio']['tmp_name'], $ruta_audio)) {
        // El archivo de audio se movió exitosamente, puedes devolver una respuesta al cliente si es necesario
        echo "Archivo de audio guardado exitosamente. Ruta: " . $ruta_audio;
    } else {
        // Hubo un error al mover el archivo de audio
        echo "Error: No se pudo guardar el archivo de audio en el servidor.";
    }
} else {

    //TEXTO (array con los ids)

    // No se recibió ningún archivo de audio en la solicitud POST
    // Entonces SIGNIFICA que es reporte de tipo img/texto y obtenemos los valores de el array[] que hicimos en el js
    $jsondata = $_POST['data']; // obetenemos los datos enviados por el js por el metodo que envia el ajax y lo guardamos en una variable cualquiera
    $array = json_decode($jsondata); /* Deciframos los datos y los guardamos en un array (vienen del js en un array) */

    $id_tipo_reporte = $array[0]; /* Primera posicion del array trae el tipo reporte */
    $id_tipo_usuario = $array[1]; /* Segunda posicion del array trae el tipo de usuario reportado */
    $id_grado = $array[2]; /* Tercera posicion del array trae el grado del reportado */
    $id_grupo = $array[3]; /* Cuarta posicion del array trae el grupo del reportado */
    $id_usuario_reportado = $array[4]; /* Quinta posicion del array trae el usuario reportado */
    $contenidoreporte = $array[5]; /* Sexta posicion del array trae el Contenido de reporte*/
}

/*Ya DESPUES de saber que tipo de datos fueron...*/

/* Si grado, grupo y id usuario reportado son vacion o no fueron enviados quiere decir que es de tipo padre el reporte */
if ($id_grado == "" && $id_grupo == "" && $id_usuario_reportado == "") {

    /* Obtenemos al papa para actualizar la variable de usuario reportado de nada a id__usuario del papa */
    $querypapa =   "SELECT p.id_usuario
                    FROM padres AS p
                    INNER JOIN alumnos AS a ON a.id_padre = p.id_padre
                    WHERE a.id_usuario = $id_usuario";

    $consultapapa = mysqli_query($conexion, $querypapa); /* Ejecutamos la consulta */

    if (mysqli_num_rows($consultapapa) > 0) { /* si devuelve algo */
        $row = mysqli_fetch_array($consultapapa); /* guardamos en row el array que devuelve */

        $id_usuario_reportado = $row['id_usuario']; /* actualizamos la variable con el dato que esta en el array en la posicion de 'id_usuario' */
    } else {
        echo "Error al consultar padre";
    }
}


//Ifs que clasifican si es un reporte img o txt o audio segun el id_tipo_reporte para asignar valor al query
if ($id_tipo_reporte == 1) { //reporte imagen , si es imagen el query obtiene el formato de insercion de img/sensaciones
    $query = "INSERT INTO reportes (id_reporte, id_tipo_reporte, id_usuario, id_usuario_reportado, fecha_reporte, id_sensacion, texto_reporte, audio_reporte) 
    VALUES (NULL, $id_tipo_reporte, $id_usuario, $id_usuario_reportado, '$fecha', $contenidoreporte, NULL, NULL)";
} else if ($id_tipo_reporte == 2) { //reporte escrito , si es texto el query obtiene el formato de insercion de contenido txt
    $query = "INSERT INTO reportes (id_reporte, id_tipo_reporte, id_usuario, id_usuario_reportado, fecha_reporte, id_sensacion, texto_reporte, audio_reporte) 
    VALUES (NULL, $id_tipo_reporte, $id_usuario, $id_usuario_reportado, '$fecha', 2 , '$contenidoreporte', NULL)";
} else if ($id_tipo_reporte == 3) { //reporte audio , si es imagen el query obtiene el formato de insercion de ruta o audio
    $query = "INSERT INTO reportes (id_reporte, id_tipo_reporte, id_usuario, id_usuario_reportado, fecha_reporte, id_sensacion, texto_reporte, audio_reporte) 
    VALUES (NULL, $id_tipo_reporte, $id_usuario, $id_usuario_reportado, '$fecha', 2, NULL , '$contenidoreporte')";
}

$consulta = mysqli_query($conexion, $query); /* Se ejecuta la consulta con la base de datos*/

/* Si se hace la conmsulta bien (no hacer con numrows, eso regresa cadenas y no pedimos cadenas solo insertamos)*/
if ($consulta) {
    echo "Se inserto con exito crack"; /* correcto Se envia como respuesta al ajax en 'response' */
} else {
    echo "Fallo al insertar"; /* fallo algo Se envia como respuesta al ajax en 'response' */
}
