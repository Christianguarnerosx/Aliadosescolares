document.addEventListener('DOMContentLoaded', function () {
    document.body.addEventListener('click', function (event) {
        if (event.target.classList.contains('btncanalizarusuario')) {
            let idusuario = event.target.dataset.id;

            console.log(idusuario);
            swal({
                title: 'Enviar a psicologo',
                text: "Realmente deseas enviar a este usuario a psicólogo?",
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    },
                    confirm: {
                        text: "Sí",
                        value: true,
                        visible: true,
                        className: "btn btn-primary",
                        closeModal: true
                    }
                }
            }).then((result) => {
                if (result) {
                    console.log("Confirmado");
                    $.ajax({
                        type: "POST",
                        url: "../../Servidor/ajax_php/ajax_canalizar_psicologo.php",
                        data: { idusuario: idusuario },
                        success: function (response) {
                            console.log(response);

                            if (response.includes("correctamente")) {
                                window.location.href = "./Reportesestadistica.php?resultado=canalizadocorrectamente";
                            } else {
                                window.location.href = "./Reportesestadistica.php?resultado=noencontreusuario";
                            }
                        },
                    });
                }
            });
        }
    });
});