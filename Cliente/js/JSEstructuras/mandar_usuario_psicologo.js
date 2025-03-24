document.addEventListener('DOMContentLoaded', function () {
    document.body.addEventListener('click', function (event) {
        if (event.target.classList.contains('btncanalizarusuario')) {
            let idusuario = event.target.dataset.id;

            console.log(idusuario);
            Swal.fire({
                title: 'Enviar a psic logo',
                text: "Realmente deseas enviar a este usuario a psicólogo?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "../../Servidor/ajax_php/ajax_canalizar_psicologo.php",
                        data: { idusuario: idusuario },
                        success: function (response) {
                            console.log(response);

                            if (response.includes("correctamente")) {
                                window.location.href = "./Reportesestadistica.php?resultado=canalizadocorrectamente";
                            }
                        },
                    });
                }
            });
        }
    });
});