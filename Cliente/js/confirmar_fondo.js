//se crea una funcion para poder obtener la ruta llamada Imagenseleccionada, la cual en su parametro se pasa la ruta del onclick="rutadelaimagen" de la imagen
function Fondoseleccionado(rutaFondo) {
    //Obtiene la ruta en cuanto entra a esta funcion y recibe en su parametro
    Swal.fire({
        //Se crea/muestra una nueva ventana de confirmacion de sweet alert
        title: "¿Estás seguro de elegir este Fondo?", //titulo
        text: 'Presiona "Aceptar" para confirmar tu selección', //cuerpo
        icon: "question", //icono
        showCancelButton: true, //¿Quieres boton de cancelar? verdadero
        confirmButtonText: "Aceptar", // Cuerpo de el boton de confirmacion
        cancelButtonText: "Cancelar", //cuerpo del boton de cancelar
    }).then((result) => {
        //Se espera la respuesta del uasuario con .then
        if (result.isConfirmed) {
            //si es afirmativo entonces
            // Antes de la redirección, guarda el mensaje en sessionStorage
            sessionStorage.setItem("mensajeExito", "¡Fondo seleccionado!"); //Se guarda en la pagina (al parecer son como cookiieees) para ternerla y ocuparla donde se mande (se borra cuando la sesion o la pestaña se elimna o cierra)

            // Envía la ruta del avatar al archivo PHP
            enviarRutaFondoAlServidor(rutaFondo, function () { /* ESTA ES LA PARTE 2/2 QUE CAMABIO PARA QUE MANDE  PRIMERO EL AVTAR LO INSERTE Y ASI APAREZCA BIEN EN LA INTERFAZ PRINCIPAL SE METIO EL WINDOWLOCATION HASTA QUE ENVIE EL CALLBACK*/
                window.location.href = "Principalalm.php"; // Se manda a la pagina que se indique
            }); //Se envia la ruta obtenida en esta funcio y se manda a la siguiente funcion la cual la enviara por AJAX
        }
    });
}

//Se crea la funcion en la que se mando la ruta y recibe esa ruta enviada en su parametro
function enviarRutaFondoAlServidor(rutaFondo, callback) {
    //solicitud AJAX (es una combinacion de javascript y xml)
    $.ajax({
        url: "../../Servidor/actualizarfondo.php", // Nombre del archivo al que se enviara la informacion (ruta del avatar)
        type: "POST", //Tipo de envio de dato
        data: { rutafon: rutaFondo }, // Envia a la ruta el avatar {(nombre de la variable a enviar utilizara como el name), (la ruta que tiene la funcion)}
        success: function (response) { //Si todo es correcto/se cumple
            // La solicitud AJAX se completó con éxito
            // alert("Se envió la ruta del avatar con éxito");
            if (typeof callback === "function") {     /* ESTA ES LA PARTE 2/2 QUE CAMABIO PARA QUE MANDE  PRIMERO EL AVTAR LO INSERTE Y ASI APAREZCA BIEN EN LA INTERFAZ PRINCIPAL*/
                // Llama al callback (función proporcionada como argumento)
                callback();
            }
        },
        error: function (error) { //Si hubo algun error
            //alert("Hubo un error al enviar la ruta del avatar");
        },
    });
}