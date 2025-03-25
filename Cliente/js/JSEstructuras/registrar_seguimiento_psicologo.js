document.addEventListener('DOMContentLoaded', function () {

    const cuerpomodalseguimientosregistrados = document.getElementById('cuerpomodalseguimientosregistrados');

    //delegacion de eventos con eventlistenner con body para la clase btncrearseguimiento
    document.body.addEventListener('click', function (e) {
        if (event.target.classList.contains('btncrearseguimiento')) {

            const anotaciones_psicologo = document.getElementById('anotaciones_psicologo').value;
            const id_usuario = event.target.dataset.id;

            console.log(anotaciones_psicologo);
            console.log(id_usuario);

            $.ajax({
                type: 'POST',
                url: '../../Servidor/ajax_php/insertar_seguimiento_psicologo.php',
                data: {
                    anotaciones_psicologo: anotaciones_psicologo,
                    id_usuario: id_usuario
                },
                success: function (response) {
                    console.log(response);

                    if (response.includes("correctamente")) {
                        Toastify({
                            text: "Se registro el seguimiento correctamente",
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on focus
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                            onClick: function () { } // Callback after click
                        }).showToast();

                        $.ajax({
                            type: 'POST',
                            url: '../../Servidor/ajax_php/obtener_seguimiento_psicologo.php',
                            data: { id_usuario: id_usuario },
                            success: function (response) {
                                console.log(response);
                                cuerpomodalseguimientosregistrados.innerHTML = response;
                                modalseguimientos.show();
                            }
                        });
                    } else {
                        Toastify({
                            text: "Hubo un error al registrar el seguimiento",
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on focus
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                            onClick: function () { } // Callback after click
                        }).showToast();
                    }
                }
            });
        }
    });
});