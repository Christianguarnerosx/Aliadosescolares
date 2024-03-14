<?php
/*PARA QUE FUNCION EL CODIGO a donde lo importas se debe iniciar una variable de session de php*/

/*Funcion para obtener el fondo*/ 
include("../../Servidor/Conexion.php"); /*Incluimos la conexion (OJOOOO se debe calcular la ruta desde donde se manda atraer no desde aqui) */
/* Para que se importe bien la conexion es necesario que sea SOLO include() porqueeeee si utilizas include_once() marca error*/

$id = $_SESSION['usuario']; /*Mandamos a llamar a la variable sesion y la asignamos a una nieva variable (id)*/

$query = "SELECT fondo FROM usuarios WHERE id_usuario = $id"; /*Declaramos la consulta*/
$consulta = mysqli_query($conexion, $query); /* Ejecutamos la consulta mandando la conexion y la consulta*/

if (mysqli_num_rows($consulta) > 0) { /*si la consulta devuelve algo*/
    $row = mysqli_fetch_array($consulta); /*guardamos en la variable row todo lo que nos regreso por campos*/
    /*Se utuliza a row por que almaceno lo obtenido de la consulta y se manda a traer el campo ['campo']*/
/*Cierre temporal del php para poder crear html el cual sera quine se vaya al importar este archivo*/
?>
    <style>
        /*Para que funcione bien se debe hacer con el **ID** y NO con clases. Si no hace un fallo al utilizar las variables de session*/
        /*MUY IMPORTANTE que la conexion hacia la session este hasta arriba Antes Que ESTE CODIGO SIEMPRE*/
        /*Para poder asignar el fondo en cada interfaz es necesario que sea en file html/.php ya que en uno .css no puede hacer conexion con*/
        #contenedor-plantillaalm {
            background-image: url('<?php echo "" . $row['fondo'] ?>'); /*Se utiliza la variable creada en el if 'row' para obtener el fondo de el usuario*/
        }
    </style>
<?Php
}
mysqli_close($conexion);
?>