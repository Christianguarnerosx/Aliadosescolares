/*---------------------------------------------- Utilizado en pantalla de espera-------------------------------------------------*/
/*Para poder utilizar este js:*/
/*Es necesario tener un elemento texto span,p,a, etc con el id: 'texto-animado-espera'*/
/*Efecto maquina de escribir (Comienza)*/

// Lista de textos a mostrar
const bobedap = [
  "en comunicacion",
  "idealista",
  "pensada a futuro",
]; 
let contadorpalabra = 0; /*Cuenta en que palabra del array va*/
let contadorletra = 0; /*Cuenta en que letra de la palabra va*/
const contenido = document.getElementById(
  "texto-animado-espera"
); /*Obtiene contenido del elemento con el id*/

//Funcion escribir
function escribir() {
  if (contadorletra < bobedap[contadorpalabra].length) {
    contenido.textContent += bobedap[contadorpalabra].charAt(contadorletra);
    contadorletra++;
    setTimeout(escribir, 100);
  } else {
    setTimeout(borrar, 1500);
  }
}

//funcion borrar
function borrar() {
  if (contadorletra > 0) {
    contenido.textContent = bobedap[contadorpalabra].substring(
      0,
      contadorletra - 1
    );
    contadorletra--;
    setTimeout(borrar, 100);
  } else {
    contadorpalabra++;
    if (contadorpalabra >= bobedap.length) {
      contadorpalabra = 0;
    }
    setTimeout(escribir, 500);
  }
}

//Hacer que carge siempre en la pagina
document.addEventListener("DOMContentLoaded", function () {
  setTimeout(escribir, 1000);
});
/*Efecto maquina de escribir (termina)*/
