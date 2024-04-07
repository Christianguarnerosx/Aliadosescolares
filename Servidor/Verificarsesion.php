<?php
/* En este script (que estara en todas las interfaces) Hace que cuando: 
SE CIERRA SESION YA NO PERMITA REGRESAR A LAS INTERFACES Y SIEMPRE VAYA A INICIAR SESION */

/* Verificamos si no hay en la bodeda de variables sesion, una de usuario que se crea cuando iniciam sesion y se destruiye cuando se cierra (que dice que si esta iniciado sesion) */
if (!isset($_SESSION['usuario'])) {
    header('Location: ../../Index.php'); /* Si no, lo mandas a el index para que inicie sesion */
    exit(); /* Se asegura que este escript igual se detenga al mandar al index */
}
