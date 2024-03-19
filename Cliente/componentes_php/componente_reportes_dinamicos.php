<!-- componenete importable (Se imporrta donde se requiera toda la estrcutura de reportes reportes)-->
<div class="container-fluid centrar" id="contenedor-tarjetas">

    <!-- Card 1 donde se imprimiran con php todos los tipos de reportes y el usu seleccionara alguno -->
    <div class="cardreporte" id="card1">
        <div class="row centrar alinear-center espacio-top-g">
            <h1 class=" espacio-top-c">Tipo de reporte</h1> <!-- opciones para dezplegar lista de tipos de reportes -->
            <?Php
            include("../../Servidor/Conexion.php");  /* Para que se importe bien la conexion es necesario que sea SOLO include() porqueeeee si utilizas include_once() marca error*/

            $query = "SELECT id_tipo_reporte, nombre_tipo_reporte, imagen_tipo_reporte from tipo_reportes";
            $consulta = mysqli_query($conexion, $query);

            if (mysqli_num_rows($consulta) > 0) {
            ?>
            <?php
                while ($row = mysqli_fetch_array($consulta)) {
                    $id_tipo_report = $row['id_tipo_reporte'];
                    $nom_report = $row['nombre_tipo_reporte'];
                    $img_report = $row['imagen_tipo_reporte'];
                    /* opcion reporte es una clase para asignar estilos a tadas las opciones */
                    /* clase tiporepor se utiliza para asignar a todas las opciones un eventlistener y obtener el id del que sea seleccionado*/
                    /* Gracias al data-id "" se asigna el valor obtenido y 'id' se obtiene en js con el data-id */
                    echo "<div class='opcion-reporte tiporepor hover-btn borde-r-c centrar' data-id='" . $id_tipo_report . "'>        
                    <div class='row'>
                        <div class='col'>
                            <div class='row'>
                                <div class='col'>
                                    <img class='icono-m' src='" . $img_report . "'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col txt-blanco negrita'>
                                    " . $nom_report . "
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
        </div>
    </div>

    <!-- Card 2 donde se imprimiran con php todos los tipos de usuarios y el usu seleccionara alguno -->
    <div class="cardreporte" id="card2">
        <div class="row centrar alinear-center espacio-top-g">
            <h1 class=" espacio-top-c">Tipo de usuario</h1> <!-- opciones para dezplegar lista de tipos de reportes -->
            <?Php

            $query = "SELECT id_tipo_usuario, nombre_tipo_usuario, imagen_tipo_usuario from tipo_usuarios WHERE id_tipo_usuario != 1 ORDER BY id_tipo_usuario DESC";
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
                    /* Gracias al data-id "" se asigna el valor obtenido y 'id' se obtiene en js con el data-id */
                    echo "<div class='opcion-reporte tipousu hover-btn borde-r-c centrar' data-id='" . $id_tipo_usuario . "'>        
                    <div class='row'>
                        <div class='col'>
                            <div class='row'>
                                <div class='col'>
                                    <img class='icono-m' src='" . $img_usuario . "'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col txt-blanco negrita'>
                                    " . $nom_usuario . "
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
        </div>
    </div>

    <!-- Card 3 donde se imprimiran con php todos los grados y el usu seleccionara alguno -->
    <div class="cardreporte" id="card3">
        <div class="row centrar alinear-center espacio-top-g">
            <h1 class=" espacio-top-c">Su grado</h1> <!-- opciones para dezplegar lista de tipos de reportes -->
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
                    /* Gracias al data-id "" se asigna el valor obtenido y 'id' se obtiene en js con el data-id */
                    echo "<div class='opcion-reporte grados hover-btn borde-r-c centrar' data-id='" . $id_grado . "'>        
                    <div class='row'>
                        <div class='col'>
                            <div class='row'>
                                <div class='col txt-blanco negrita'>
                                    " . $id_grado . "
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col'>
                                    <h2 class='text-m txt-blanco'>" . $nom_grado . "</h2>" . "
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
        </div>
    </div>

    <!-- Card 4 donde se imprimiran con php todos los grupos y el usu seleccionara alguno -->
    <div class="cardreporte" id="card4">
        <div class="row centrar alinear-center espacio-top-g">
            <h1 class="espacio-top-c">Su grupo</h1> <!-- opciones para dezplegar lista de tipos de reportes -->
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
                    /* Gracias al data-id "" se asigna el valor obtenido y 'id' se obtiene en js con el data-id */
                    echo "<div class='opcion-reporte grupos hover-btn borde-r-c centrar' data-id='" . $id_grupo . "'>        
                    <div class='row'>
                        <div class='col'>
                            <h2 class='titulo-m txt-blanco'>" . $nom_grupo . "</h2>" . "
                        </div>
                    </div>
                        </div>";
                }
            } else {
                echo "<option value=''>No hay resultados</option>";
            }
            ?>
        </div>
    </div>

    <!-- Card 5 donde se imprimiran con php todos los usuarios filtrados por las opciones elegidas anteriomente y el usu seleccionara alguno -->
    <!-- Selector usuarios que se manda desde js el compopnente -->
    <div class="cardreporte" id="card5">
        <!-- El selector de usuarios esta aqui por js-->
        <!-- ESTA EN servidor/ajax_php/filtrarusuarios.php-->
        <!-- El contenido de esta card es brindado por js ya que se hace una consultaasincrona para obtener usuarios segun lo que se haya elegido previamente-->
    </div>

    <!-- Card 6 donde se imprimiran con php todos las sensaciones y el usu seleccionara alguno -->
    <div class="cardreporte" id="card6">
        <div class="row centrar alinear-center espacio-top-g">
            <h1 class="espacio-top-c">Sensación</h1> <!-- opciones para dezplegar lista de tipos de reportes -->
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
                    /* Gracias al data-id "" se asigna el valor obtenido y 'id' se obtiene en js con el data-id */
                    echo    "<div class='opcion-reporte sensaciones hover-btn borde-r-c centrar' data-id='" . $id_sensacion . "'>        
                                <div class='row'>
                                    <div class='col'>
                                        <img class='icono-g' src='" . $img_sensacion . "'>
                                    </div>
                                </div>
                            </div>";
                }
            } else {
                echo "<option value=''>No hay resultados</option>";
            }
            ?>
        </div>
    </div>

    <!-- (Esta qui para que se vea con que card es compañera) Card 9 donde aparecera el boton de enviar reporte de tipo img/sensaciones -->
    <div class="cardreporte centrar" id="card9">
        <button class="btn-g btn-azul borde-r-c text-g txt-blanco hover-btn" id="btnenviarreporteimg">Enviar reporte</button>
    </div>

    <!-- Card 7 donde se escribira el reporte el usuario de lo que paso -->
    <div class="cardreporte" id="card7">
        <div class="row centrar alinear-center espacio-top-g">
            <div class="col">
                <!-- Es el componente para generar reportes de tipo textual -->
                <div class="form-floating centrar"> <!--Para poder cambiar el tamaño de el textarea es necesario mandar traer la clase del floating y la del text area (las 2)-->
                    <textarea class="form-control textarea-reporte" placeholder="Redacta tu reporte aqui" id="reporte_texto"></textarea>
                    <label>¿Que haz visto?</label>
                </div>
            </div>
            <button class="btn-g btn-azul borde-r-c text-g txt-blanco hover-btn" id="btnenviarreportetxt">Enviar reporte</button>
        </div>
    </div>

    <!-- Card 8 donde se dira el reporte el usuario de lo que paso -->
    <div class="cardreporte" id="card8">
        <!-- Reporte tipo de audio -->
        <!-- Componentes btn's,select -->
        <div class="row centrar alinear-center espacio-top-m">
            <!-- Es el componente para generar reportes de tipo verbal -->
            <div class="col">
                <h1 class=" titulo-m negritam">Presiona para grabar tu reporte</h1>
                <p class=" text-g">Tienes 30 segundos para decirme que ocurre</p>
            </div>
            <div class="col">
                <button class="btn-circular" id="btn-grabar-reporte">Grabar</button>
            </div>
        </div>
        <button class="btn-g btn-azul borde-r-c text-g txt-blanco hover-btn" id="btnenviarreporteaudio">Enviar reporte</button>
    </div>

    <!-- Card 10 utuilizada de fondo/adorno -->
    <div class="cardreporte" id="card10">
    </div>

    <!-- Card 11 utuilizada de fondo/adorno -->
    <div class="cardreporte" id="card11">
    </div>

</div>

<!-- JQuery para utilizar en jsestructura_reportes_dinamico las funciones/ajax de jquery en js -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- js que logra el comportamiento de obtener datos seleccionados, forma de aparecer y desaparecer cards y solicitudes ajax para filtros e inserciones -->
<script src="../js/JSEstructuras/estructura_reporte_dinamico.js"></script>