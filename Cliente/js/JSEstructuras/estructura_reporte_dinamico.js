/* Este js controlara la forma de comportarse de las cards, quien va despues de cual, obtiene el id_de cada opcion mostrada,
ejecuta animacion de bajar(salida) de las cards, y envia con ajax(jquery) solicitud de usuarios dependiendo las opciones elegidas,
al igual con ajax (jquery) al final manda los datos para insertar en reportes*/

document.addEventListener("DOMContentLoaded", function () {
    var datos = []; /*array datos donde se iran guardando los datos seleccionados (se utilizara para mandar por ajax datos de este array y asi compartir datos entre php y js)*/

    /* Obtiene todas las opciones/cards que tengan esa clase para identificar que son cards/opciones tiporeporte*/
    var opcionestipoReporte = document.querySelectorAll('.tiporepor');

    /*Hace que cada card/opcion tengan una funcion click para cuando se le haga click obetener los datos de esa card/opcion en especifico*/
    opcionestipoReporte.forEach(function (opcion) {
        opcion.addEventListener("click", function () { /* Un evento que espera a que se de click */

            var id_tiporeporte = this.getAttribute('data-id'); /* obtiene el id dela opcion, es como su 'value' que esta declarado en la etiqueta de la opcion*/
            datos.push(id_tiporeporte); /* Metemos el dato obtenido tipo reporte en nuestro array*/

            console.log("El tipo de reporte es", id_tiporeporte); //(Se puede borrar)imprimimos para ver si el ID elegido sea correcto
            tarjeta = document.getElementById('card1'); /* Se obtiene el id de la card contenedora donde estamos para enviarla a desaparecer*/

            console.log(datos); /*(se puede eliminar)Checamos que si se haya enviadoel dato al array*/

            animarcard(tarjeta); // Llama a la función para animar/desparecer a la card contenedora
        });
    });


    /* Obtiene todas las opciones/cards que tengan esa clase para identificar que son cards/opciones tipousuario*/
    var opcionestipoUsuario = document.querySelectorAll('.tipousu');

    /*Hace que cada card/opcion tengan una funcion click para cuando se le haga click obetener los datos de esa card/opcion en especifico*/
    opcionestipoUsuario.forEach(function (opcion) {
        opcion.addEventListener("click", function () { /* Un evento que espera a que se de click */
            var id_tipusuario = this.getAttribute('data-id'); /* obtiene el id dela opcion, es como su 'value' que esta declarado en la etiqueta de la opcion*/
            datos.push(id_tipusuario); /* Metemos el dato obtenido tipo usuario en nuestro array*/

            console.log("El tipo deusuario es", id_tipusuario); //(Se puede borrar)imprimimos para ver si el ID elegido sea correcto
            tarjeta = document.getElementById('card2'); /* Se obtiene el id de la card contenedora donde estamos para enviarla a desaparecer*/

            console.log(datos); /*(se puede eliminar)Checamos que si se haya enviadoel dato al array*/

            /*Con estos ifs haremos: Que si se selecciono a su padre lo mande directo a realizar el reporte ya que no tiene grado y grupo ni se deberia escojer usuario*/
            if (id_tipusuario === "3" && datos[0] === "1") { /* Si es padre y eligio el reporte de imagenes*/
                document.getElementById('card6').style.zIndex = 4; /* Aparece card de seleccionar imagen*/
                console.log("reporimag");
                datos.push(""); /* Metemos el dato vacio para poder encajar con la solicitud del back*/
                datos.push(""); /* Metemos el dato vacio para poder encajar con la solicitud del back*/
                datos.push(""); /* Metemos el dato vacio para poder encajar con la solicitud del back*/
            } else if (id_tipusuario === "3" && datos[0] === "2") { /* Si es padre y eligio el reporte de texto*/
                document.getElementById('card7').style.zIndex = 4; /* Aparece card de escribir texto */
                console.log("reportext");
                datos.push(""); /* Metemos el dato vacio para poder encajar con la solicitud del back*/
                datos.push(""); /* Metemos el dato vacio para poder encajar con la solicitud del back*/
                datos.push(""); /* Metemos el dato vacio para poder encajar con la solicitud del back*/
            } else if (id_tipusuario === "3" && datos[0] === "3") { /* Si es padre y eligio el reporte de audio*/
                document.getElementById('card8').style.zIndex = 4; /* Aparece card de grabar audio*/
                console.log("reporaudio");
                datos.push(""); /* Metemos el dato vacio para poder encajar con la solicitud del back*/
                datos.push(""); /* Metemos el dato vacio para poder encajar con la solicitud del back*/
                datos.push(""); /* Metemos el dato vacio para poder encajar con la solicitud del back*/
            } else {
                document.getElementById('card3').style.zIndex = 4; /* Si no es padre (entoces es maestro o alumno).. manda a seleccionar grados y grupo */
            }
            animarcard(tarjeta); // Llama a la función para animar la tarjeta
        });
    });

    /* Obtiene todas las opciones/cards que tengan esa clase para identificar que son cards/opciones grados*/
    var opcionesgrados = document.querySelectorAll('.grados');

    /*Hace que cada card/opcion tengan una funcion click para cuando se le haga click obetener los datos de esa card/opcion en especifico*/
    opcionesgrados.forEach(function (opcion) {
        opcion.addEventListener("click", function () { /* Un evento que espera a que se de click */
            var id_grado = this.getAttribute('data-id'); /* obtiene el id de la opcion, es como su 'value' que esta declarado en la etiqueta de la opcion*/
            datos.push(id_grado); /* Metemos el dato obtenido grado elegido en nuestro array*/

            console.log("Su grado es", id_grado); // Verifica que el ID de la tarjeta sea correcto
            tarjeta = document.getElementById('card3'); /* Se obtiene el id de la card contenedora donde estamos para enviarla a desaparecer*/

            console.log(datos); //(Se puede borrar)imprimimos para ver si el ID elegido sea correcto

            document.getElementById('card4').style.zIndex = 5; /* Aparece card de seleccionar grupo*/

            animarcard(tarjeta); // Llama a la función para animar la tarjeta
        });
    });


    /* Obtiene todas las opciones/cards que tengan esa clase para identificar que son cards/opciones grupos*/
    var opcionesgrupos = document.querySelectorAll('.grupos');

    /*Hace que cada card/opcion tengan una funcion click para cuando se le haga click obetener los datos de esa card/opcion en especifico*/
    opcionesgrupos.forEach(function (opcion) {
        opcion.addEventListener("click", function () { /* Un evento que espera a que se de click */
            var id_grupo = this.getAttribute('data-id'); /* obtiene el id de la opcion, es como su 'value' que esta declarado en la etiqueta de la opcion*/
            datos.push(id_grupo); /* Metemos el dato obtenido el grupo elegido en nuestro array*/

            console.log("Su grupo es", id_grupo); // Verifica que el ID de la tarjeta sea correcto
            tarjeta = document.getElementById('card4'); /* Se obtiene el id de la card contenedora donde estamos para enviarla a desaparecer*/

            console.log(datos); //(Se puede borrar)imprimimos para ver si el ID elegido sea correcto

            document.getElementById('card5').style.zIndex = 6; /* Aparece card de seleccionar alumno (RESALTAR que seleccionar alumno se manda con ajax, se obtienen los usuarios segun lo seleccionado anteriormente)*/

            animarcard(tarjeta); // Llama a la función para animar la tarjeta

            /* Los valores que searn mandados al servidor (archivo php con la consulta) son: (tipo usuario, grado, grupo)*/
            const valoresmandados = [datos[1], datos[2], datos[3]];
            const json = JSON.stringify(valoresmandados); /* Se guarda en una variable llamda json los valores transformados a formato json (es como si se pasara de int a string, de string a json (ya que json es como puede leer el servidor))*/

            /* Consulta asincrona */
            /* El ajax, funcion de jquery (PARA PODER UTILIZAR AJAX (De esta forma) es necesario importar jQuery como script al html)*/
            $.ajax({
                type: "POST", /* Tipo de envio (tambien se debera de obtener con este tipo en el back php)*/
                url: "../../Servidor/ajax_php/ajax_filtrarusuarios.php", /* A donde se envia */
                data: { data: json }, /* Los datos que se envian */
                success: function (response) { /* Si el back hace todo correcto DEVOLVERA UNA RESPUESTA*/
                    console.log("La respuesta del servidor fue", response); /* Imprimimos la respuesta para ver que devolvio (si es lo qyue queriamos o el error) */
                    $('#card5').html(response); /* Forma de insertar codigo html en el file con .html (hay otros como .txt que devuelve texto, etc seria custion de investigar cual es el que necesites) */

                    seleccionarusuario(); /* Mandamos a traer la funcion seleccionar usuario (ya que si se hace separado no se podra mandar a la otra card)*/
                }
            });
        });
    });


    /* Funcion de seleccionar usuario */
    function seleccionarusuario() { /* Esta funcion se hace asi por que al dar click a el grado debera mandar a imprimir la tarjeta y mostrar las opciones entonces es necesario traerla como funcion cuando presionen un grupo*/

        /* Obtiene todas las opciones/cards que tengan esa clase para identificar que son cards/opciones usuarios*/
        var opcionesusuarios = document.querySelectorAll('.usuarios');

        /*Hace que cada card/opcion tengan una funcion click para cuando se le haga click obetener los datos de esa card/opcion en especifico*/
        opcionesusuarios.forEach(function (opcion) {
            opcion.addEventListener("click", function () { /* Un evento que espera a que se de click */
                var id_usuario = this.getAttribute('data-id'); /* obtiene el id de la opcion, es como su 'value' que esta declarado en la etiqueta de la opcion*/
                datos.push(id_usuario); /* Metemos el dato obtenido el usuario_reportado en nuestro array*/

                console.log("El usuario es", id_usuario); // Verifica que el ID de la tarjeta sea correcto
                tarjeta = document.getElementById('card5'); /* Se obtiene el id de la card contenedora donde estamos para enviarla a desaparecer*/

                console.log(datos); //(Se puede borrar)imprimimos para ver si el ID elegido sea correcto

                animarcard(tarjeta); // Llama a la función para animar la tarjeta

                /* IFs para saber obetener que tipo de reporte es el que pidieron y mandar a la card especifica (a img,txt o audio) */
                if (datos[0] === "1") { /* Si en el array en la pos 1 es 1 significa que es reporte tipo imagen */
                    console.log("Reporte imagen"); //(Se puede borrar)imprimimos para ver si el tipo reporte elegido sea correcto
                    document.getElementById('card6').style.zIndex = 8; /* Mandamos la card de repor img */
                } else if (datos[0] === "2") {/* Si en el array en la pos 1 es 1 significa que es reporte tipo texto */
                    console.log("Reporte texto"); //(Se puede borrar)imprimimos para ver si el tipo reporte elegido sea correcto
                    document.getElementById('card7').style.zIndex = 8; /* Mandamos la card de repor txt */
                } else if (datos[0] === "3") { /* Si en el array en la pos 1 es 1 significa que es reporte tipo audio */
                    console.log("Reporte audio"); //(Se puede borrar)imprimimos para ver si el tipo reporte elegido sea correcto
                    document.getElementById('card8').style.zIndex = 8; /* Mandamos la card de repor audio */
                }
            });
        });
    }


    /* Obtiene todas las opciones/cards que tengan esa clase para identificar que son cards/opciones sensaciones*/
    var opcionessensacion = document.querySelectorAll('.sensaciones');

    /*Hace que cada card/opcion tengan una funcion click para cuando se le haga click obetener los datos de esa card/opcion en especifico*/
    opcionessensacion.forEach(function (opcion) {
        opcion.addEventListener("click", function () { /* Un evento que espera a que se de click */
            var id_sensacion = this.getAttribute('data-id'); /* obtiene el id de la opcion, es como su 'value' que esta declarado en la etiqueta de la opcion*/
            datos.push(id_sensacion);  /* Metemos el dato obtenido la sensacion elegida en nuestro array*/

            console.log("Su sensacion es", id_sensacion); // Verifica que el ID de la tarjeta sea correcto
            tarjeta = document.getElementById('card6'); /* Se obtiene el id de la card contenedora donde estamos para enviarla a desaparecer*/

            console.log(datos); //(Se puede borrar)imprimimos para ver si el ID elegido sea correcto

            document.getElementById('card9').style.zIndex = 9; /* Mandamos la card de enviar reporte (finalizar/submit) */

            animarcard(tarjeta); // Llama a la función para animar la tarjeta
        });
    });


    /* Se obtiene el boton de submit de el html con su id/ para agregarle un listenner y saber cuando es presionado*/
    var btnenviarreporte = document.getElementById('btnenviarreporteimg');

    /* Se le agrega un listenner para esperar a cuando le den click hacer algo */
    btnenviarreporte.addEventListener('click', function () {

        const datoscompletos = datos; /* El array de datos se va a guardar en la variable datos completos*/
        const json = JSON.stringify(datoscompletos); /* Para despues convertir esa variable en tipo json y se pueda enviar por el ajax */

        /* Consulta asincrona */
        /* El ajax, funcion de jquery (PARA PODER UTILIZAR AJAX (De esta forma) es necesario importar jQuery como script al html)*/
        $.ajax({
            type: "POST", /* Tipo de envio que se hace (depende de este el como obtienes en el back php$_POST) */
            url: "../../Servidor/ajax_php/ajax_insertar_reporte.php", /* A donde lo envias (el back que lo va a ocupar) */
            data: { data: json }, /* Los datos ya convertidos que se enviaran */
            success: function (response) { /* Si da alguna respuesta el back */
                console.log("La respuesta del servidor fue:", response); //(Se puede borrar)imprimimos para ver que regresa el back/server
                //aqui se hara algo como las alertas del avatar OOOK?
                sessionStorage.setItem("mensajeExito", "Reporte enviado"); /* Envia el url "mensaje de ecito que un js (Esta esperado siempre que lllega ese mensaje para activar la alerta pero necesita un parametro (el mensaje a decir, el segundo dato "Reporte enviado"))"*/
                window.location.href = 'Reportealm.php'; /* Mandamos a la pagina que queremos despues de insertar el reporte */
            }
        });
    });


    /* Se obtiene el boton de submit de el html con su id/ para agregarle un listenner y saber cuando es presionado*/
    var btnenviarreporte = document.getElementById('btnenviarreportetxt');

    /* Se le agrega un listenner para esperar a cuando le den click hacer algo */
    btnenviarreporte.addEventListener('click', function () {

        /* Obtenemos el text area como elemento y lo guardamos en una variable para poder obtener su valor despues */
        var reportetexto = document.getElementById('reporte_texto');

        /* Se guarda en una variable lo que se escribio en el textarea (se obtiene con el htmlobtenido y la funcion '.value') */
        var reportecontenido = reportetexto.value;

        datos.push(reportecontenido); /* Mandamos lo obtenido del textarea al array que guarda los datos a enviar al back/servidor */

        console.log("Reporte obtenido"); //(Se puede borrar)imprimimos para ver si se obtuvo de manera correcta el texto

        const datoscompletos = datos; /* El array de datos se va a guardar en la variable datos completos */
        const json = JSON.stringify(datoscompletos); /* Para despues convertir esa variable en tipo json y se pueda enviar por el ajax */

        /* Consulta asincrona */
        /* El ajax, funcion de jquery (PARA PODER UTILIZAR AJAX (De esta forma) es necesario importar jQuery como script al html)*/
        $.ajax({
            type: "POST", /* Tipo de envio que se hace (depende de este el como obtienes en el back php$_POST) */
            url: "../../Servidor/ajax_php/ajax_insertar_reporte.php", /* A donde lo envias (el back que lo va a ocupar) */
            data: { data: json }, /* Los datos ya convertidos que se enviaran */
            success: function (response) { /* Se obtiene alguna respuesta el back */
                console.log("La respuesta del servidor fue:", response); //(Se puede borrar)imprimimos para ver que regresa el back/server
                sessionStorage.setItem("mensajeExito", "Reporte enviado"); /* Envia el url "mensaje de ecito que un js (Esta esperado siempre que lllega ese mensaje para activar la alerta pero necesita un parametro (el mensaje a decir, el segundo dato "Reporte enviado"))"*/
                window.location.href = 'Reportealm.php'; /* Mandamos a la pagina que queremos despues de insertar el reporte */
            }
        });
    });


    /* Se obtiene el boton de submit de el html con su id/ para agregarle un listenner y saber cuando es presionado*/
    var btnenviarreporte = document.getElementById('btngrabarreporteaudio');

    var anuncio = document.getElementById('contadorgrabando');

    /* Se le agrega un listenner para esperar a cuando le den click hacer algo */
    btnenviarreporte.addEventListener('click', function () {
        iniciarGrabacion();
        animarcard(btnenviarreporte);
        anuncio.innerText = "Te estoy escuchando";
    });

    // Variables para manejar la grabación de audio
    let audioContext; // Almacena una instancia de AudioContext para la manipulación de audio
    let recorder; // Almacena una instancia del objeto encargado de la grabación de audio

    /* Para guardar el audio obtenido y poder enviarlo con ajax al back/server */
    var audioobtenido;

    /* Para poder utilizar esta funcion GRABAR es IMPORTANTE/NECESARIO API en el html donde se utilice: SCRIPT : cdn.rawgit*/
    /* Se crea la funcion iniciargrabacion para mandarla a llamar cuando se le de click a un boton con event listenner*/
    function iniciarGrabacion() {
        navigator.mediaDevices.getUserMedia({
            audio: true
        })
            .then(function (stream) {
                audioContext = new AudioContext();
                const input = audioContext.createMediaStreamSource(stream);
                recorder = new Recorder(input);

                recorder.record();

                setTimeout(function () {
                    recorder.stop();
                    recorder.exportWAV(function (blob) {
                        audioobtenido = blob;
                        console.log("audio obtenido");
                        insertaraudio(audioobtenido);
                    });
                }, 15000); // Detener la grabación después de 15 segundos
            })
            .catch(function (err) {
                console.log('Error al acceder al dispositivo de audio: ' + err); /* Si no se encuentra algun dispositivo (microfono) */
            });
    }

    /* Subfuncion que sera utilizada en la funcion de inicar grabacion, para que cuando termine se mande con ajax al server/back*/
    /* y asi poder hacer el insert en la base de datos y guardar el audio en una ruta (sonido/reportes) */
    function insertaraudio(audioainsertar) {
        var formData = new FormData(); /* Creamos un almacenamiento para guardar diferentes tipos de datos text y blob (es como un tipo de array o hashmap) */
        formData.append('id_tiporeporte', datos[0]); /* guardamos en la ruta 'id_tiporeporte' el tipo de reporte*/
        formData.append('id_tipousuario', datos[1]); /* guardamos en la ruta 'id_tipousuario' el tipo de usuario*/
        formData.append('id_grado', datos[2]); /* guardamos en la ruta 'grado' el grado donde va el reportado*/
        formData.append('id_grupo', datos[3]); /* guardamos en la ruta 'grupo' el grupo donde va el reportado*/
        formData.append('id_usuarioreportado', datos[4]); /* guardamos en la ruta 'id_usuario_reportado' al usuario reportado jaja*/
        formData.append('audio', audioainsertar); /* guardamos en la ruta 'audio' la grabacion hecha de reporte*/

        /* Se mandan los datos (obtenidos en las cards/opciones anteriores) + mas el blob */
        $.ajax({
            type: 'POST',
            url: "../../Servidor/ajax_php/ajax_insertar_reporte.php",
            data: formData,
            processData: false, /* Indispensable para enviar datos tipo blob */
            contentType: false, /* Indispensable para enviar datos tipo blob */
            success: function (response) {
                console.log("La respuesta del servidor fue:", response); //(Se puede borrar)imprimimos para ver que regresa el back/server

                sessionStorage.setItem("mensajeExito", "Reporte enviado"); /* Envia el url "mensaje de ecito que un js (Esta esperado siempre que lllega ese mensaje para activar la alerta pero necesita un parametro (el mensaje a decir, el segundo dato "Reporte enviado"))"*/
                window.location.href = 'Reportealm.php'; /* Mandamos a la pagina que queremos despues de insertar el reporte */
            }
        });
    }


});


// Función para animar la tarjeta hacia abajo y luego eliminarla
function animarcard(element) {
    // Agrega una clase para activar la animación CSS
    element.classList.add('animacionbajar');

    // Espera a que termine la animación y luego elimina la tarjeta
    setTimeout(function () {
        element.parentNode.removeChild(element);
    }, 1200); // Tiempo de espera, debe ser igual a la duración de la animación CSS
}
