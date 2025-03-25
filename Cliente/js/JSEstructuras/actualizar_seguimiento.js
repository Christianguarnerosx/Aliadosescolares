document.addEventListener('DOMContentLoaded', function () {

    const cuerpomodalseguimientosregistrados = document.getElementById('cuerpomodalseguimientosregistrados');

    document.body.addEventListener('click', function (e) {
        if (event.target.classList.contains('btnactualizaranotaciones')) {

            const id_cita = event.target.dataset.id;
            const anotaciones_psicologo = event.target.parentElement.querySelector('.textareacitaspsic').value;

            console.log(id_cita);
            console.log(anotaciones_psicologo);

            $.ajax({
                type: 'POST',
                url: '../../Servidor/ajax_php/actualizar_seguimiento_psicologo.php',
                data: {
                    id_cita: id_cita,
                    anotaciones_psicologo: anotaciones_psicologo
                },
                success: function (response) {
                    console.log(response);

                    if (response.includes("correctamente")) {
                        Toastify({
                            text: "Se actualizo el seguimiento correctamente",
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
                            text: "Hubo un error al actualizar el seguimiento",
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