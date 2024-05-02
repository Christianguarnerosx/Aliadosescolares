<!--Hola Christian me he actualizado-->
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="./Cliente/imagenes/logos/logo aliadosescolares.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!-- Enlace al archivo CSS separado que importa los estilos -->
  <link href="Cliente/css/estilos.css" rel="stylesheet">

  <title>Inicio</title>
</head>

<body>
  <div class="container-fluid centrar fondo" id="contenedor-espera"> <!--Contenedor principal donde se le adjunta un background de imagen-->
    <img src="Cliente/imagenes/logos/logosinfondo.gif" alt="" class="logotopleft">

    <div class="row centrar">
      <div class="col">
        <div class="row alinear-center txt-blanco"> <!--Fila que centra/deja espacio arriba verticalmente el contenido-->
          <div class="col">
            <h1 class="titulo-g negritas">Venustiano Carranza</h1>
            <h2 class="titulo-m negrita">Aliados Escolares</h2>
            <p class="text-m">Comunidad estudiantil <span id="texto-animado-espera"></span></p> <!--Este span es utilizado para hacer el efecto de maquina de escribir lleva un js llamado efecto_maquina_escribir-->
          </div>
        </div>


        <!--La fila que contiene a los 2 botones redondos de la interfaz espera-->
        <div class="row centrar alinear-center espacio-top-c">
          <div class="col-4"> <!--Se asigna el tamaño de la col-2 (para moverlas ) para poder hacer mas pequeña las col y se centren porque si no tendra tamaño -6 por defecto (en caso de 2 columnas/16) y se iran a las orillas-->
            <a href="">
              <button class="btn-espera btn-circular txt-blanco text-c" id="btntutoriaespera"> <!--Button IA-->
                <img class="icono-c" src="Cliente/imagenes/iconos/iconoplay.png" alt="">
                <span>TutorIA</span>
              </button>
            </a>
          </div>

          <div class="col-4"> <!--Se asigna el tamaño de la col-2 para poder hacer mas pequeña las col y se centren porque si no tendra tamaño -6 por defecto (en caso de 2 columnas/16) y se iran a las orillas-->
            <a href="Cliente/p_generales/Tipodeiniciosesion.php">
              <button class="btn-espera btn-circular txt-blanco text-c" id="btninicioespera"> <!--Button Inicio-->
                <span>Explorar</span>
              </button>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

  <script src="Cliente/js/efecto_maquina_escribir.js"></script>
</body>

</html>