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

    <title>Bienvenido</title>

    <!--Si se van a  utilizar variables de  SESSION  Hay una "regla" que dice que la variable session debe de iniciar antes de entradas de html-->
    <!--Si quieres iniciar la session donde se manda atraer en el nombre dara errores como session indefinida/no iniciada       -->
    <?php
    session_start();
    include_once("../../Servidor/funciones_session/session_fondo.php"); /*Mandamos a traer el fondo de la db y se lo aplicamos a un css que aqui importaremos*/
    ?>

</head>

<body class="scroll-body-no">
    <div class="container-fluid">
        <div class="row">

            <!--Columna de menus se abre dando click al boton menu, aqui se manda a traer las opciones posibles a configuar-->
            <!--La clase collapse propia de bootstrap 5, utilizada para poder ocultar/contraer columnas y hacer el efecto de menu-->
            <div class="col-2 collapse" id="colmenuplantillaalm"> <!--Barra menu de la izq. Principalmente esta colapsada (no se ve)    TAMBIEN se utiliza el tama;o de col por que si no no obtiene el tamano que se le asigan en el css-->
                <?php
                include("../include/Menualm.php");
                ?>
            </div>

            <!--columna utilizada para el contenido principal de la interfaz (no opciones lo de en medio) aqui van los botones que abren las demas columnas (menu/configuraciones)-->
            <div class="col centrar fondo" id="contenedor-plantillaalm">

                <!--Botones que activan menus/extras sobre el contenedro principal porque si se ponen en las columnas obvio no aparecerian -->
                <button type="button" id="btn-menu-plantillaalm" class="btn-transparente" data-bs-toggle="collapse" data-bs-target="#colmenuplantillaalm" aria-expanded="false" aria-controls="colmenuplantillaalm">
                    <img src="../imagenes/iconos/menudesactivado.png" class="icono-btn rotar-90" alt="">
                </button>
                <button type="button" id="btn-extras-plantillaalm" class="btn-transparente" data-bs-toggle="collapse" data-bs-target="#colconfigplantillaalm" aria-expanded="false" aria-controls="colconfigplantillaalm">
                    <img class="icono-btn" src="<?php include("../../Servidor/funciones_session/session_avatar.php"); ?>" alt=""> <!--Se obtiene el avatar con php la clse icono avatar hace referencia al 100% del padre(el tama;o del boton)-->
                </button>

                <!--1 contenedor de cuadro blanco ya el contenido de enmedio/principal de la interfaz-->
                <section id="plantillaalm-cuadro" class="cuadro-fondo centrar blanco-transparente borde-r-c"> <!--El id se ha utilizado para poner su position relative y asi sea refremcia de otros elementos-->
                    <!--Logo del contenedor de contenido de enmedio-->
                    <img id="plantillaalm-logo" class="logo-c" src="../imagenes/logos/logoaliadoshorizontal.gif" alt="">
                    <!--Contenedor principal (central) de todos los componentes de la interfaz-->

                    <!-- Este es el contendor de las card/opciones que muestras acciones de la app en la interfaz principal-->
                    <!-- A este main se le aplicara un scroll en y cuando el contenido se deborde, solo se oculta el scroll x y se asigna un tama;o-->
                    <main class="row"> <!--Para que pueda funcionar el centrar y evitar otro juego de col y row, se convierte el main en row y centramos su contenido-->
                        <div class="col"> <!-- AQUI LLEVA EL CONTENIDO QUE lleva la interfaz-->
                            <?php include("../componentes_php/componente_psicologia.php");?>
                        </div>
                    </main>

                </section>
            </div>

            <!--Columna de configuracion se abre dando click al avatar, aqui se manda a traer las opciones posibkes a configuar-->
            <div class="col collapse" id="colconfigplantillaalm"> <!--Barra menu de la izq-->
                <?Php include("../include/Configusuariosalm.php") ?>
            </div>
        </div>
    </div>

    <!--Nota solo dejar un link que mande a traer bootstrap para que la clase collapse funcione-->
    <!-- Option 1: Bootstrap Bundle with Popper ideal para funciones js de bootstrap y hacer funcionar y activar acciones-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!--Sweet alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!--js de menu-->
    <script src="../js/recibe_alertas.js"></script> <!--Sirve para que llegue y muestre la alerta de iniciado sesion con exito//avatarconfirm/fondo confirm-->
    <script src="../js/JSPlantillas/logica_menu_plantilla.js"></script> <!--Sirve para poder hacer funcionar las col como menus-->
    <script src="../js/hover_drops.js"></script> <!--Sirve para que los las flechas de los drops se abran automaticamente al sobreponer el mouse-->

    <!--Js de esta interfaz-->
</body>

</html>