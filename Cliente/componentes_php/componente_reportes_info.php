<!-- Row que posiciona la tabla dentro de su contenedor padre el cuadro blanco transparente -->
<div class="row" id="tablareportes">
    <table> <!-- Se crea una tabla -->
        <thead class="tablatituloreportes"> <!-- Maneja donde iran los titulos de las columnas de la tabla se asigna color de fondo y letra -->
            <tr>
                <th>Mis Reportes</th>
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
</div>