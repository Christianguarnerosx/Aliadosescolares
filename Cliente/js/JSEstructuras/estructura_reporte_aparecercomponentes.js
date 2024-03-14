/*con este scrip se podra hacer aparecer y desaparecer los elementos/componentes segun vayan siendo seleccionados*/

/*Logica para elegir tipo de reporte (se ocupan los ids de los componentes_php)*/
/* Creamos una variable para guardar un elemento de html (el que tenga el id select-tipo-reporte)*/
const reporte = document.getElementById('select-tipo-reporte'); /*Se hace refrencia a un componente php*/
const tipousuario = document.getElementById('select-tipo_usuario'); /*Se hace refrencia a un componente php*/
const grado = document.getElementById('select-grados'); /*Se hace refrencia a un componente php*/
const grupo = document.getElementById('select-grupos'); /*Se hace refrencia a un componente php*/
const usuario = document.getElementById('select-alumnos'); /*Se hace refrencia a un componente php*/

/* Si el elemento sufre un cambio */
reporte.addEventListener('change', function () {
    const reporteseleccionado = reporte.value; /* Obtener el valor seleccionado del select*/

    if (reporteseleccionado === "1") { /* Si el valor seleccionado es texto, (se maneja por el id los values para mandar el tipo de reporte)*/
        /* Por si seleccionado antes el de audio y se esta esta mostrando lo ocultamos*/
        document.getElementById('reporte-audio').classList.add('display-no');
        /* Logica para aparecer el textarea */
        document.getElementById('reporte-texto').classList.remove('display-no');

        document.getElementById('selecttipousuario').classList.remove('display-no');
    } else if (reporteseleccionado == "2") {
        /* Por si seleccionado antes el de texto y se esta esta mostrando lo ocultamos*/
        document.getElementById('reporte-texto').classList.add('display-no');
        /* Logica para aparecer el modulo de grabar audio */
        document.getElementById('reporte-audio').classList.remove('display-no');
        document.getElementById('selecttipousuario').classList.remove('display-no');
    }
});

/*Logica para que salga el tipo de usuarios*/
tipousuario.addEventListener('change', function () {
    const tipousuarioseleccionado = tipousuario.value;

    /*Si es Tipo administrador*/
    if (tipousuarioseleccionado == 1) {
        document.getElementById('btn-submit').classList.remove('display-no');
        /*Borra las demas opciones especificas para docentes y alumnos */
        document.getElementById('selectgrado').classList.add('display-no');
        document.getElementById('selectgrupo').classList.add('display-no');
        document.getElementById('selectusuario').classList.add('display-no');
    } else if (tipousuarioseleccionado == 2) { /* Si es tipo docente */
        document.getElementById('selectgrado').classList.remove('display-no');
    } else if (tipousuarioseleccionado == 3) { /* Si es moderador/tutor */
        document.getElementById('btn-submit').classList.remove('display-no');
        document.getElementById('selectgrado').classList.add('display-no');
        document.getElementById('selectgrupo').classList.add('display-no');
        document.getElementById('selectusuario').classList.add('display-no');
    } else if (tipousuarioseleccionado == 4) { /* Si es alumno */
        document.getElementById('selectgrado').classList.remove('display-no');
    }
});

grado.addEventListener('change', function () {
    document.getElementById('selectgrupo').classList.remove('display-no');
});

grupo.addEventListener('change', function () {
    document.getElementById('selectusuario').classList.remove('display-no');
    document.getElementById('btn-submit').classList.remove('display-no');
});