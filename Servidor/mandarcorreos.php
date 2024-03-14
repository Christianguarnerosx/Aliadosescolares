<?php
/*Desde aqui se configura toda la cuenta mail, correo desde donde se enviaran
obvio debes de poner tus credenciales, para iniciar sesion con phpmailer y que este pueda enviarlos desde tu cuenta,
ahora, bien si es de google hay que habilitar la autenticacion en 2 pasos. Ya que sin esto mandara errores/dira que no sirve etc */
//Importar las clases del php mailer
//Estos permitiran hacer uso de las funciones que se necesiten asi como mandarlas a traer de donde se ubican
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPMailer-master/src/Exception.php';
require 'lib/PHPMailer-master/src/SMTP.php';
require 'lib/PHPMailer-master/src/PHPMailer.php';

$alert = "";

if (!empty($_POST)) {
    if (!empty($_POST['usuario'])) {
        include_once("Conexion.php");

        $credencial = $_POST['usuario'];
        $query = "SELECT * FROM usuarios WHERE id_usuario = '$credencial' OR correo = '$credencial'";
        $consulta = mysqli_query($conexion, $query);
        $resultado = mysqli_fetch_array($consulta);

        if ($resultado > 0) {

            //Creamos una instancia del php mailer true
            $mail = new PHPMailer(true);

            try {
                //Configuracion del servidor
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Debug (opcional) se utiliza para saber que ocurre con la salida de la libreria (RESULTADOS)
                $mail->isSMTP();                                            //Se manda mediante SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Asignamos el tipo de smtp al que mandaremos, en este caso a gmail, .office365.
                $mail->SMTPAuth   = true;                                   //Habilitamos la autentificacion de SMTP
                $mail->Username   = 'dscrgoficial@gmail.com';                     //Correo del usuario del SMTP (el remitente)
                $mail->Password   = 'qvfh ncuc iwci ypgq';                               //Contraseña del correo del SMTP (del correo remitente)
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          //Habilitamos la encriptacion TLS
                $mail->Port       = 587;                                    // El puerto TCP por el que se utilizara PHPMailer se usa habitalmente 587 (hay otras) con `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                $mail->CharSet = 'UTF-8';
                //Puede que si marcan errores debeas configurar la veri 2 paso ggl pass aplicacion
                //Direcciones de los implicados
                $mail->setFrom('dscrgoficial@gmail.com', 'DSCRG Oficial'); //Remitente
                $mail->addAddress($resultado['correo'], $resultado['nombre'] . " " . $resultado['apellidop'] . " " . $resultado['apellidom']);     //Destinatario

                //Contenido del correo (mensaje)
                $mail->isHTML(true);                                  //Enviar correo formato to HTML
                $mail->Subject = 'Hola, ' . $resultado['nombre'] . " " . $resultado['apellidop'] . "!"; //Se envia con los datos que guarda la consulta de la var resultado
                $mail->Body    = 'Tu contraseña es: ' . $resultado['contraseña'];

                $mail->send(); //Mandar el mensaje
                echo 'Message has been sent'; //Mensaje ha sido enviado Crack SIUUU

                header("Location: ../Cliente/p_generales/recuperarpass.php?resultado=exito");
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; //Te fallo bro, nouuuuuu

                header("Location: ../Cliente/p_generales/recuperarpass.php?resultado=error");
            }
        } else {
            header("Location: ../Cliente/p_generales/recuperarpass.php?resultado=fracaso");
        }
    } else {
        header("Location: ../Cliente/p_generales/recuperarpass.php?resultado=vacio");
    }
} else {
    header("Location: ../Cliente/p_generales/recuperarpass.php?resultado=vacio");
}
