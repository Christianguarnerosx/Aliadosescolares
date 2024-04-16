// Recupera el mensaje desde sessionStorage y muestra la alerta
var mensaje = sessionStorage.getItem("mensajeExito");
if (mensaje) {
  // Reproduce el sonido Siempre que se utilice esta alerta mandara este audio Solo se necesitan estas 2 lineas
  var audio = new Audio("../sonidos/audio/Success.mp3"); /* 1 */
  audio.play(); /* 2 */

  Swal.fire(mensaje, "", "success");
  // Limpia el mensaje almacenado para evitar que se muestre nuevamente
  sessionStorage.removeItem("mensajeExito");
}
