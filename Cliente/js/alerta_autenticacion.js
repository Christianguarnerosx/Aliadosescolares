/* Declarar audios que se ejecurtran dependiendo la notificacion */
// Reproduce el sonido Siempre que se utilice esta alerta mandara este audio Solo se necesitan estas 2 lineas
var audiocorrecto = new Audio("../sonidos/audio/Success.mp3"); /* 1 */
var audiofail = new Audio("../sonidos/audio/Errorpatricio.mp3"); /* 1 */
var audioentrada = new Audio("../sonidos/audio/BienvenidaBob.mp3"); /* 1 */


// Recupera el valor del parámetro "resultado" de la URL
//Crea un objeto URLSearchParams que contiene todos los parámetros pasados en la URL de la página actual.
const urlParams = new URLSearchParams(window.location.search);
//obtiene el valor del parámetro llamado "resultado" de la cadena de consulta de la URL.
const resultado = urlParams.get("autres");
const resultado2 = urlParams.get("resultado");

console.log(resultado);
console.log(resultado2);


//limpiar parametros de la url
function limpiarParametrosUrl() {
  window.history.replaceState({}, document.title, window.location.pathname);
}

if (resultado === "fracaso") {
  audiofail.play();
  Swal.fire({
    icon: "warning",
    title: "Oh Oh...",
    text: "No existe ese usuario, revisa tu id/correo y contraseña",
  });
  limpiarParametrosUrl();
} else if (resultado === "vacio") {
  Swal.fire({
    icon: "warning",
    title: "Oops...",
    text: "No me diste ningun dato, ingresa tus datos",
  });
  limpiarParametrosUrl();
} else if (resultado === "noalumno") {
  audiofail.play();
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "Solo alumnos pueden utilizarlo",
  });
  limpiarParametrosUrl();
} else if (resultado === "alumno") {
  audioentrada.play(); /* 2 */
  Swal.fire({
    icon: "success",
    title: "Para comenzar",
    text: "Presiona iniciar",
  });
  limpiarParametrosUrl();
}
