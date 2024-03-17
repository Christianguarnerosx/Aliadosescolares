<div class="container-fluid centrar" id="contenedor-tarjetas">

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
                    echo "<div class='opcion-reporte tiporepor hover-btn borde-r-c centrar' data-id='" . $id_tipo_report . "'>        
                    <div class='row'>
                        <div class='col'>
                            <div class='row'>
                                <div class='col txt-blanco negrita'>
                                    " . $nom_report . "
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col'>
                                    <img class='icono-m' src='" . $img_report . "'>
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

    <div class="cardreporte" id="card2">
        <div class="row centrar alinear-center espacio-top-g">
            <h1 class=" espacio-top-c">Tipo de usuario</h1> <!-- opciones para dezplegar lista de tipos de reportes -->
            <?Php

            $query = "SELECT id_tipo_usuario, nombre_tipo_usuario, imagen_tipo_usuario from tipo_usuarios WHERE id_tipo_usuario != 1";
            $consulta = mysqli_query($conexion, $query);

            if (mysqli_num_rows($consulta) > 0) {
            ?>
            <?php
                while ($row = mysqli_fetch_array($consulta)) {
                    $id_tipo_usuario = $row['id_tipo_usuario'];
                    $nom_usuario = $row['nombre_tipo_usuario'];
                    $img_usuario = $row['imagen_tipo_usuario'];
                    echo "<div class='opcion-reporte tipousu hover-btn borde-r-c centrar' data-id='" . $id_tipo_usuario . "'>        
                    <div class='row'>
                        <div class='col'>
                            <div class='row'>
                                <div class='col txt-blanco negrita'>
                                    " . $nom_usuario . "
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col'>
                                    <img class='icono-m' src='" . $img_usuario . "'>
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


    <div class="cardreporte" id="card4">
        <div class="row centrar alinear-center espacio-top-g">
            <h1 class=" espacio-top-c">Su grupo</h1> <!-- opciones para dezplegar lista de tipos de reportes -->
            <?Php

            $query = "SELECT * from grupos";
            $consulta = mysqli_query($conexion, $query);

            if (mysqli_num_rows($consulta) > 0) {
            ?>
            <?php
                while ($row = mysqli_fetch_array($consulta)) {
                    $id_grupo = $row['id_grupo'];
                    $nom_grupo = $row['nombre_grupo'];
                    echo "<div class='opcion-reporte grupos hover-btn borde-r-c centrar' data-id='" . $id_grupo . "'>        
                    <div class='row'>
                        <div class='col'>
                            <div class='row'>
                                <div class='col'>
                                    <h2 class='titulo-m txt-blanco'>" . $nom_grupo . "</h2>" . "
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

    <div class="cardreporte centrar" id="card5">
        <div class="row centrar alinear-center espacio-top-g">
            <h1 class=" espacio-top-c">¿Quien?</h1> <!-- opciones para dezplegar lista de tipos de reportes -->
            
        </div>
    </div>

    <div class="cardreporte centrar" id="card6">
        <img src="../imagenes/logos/logosinfondo.gif" alt="">
    </div>

    <div class="cardreporte centrar" id="card7">
        <!-- Es el componente para generar reportes de tipo textual -->
        <div class="form-floating centrar"> <!--Para poder cambiar el tamaño de el textarea es necesario mandar traer la clase del floating y la del text area (las 2)-->
            <textarea class="form-control textarea-reporte" placeholder="Redacta tu reporte aqui" id="reporte_texto"></textarea>
            <label>¿Que haz visto?</label>
        </div>
    </div>
    <div class="cardreporte centrar" id="card8">
        <!-- Reporte tipo de audio -->
        <!-- Componentes btn's,select -->
        <div class="row">
            <!-- Es el componente para generar reportes de tipo verbal -->
            <div class="col">
                <h1 class=" titulo-m negritam">Presiona para grabar tu reporte</h1>
                <p class=" text-g">Tienes 30 segundos para decirme que ocurre</p>
            </div>
            <div class="col">
                <button class="btn-circular" id="btn-grabar-reporte">Grabar</button>
            </div>
        </div>
    </div>
    <div class="cardreporte" id="card9">

    </div>
    <div class="cardreporte" id="card10">

    </div>

</div>

<script src="../js/JSEstructuras/estructura_reporte_dinamico.js"></script>