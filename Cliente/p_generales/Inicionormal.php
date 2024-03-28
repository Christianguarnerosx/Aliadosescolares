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
</head>

<body> <!--Se utiliza el contenedor para darle un fondo de imagen-->
    <div class="container-fluid fondo contenedor-inicionormal centrar">
        <section class="cuadro-v blanco-transparente centrar">
            <div class="row">
                <div class="col">
                    <div class="row alinear-center">
                        <div class="col">
                            <img src="../imagenes/logos/logoaliadosvertical.gif" class="logo-m">
                            <h1 class="text-m espacio-top-c">Bienvenid@, inicia sesion</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <!--El form mandara los datos hacia donde dicta action "autenticar sesion" (recuerda que debes de recibirlos en ese file con el metodo que se envia) "Post"-->
                            <form action="../../Servidor/autenticar.php" method="POST"> <!--Manda a el back 2 parametros 1(correo o id) 2(contraseña)-->
                                <div class="form-floating mb-2 input-g">
                                    <input type="text" class="form-control text-c" id="floatingInput" name="usuario" placeholder="name@example.com">
                                    <label for="floatingInput">Correo/ID</label> <!--Se manda a el back con el name del input-->
                                </div>
                                <div class="form-floating input-g">
                                    <input type="password" class="form-control text-c" id="floatingPassword" name="contraseña" placeholder="Password">
                                    <label for="floatingPassword">Contraseña</label> <!--Se manda a el back con el name del input-->
                                </div>
                                <div class="row espacio-left-c">
                                    <div class="col"> <!--Este col hace que el tamaño del boton no sea el de toda la row y se pueda centrar-->
                                        <a href="Recuperarpass.php" class="text-c hover-link decoracion-no" id="olvidasteinicionormal">¿Olvidaste tu contraseña?</a> <!--Hace que el form se ejecute y manda a la direccion del action del form-->
                                    </div>
                                </div>
                                <div class="row espacio-top-c alinear-center">
                                    <div class="col"> <!--Este col hace que el tamaño del boton no sea el de toda la row y se pueda centrar-->
                                        <a href=""><button type="submit" class="btn-m btn-azul borde-r-m text-c txt-blanco negrita hover-btn">Comenzar</button></a>
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
    <script src="../js/alerta_autenticacion.js"></script>
</body>

</html>