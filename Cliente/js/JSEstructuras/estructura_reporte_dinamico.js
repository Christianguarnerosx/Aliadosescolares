document.addEventListener("DOMContentLoaded", function () {
    var datos = [];

    var opcionestipoReporte = document.querySelectorAll('.tiporepor');

    opcionestipoReporte.forEach(function (opcion) {
        opcion.addEventListener("click", function () {
            var id_tiporeporte = this.getAttribute('data-id');
            console.log("El tipo de reporte es", id_tiporeporte); // Verifica que el ID de la tarjeta sea correcto
            tarjetaActual = document.getElementById('card1');

            datos.push(id_tiporeporte);
            console.log(datos);

            animarcard(tarjetaActual); // Llama a la función para animar la tarjeta
        });
    });

    var opcionestipoUsuario = document.querySelectorAll('.tipousu');

    opcionestipoUsuario.forEach(function (opcion) {
        opcion.addEventListener("click", function () {
            var id_tipusuario = this.getAttribute('data-id');
            console.log("El tipo deusuario es", id_tipusuario); // Verifica que el ID de la tarjeta sea correcto
            tarjetaActual = document.getElementById('card2');

            datos.push(id_tipusuario);
            console.log(datos);

            if (id_tipusuario === "3" && datos[0] === "1") {
                document.getElementById('card6').style.zIndex = 4;
                console.log("reporimag");
            } else if (id_tipusuario === "3" && datos[0] === "2") {
                document.getElementById('card7').style.zIndex = 4;
                console.log("reportext");
            } else if (id_tipusuario === "3" && datos[0] === "3") {
                document.getElementById('card8').style.zIndex = 4;
                console.log("reporaudio");
            } else {
                document.getElementById('card3').style.zIndex = 4;
            }
            animarcard(tarjetaActual); // Llama a la función para animar la tarjeta
        });
    });


    var opcionesgrados = document.querySelectorAll('.grados');

    opcionesgrados.forEach(function (opcion) {
        opcion.addEventListener("click", function () {
            var id_grado = this.getAttribute('data-id');
            console.log("Su grado es", id_grado); // Verifica que el ID de la tarjeta sea correcto
            tarjetaActual = document.getElementById('card3');

            datos.push(id_grado);
            console.log(datos);

            document.getElementById('card4').style.zIndex = 5;

            animarcard(tarjetaActual); // Llama a la función para animar la tarjeta
        });
    });

    var opcionesgrupos = document.querySelectorAll('.grupos');

    opcionesgrupos.forEach(function (opcion) {
        opcion.addEventListener("click", function () {
            var id_grupo = this.getAttribute('data-id');
            console.log("Su grupo es", id_grupo); // Verifica que el ID de la tarjeta sea correcto
            tarjetaActual = document.getElementById('card4');

            datos.push(id_grupo);
            console.log(datos);

            document.getElementById('card5').style.zIndex = 6;

            animarcard(tarjetaActual); // Llama a la función para animar la tarjeta
        });
    });

    var opcionesusuarios = document.querySelectorAll('.usuarios');

    opcionesusuarios.forEach(function (opcion) {
        opcion.addEventListener("click", function () {
            var id_usuario = this.getAttribute('data-id');
            console.log("El usuario es", id_usuario); // Verifica que el ID de la tarjeta sea correcto
            tarjetaActual = document.getElementById('card5');

            datos.push(id_grado);
            console.log(datos);

            if (datos[0] === "1") {
                console.log("Reporte imagen");
                document.getElementById('card6').style.zIndex = 8;
            } else if (datos[0] === "2") {
                console.log("Reporte texto");
                document.getElementById('card7').style.zIndex = 8;
            } else if (datos[0] === "") {
                console.log("Reporte audio");
                document.getElementById('card8').style.zIndex = 8;
            }

            animarcard(tarjetaActual); // Llama a la función para animar la tarjeta
        });
    });


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
