<div class="row" id="tablareportes">
    
    <table>
        <thead class="tablatituloreportes">
            <tr>
                <th>Mis Reportes</th>
                <th>Tipo deporte</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("../../Servidor/Conexion.php");
            $id = $_SESSION['usuario'];

            $query = "SELECT * from reportes WHERE id_usuario = $id ORDER BY fecha_reporte DESC";
            $consulta = mysqli_query($conexion, $query);

            if (mysqli_num_rows($consulta)) {
                while ($row = mysqli_fetch_array($consulta)) {
                    $nombre = $row['id_usuario'];
                    $tiporeporte = $row['id_tipo_reporte'];
                    $fechareporte = $row['fecha_reporte'];

                    if ($tiporeporte == 1) {
                        $contenido = $row['id_sensacion'];
                        echo "<tr class='filatablareportes'>
                        <td> $nombre . $contenido </td>
                        <td> $tiporeporte </td>
                        <td> $fechareporte </td>
                        <td class='columnaaccionesreportes centrar espacio-top-c'>
                            <button type='button' id='btnimprimirreportes' class='btn-acciones btn-azul borde-r-c txt-blanco centrar'> <span id='spancontenidobtnreportes'> Ver </span> </button>
                        </td>
                    </tr>";
                        echo "<tr class='filatablareportes'>
                        <td> $nombre . $contenido </td>
                        <td> $tiporeporte </td>
                        <td> $fechareporte </td>
                        <td class='columnaaccionesreportes centrar espacio-top-c'>
                            <button type='button' id='btnimprimirreportes' class='btn-acciones btn-azul borde-r-c txt-blanco centrar'> <span id='spancontenidobtnreportes'> Ver </span> </button>
                        </td>
                    </tr>";
                        echo "<tr class='filatablareportes'>
                        <td> $nombre . $contenido </td>
                        <td> $tiporeporte </td>
                        <td> $fechareporte </td>
                        <td class='columnaaccionesreportes centrar espacio-top-c'>
                            <button type='button' id='btnimprimirreportes' class='btn-acciones btn-azul borde-r-c txt-blanco centrar'> <span id='spancontenidobtnreportes'> Ver </span> </button>
                        </td>
                    </tr>";
                    } else if ($tiporeporte == 2) {
                        $contenido = $row['texto_reporte'];
                        echo "<tr class='filatablareportes'>
                        <td> $nombre . $contenido </td>
                        <td> $tiporeporte </td>
                        <td> $fechareporte </td>
                        <td class='columnaaccionesreportes centrar espacio-top-c'>
                            <button type='button' id='btnimprimirreportes' class='btn-acciones btn-azul borde-r-c txt-blanco centrar'> <span id='spancontenidobtnreportes'> Ver </span> </button>
                        </td>
                    </tr>";
                    } else if ($tiporeporte == 3) {
                        $contenido = $row['audio_reporte'];
                        echo "<tr class='filatablareportes'>
                        <td> <audio controls>
                            <source src='$contenido' type='audio/mpeg'>
                        </audio> </td>
                        <td> $tiporeporte </td>
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