<!--Hola christian me e actualizado-->
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

    <title>Hello, world!</title>
</head>

<!--Si se van a  utilizar variables de  SESSION  Hay una "regla" que dice que la variable session debe de iniciar antes de entradas de html-->
<!--Si quieres iniciar la session donde se manda atraer en el nombre dara errores como session indefinida/no iniciada       -->
<?php
session_start();
?>

<body>
    <div class="container-fluid fondo contenedor-elegiravatar display-f centrar">
        <section class="cuadro-h blanco-transparente centrar">
            <div class="row centrar">
                <div class="col-4">
                    <h1 class="text-g">Hola
                        <?Php include("../../Servidor/funciones_session/session_nombre.php") ?>,<!--Mandamos a trear una funcion que obtienen el nombre de la session iniciada (Para esto se debe corroborar si se inicio la session_start en este documento)-->
                        <br>
                        <span class="text-m">Escoge un vatar</span>
                        <br>
                        <span class="text-c">(No te preocupes mas adelante podras cambiarlo)</span>
                    </h1>
                </div>
                <div class="col-7 scroll-y centrar">
                    <!-- Se manda a traer el componentes que traer los avatar, para que funcione debe haber sido importado el js (<script src="js/confirmar_avatar.js"></script>)-->
                    <?php include("../componentes_php/componente_elegir_avatar.php"); ?>
                </div>
            </div>
        </section>
    </div>

    <!-- Framework jQuery --> <!--Utilizado para que sirva la seleccion de avatar, sin este no funciona el js que fue seleccionado-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper ideal para funciones js de bootstrap y hacer funcionar y activar acciones-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS ideal para funciones js de bootstrap y hacer funcionar y activar acciones-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <!--Sweet alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="../js/confirmar_avatar.js"></script> <!--js que obtiene la ruta del avatar que fue clickeado y lo manda al back php para insertar en la base de datos-->

</body>

</html>