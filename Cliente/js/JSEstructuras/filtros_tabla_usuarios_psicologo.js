const contenedorbusquedareportes = document.getElementById('contenedorbusquedareportes');
const btnBuscarReportes = document.querySelector('.btnbusquedareportes');
const contenedorfiltrosbusquedareportes = document.getElementById('contenedorfiltrosbusquedareportes');
const contendorcheckboxesfiltrosbusquedareportes = document.getElementById('contendorcheckboxesfiltrosbusquedareportes');
const btnordenesbusquedareportes = document.getElementById('btnordenesbusquedareportes');
const contendorcheckboxesordenesbusquedareportes = document.getElementById('contendorcheckboxesordenesbusquedareportes');
const contendortablareportes = document.getElementById('contendortablareportes');
const inputbusquedareportes = document.getElementById('inputbusquedareportes');

const btnfiltrosbusquedareportes = document.getElementById('btnfiltrosbusquedareportes');

const contenedorordenesbusquedareportes = document.getElementById('contenedorordenesbusquedareportes');


btnfiltrosbusquedareportes.addEventListener('click', function () {
    if (contendorcheckboxesfiltrosbusquedareportes.classList.contains('filtrosabierto')) {
        contendorcheckboxesfiltrosbusquedareportes.classList.remove('filtrosabierto');
        contendorcheckboxesfiltrosbusquedareportes.style.opacity = '0';
        contenedorfiltrosbusquedareportes.style.height = '30px';
        contenedorfiltrosbusquedareportes.style.width = '10%';
        contenedorfiltrosbusquedareportes.style.top = '25px';
        contendorcheckboxesfiltrosbusquedareportes.style.width = '0px';
        contendorcheckboxesfiltrosbusquedareportes.style.height = '0px';
        contendorcheckboxesfiltrosbusquedareportes.style.top = '0px';
        contenedorfiltrosbusquedareportes.style.zIndex = '1';
        contenedorfiltrosbusquedareportes.style.overflowY = 'hidden';
        return;
    }

    contenedorfiltrosbusquedareportes.style.height = '370px';
    contenedorfiltrosbusquedareportes.style.width = '12%';
    contendorcheckboxesfiltrosbusquedareportes.classList.add('filtrosabierto');
    contendorcheckboxesfiltrosbusquedareportes.style.opacity = '1';
    contendorcheckboxesfiltrosbusquedareportes.style.width = '90%';
    contendorcheckboxesfiltrosbusquedareportes.style.height = '25px';
    contendorcheckboxesfiltrosbusquedareportes.style.top = '28px';
    contenedorfiltrosbusquedareportes.style.zIndex = '5';
    contenedorfiltrosbusquedareportes.style.overflowY = 'auto';

    if (window.matchMedia("(max-width: 1000px)").matches) {
        contenedorfiltrosbusquedareportes.style.width = '140px';
    }
});

document.body.addEventListener('click', function (event) {
    if (!contenedorfiltrosbusquedareportes.contains(event.target)) {
        contendorcheckboxesfiltrosbusquedareportes.classList.remove('filtrosabierto');
        contendorcheckboxesfiltrosbusquedareportes.style.opacity = '0';
        contenedorfiltrosbusquedareportes.style.height = '30px';
        contenedorfiltrosbusquedareportes.style.width = '10%';
        contenedorfiltrosbusquedareportes.style.top = '25px';
        contendorcheckboxesfiltrosbusquedareportes.style.width = '0px';
        contendorcheckboxesfiltrosbusquedareportes.style.height = '0px';
        contendorcheckboxesfiltrosbusquedareportes.style.top = '0px';
        contenedorfiltrosbusquedareportes.style.zIndex = '1';
        contenedorfiltrosbusquedareportes.style.overflowY = 'hidden';
    }
});


