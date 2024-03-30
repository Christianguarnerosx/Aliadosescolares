<div class="container-fluid"> <!-- contenedor de todo el componente (para solo traerlo y no configurar nada) -->
    <div class="row centrar">
        <div class="row centrar">
            <a class="cardtutoria centrar" id="cardpsicologia" href="">
                <div class="row">
                    <h1 class="titulocardia">Psicologia</h1>
                    <h1 class="contenidocardtutoria text-c"> Su Tutoria especializada en psicologia</h1>
                    <img class="contenidocardtutoria iconocardtutoria" src="../imagenes/iconos/iconoplay.png" alt="">
                </div>
            </a>
            <a class="cardtutoria centrar" id="cardtutoria" href="">
                <div class="row">
                    <h1 class="titulocardia">Tutoria</h1>
                    <h1 class="contenidocardtutoria text-c"> Su Tutoria especializada en Tutoria</h1>
                    <img class="contenidocardtutoria iconocardtutoria" src="../imagenes/iconos/iconoplay.png" alt="">
                </div>
            </a>
            <a class="cardtutoria centrar" id="cardentrenador" href="">
                <div class="row">
                    <h1 class="titulocardia">Entrenador</h1>
                    <h1 class="contenidocardtutoria text-c"> Su Tutoria especializada en Entrenador</h1>
                    <img class="contenidocardtutoria iconocardtutoria" src="../imagenes/iconos/iconoplay.png" alt="">
                </div>
            </a>
            <a class="cardtutoria centrar" id="cardentrenador" href="">
                <div class="row">
                    <h1 class="titulocardia">Nutriologia</h1>
                    <h1 class="contenidocardtutoria text-c"> Su Tutoria especializada en Nutriologia</h1>
                    <img class="contenidocardtutoria iconocardtutoria" src="../imagenes/iconos/iconoplay.png" alt="">
                </div>
            </a>
        </div>

        <div class="row centrar espacio-top-c alinear-center">
            <h1 class=" text-c">Elige una TutorIA</h1>
        </div>

        <div class="row alinear-center contenedortutoria"> <!-- Hace que los textos (titulo y subtitulo de la interfaz): de hola(nombre usuario) y psicologia -->
            <div class="col">
                <div class="row"> <!-- Fila de titulos -->
                    <!-- Se utiliza php para el nombre y apellido paterno (obtenido de la sesion iniciada) -->
                    <h1 class="text-m">Hola <?php include("../../Servidor/funciones_session/session_nombreapa.php") ?>,</h1>
                    <!-- Se utiliza para que con js lo obtengamos y sea el nombre a ocupar en el chat html -->
                    <!-- Se utiliza php para el nombre (obtenido de la sesion iniciada) -->
                    <h1 hidden id="nombreusuario"><?php include("../../Servidor/funciones_session/session_nombre.php") ?></h1>
                    <h1 hidden id="tipo_ia">nutriologia</h1>
                    <h1 hidden id="tipo_usuario"><?php include("../../Servidor/funciones_session/session_tipousuario.php") ?></h1>
                    <h1 hidden id="hijo"><?php include("../../Servidor/funciones_session/session_obtenerhijo.php") ?></h1>
                </div>
                <div class="row centrar"> <!-- Fila del chat -->
                    <div class="row centrar">
                        <h1 for="textareagemini" class="form-label">Soy tu Nutriologia</h1> <!-- Titulo que se mantiene para el contenedor del chat -->
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
                            <input class="inputconversacion borde-r-c" id="inputpsicologia" type="text" placeholder=" 🔍Preguntame algo" aria-label="">

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
</div>

<!-- Importamos el js importante: como TIPO MODULE  -->
<!-- Este importa la api, para utilizar sus metodos. Obtiene el input, manda la entrada al genrador ia (geimini) -->
<script type="module" src="../js/JSEstructuras/estructuras_tutorias.js"></script>