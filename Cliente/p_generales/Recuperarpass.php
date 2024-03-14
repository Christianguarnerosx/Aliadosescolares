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

    <title>Recuperar cuenta</title>
</head>

<body> <!--Se utiliza el contenedor para darle un fondo de imagen-->
    <div class="container-fluid fondo contenedor-inicionormal centrar">
        <section class="cuadro-v blanco-transparente centrar alinear-center">
            <div class="row">
                <div class="col">
                    <div class="row espacio-top-c">
                        <div class="col">
                            <img src="../imagenes/logos/logoaliadosvertical.gif" class="logo-m">
                            <h1 class="text-m espacio-top-m">Hola ¿Olvidaste tu contraseña?</h1>
                            <p class="text-c espacio-top-c">Para tener acceso otra vez ingresa algunun dato</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <!--El form mandara los datos hacia donde dicta action "autenticar sesion" (recuerda que debes de recibirlos en ese file con el metodo que se envia) "Post"-->
                            <form action="../../Servidor/mandarcorreos.php" method="POST"> <!--Manda a el back 2 parametros 1(correo o id) 2(contraseña)-->
                                <div class="form-floating input-g espacio-top-c">
                                    <input type="text" class="form-control input-g text-c" id="floatingInput" name="usuario" placeholder="name@example.com">
                                    <label for="floatingInput">ID o Correo electronico</label> <!--Se manda a el back con el name del input-->
                                </div>
                                <div class="row espacio-top-c">
                                    <div class="col"> <!--Este col hace que el tamaño del boton no sea el de toda la row y se pueda centrar-->
                                        <a href=""><button type="submit" class="btn-g btn-naranja borde-r-m text-c txt-blanco negrita hover-btn">Mandar</button></a>
                                    </div>
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

    <!--Script perzonalizado que manda a traer la alerta-->
    <script src="../js/alerta_consulta_recuperarpass.js"></script>
</body>

</html>