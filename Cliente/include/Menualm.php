<!--Para que funcione bien el menu con la logica de menus en principalalm -->
<!--Es muy importante no tener los links de bootstrap, ya que si no entraran en conflicto al tener dos en principal alm y no funcionara -->
<!--En todo el documento se utilizan rutas locales de donde se va a importar el doc-->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--Estilos propios CSS -->
    <link rel="stylesheet" href="../css/estilos.css">

</head>

<body>
    <div class="row centrar espacio-top-c" id="imagentextomenualm">
        <div class="row centrar-h alinear-center espacio-top-c">
            <img class="avatar-c" src="<?php include("../../Servidor/funciones_session/session_avatar.php"); ?>" alt=""> <!--Img  de menu Debe de ponerse la ruta calculada desde donde se manda a traer en este caso es para la de menual pricnipal-->
            <h1 class="text-c txt-blanco" id="tipousuariomenualm"> <?php include_once("../../Servidor/funciones_session/session_nombretipousuario.php") ?> </h1>
            <h1 class="text-m txt-blanco" id="nombremenualm"> <?php include_once("../../Servidor/funciones_session/session_nombreapa.php") ?> </h1>
        </div>
    </div>
    <div class="row centrar" id="navmenualm">
        <nav class="nav nav-pills flex-column text-g"> <!--Se asigna el tamano de texto dentro del nav (solo afecta a los "a" nav link)-->
            <a class="nav-link" aria-current="page" href="Principalalm.php">Inicio</a>
            <a class="nav-link" aria-current="page" href="Tutoriasalm.php">TutorIAs</a>

            <!-- se creo una clase personal 'drop', que asigna a todos los dropdowns el mismo tamaño sin importar lo que diga(sin esta clase, tomaran el tamaño segun el contenido) -->
            <!-- se creo una clase personal 'hoverdrop' que se asigna a todos los dropdowns, se utiliza con js para que se abran al sobrteponer el mouse(sin dar click) -->
            <!-- boton dezplegable/droptown de... -->
            <div class="btn-group">
                <a href="Reportealm.php" class="btn nav-link drop-g text-g alinear-left display-f centrar-v decoracion-no c">Aliados</a> <!--Aqui tambien se debe de cambiar el tamano del texto por que al ponerselo al nav solo agarra a los nav-link-->
                <button type="button" class="btn nav-link dropdown-toggle dropdown-toggle-split text-m hoverdrop" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu text-m menualmdrop"> <!--La clase menualmdrop hace que al abrir los dropdowns los menus dezplegados se vallan mas a la izq y se ubiquen a su lado-->
                    <li><a class="dropdown-item" href="Reportealm.php">Reporte aliado</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <?Php
                    /*PARA QUE FUNCION EL CODIGO a donde lo importas se debe iniciar una variable de session de php*/

                    /*Funcion para obtener el nombre y apellido paterno*/
                    include("../../Servidor/Conexion.php"); /*Incluimos la conexion (OJOOOO se debe calcular la ruta desde donde se manda atraer no desde aqui) */
                    /* Para que se importe bien la conexion es necesario que sea SOLO include() porqueeeee si utilizas include_once() marca error*/

                    $tipousuario = 0;
                    $id = $_SESSION['usuario']; /*Mandamos a llamar a la variable sesion y la asignamos a una nieva variable (id)*/
                    $query = "SELECT id_tipo_usuario FROM usuarios WHERE id_usuario = $id"; /*Declaramos la consulta*/
                    $consulta = mysqli_query($conexion, $query); /* ejecutamos la consulta mandando la conexion y la consulta*/

                    if (mysqli_num_rows($consulta) > 0) { /*si la consulta devuelve algo*/
                        $row = mysqli_fetch_array($consulta); /*guardamos en la variable row todo lo que nos regreso por campos*/
                        /*Se utuliza a row por que almaceno lo obtenido de la consulta y se manda a traer el campo ['campo']*/
                        $tipousuario = $row['id_tipo_usuario']; /*Mensaje que se va a mostrar*/

                        if ($tipousuario == 4 || $tipousuario == 3) {
                            echo "<li><a class='dropdown-item' href='Reportesestadistica.php'>Mis reportes</a></li>";
                        } else {
                            echo "<li><a class='dropdown-item' href='Reportesestadistica.php'>Estadisticas Aliados</a></li>";
                        }
                    }

                    echo "</ul>
                </div>";
                    if ($tipousuario == 6) {
                        echo '<a class="nav-link" href="Psicologos.php">Psicologo</a>';
                    }
                    mysqli_close($conexion);
                    ?>

                    <a class="nav-link" href="Desarrolloestadisticas.php">Mi desarrollo</a>
                    <a class="nav-link" href="Generarqr.php">Generar QR</a>
                    <a class="nav-link" id="btncerrarsesion" href="../../Servidor/Cerrarsesion.php">Salir</a>
        </nav>
    </div>

    <div class="row alinear-center" id="piemenualm">
        <p>@Copyright Aliadosescolares 2024</p>
    </div>

</body>

</html>