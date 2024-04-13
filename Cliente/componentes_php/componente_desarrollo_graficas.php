<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="row centrar" id="contenedordesarrollo">
    <h1 hidden id="nombreusuariodesarollo"> <?php include_once("../../Servidor/funciones_session/session_nombre.php") ?> </h1>
    <div class="row contenedorstacksdesarrollo centrar alinear-center" id="filacontenedor1">
        <div class="contenedorgraficadesarrollo alinear-center" id="contenedorgrafica1">
            <h1 class="text-c txt-blanco"> Utilización de IA</h1>
            <canvas class="graficadesarrollo" id="graficaia1"></canvas>
        </div>
        <div class="contenedorgraficadesarrollo">
            <h1 class="text-c txt-blanco"> Mis Reportes </h1>
            <canvas class="graficadesarrollo" id="graficareportes"></canvas>
        </div>
        <?php
        /*Funcion para obtener el nombre y apellido paterno*/
        include("../../Servidor/Conexion.php"); /*Incluimos la conexion (OJOOOO se debe calcular la ruta desde donde se manda atraer no desde aqui) */
        /* Para que se importe bien la conexion es necesario que sea SOLO include() porqueeeee si utilizas include_once() marca error*/

        $id = $_SESSION['usuario']; /*Mandamos a llamar a la variable sesion y la asignamos a una nieva variable (id)*/
        $query = "SELECT id_tipo_usuario FROM usuarios WHERE id_usuario = $id"; /*Declaramos la consulta*/
        $consulta = mysqli_query($conexion, $query); /* ejecutamos la consulta mandando la conexion y la consulta*/

        if (mysqli_num_rows($consulta) > 0) { /*si la consulta devuelve algo*/
            $row = mysqli_fetch_array($consulta); /*guardamos en la variable row todo lo que nos regreso por campos*/
            /*Se utuliza a row por que almaceno lo obtenido de la consulta y se manda a traer el campo ['campo']*/

            if ($row['id_tipo_usuario'] == 4) {
                echo "<div class='contenedorgraficadesarrollo centrar'>
                        <div class='row'>
                            <h1 class='text-c txt-blanco'> Historial académico </h1>
                            <canvas class='graficadesarrollo' id='graficacalificacion'></canvas>
                        </div>
                    </div>";
            }
        }
        mysqli_close($conexion);
        ?>
    </div>

    <div class="contenedorstacksdesarrollo centrar" id="filacontenedor2">
        <div class="row centrar alinear-center">
            <h1 class="titulo-g" id="contadorreportes">0</h1>
            <h1>Numero de reportes</h1>
        </div>
        <div class="row centrar alinear-center">
            <h1 class="titulo-g" id="contadorpeticiones">0</h1>
            <h1>Numero de Peticiones</h1>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navdesarrollo">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Opciones</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse centrar espacio-right-m" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#filacontenedor1"> Uso de mi app </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#filacontenedor2" id="btnestadisticasdesaarrollo"> Mis estadisticas </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- JQuery para utilizar en jsestructura_reportes_dinamico las funciones/ajax de jquery en js -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="../js/JSEstructuras/estructura_graficas_desarrollo.js"></script>