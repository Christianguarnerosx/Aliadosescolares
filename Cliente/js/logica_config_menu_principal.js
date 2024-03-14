/*Logica que maneja la forma de comportarse de el menu opcionesalm,
Logica de eventos si le dan click a las opciones, estan a la espera de que presionen
como se comporta si estan 1 abierta y abres otra(se cierra la que estaba abierta y se abre la seleccionada)*/

//Logica de la opcion cambiar avatar, espera que le den click a el boton config avatar*/
document.addEventListener('DOMContentLoaded', function () {
    const enlace = document.getElementById('configavataralm');

    enlace.addEventListener('click', function (event) {
        event.preventDefault();
        if (document.getElementById('contenedor-cambiaravataralm').classList.contains('collapse')) {
            document.getElementById('contenedor-cambiaravataralm').classList.remove('collapse');
            document.getElementById('contenedor-cambiarfondoalm').classList.add('collapse');
            document.getElementById('contenedor-cambiarapodoalm').classList.add('collapse');
        } else {
            document.getElementById('contenedor-cambiaravataralm').classList.add('collapse');
        }
    })
});

//Logica de la opcion cambiar fondo, espera que le den click a el boton config fondo*/
document.addEventListener('DOMContentLoaded', function () {
    const enlace = document.getElementById('confifondoalm');

    enlace.addEventListener('click', function (event) {
        event.preventDefault();
        if (document.getElementById('contenedor-cambiarfondoalm').classList.contains('collapse')) {
            document.getElementById('contenedor-cambiarfondoalm').classList.remove('collapse');
            document.getElementById('contenedor-cambiaravataralm').classList.add('collapse');
            document.getElementById('contenedor-cambiarapodoalm').classList.add('collapse');
        } else {
            document.getElementById('contenedor-cambiarfondoalm').classList.add('collapse');
        }
    })
});

//Logica de la opcion cambiar apodo, espera que le den click a el boton config apodo*/
document.addEventListener('DOMContentLoaded', function () {
    const enlace = document.getElementById('confiapodoalm');

    enlace.addEventListener('click', function (event) {
        event.preventDefault();
        if (document.getElementById('contenedor-cambiarapodoalm').classList.contains('collapse')) {
            document.getElementById('contenedor-cambiarapodoalm').classList.remove('collapse');
            document.getElementById('contenedor-cambiarfondoalm').classList.add('collapse');
            document.getElementById('contenedor-cambiaravataralm').classList.add('collapse');

        } else {
            document.getElementById('contenedor-cambiarapodoalm').classList.add('collapse');
        }
    })
});