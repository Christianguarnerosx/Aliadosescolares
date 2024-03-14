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

    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>

    <title>Inicia sesion</title>
</head>

<body> <!--Se utiliza el contenedor para darle un fondo de imagen-->
    <div class="container-fluid fondo contenedor-iniciodinamico centrar">
        <section class="blanco-transparente borde-r-c centrar alinear-center escanear-qr">
            <div class="col ">
                <div class="row espacio-top-c">
                    <h1 class="titulo-m">Escannea tu QR</h1>
                </div>
                <div class="row espacio-top-m espacio-top-c">
                    <video id="qr-video" class="camaraqr" autoplay></video>
                    <p class=" display-no">ID: <span id="id-display"></span></p>
                </div>
            </div>

        </section>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="../js/leer_qrinicio.js"></script>

</body>

</html>