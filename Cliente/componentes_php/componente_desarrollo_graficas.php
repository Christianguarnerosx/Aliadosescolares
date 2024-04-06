<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="row centrar" id="contenedordesarrollo">
    <h1 hidden id="nombreusuariodesarollo"> <?php include_once("../../Servidor/funciones_session/session_nombre.php") ?> </h1>
    <div class="row contenedorstacksdesarrollo centrar alinear-center" id="filacontenedor1">
        <div class="contenedorgraficadesarrollo alinear-center" id="contenedorgrafica1">
            <h1 class="text-c"> Utilizacion de IA</h1>
            <canvas class="graficadesarrollo" id="graficaia1"></canvas>
        </div>
        <div class="contenedorgraficadesarrollo">
            <h1 class="text-c"> Utilizacion de IA</h1>
            <canvas class="graficadesarrollo" id="graficaia2"></canvas>
        </div>
        <div class="contenedorgraficadesarrollo">
            <h1 class="text-c"> Utilizacion de IA</h1>
            <canvas class="graficadesarrollo" id="graficaia3"></canvas>
        </div>
    </div>

    <div class="contenedorstacksdesarrollo centrar" id="filacontenedor2">
        <h1> Letras y numeros que cambian y van incrementando </h1>
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
                        <a class="nav-link" href="#filacontenedor2"> Mis estadisticas </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#filacontenedor2">Pricing</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- JQuery para utilizar en jsestructura_reportes_dinamico las funciones/ajax de jquery en js -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="../js/JSEstructuras/estructura_graficas_desarrollo.js"></script>