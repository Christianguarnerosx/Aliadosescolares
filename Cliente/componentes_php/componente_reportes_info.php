<!-- Aqui para que se carge antes de mandar a traer las funciones de la api -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Row que posiciona la tabla dentro de su contenedor padre el cuadro blanco transparente -->
<div class="row contenedortablareportes centrar espacio-top-c">
    <!-- Contenido para alumno -->
    <table class="tablareportes" id="tablamisreportes"> <!-- Se crea una tabla -->
        <thead class="tablatituloreportes"> <!-- Maneja donde iran los titulos de las columnas de la tabla se asigna color de fondo y letra -->
            <tr>
                <th>Mis Reportes</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class=""> <!-- El cuerpo, donde iran registros consultados de la base de datos de la tabla de reportes -->
            <!-- Creamos los componentes apartir de registros de la base de datos -->
            <?php
            include("../../Servidor/Conexion.php"); /* Nos conectamos a la bd */
            $id = $_SESSION['usuario']; /* Detectamos que usuario esta conectado */

            /* Consulta para obetener los datos de todo el reporte (fecha, contenido (texto/audio), contenido(ruta imagen) con un inner join con la tabla de sensaciones para saber la ruta) 
            Asi como ela union con la tabla de tiopo de reportes para saber el nombre pasando el id_tipo_reporte (la llave foranea)*/
            $query = "SELECT r.*,
                            s.nombre_sensacion,
                            s.imagen_sensacion,
                            t.nombre_tipo_reporte
                        from reportes as r
                        INNER JOIN sensaciones as s
                        ON s.id_sensacion = r.id_sensacion
                        INNER JOIN tipo_reportes as t
                        ON t.id_tipo_reporte = r.id_tipo_reporte
                        AND r.id_usuario = $id
                        ORDER BY r.fecha_reporte DESC";

            $consulta = mysqli_query($conexion, $query); /* Realizamos/Mandamos la peticion/consulta */

            /* si devuelve algo y esta bien entras */
            if (mysqli_num_rows($consulta)) {
                while ($row = mysqli_fetch_array($consulta)) { /* Creas la variable row para guardar los datos de los registros que se iteraran en el while (los ira recorriendo) */
                    /* Asignamos los registros a variables para que se manden las variables y no los rows (Por que si no marca error/ esta mal) */
                    $tiporeporte = $row['id_tipo_reporte'];
                    $nombretiporeporte = $row['nombre_tipo_reporte'];
                    $fechareporte = $row['fecha_reporte'];
                    $imagensensacion = $row['imagen_sensacion'];

                    /* Filtramos que tipo de reporte es y le asignaremos un contenido deacuerdo a el tipo */

                    /* Si es reporte tipo imagen el contenido sera la ruta de la imagen mandando a traer la ruta obtenida de la consulta */
                    if ($tiporeporte == 1) {
                        $contenido = $row['nombre_sensacion'];
                        echo "<tr class='filatablareportes'>
                        <td> <img class='imagentablareportes' src='$imagensensacion' alt=''>  $contenido </td>
                        <td> $nombretiporeporte </td>
                        <td> $fechareporte </td>
                        <td class='columnaaccionesreportes centrar espacio-top-c'>
                            <button type='button' id='btnimprimirreportes' class='btn-acciones btn-azul borde-r-c txt-blanco centrar'> <span id='spancontenidobtnreportes'> Ver </span> </button>
                        </td>
                    </tr>";
                    } else if ($tiporeporte == 2) { /* Si es tipo texto el contenido sera un texto simple */
                        $contenido = $row['texto_reporte'];
                        echo "<tr class='filatablareportes'>
                        <td> $contenido </td>
                        <td> $nombretiporeporte </td>
                        <td> $fechareporte </td>
                        <td class='columnaaccionesreportes centrar espacio-top-c'>
                            <button type='button' id='btnimprimirreportes' class='btn-acciones btn-azul borde-r-c txt-blanco centrar'> <span id='spancontenidobtnreportes'> Ver </span> </button>
                        </td>
                    </tr>";
                    } else if ($tiporeporte == 3) { /* Si es tipo audio, el contenido es la ruta de el audio y lo mandamos a mostrar con un elemento html tipo audio */
                        $contenido = $row['audio_reporte'];
                        echo "<tr class='filatablareportes'>
                        <td> <audio controls>
                            <source src='$contenido' type='audio/mpeg'>
                        </audio> </td>
                        <td> $nombretiporeporte </td>
                        <td> $fechareporte </td>
                        <td class='columnaaccionesreportes centrar espacio-top-c'>
                            <button type='button' id='btnimprimirreportes' class='btn-acciones btn-azul borde-r-c txt-blanco centrar'> <span id='spancontenidobtnreportes'> Ver </span> </button>
                        </td>
                    </tr>";
                    }
                }
            }

            ?>
        </tbody>
    </table>

    <!-- Contenido para docente -->
    <?Php
    /*PARA QUE FUNCION EL CODIGO a donde lo importas se debe iniciar una variable de session de php*/

    /*Funcion para obtener el nombre y apellido paterno*/
    include("../../Servidor/Conexion.php"); /*Incluimos la conexion (OJOOOO se debe calcular la ruta desde donde se manda atraer no desde aqui) */
    /* Para que se importe bien la conexion es necesario que sea SOLO include() porqueeeee si utilizas include_once() marca error*/

    $id = $_SESSION['usuario']; /*Mandamos a llamar a la variable sesion y la asignamos a una nieva variable (id)*/
    $query = "SELECT id_tipo_usuario FROM usuarios WHERE id_usuario = $id"; /*Declaramos la consulta*/
    $consulta = mysqli_query($conexion, $query); /* ejecutamos la consulta mandando la conexion y la consulta*/

    if (mysqli_num_rows($consulta) > 0) { /*si la consulta devuelve algo*/
        $row = mysqli_fetch_array($consulta); /*guardamos en la variable row todo lo que nos regreso por campos*/
        /*Se utuliza a row por que almaceno lo obtenido de la consulta y se manda a traer el campo ['campo']*/
        $tipousuario = $row['id_tipo_usuario']; /*Mensaje que se va a mostrar*/

        if ($tipousuario == 2) {
    ?>
            <table class="tablareportes espacio-top-g" id="tablareportesalumnos"> <!-- Se crea una tabla -->
                <thead class="tablatituloreportes"> <!-- Maneja donde iran los titulos de las columnas de la tabla se asigna color de fondo y letra -->
                    <tr>
                        <th>Alumno</th>
                        <th>Reporte Alumno</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody> <!-- El cuerpo, donde iran registros consultados de la base de datos de la tabla de reportes -->
                    <!-- Creamos los componentes apartir de registros de la base de datos -->
                    <?php
                    include("../../Servidor/Conexion.php"); /* Nos conectamos a la bd */
                    $id = $_SESSION['usuario']; /* Detectamos que usuario esta conectado */

                    /* Consulta para obetener los datos de todo el reporte (fecha, contenido (texto/audio), contenido(ruta imagen) con un inner join con la tabla de sensaciones para saber la ruta) 
            Asi como ela union con la tabla de tiopo de reportes para saber el nombre pasando el id_tipo_reporte (la llave foranea)*/
                    $query2 = "SELECT r.*,
                            s.nombre_sensacion,
                            s.imagen_sensacion,
                            t.nombre_tipo_reporte,
                            u.nombre,
                            u.apellidop
                        from reportes as r
                        INNER JOIN sensaciones as s
                        ON s.id_sensacion = r.id_sensacion
                        INNER JOIN tipo_reportes as t
                        ON t.id_tipo_reporte = r.id_tipo_reporte
                        INNER JOIN usuarios as u
                        ON u.id_usuario = r.id_usuario
                        INNER JOIN docentes as d
                        ON d.id_usuario = $id
                        INNER JOIN alumnos as l
                        ON l.id_usuario = r.id_usuario
                        AND l.id_grado = d.id_grado
                        AND l.id_grupo = d.id_grupo
                        ORDER BY r.fecha_reporte DESC";

                    $consulta2 = mysqli_query($conexion, $query2); /* Realizamos/Mandamos la peticion/consulta */

                    /* si devuelve algo y esta bien entras */
                    if (mysqli_num_rows($consulta2)) {
                        while ($row = mysqli_fetch_array($consulta2)) { /* Creas la variable row para guardar los datos de los registros que se iteraran en el while (los ira recorriendo) */
                            /* Asignamos los registros a variables para que se manden las variables y no los rows (Por que si no marca error/ esta mal) */
                            $tiporeporte = $row['id_tipo_reporte'];
                            $nombretiporeporte = $row['nombre_tipo_reporte'];
                            $fechareporte = $row['fecha_reporte'];
                            $imagensensacion = $row['imagen_sensacion'];
                            $nombrealumno = $row['nombre'] . " " . $row['apellidop'];


                            /* Filtramos que tipo de reporte es y le asignaremos un contenido deacuerdo a el tipo */
                            /* Si es reporte tipo imagen el contenido sera la ruta de la imagen mandando a traer la ruta obtenida de la consulta */
                            if ($tiporeporte == 1) {
                                $contenido = $row['nombre_sensacion'];
                                echo "<tr class='filatablareportes'>
                        <td> $nombrealumno </td>
                        <td> <img class='imagentablareportes' src='$imagensensacion' alt=''>  $contenido </td>
                        <td> $nombretiporeporte </td>
                        <td> $fechareporte </td>
                        <td class='columnaaccionesreportes centrar espacio-top-c'>
                            <button type='button' id='btnimprimirreportes' class='btn-acciones btn-azul borde-r-c txt-blanco centrar'> <span id='spancontenidobtnreportes'> Ver </span> </button>
                        </td>
                    </tr>";
                                echo "<tr class='filatablareportes'>
                        <td> $nombrealumno </td>
                        <td> <img class='imagentablareportes' src='$imagensensacion' alt=''>  $contenido </td>
                        <td> $nombretiporeporte </td>
                        <td> $fechareporte </td>
                        <td class='columnaaccionesreportes centrar espacio-top-c'>
                            <button type='button' id='btnimprimirreportes' class='btn-acciones btn-azul borde-r-c txt-blanco centrar'> <span id='spancontenidobtnreportes'> Ver </span> </button>
                        </td>
                    </tr>";
                                echo "<tr class='filatablareportes'>
                        <td> $nombrealumno </td>
                        <td> <img class='imagentablareportes' src='$imagensensacion' alt=''>  $contenido </td>
                        <td> $nombretiporeporte </td>
                        <td> $fechareporte </td>
                        <td class='columnaaccionesreportes centrar espacio-top-c'>
                            <button type='button' id='btnimprimirreportes' class='btn-acciones btn-azul borde-r-c txt-blanco centrar'> <span id='spancontenidobtnreportes'> Ver </span> </button>
                        </td>
                    </tr>";
                            } else if ($tiporeporte == 2) { /* Si es tipo texto el contenido sera un texto simple */
                                $contenido = $row['texto_reporte'];
                                echo "<tr class='filatablareportes'>
                        <td> $nombrealumno </td>
                        <td> $contenido </td>
                        <td> $nombretiporeporte </td>
                        <td> $fechareporte </td>
                        <td class='columnaaccionesreportes centrar espacio-top-c'>
                            <button type='button' id='btnimprimirreportes' class='btn-acciones btn-azul borde-r-c txt-blanco centrar'> <span id='spancontenidobtnreportes'> Ver </span> </button>
                        </td>
                    </tr>";
                            } else if ($tiporeporte == 3) { /* Si es tipo audio, el contenido es la ruta de el audio y lo mandamos a mostrar con un elemento html tipo audio */
                                $contenido = $row['audio_reporte'];
                                echo "<tr class='filatablareportes'>
                        <td> $nombrealumno </td>
                        <td> <audio controls>
                            <source src='$contenido' type='audio/mpeg'>
                        </audio> </td>
                        <td> $nombretiporeporte </td>
                        <td> $fechareporte </td>
                        <td class='columnaaccionesreportes centrar espacio-top-c'>
                            <button type='button' id='btnimprimirreportes' class='btn-acciones btn-azul borde-r-c txt-blanco centrar'> <span id='spancontenidobtnreportes'> Ver </span> </button>
                        </td>
                    </tr>";
                            }
                        }
                    }

                    ?>
                </tbody>
            </table>

            <div class="container-fluid">
                <div class="row centrar espacio-top-g alinear-center" id="alumnotarget">
                    <h1> Mi alumno mas reportado </h1>
                    <?php
                    include_once("../../Servidor/Conexion.php");

                    $id = $_SESSION['usuario'];

                    $query3 = "SELECT r.id_usuario_reportado, 
                                COUNT(id_usuario_reportado) AS numreportes,
                                u.nombre,
                                u.apellidop
                FROM reportes as r
                INNER JOIN usuarios as u
                ON r.id_usuario_reportado = u.id_usuario
                INNER JOIN docentes as d
                ON d.id_usuario = $id
                INNER JOIN alumnos as a
                ON a.id_usuario = r.id_usuario_reportado
                AND a.id_grado = d.id_grado
                AND a.id_grupo = d.id_grupo
                GROUP BY id_usuario_reportado
                ORDER BY numreportes DESC
                LIMIT 1"; /* Cuantos usuarios quieres */

                    $consulta3 = mysqli_query($conexion, $query3);

                    if (mysqli_num_rows($consulta3) > 0) {
                        while ($row = mysqli_fetch_array($consulta3)) {
                            echo "<div class='cardalumnotarget centrar espacio-top-c txt-blanco borde-r-c'>";
                            echo "<h1 hidden>" . $row['id_usuario_reportado'] . "</h1>";
                            echo "<h1>" . $row['nombre'] . " " . $row['apellidop'] . "</h1>";
                            echo "<h1 class=' text-m'>" . "Con " . $row['numreportes'] . " Reportes" . "</h1>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>

                <div class="row centrar espacio-top-g alinear-center" id="alumnostopreportes">
                    <h1> Top 3 alumnos mas reportados </h1>
                    <?php
                    $query4 = "SELECT r.id_usuario_reportado, 
                                COUNT(id_usuario_reportado) AS numreportes,
                                u.nombre,
                                u.apellidop
                FROM reportes as r
                INNER JOIN usuarios as u
                ON r.id_usuario_reportado = u.id_usuario
                INNER JOIN docentes as d
                ON d.id_usuario = $id
                INNER JOIN alumnos as a
                ON a.id_usuario = r.id_usuario_reportado
                AND a.id_grado = d.id_grado
                AND a.id_grupo = d.id_grupo
                GROUP BY id_usuario_reportado
                ORDER BY numreportes DESC
                LIMIT 3"; /* Cuantos usuarios quieres */

                    $consulta4 = mysqli_query($conexion, $query4);

                    if (mysqli_num_rows($consulta4) > 0) {
                        while ($row = mysqli_fetch_array($consulta4)) {
                            echo "<div class='cardtopalumnostarget centrar borde-r-c'>";
                            echo "<div>";
                            echo "<h1 hidden>" . $row['id_usuario_reportado'] . "</h1>";
                            echo "<h1 class='txt-blanco'>" . $row['nombre'] . "</h1>";
                            echo "<h1 class='text-c'>" . "Con " . $row['numreportes'] . " Reportes" . "</h1>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
</div>

<!-- El nav que tiene los enlaces de los 2 contenedores (si es telefono se convierte en btn omvorguesa)-->
<nav class="navbar navbar-expand-lg bg-body-tertiary" id="navreportesdocentes">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Opciones</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse centrar espacio-right-m" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#tablamisreportes"> Mis reportes </a> <!-- Para mandar al contenedor se hace referencia a con '#'+'id el elemento (contenedor)' -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tablareportesalumnos" id=""> Reportes alumnos </a> <!-- Para mandar al contenedor se hace referencia a con '#'+'id el elemento (contenedor)' -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#alumnotarget" id=""> Alumno Target </a> <!-- Para mandar al contenedor se hace referencia a con '#'+'id el elemento (contenedor)' -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#alumnostopreportes" id=""> Mas reportados </a> <!-- Para mandar al contenedor se hace referencia a con '#'+'id el elemento (contenedor)' -->
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
        }

        if ($tipousuario == 1) {
?>

    <!-- Contenido administrador -->
    <div class="row espacio-top-g" id="contenedorcardsusogrados">
        <div class="row centrar">
            <h1 class=" alinear-center">Uso por salones</h1>
            <select name="opciones" class="selectinfo" id="selectgradosinfo">
                <option value="0" selected>Grados</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>

        <div class="cardadmininfo cardiainfo">
            <h1 class="alinear-center espacio-top-c" id="gradopeticioniainfo"></h1>
            <canvas class="espacio-top-c" id="graficainfoia"></canvas>
        </div>

        <div class="cardadmininfo cardreportesinfo">
            <h1 class="alinear-center espacio-top-c" id="gradoreporteiainfo"></h1>
            <canvas class="espacio-top-c" id="graficainforeportes"></canvas>
        </div>

    </div>

    <div class="row centrar" id="herramientasusadas">
        <div class="cardherramientasusadas">
            <h1 class="text-m txt-blanco alinear-center"> Utilización Tutorias </h1>
            <canvas id="herramientapeticionia"></canvas>
        </div>
        <div class="cardherramientasusadas">
            <h1 class="text-m txt-blanco alinear-center"> Utilización Reportes </h1>
            <canvas id="herramientareportes"></canvas>
        </div>
    </div>

    <div class="row centrar espacio-top-g alinear-center" id="alumnostopreportes">
        <h1> Top 5 mas reportados de la escuela</h1>
        <?php
            $query4 = "SELECT r.id_usuario_reportado, 
                                COUNT(id_usuario_reportado) AS numreportes,
                                u.nombre,
                                u.apellidop,
                                ga.nombre_grado,
                                gu.nombre_grupo,
                                tu.nombre_tipo_usuario
                FROM reportes as r
                INNER JOIN usuarios as u
                ON r.id_usuario_reportado = u.id_usuario
                LEFT JOIN alumnos as a
                ON a.id_usuario = r.id_usuario_reportado
                LEFT JOIN docentes as d
                ON d.id_usuario = r.id_usuario_reportado
                LEFT JOIN grados as ga 
                ON a.id_grado = ga.id_grado
                AND d.id_grado = ga.id_grado
                LEFT JOIN grupos as gu 
                ON a.id_grupo = gu.id_grupo
                AND d.id_grupo = gu.id_grupo
                INNER JOIN tipo_usuarios as tu
                ON tu.id_tipo_usuario = u.id_tipo_usuario
                GROUP BY id_usuario_reportado
                ORDER BY numreportes DESC
                LIMIT 5"; /* Cuantos usuarios quieres */

            $consulta4 = mysqli_query($conexion, $query4);

            if (mysqli_num_rows($consulta4) > 0) {
                while ($row = mysqli_fetch_array($consulta4)) {
                    echo "<div class='cardtopalumnostarget centrar borde-r-c'>";
                    echo "<div>";
                    echo "<h1 hidden>" . $row['id_usuario_reportado'] . "</h1>";
                    echo "<h1 class='text-m txt-blanco'>" . $row['nombre_tipo_usuario'] . "</h1>";
                    echo "<h1 class='txt-blanco'>" . $row['nombre'] . "</h1>";
                    echo "<h1 class='text-c'>" . "Con " . $row['numreportes'] . " Reportes" . "</h1>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        ?>
    </div>

    </div>
    </div>

    <!-- El nav para admins que tiene los enlaces de los contenedores (si es telefono se convierte en btn omvorguesa)-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navreportesadministradores">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Opciones</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse centrar espacio-right-m" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#tablamisreportes"> Mis reportes </a> <!-- Para mandar al contenedor se hace referencia a con '#'+'id el elemento (contenedor)' -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contenedorcardsusogrados" id=""> Uso Salones </a> <!-- Para mandar al contenedor se hace referencia a con '#'+'id el elemento (contenedor)' -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#herramientasusadas" id=""> Tipos herramientas </a> <!-- Para mandar al contenedor se hace referencia a con '#'+'id el elemento (contenedor)' -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#alumnostopreportes" id=""> Mas reportados </a> <!-- Para mandar al contenedor se hace referencia a con '#'+'id el elemento (contenedor)' -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php
        }
    }
    mysqli_close($conexion);
?>

<!-- JQuery para utilizar en jsestructura_reportes_dinamico las funciones/ajax de jquery en js -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="../js/JSEstructuras/estructura_estadisticas.js"></script>