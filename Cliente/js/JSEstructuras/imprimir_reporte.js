document.addEventListener('DOMContentLoaded', function () {
    document.body.addEventListener('click', function (event) {
        if (event.target.classList.contains('btnimprimirreporte')) {
            const idreporte = event.target.dataset.id;
            console.log(idreporte);
            window.open('../../Servidor/ajax_php/imprimir_reporte.php?idreporte=' + idreporte, '_blank');
        }
    });
});