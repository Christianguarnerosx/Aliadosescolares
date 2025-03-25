document.addEventListener('DOMContentLoaded', function () {
    //obtenemos e modal
    const modalseguimientos = new bootstrap.Modal(document.getElementById('modalseguimientos'));
    const cuerpomodalseguimientosregistrados = document.getElementById('cuerpomodalseguimientosregistrados');

    document.body.addEventListener('click', function (event) {
        if (event.target.classList.contains('btndarseguimiento')) {
            let id_usuario = event.target.dataset.id;
            console.log(id_usuario);

            modalseguimientos.show();


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
        }
    });
});