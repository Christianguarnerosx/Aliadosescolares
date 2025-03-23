<?php
require('../lib/fpdf186/fpdf.php');
require('../conexion.php');

if (isset($_GET['idreporte'])) {
    $idreporte = intval($_GET['idreporte']); // Seguridad contra SQL Injection

    $query = "SELECT rep.*,
                    usu.*,
                    tu.*,
                    tirep.*,
                    sen.*
                FROM reportes as rep
                INNER JOIN tipo_reportes as tirep
                ON tirep.id_tipo_reporte = rep.id_tipo_reporte
                INNER JOIN sensaciones as sen
                ON sen.id_sensacion = rep.id_sensacion
                INNER JOIN usuarios as usu 
                ON usu.id_usuario = rep.id_usuario 
                INNER JOIN tipo_usuarios as tu 
                ON tu.id_tipo_usuario = usu.id_tipo_usuario
                WHERE rep.id_reporte = $idreporte";

    $consulta = mysqli_query($conexion, $query);

    if (mysqli_num_rows($consulta) > 0) {
        $row = mysqli_fetch_array($consulta);

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Definir márgenes uniformes
        $pdf->SetLeftMargin(30);
        $pdf->SetRightMargin(30);

        $pdf->Image('../../Cliente/imagenes/logos/logoaliados.png', 160, 10, 30);
        $pdf->Ln(1);

        $pdf->SetFont('Arial', 'B', 50);
        $pdf->SetTextColor(31, 194, 167);
        $pdf->SetXY(25, 45);
        $pdf->MultiCell(0, 5, mb_convert_encoding("Reporte de Aliado", 'ISO-8859-1', 'UTF-8'), 0, 'J');
        $pdf->SetTextColor(0);
        $pdf->Ln(1);

        $pdf->SetFont('Arial', '', 12);
        $pdf->SetXY(20, 60);
        $pdf->SetFont('Arial', '', 12);

        // Título principal
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, mb_convert_encoding("Detalles del Reporte", 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');
        $pdf->Ln(1);

        // Texto del reporte
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 5, utf8_decode(
            "Este reporte fue registrado el día " . $row['fecha_reporte'] .
                " por " . $row['nombre'] . " " . $row['apellidop'] .
                ", quien tiene el rol de " . $row['nombre_tipo_usuario'] . ".\n\n" .

                "El tipo de reporte es: " . $row['nombre_tipo_reporte'] .
                ". A continuación, se describe el incidente en detalle:\n\n"
        ), 0, 'J');

        // Texto del reporte
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, utf8_decode("Detalles del Reporte:"), 0, 1, 'L');
        $pdf->Ln(2);

        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 5, utf8_decode(
            "Este reporte fue registrado el día " . $row['fecha_reporte'] .
                " por " . $row['nombre'] . " " . $row['apellidop'] .
                ", quien tiene el rol de " . $row['nombre_tipo_usuario'] . ".\n\n" .
                "El tipo de reporte es: " . $row['nombre_tipo_reporte'] . ".\n\n"
        ), 0, 'J');

        // Mostrar contenido específico según el tipo de reporte
        if ($row['id_tipo_reporte'] == 2 && !empty($row['texto_reporte'])) {
            // **Texto del Reporte**
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, utf8_decode("Texto del Reporte:"), 0, 1, 'L');
            $pdf->SetFont('Arial', '', 12);
            $pdf->MultiCell(0, 5, utf8_decode($row['texto_reporte']), 0, 'J');
            $pdf->Ln(5);
        }

        if ($row['id_tipo_reporte'] == 1 && !empty($row['imagen_sensacion'])) {
            // **Imagen del Reporte**
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 1, utf8_decode("Imagen del Reporte:"), 0, 1, 'L');

            // Ruta completa de la imagen
            $ruta_imagen = "../../Cliente/imagenes/iconos/emojis/" . $row['imagen_sensacion'];

            // Verificar si la imagen existe antes de mostrarla
            if (file_exists($ruta_imagen)) {
                $pdf->Image($ruta_imagen, 80, $pdf->GetY(), 10); // Centrada con 60px de ancho
                $pdf->Ln(15); // Espacio después de la imagen
            } else {
                $pdf->SetFont('Arial', 'I', 10);
                $pdf->Cell(0, 10, utf8_decode("No se encontró la imagen."), 0, 1, 'L');
                $pdf->Ln(5);
            }
        }

        if ($row['id_tipo_reporte'] == 3 && !empty($row['audio_reporte'])) {
            // **Archivo de Grabación**
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, utf8_decode("Archivo de Grabación:"), 0, 1, 'L');
            $pdf->SetFont('Arial', '', 12);
            $pdf->MultiCell(0, 5, utf8_decode("El audio se encuentra disponible en: " . $row['audio_reporte']), 0, 'J');
            $pdf->Ln(5);
        }




        $pdf->MultiCell(0, 5, mb_convert_encoding(
            "Este documento refleja la información proporcionada por el usuario y será utilizado para su correspondiente evaluación y seguimiento.",
            'ISO-8859-1',
            'UTF-8'
        ), 0, 'J');
        $pdf->Ln(1);

        // Pasos a seguir
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, mb_convert_encoding("Pasos a seguir con este reporte:", 'ISO-8859-1', 'UTF-8'), 0, 1, 'L');
        $pdf->Ln(1);

        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(0, 5, mb_convert_encoding(
            "1. Presentar el reporte a los maestros responsables.\n" .
                "2. Los maestros analizarán la situación y canalizarán el caso a las personas correspondientes.\n" .
                "3. Se establecerán medidas de apoyo adecuadas según el caso.\n" .
                "4. Se dará seguimiento para garantizar el bienestar del niño/a.",
            'ISO-8859-1',
            'UTF-8'
        ), 0, 'J');
        $pdf->Ln(1);

        // Mensaje de tranquilidad
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, mb_convert_encoding("Mensaje de tranquilidad:", 'ISO-8859-1', 'UTF-8'), 0, 1, 'L');
        $pdf->Ln(1);

        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(0, 5, mb_convert_encoding(
            "Queremos que sepas que estamos aquí para ayudarte. No estás solo/a y tomaremos las medidas necesarias para asegurar que te sientas seguro/a y apoyado/a. " .
                "Si necesitas hablar con alguien, no dudes en acercarte a un maestro o persona de confianza.",
            'ISO-8859-1',
            'UTF-8'
        ), 0, 'J');
        $pdf->Ln(10);

        // Políticas de Confidencialidad
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 5, mb_convert_encoding("Políticas de Confidencialidad:", 'ISO-8859-1', 'UTF-8'), 0, 1, 'L');
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(0, 5, mb_convert_encoding(
            "Este documento es estrictamente confidencial y solo será compartido con el personal autorizado para garantizar la protección y bienestar del menor involucrado. " .
                "La información contenida en este reporte no será divulgada a terceros sin autorización previa, salvo en casos donde sea requerido por la ley o por la seguridad del menor.\n" .
                "Se recomienda el manejo responsable de este documento y su uso exclusivo para fines institucionales.",
            'ISO-8859-1',
            'UTF-8'
        ), 0, 'J');

        $pdf->SetFont('Arial', '', 12);
        $pdf->SetXY(150, 265);
        $pdf->Cell(0, 5, "___________________", 0, 1, 'L');
        $pdf->Ln(1);

        $pdf->SetFont('Arial', '', 12);
        $pdf->SetXY(150, 265);
        $pdf->Cell(0, 5, mb_convert_encoding($row['nombre'] . ' ' . $row['apellidop'], 'ISO-8859-1', 'UTF-8'), 0, 1, 'L');
        $pdf->Ln(1);

        $pdf->SetXY(150, 270);
        $pdf->Cell(0, 5, mb_convert_encoding($row['nombre_tipo_usuario'], 'ISO-8859-1', 'UTF-8'), 0, 1, 'L');

        // Muestra el PDF en el navegador
        $pdf->Output('I', 'reporte_' . $idreporte . '.pdf');

        exit();
    } else {
        echo "Reporte no encontrado.";
    }
}