contenedorordenesbusquedareportes.addEventListener('click', function () {
    if (contendorcheckboxesordenesbusquedareportes.classList.contains('filtrosabierto')) {
        contendorcheckboxesordenesbusquedareportes.classList.remove('filtrosabierto');
        contendorcheckboxesordenesbusquedareportes.style.opacity = '0';
        contenedorordenesbusquedareportes.style.height = '30px';
        contenedorordenesbusquedareportes.style.width = '10%';
        contenedorordenesbusquedareportes.style.top = '25px';
        contendorcheckboxesordenesbusquedareportes.style.width = '0px';
        contendorcheckboxesordenesbusquedareportes.style.height = '0px';
        contendorcheckboxesordenesbusquedareportes.style.top = '0px';
        contenedorordenesbusquedareportes.style.zIndex = '1';
        contenedorordenesbusquedareportes.style.overflowY = 'hidden';
        return;
    }

    contenedorordenesbusquedareportes.style.height = '370px';
    contenedorordenesbusquedareportes.style.width = '12%';
    contendorcheckboxesordenesbusquedareportes.classList.add('filtrosabierto');
    contendorcheckboxesordenesbusquedareportes.style.opacity = '1';
    contendorcheckboxesordenesbusquedareportes.style.width = '90%';
    contendorcheckboxesordenesbusquedareportes.style.height = '25px';
    contendorcheckboxesordenesbusquedareportes.style.top = '28px';
    contenedorordenesbusquedareportes.style.zIndex = '5';
    contenedorordenesbusquedareportes.style.overflowY = 'auto';

    if (window.matchMedia("(max-width: 1000px)").matches) {
        contenedorordenesbusquedareportes.style.width = '140px';
    }
})

document.body.addEventListener('click', function (event) {
    if (!contenedorordenesbusquedareportes.contains(event.target)) {
        contendorcheckboxesordenesbusquedareportes.classList.remove('filtrosabierto');
        contendorcheckboxesordenesbusquedareportes.style.opacity = '0';
        contenedorordenesbusquedareportes.style.height = '30px';
        contenedorordenesbusquedareportes.style.width = '10%';
        contenedorordenesbusquedareportes.style.top = '25px';
        contendorcheckboxesordenesbusquedareportes.style.width = '0px';
        contendorcheckboxesordenesbusquedareportes.style.height = '0px';
        contendorcheckboxesordenesbusquedareportes.style.top = '0px';
        contenedorordenesbusquedareportes.style.zIndex = '1';
        contenedorordenesbusquedareportes.style.overflowY = 'hidden';
    }
});


// listener para la barra de busqueda la cual llama a la ruta del servidor cada que se escriba
inputbusquedareportes.addEventListener('input', function () {
    filtrar();
    console.log(inputbusquedareportes.value);
});

document.body.addEventListener('change', function (event) {
    if (event.target.id === 'selecttipoorigen') {
        filtrar();
    }
});

// istener para el boton de busqueda el cual al ser presionado obtiene los filtros y los envia al servidor
btnBuscarReportes.addEventListener('click', function () {
    filtrar();
});

function filtrar() {
    const busqueda = document.getElementById('inputbusquedareportes').value;

    const datos = {};

    if (document.getElementById('usuarioscanalizados').checked) {
        datos.usuarioscanalizados = true;
    }

    if (document.getElementById('usuariostodos').checked) {
        datos.usuariostodos = true;
    }

    if (document.getElementById('usuariossactivos').checked) {
        datos.usuariossactivos = true;
    }

    if (document.getElementById('usuariosinactivos').checked) {
        datos.usuariosinactivos = true;
    }

    if (document.getElementById('usuariosmas50registros').checked) {
        datos.usuariosmas50registros = true;
    }

    if (document.getElementById('usuariostodosregistros').checked) {
        datos.usuariostodosregistros = true;
    }

    if (document.getElementById('usuariosmasrecientes').checked) {
        datos.usuariosmasrecientes = true;
    }

    if (document.getElementById('usuariosmenosrecientes').checked) {
        datos.usuariosmenosrecientes = true;
    }

    datos.busqueda = busqueda;


    // Enviar los filtros al servidor
    $.ajax({
        url: '../componentes_php/tabla_usuarios_canalizados.php',
        type: 'POST',
        data: datos,
        success: function (response) {
            console.log('Respuesta del servidor:', response);
            contendortablareportes.innerHTML = response;
        }
    });
}

