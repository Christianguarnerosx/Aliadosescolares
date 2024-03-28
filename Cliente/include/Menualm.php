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
    <div class="container-fluid">
        <div class="row centrar-h espacio-top-c">
            <img class="avatar-c" src="<?php include("../../Servidor/funciones_session/session_avatar.php"); ?>" alt=""> <!--Img  de menu Debe de ponerse la ruta calculada desde donde se manda a traer en este caso es para la de menual pricnipal-->
        </div>
        <div class="row espacio-top-m">
            <nav class="nav nav-pills flex-column text-m"> <!--Se asigna el tamano de texto dentro del nav (solo afecta a los "a" nav link)-->
                <a class="nav-link active" aria-current="page" href="Principalalm.php">Inicio</a>

                <!-- se creo una clase personal 'drop', que asigna a todos los dropdowns el mismo tamaño sin importar lo que diga(sin esta clase, tomaran el tamaño segun el contenido) -->
                <!-- se creo una clase personal 'hoverdrop' que se asigna a todos los dropdowns, se utiliza con js para que se abran al sobrteponer el mouse(sin dar click) -->
                <!-- boton dezplegable/droptown de... -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary drop-g text-m alinear-left">Aliados</button> <!--Aqui tambien se debe de cambiar el tamano del texto por que al ponerselo al nav solo agarra a los nav-link-->
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split text-m hoverdrop" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu text-m menualmdrop"> <!--La clase menualmdrop hace que al abrir los dropdowns los menus dezplegados se vallan mas a la izq y se ubiquen a su lado-->
                        <li><a class="dropdown-item" href="Reportealm.php">Reporte aliado</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Mis stacks</a></li>
                    </ul>
                </div>


                <!-- se creo una clase personal 'drop', que asigna a todos los dropdowns el mismo tamaño sin importar lo que diga(sin esta clase, tomaran el tamaño segun el contenido) -->
                <!-- se creo una clase personal 'hoverdrop' que se asigna a todos los dropdowns, se utiliza con js para que se abran al sobrteponer el mouse(sin dar click) -->
                <!-- boton dezplegable/droptown de... -->
                <!-- Btn(dropdown) de tutorias -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary drop-g text-m alinear-left">TutorIAs</button> <!--Aqui tambien se debe de cambiar el tamano del texto por que al ponerselo al nav solo agarra a los nav-link-->
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split text-m hoverdrop" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span> <!-- flecha del dropdown -->
                    </button>
                    <ul class="dropdown-menu text-m menualmdrop"> <!--La clase menualmdrop hace que al abrir los dropdowns los menus dezplegados se vallan mas a la izq y se ubiquen a su lado-->
                        <li><a class="dropdown-item" href="Psicologiaalm.php">PsicologIA</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item alinear-center">Mis tutorIAs</a></li>
                    </ul>
                </div>

                <a class="nav-link" href="#">Track</a>
                <a class="nav-link active" href="Generarqr.php">Generar QR</a>
            </nav>
        </div>
    </div>

</body>

</html>