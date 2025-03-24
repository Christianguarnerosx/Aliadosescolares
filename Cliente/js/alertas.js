document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    //obtiene el valor del parámetro llamado "resultado" de la cadena de consulta de la URL.
    const resultado = urlParams.get("resultado");

    function limpiarParametrosUrl() { window.history.replaceState({}, document.title, window.location.pathname); } //eliminarparametrosurl

    if (resultado === "canalizadocorrectamente") {
        swal({
            icon: "success",
            title: "Listo!",
            text: "El usuario fue canalizado correctamente",
        });
        limpiarParametrosUrl();
    }
});