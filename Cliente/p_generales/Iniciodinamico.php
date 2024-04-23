<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Enlace al archivo CSS separado que importa los estilos -->
    <link href="../css/estilos.css" rel="stylesheet">

    <title>Inicia sesion</title>

    <!-- Back que obtiene el id de la url que se manda aqui (desde el js que obtiene el codigo del qr(el js que decifra el qr)) -->
    <!-- Utiliza para separar alumnos y otros usuaros (ya que solo los alumnos pueden ingresar a este apartado) -->
    <?php include_once("../../Servidor/qrtipousuarios.php") ?>
</head>

<body> <!--Se utiliza el contenedor para darle un fondo de imagen-->
    <div class="container-fluid fondo contenedor-iniciodinamico centrar">
        <section class="cuadro-h blanco-transparente borde-r-c   centrar">
            <div class="row">
                <div class="col">
                    <div class="row espacio-top-m alinear-center">
                        <div class="col">
                            <img src="../imagenes/logos/logoaliadoshorizontal.gif" class="logotopleft">
                            <h1 class="titulo-m"><span class="text-m">Hola </span><?php include_once("../../Servidor/funciones_session/session_nombreapa.php"); ?> <!--Manda a el nombre que se obtiene por la variable session--></h1>
                            <span class="text-m espacio-top-m">Presiona el boton para iniciar</span>
                        </div>
                    </div>
                    <div class="row espacio-top-c">
                        <div class="col">
                            <!--El form mandara los datos hacia donde dicta action "autenticar sesion" (recuerda que debes de recibirlos en ese file con el metodo que se envia) "Post"-->
                            <form action="../../Servidor/autenticardinamico.php" method="POST"> <!--Manda a el back 2 parametros 1(correo o id) 2(contraseña)-->
                                <div>
                                    <input type="hidden" value="<?php echo "" . $id; ?>" name="usuario">
                                    <input type="hidden" value="<?php include_once("../../Servidor/funciones_session/session_pass.php"); ?>" name="contraseña">
                                </div>
                                <div class="espacio-top-c alinear-center">
                                    <button type="submit" class="btn-g btn-azul borde-r-m text-c txt-blanco negrita hover-btn">Comenzar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!--Libreria Sweet alert externa que hace posible las alertas-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!--Script perzonalizado que manda a traer la alerta si es alumno-->
    <script src="../js/alerta_autenticacion.js"></script>
</body>

</html>