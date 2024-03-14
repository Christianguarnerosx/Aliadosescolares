/*Para poder agregar este script en una interfaz/archivo tendras que poner la clase .hoverdrop en el boton que tiene el span/togle boton/checar cual es el boton que contiene la flecha*/
/*Hace que cuando se pone el mouse encima de la flecha aparezcan las opciones sin dar click*/
document.addEventListener("DOMContentLoaded", function () {
  var splitBtns = document.querySelectorAll(".hoverdrop");
  var dropdownMenus = document.querySelectorAll(".dropdown-menu");

  splitBtns.forEach(function (splitBtn, index) {
    splitBtn.addEventListener("mouseover", function () {
      dropdownMenus[index].classList.add("show");
    });

    splitBtn.addEventListener("mouseout", function () {
      dropdownMenus[index].classList.remove("show");
    });

    dropdownMenus[index].addEventListener("mouseover", function () {
      dropdownMenus[index].classList.add("show");
    });

    dropdownMenus[index].addEventListener("mouseout", function () {
      dropdownMenus[index].classList.remove("show");
    });
  });
});