/*Logica para que funcione el boton menu*/
/*Hace que ela columna que esta en collapse aparezca al agregarle el action de bootstrap shown.bs.collapse (Asi aparecera la columa del menu)*/
document.getElementById("colmenuplantillaalm").addEventListener("show.bs.collapse", function () {
    document.getElementById("colmenuplantillaalm").style.width = "250px";/*Tamaño que se tomara la col mneu a lo ancho cuando este sea dezplegado*/
    document.getElementById("btn-menu-plantillaalm").style.top = "1px"; /*Posicion que tomara a lo alto cuando el menu este dezplegado*/
    document.getElementById("btn-menu-plantillaalm").style.left = "-3px"; /*Posicion que tomara a la izq cuando el menu este dezplegado*/
    document.getElementById("btn-menu-plantillaalm").style.rotate = "-90deg"; /* Utilizado para dar la a animacionde girar*/
    document.getElementById("btn-menu-plantillaalm").style.scale = "0.7"; /*Hara que el boton se haga mas pequeno*/
});

/*De la misma manera se aplica el event de hidden a la col que se quiera ocultar al agregarle el hide.bs,collapse*/
document.getElementById("colmenuplantillaalm").addEventListener("hide.bs.collapse", function () {
    document.getElementById("btn-menu-plantillaalm").style.top = "calc(45vh - 30px)"; /*Esta es la medida que tiene en el css (Con la que comienza) Regresar a la misma posicion*/
    document.getElementById("btn-menu-plantillaalm").style.rotate = "0deg"; /*Utilizado para dar la a animacionde girar*/
    document.getElementById("btn-menu-plantillaalm").style.left = "5px"; /*Esta es la medida que tiene en el css (Con la que comienza) Regresar a la misma posicion*/
    document.getElementById("btn-menu-plantillaalm").style.scale = "1"; /*Esta es la medida que tiene en el css (Con la que comienza) Regresar al mismo tamano*/
});

/*Logica para que funcione el boton extras/opciones*/
/*Hace que ela columna que esta en collapse aparezca al agregarle el action de bootstrap shown.bs.collapse (Asi aparecera la columa del menu)*/
document.getElementById("colconfigplantillaalm").addEventListener("show.bs.collapse", function () {
    document.getElementById("btn-extras-plantillaalm").style.scale = "3"; /*Hara que el boton se haga mas pequeno*/
    document.getElementById("btn-extras-plantillaalm").style.rotate = "360deg"; /* Utilizado para dar la a animacionde girar*/
    /*Media querys de js*/
    const mediaQuery = window.matchMedia("(max-width: 500px)"); /*Obtiene el valor de la pantalla y arigna un verificador antes del iof como match con el tamaño que quieras*/

    if (mediaQuery.matches) { /*si hace match o existe el match*/
        document.getElementById("btn-extras-plantillaalm").style.right = "42vw"; /*Esta en resolucion de telefono y cambias la posicion del avatar*/
        document.getElementById("btn-extras-plantillaalm").style.top = "9vh";/*Posicion que tomara a lo alto cuando el menu este dezplegado*/
    } else {
        document.getElementById("btn-extras-plantillaalm").style.right = "47vw"; /*Esta en posicion de pc entonces se asigna otra posicion*/
        document.getElementById("btn-extras-plantillaalm").style.top = "12vh";/*Posicion que tomara a lo alto cuando el menu este dezplegado*/
    }
});

/*De la misma manera se aplica el event de hidden a la col que se quiera ocultar al agregarle el hide.bs,collapse*/
document.getElementById("colconfigplantillaalm").addEventListener("hide.bs.collapse", function () {
    document.getElementById("btn-extras-plantillaalm").style.scale = "1"; /*Este ahce que se sobreponga a todo lo demas del contenido es como en canva/word "Traer/mandar adelante de todo (lo que este debajo de "1")*/
    document.getElementById("btn-extras-plantillaalm").style.right = "16px";/*Esta es la medida que tiene en el css (Con la que comienza) Regresar a la misma posicion*/
    document.getElementById("btn-extras-plantillaalm").style.top = "1.35vh";/*Esta es la medida que tiene en el css (Con la que comienza) Regresar a la misma posicion*/
    document.getElementById("btn-extras-plantillaalm").style.rotate = "0deg"; /* Utilizado para dar la a animacionde girar*/
});