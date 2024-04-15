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
    <div class="row" id="navmenualm">
        <nav class="nav nav-pills flex-column text-g"> <!--Se asigna el tamano de texto dentro del nav (solo afecta a los "a" nav link)-->
            <a class="nav-link" aria-current="page" href="Principalalm.php">Inicio</a>
            <a class="nav-link" aria-current="page" href="Tutoriasalm.php">TutorIAs</a>

            <!-- se creo una clase personal 'drop', que asigna a todos los dropdowns el mismo tamaño sin importar lo que diga(sin esta clase, tomaran el tamaño segun el contenido) -->
            <!-- se creo una clase personal 'hoverdrop' que se asigna a todos los dropdowns, se utiliza con js para que se abran al sobrteponer el mouse(sin dar click) -->
            <!-- boton dezplegable/droptown de... -->
            <div class="btn-group">
                <a href="Reportealm.php" class="btn nav-link drop-g text-g alinear-left display-f centrar-v decoracion-no c">Aliados</a> <!--Aqui tambien se debe de cambiar el tamano del texto por que al ponerselo al nav solo agarra a los nav-link-->
                <button type="button" class="btn nav-link btn-primary dropdown-toggle dropdown-toggle-split text-m hoverdrop" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu text-m menualmdrop"> <!--La clase menualmdrop hace que al abrir los dropdowns los menus dezplegados se vallan mas a la izq y se ubiquen a su lado-->
                    <li><a class="dropdown-item" href="Reportealm.php">Reporte aliado</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="Reportesestadistica.php">Mis Reportes</a></li>
                </ul>
            </div>

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