// Recupera el mensaje desde sessionStorage y muestra la alerta
var mensaje = sessionStorage.getItem("mensajeExito");
if (mensaje) {
  Swal.fire(mensaje, "", "success");
  // Limpia el mensaje almacenado para evitar que se muestre nuevamente
  sessionStorage.removeItem("mensajeExito");
}
