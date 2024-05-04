<div class="container-fluid"> <!-- contenedor de todo el componente (para solo traerlo y no configurar nada) -->
    <div class="row centrar"> <!-- Este es el row que contendra las cards verticales -->
        <div class="row centrar" id="contenedorcardsia">
            <!-- Esta es la card vertical de psicologia la cual hace la animacion de expanderse -->
            <!-- Para mandar y saber que card fue seleccionada en el js se utiliza el data-id que se le asigna a cada una Asi se logra guradar y mandar a traer la configuracion adecuada de el tipo ia que elegiste -->
            <div class="cardtutoria centrar" id="cardpsicologia" data-id="2" href="">
                <img src="../imagenes/personajes/Psicologa.png" class="indicardorcardtutoria">
                <div class="row">
                    <h1 class="titulocardia">Psicologia</h1>
                    <h1 class="contenidocardtutoria text-c"> Tu Psicologa especializado en brindar apoyo en problemas basicos</h1>
                    <img class="contenidocardtutoria iconocardtutoria" src="../imagenes/iconos/iconoplay.png" alt="">
                </div>
            </div>
            <!-- Para mandar y saber que card fue seleccionada en el js se utiliza el data-id que se le asigna a cada una Asi se logra guradar y mandar a traer la configuracion adecuada de el tipo ia que elegiste -->
            <div class="cardtutoria centrar" id="cardtutoria" data-id="1" href="">
                <img src="../imagenes/personajes/Tutora.png" class="indicardorcardtutoria">
                <div class="row">
                    <h1 class="titulocardia">Tutoria</h1>
                    <h1 class="contenidocardtutoria text-c"> Su Tutora personal especializada en enseñar de la manera mas facil</h1>
                    <img class="contenidocardtutoria iconocardtutoria" src="../imagenes/iconos/iconoplay.png" alt="">
                </div>
            </div>
            <!-- Para mandar y saber que card fue seleccionada en el js se utiliza el data-id que se le asigna a cada una Asi se logra guradar y mandar a traer la configuracion adecuada de el tipo ia que elegiste -->
            <div class="cardtutoria centrar" id="cardentrenador" data-id="3" href="">
                <img src="../imagenes/personajes/Entrenador.png" class="indicardorcardtutoria">
                <div class="row">
                    <h1 class="titulocardia">Entrenador</h1>
                    <h1 class="contenidocardtutoria text-c"> Tu Entrenador personal especializado en bienestar fisico</h1>
                    <img class="contenidocardtutoria iconocardtutoria" src="../imagenes/iconos/iconoplay.png" alt="">
                </div>
            </div>
            <!-- Para mandar y saber que card fue seleccionada en el js se utiliza el data-id que se le asigna a cada una Asi se logra guradar y mandar a traer la configuracion adecuada de el tipo ia que elegiste -->
            <div class="cardtutoria centrar" id="cardentrenador" data-id="4" href="">
                <img src="../imagenes/personajes/Nutriologa.png" class="indicardorcardtutoria">
                <div class="row">
                    <h1 class="titulocardia">Nutriología</h1>
                    <h1 class="contenidocardtutoria text-c"> Tu Nutriologa especializada en brindar formas sanas de comer</h1>
                    <img class="contenidocardtutoria iconocardtutoria" src="../imagenes/iconos/iconoplay.png" alt="">
                </div>
            </div>

            <h1 id="subtituloeligetutorias" class="alinear-center text-c espacio-top-c">Elige una TutorIA</h1>
        </div>


        <div class="row alinear-center" id="contenedorchattutoria"> <!-- Hace que los textos (titulo y subtitulo de la interfaz): de hola(nombre usuario) y psicologia -->
            <div class="col">
                <div class="row"> <!-- Fila de titulos -->
                    <!-- Se utiliza php para el nombre y apellido paterno (obtenido de la sesion iniciada) -->
                    <h1 class="text-m">Hola <?php include("../../Servidor/funciones_session/session_nombreapa.php") ?>,</h1>
                    <!-- Se utiliza para que con js lo obtengamos y sea el nombre a ocupar en el chat html -->
                    <!-- Se utiliza php para el nombre (obtenido de la sesion iniciada) -->
                    <h1 hidden id="nombreusuario"><?php include("../../Servidor/funciones_session/session_nombre.php") ?></h1>
                    <h1 hidden id="tipo_ia"></h1>
                    <h1 hidden id="tipo_usuario"><?php include("../../Servidor/funciones_session/session_tipousuario.php") ?></h1>
                    <h1 hidden id="hijo"><?php include("../../Servidor/funciones_session/session_obtenerhijo.php") ?></h1>
                </div>
                <div class="row centrar"> <!-- Fila del chat -->
                    <img src="" id="personajechatia">
                    <div class="row centrar">
                        <h1 for="textareagemini" class="form-label" id="titulochatia"></h1> <!-- Titulo que se mantiene para el contenedor del chat -->
                        <!-- Contenedor (textareaconversacion) donde va a imprimirse (sdesde js) todos los chats es solo ready -->
                        <div class="textareaconversacion alinear-left borde-r-c text-c" id="textareapsicologia" rows="3">
                            <!-- AQUI SE IMPRIMEN TODOS LOS MENSAJES -->
                            <!-- Siempre obtendra el mensaje del input y se imprimira con innerhtml con un h1 -->
                            <!-- se mandara con la funcion de la api y despues (utilizamos un metodo de la propia api que genera texto uno a uno) -->
                            <!-- y tambien se ira imprimiendo aqui (la impresion de gemini le he hecho un filtrado de simbolos para poder convertirlos a acciones(enter, negritas, cursiva)) -->
                        </div>
                    </div>
                    <!--Barra de busqueda-->
                    <!--Contenedor de entrada/buscar contiene el input y el boton-->
                    <div class="row centrar"> <!-- Fila de la entrada de texto (busqueda) -->
                        <div class="barrabusqueda espacio-top-c"> <!-- Se utiliza para el fondo de la barra y tener los dos elementos dentro de el (input/btn) -->
                            <!-- Input que obtiene lo que recibe del usuario (se obtiene su contenido con js cuando le den click al boton) -->
                            <input class="inputconversacion borde-r-c" id="inputpsicologia" type="text" placeholder=" 🔍 Preguntame algo" aria-label="">

                            <!-- btn que asigna tamaño y posicion en la barra de busqueda -->
                            <button class="btn-transparente hover-btn" id="btnpreguntar">
                                <!-- imagen contenido del btn la flecha de busqueda -->
                                <img class="iconobtnpreguntar icono-c centrar" src="../imagenes/iconos/enviar.png" alt=""> <!--Se agrega un id para poder utilizar mediaquerys par el uso del icono enotras resoluciones de manera independiente-->
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="creditogoogleia alinear-right espacio-right-m">@<span class="negrita espacio-right-c">GoogleCloud ☁️</span></p>
</div>

<!-- Importamos el js importante: como TIPO MODULE  -->
<!-- Este importa la api, para utilizar sus metodos. Obtiene el input, manda la entrada al genrador ia (geimini) -->
<script type="module" src="../js/JSEstructuras/estructuras_tutorias.js"></script>