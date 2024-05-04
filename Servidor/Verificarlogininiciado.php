<?php
/* Verificamos si ya se inicio sesion y SI NO SE CERRO (cerro sesion) solo SE SALIO (del telefono/pagina cerrar navegador)  */
if (isset($_SESSION['usuario'])) {
    header('Location: ./Cliente/p_alumnos/Principalalm.php'); /* Si hay datos iniciados mandas al principalalm */
    exit(); /* Se asegura que este escript igual se detenga al mandar al index */
}
