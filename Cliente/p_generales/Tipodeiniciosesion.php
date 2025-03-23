<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icono de la pagina -->
    <link rel="icon" type="image/x-icon" href="../imagenes/logos/logoaliados.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Enlace al archivo CSS separado que importa los estilos -->
    <link href="../css/estilos.css" rel="stylesheet">
    <title>Tipo de sesión</title>
</head>

<body>
    <!--Contenedor principal que se centra en medio (centrar div)-->
    <div class="container-fluid centrar fondo" id="contenedor-tiposesion"> <!--Se utiliza el body para ponerle un fondo de imagen a toda la pantalla-->
        <div class="row txt-blanco"> <!--Se utiliza centrar-vertical para poder darle un margen a lo alto-->

            <a href="iniciodinamicoescanearqr.php" class="col opciontiposesion decoracion-no txt-blanco borde-r-m"> <!-- OJO  Un a con clase COL para manejar las tarjetas como a con links (abajo). Las dos columnas en donde cada una albergara una tarjeta--> <!--Tarjeta 1 aqui se declara el fondo de la tarjeta-->
                <div class="row filatextotiposesion">
                    <h1 class="titulo-m">Inicio dinámico</h1>
                    <p class="text-m">En este inicio necesitarás de tu QR para iniciar sesión</p>
                </div>
            </a>

            <a href="Inicionormal.php" class="col opciontiposesion decoracion-no txt-blanco borde-r-m"> <!--Tarjeta 2 aqui se declara el fondo de la tarjeta con class opciontiposesion-->
                <div class="row filatextotiposesion">
                    <h1 class="titulo-m">Inicio normal</h1>
                    <p class="text-m">Aquí ingresarás con tu id y cotraseña</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

</body>

</html>