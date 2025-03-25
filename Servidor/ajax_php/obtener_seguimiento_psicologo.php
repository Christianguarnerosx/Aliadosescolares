<?php

include("../Conexion.php");

if (isset($_POST['id_usuario'])) {

    $id_usuario = $_POST['id_usuario'];

    $query = "SELECT cpu.*,
                    u.*
                FROM citas_psicologo_usuarios as cpu
                INNER JOIN usuarios as u 
                ON u.id_usuario = cpu.id_usuario
                WHERE cpu.id_usuario = $id_usuario
                ORDER BY cpu.id_citas_psicologo_usuario desc";

    $ejecutar = mysqli_query($conexion, $query);

    echo '<h2 class="titulo-m txt-titulo">Crear nuevo seguimiento</h2>
            <div class="w-100">
                <div class="mb-3">
                    <label for="anotaciones_psicologo" class="form-label">Anotaciones Psicólogo:</label>
                    <textarea class="form-control anotaciones_psicologo" id="anotaciones_psicologo" name="anotaciones_psicologo" rows="3"></textarea>
                </div>
                </div>
                <div class="row w-100">
                <button type="submit" class="btn btn-primary btncrearseguimiento" data-id="' . $id_usuario . '">Crear seguimiento</button>
                </div>';

    echo '<h2 class="titulo-m txt-titulo mt-3 w-100">Seguimientos registrados</h2>';
    echo "<div class='rowcrg-nocentrar espacio-top-c txt-blanco borde-r-c'>";
    if (mysqli_num_rows($ejecutar) > 0) {
        while ($row = mysqli_fetch_array($ejecutar)) {
            echo "<div class='cardsitasusuariopsico'>";
            echo "<h5 class='tiutlocita text-c'>Numero seguimiento: " . $row['id_citas_psicologo_usuario'] . "</h5>";
            echo "<p class='nombreusuariocita text-c'>" . $row['nombre'] . " " . $row['apellidop'] . " " . $row['apellidom'] . "</p>";
            echo "<p class='fechacita text-c'>" . $row['fecha_cita'] . "</p>";
            echo "<div class='anotacionespsicologo'>";
            echo "<label class='anotacionespsicologosubtitulo'>Anotaciones Psicólogo:</label>";
            echo "<textarea class='form-control textareacitaspsic'>" . $row['anotaciones_psicologo'] . "</textarea>";
            echo "<button type='button' class='btn btn-primary btnactualizaranotaciones' data-id='" . $row['id_citas_psicologo_usuario'] . "'>Actualizar</button>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "Error en la consulta";
    }
    echo "</div>";
}
