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
    <div class="container-fluid display-f centrar-h" id="contenedor-configusuariosalm"> <!--Asigna el tama;o que tendra el contenedor de las configuraciones y las centra horizontalmente -->
        <div class="row">
            <div class="col">
                <div class="row alinear-center"> <!--Deja todo alineado para que este centrado de manera correcta-->
                    <!--La calse de opcionconfigusu de los elementos 'a' es para asignar el mismo contenedor/"layout" de todas las opciones abiertas-->
                    <a href="" id="configavataralm" class="opcionconfigusu centrar decoracion-no txt-blanco hover-btn">
                        <h1 class="text-g tituloopcionesextra"><img src="../imagenes/iconos/avatarblanco.png" alt=""> Avatar</h1>
                    </a>
                    <a href="" id="confifondoalm" class="opcionconfigusu centrar decoracion-no txt-blanco hover-btn">
                        <h1 class="text-g tituloopcionesextra"><img src="../imagenes/iconos/fondoblanco.png" alt="">Fondo</h1>
                    </a>
                    <a href="" id="confiapodoalm" class="opcionconfigusu centrar decoracion-no txt-blanco hover-btn">
                        <h1 class="text-g tituloopcionesextra"><img src="../imagenes/iconos/tema.png" alt="">Tema</h1>
                    </a>
                </div>
                <div class="row">
                    <!--Conetenedor de cambiar avatar (inicialmente esta collapsado)--> <!-- Se utiliza el id para hacer la logica de comportamiento de como abrir y cerrar contenedores con js-->
                    <div class="collapse opcionconfigusualm scroll-y alinear-center borde-r-c" id="contenedor-cambiaravataralm">
                        <h1 class="espacio-top-c text-g txt-blanco"> Elige tu nuevo avatar</h1>
                        <!-- Se manda a traer el componentes que traer los avatar, para que funcione debe haber sido importado el js (<script src="js/confirmar_avatar.js"></script>)-->
                        <?php include_once("../componentes_php/componente_elegir_avatar.php"); ?>
                    </div>

                    <!--Conetenedor de cambiar fondo (inicialmente esta collapsado)--> <!-- Se utiliza el id para hacer la logica de comportamiento de como abrir y cerrar contenedores con js-->
                    <div class="collapse opcionconfigusualm scroll-y alinear-center borde-r-c" id="contenedor-cambiarfondoalm">
                        <!-- Estas clases asignan tamaño/ animacion sobreponer / espacio de arriba.   El onclick es de java y de jquery al parecer, Manda a una funcion la ruta que se declara--->
                        <h1 class="espacio-top-c text-g txt-blanco"> Elige tu nuevo fondo</h1>
                        <?php include_once("../componentes_php/componente_elegir_fondo.php"); ?>
                    </div>

                    <!--Conetenedor de cambiar apodo (inicialmente esta collapsado)--> <!-- Se utiliza el id para hacer la logica de comportamiento de como abrir y cerrar contenedores con js-->
                    <div class="collapse opcionconfigusualm centrar borde-r-c alinear-center" id="contenedor-cambiarapodoalm">
                        <!-- Aun no se comienza -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Framework jQuery --> <!--Utilizado para que sirva la seleccion de avatar, sin este no funciona el js de que fue seleccionado (el onclick de js)-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--Mandamos a traer la logica de como se dezplegan los contenedores de las opciones-->
<script src="../js/logica_config_menu_principal.js"></script>

<script src="../js/confirmar_avatar.js"></script>
<script src="../js/confirmar_fondo.js"></script>

</html>