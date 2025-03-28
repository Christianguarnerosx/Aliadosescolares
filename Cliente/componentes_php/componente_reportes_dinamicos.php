<img src="../imagenes/personajes/Detective.png" id="personajereportes">
<!-- componenete importable (Se imporrta donde se requiera toda la estrcutura de reportes reportes)-->
<div class="container-fluid centrar" id="contenedor-tarjetas">
    
    <!-- Card 1 donde se imprimiran con php todos los tipos de reportes y el usu seleccionara alguno -->
    <div class="cardreporte alinear-center centrar" id="card1">
        <div class="row centrar alinear-center">
            <?Php
            include("../../Servidor/Conexion.php");  /* Para que se importe bien la conexion es necesario que sea SOLO include() porqueeeee si utilizas include_once() marca error*/

            $query = "SELECT id_tipo_reporte, nombre_tipo_reporte, imagen_tipo_reporte, descripcion_reporte from tipo_reportes";
            $consulta = mysqli_query($conexion, $query);

            if (mysqli_num_rows($consulta) > 0) {
            ?>
            <?php
                while ($row = mysqli_fetch_array($consulta)) {
                    $id_tipo_report = $row['id_tipo_reporte'];
                    $nom_report = $row['nombre_tipo_reporte'];
                    $img_report = $row['imagen_tipo_reporte'];
                    $des_report = $row['descripcion_reporte'];
                    /* opcion reporte es una clase para asignar estilos a tadas las opciones */
                    /* clase tiporepor se utiliza para asignar a todas las opciones un eventlistener y obtener el id del que sea seleccionado*/
                    /* Gracias al data-id "" se asigna el valor obtenido (al hacer click) y 'id' se obtiene en js con el data-id */
                    echo "<div class='opcion-reporte tiporepor hover-btn borde-r-c centrar' data-id='" . $id_tipo_report . "'>        
                    <div class='row'>
                        <div class='col'>
                            <div class='row-100'>
                                    <img class='icono-m' src='" . $img_report . "'>
                            </div>
                            <div class='row alinear-center'>
                                <h1 class='titulocardreporte'>
                                    " . $nom_report . "
                                </h1>
                            </div>
                            <div class='row alinear-center'>
                                <h1 class='descripcioncardreporte'>
                                    " . $des_report . "
                                </h1>
                            </div>
                        </div>
                    </div>
            </div>";
                }
            } else {
                echo "<option value=''>No hay resultados</option>";
            }
            ?>
            <div class="row">
                <h1 class="text-c espacio-top-c txt-titulo">Tipo de reporte</h1> <!-- opciones para dezplegar lista de tipos de reportes -->
            </div>
        </div>
    </div>

    <!-- Card 2 donde se imprimiran con php todos los tipos de usuarios y el usu seleccionara alguno -->
    <div class="cardreporte alinear-center centrar" id="card2">
        <div class="row centrar alinear-center">
            <?Php
            $id = $_SESSION['usuario']; /*Mandamos a llamar a la variable sesion y la asignamos a una nieva variable (id)*/
            $query = "SELECT id_tipo_usuario FROM usuarios WHERE id_usuario = $id"; /*Declaramos la consulta*/
            $consulta = mysqli_query($conexion, $query); /* ejecutamos la consulta mandando la conexion y la consulta*/

            if (mysqli_num_rows($consulta) > 0) { /*si la consulta devuelve algo*/
                $row = mysqli_fetch_array($consulta); /*guardamos en la variable row todo lo que nos regreso por campos*/

                $query = "";
                $tipousuario = $row['id_tipo_usuario'];

                if ($tipousuario == 4) {
                    $query = "SELECT id_tipo_usuario, nombre_tipo_usuario, imagen_tipo_usuario from tipo_usuarios WHERE id_tipo_usuario != 1
                ORDER BY id_tipo_usuario DESC";
                } else {
                    $query = "SELECT id_tipo_usuario, nombre_tipo_usuario, imagen_tipo_usuario from tipo_usuarios WHERE id_tipo_usuario != 1 AND id_tipo_usuario != 3
                ORDER BY id_tipo_usuario DESC";
                };

                if ($tipousuario == 4) {
                    $query = "SELECT id_tipo_usuario, nombre_tipo_usuario, imagen_tipo_usuario from tipo_usuarios WHERE id_tipo_usuario != 1
                ORDER BY id_tipo_usuario DESC";
                } else {
                    $query = "SELECT id_tipo_usuario, nombre_tipo_usuario, imagen_tipo_usuario from tipo_usuarios WHERE id_tipo_usuario != 1 AND id_tipo_usuario != 3
                ORDER BY id_tipo_usuario DESC";
                }

                $consulta = mysqli_query($conexion, $query);

                if (mysqli_num_rows($consulta) > 0) {
            ?>
            <?php
                    while ($row = mysqli_fetch_array($consulta)) {
                        $id_tipo_usuario = $row['id_tipo_usuario'];
                        $nom_usuario = $row['nombre_tipo_usuario'];
                        $img_usuario = $row['imagen_tipo_usuario'];
                        /* opcion reporte es una clase para asignar estilos a tadas las opciones */
                        /* clase tipousu se utiliza para asignar a todas las opciones un eventlistener y obtener el id del que sea seleccionado*/
                        /* Gracias al data-id "" se asigna el valor obtenido (al hacer click) y 'id' se obtiene en js con el data-id */
                        echo "<div class='opcion-reporte tipousu hover-btn borde-r-c centrar' data-id='" . $id_tipo_usuario . "'>        
                    <div class='row'>
                        <div class='col'>
                            <div class='row'>
                                <div class='col'>
                                    <img class='icono-m' src='" . $img_usuario . "'>
                                </div>
                            </div>
                            <div class='row'>
                                <h1 class='titulocardreporte'>
                                    " . $nom_usuario . "
                                </h1>
                            </div>
                        </div>
                    </div>
            </div>";
                    }
                } else {
                    echo "<option value=''>No hay resultados</option>";
                }
            }
            ?>
            <div class="row">
                <h1 class="text-c espacio-top-c txt-titulo">¿Que usuario?</h1> <!-- opciones para dezplegar lista de tipos de usuarios -->
            </div>
        </div>
    </div>

    <!-- Card 3 donde se imprimiran con php todos los grados y el usu seleccionara alguno -->
    <div class="cardreporte alinear-center centrar" id="card3">
        <div class="row centrar alinear-center">
            <?Php

            $query = "SELECT * from grados";
            $consulta = mysqli_query($conexion, $query);

            if (mysqli_num_rows($consulta) > 0) {
            ?>
            <?php
                while ($row = mysqli_fetch_array($consulta)) {
                    $id_grado = $row['id_grado'];
                    $nom_grado = $row['nombre_grado'];
                    /* opcion reporte es una clase para asignar estilos a tadas las opciones */
                    /* clase grados se utiliza para asignar a todas las opciones un eventlistener y obtener el id del que sea seleccionado*/
                    /* Gracias al data-id "" se asigna el valor obtenido (al hacer click) y 'id' se obtiene en js con el data-id */
                    echo "<div class='opcion-reporte grados hover-btn borde-r-c centrar' data-id='" . $id_grado . "'>        
                    <div class='row'>
                        <div class='col'>
                            <div class='row'>
                                <h1 class='text-m txt-blanco'>
                                    " . $id_grado . "
                                </h1>
                            </div>
                            <div class='row'>
                                <div class='col'>
                                    <h1 class='descripcioncardreporte'>" . $nom_grado . "</h1>" . "
                                </div>
                            </div>
                        </div>
                    </div>
            </div>";
                }
            } else {
                echo "<option value=''>No hay resultados</option>";
            }
            ?>
            <div class="row">
                <h1 class="text-c espacio-top-c txt-titulo">Su grado</h1> <!-- opciones para dezplegar lista de tipos de reportes -->
            </div>
        </div>
    </div>

    <!-- Card 4 donde se imprimiran con php todos los grupos y el usu seleccionara alguno -->
    <div class="cardreporte alinear-center centrar" id="card4">
        <div class="row centrar alinear-center">
            <?Php

            $query = "SELECT * from grupos";
            $consulta = mysqli_query($conexion, $query);

            if (mysqli_num_rows($consulta) > 0) {
            ?>
            <?php
                while ($row = mysqli_fetch_array($consulta)) {
                    $id_grupo = $row['id_grupo'];
                    $nom_grupo = $row['nombre_grupo'];
                    /* opcion reporte es una clase para asignar estilos a tadas las opciones */
                    /* clase grupos se utiliza para asignar a todas las opciones un eventlistener y obtener el id del que sea seleccionado*/
                    /* Gracias al data-id "" se asigna el valor obtenido (al hacer click) y 'id' se obtiene en js con el data-id */
                    echo "<div class='opcion-reporte grupos hover-btn borde-r-c centrar' data-id='" . $id_grupo . "'>        
                    <div class='row'>
                        <div class='col'>
                        <h2 class='descripcioncardreporte'>" . $nom_grupo . "</h2>" . "
                            <h2 class='text-m txt-blanco'>" . $nom_grupo . "</h2>" . "
                            </div>
                    </div>
                        </div>";
                }
            } else {
                echo "<option value=''>No hay resultados</option>";
            }
            ?>
            <div class="row">
                <h1 class="text-c espacio-top-c txt-titulo">Su grupo</h1> <!-- opciones para dezplegar lista de tipos de reportes -->
            </div>
        </div>
    </div>

    <!-- Card 5 donde se imprimiran con php todos los usuarios filtrados por las opciones elegidas anteriomente y el usu seleccionara alguno -->
    <!-- Selector usuarios que se manda desde js el compopnente -->
    <div class="cardreporte alinear-center centrar" id="card5">
        <!-- El selector de usuarios esta aqui por js-->
        <!-- ESTA EN servidor/ajax_php/filtrarusuarios.php-->
        <!-- El contenido de esta card es brindado por js ya que se hace una consultaasincrona para obtener usuarios segun lo que se haya elegido previamente-->
    </div>

    <!-- Card 6 donde se imprimiran con php todos las sensaciones y el usu seleccionara alguno -->
    <div class="cardreporte alinear-center centrar" id="card6">
        <div class="row centrar alinear-center">
            <?Php

            $query = "SELECT * from sensaciones";
            $consulta = mysqli_query($conexion, $query);

            if (mysqli_num_rows($consulta) > 0) {
            ?>
            <?php
                while ($row = mysqli_fetch_array($consulta)) {
                    $id_sensacion = $row['id_sensacion'];
                    $nom_sensacion = $row['nombre_sensacion'];
                    $img_sensacion = $row['imagen_sensacion'];
                    /* opcion reporte es una clase para asignar estilos a tadas las opciones */
                    /* clase sensaciones se utiliza para asignar a todas las opciones un eventlistener y obtener el id del que sea seleccionado*/
                    /* Gracias al data-id "" se asigna el valor obtenido (al hacer click) y 'id' se obtiene en js con el data-id */
                    echo    "<div class='opcion-reporte sensaciones hover-btn borde-r-c centrar' data-id='" . $id_sensacion . "'>        
                                <div class='row'>
                                    <div class='col'>
                                        <img class='icono-g' src='../imagenes/iconos/emojis/" . $img_sensacion . "'>
                                    </div>
                                </div>
                            </div>";
                }
            } else {
                echo "<option value=''>No hay resultados</option>";
            }
            ?>
            <div class="row">
                <h1 class="text-c espacio-top-c txt-titulo">¿Como te sientes?</h1> <!-- opciones para dezplegar lista de tipos de reportes -->
            </div>
        </div>
    </div>

    <!-- (Esta qui para que se vea con que card es compañera) Card 9 donde aparecera el boton de enviar reporte de tipo img/sensaciones -->
    <div class="cardreporte alinear-center centrar" id="card9">
        <button class="btn-reporte-submit btn-azul borde-r-c text-m txt-blanco hover-btn" id="btnenviarreporteimg">Enviar reporte</button>
    </div>

    <!-- Card 7 donde se escribira el reporte el usuario de lo que paso -->
    <div class="cardreporte alinear-center" id="card7">
        <h1 class="espacio-top-c">¿Que haz visto?</h1>
        <div class="row centrar alinear-center espacio-top-c">
            <!-- Es el componente para generar reportes de tipo textual -->
            <textarea class="textarea-reporte form-control" placeholder="Redacta tu reporte aqui" id="reporte_texto"></textarea>
        </div>
        <button class="btn-reporte-submit btn-azul borde-r-c text-m txt-blanco hover-btn espacio-top-m" id="btnenviarreportetxt">Enviar reporte</button>
    </div>

    <!-- Card 8 donde se dira el reporte el usuario de lo que paso -->
    <div class="cardreporte alinear-center centrar" id="card8">
        <!-- Reporte tipo de audio -->
        <!-- Componentes btn's,select -->
        <div class="row centrar alinear-center espacio-top-c">
            <h1 class="txt-blanco titulo-m" id="contadorgrabando"></h1>
            <button class="btn-reporte-submit btn-azul borde-r-c text-g txt-blanco hover-btn " id="btngrabarreporteaudio">Grabar</button>
        </div>
    </div>

</div>

<!-- JQuery para utilizar en jsestructura_reportes_dinamico las funciones/ajax de jquery en js -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Api de rawgit para poder grabar audio en el navegador -->
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>

<!-- js que logra el comportamiento de obtener datos seleccionados, forma de aparecer y desaparecer cards y solicitudes ajax para filtros e inserciones -->
<script src="../js/JSEstructuras/estructura_reporte_dinamico.js"></script>