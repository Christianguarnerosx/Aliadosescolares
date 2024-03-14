// Recupera el valor del parámetro "resultado" de la URL
//Crea un objeto URLSearchParams que contiene todos los parámetros pasados en la URL de la página actual.
const urlParams = new URLSearchParams(window.location.search);
//obtiene el valor del parámetro llamado "resultado" de la cadena de consulta de la URL.
const resultado = urlParams.get("autres");

if (resultado === "fracaso") {
  Swal.fire({
    icon: "warning",
    title: "Oh Oh...",
    text: "No existe ese usuario, revisa tu id/correo y contraseña",
  });
} else if (resultado === "vacio") {
  Swal.fire({
    icon: "warning",
    title: "Oops...",
    text: "No me diste ningun dato, ingresa tus datos",
  });
} else if (resultado === "noalumno") {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "Solo alumnos pueden utilizarlo",
  });
} else if (resultado === "alumno") {
  Swal.fire({
    icon: "success",
    title: "Para iniciar :",
    text: "Selecciona ",
  });
}