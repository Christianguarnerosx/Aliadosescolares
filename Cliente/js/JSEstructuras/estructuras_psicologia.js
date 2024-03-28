// importamos el Api al proyecto para poder utilizar sus funciones
import { GoogleGenerativeAI } from "https://esm.run/@google/generative-ai";

// KEY de la api
/* Para obetenr una nueva en caso de que se gaste o venza (que vence hasa el 99999999 año jajaja) */
/* Vas a https://aistudio.google.com/app/apikey (guardar esta pagina por que no se encuentra facil) */
/* y creas una api o bien en este caso delde la nuve de google creamos un proyecto y obtenemos una api
(ojo) para la api no se llama gemini La API es:  ----Generative Language API---- */
const API_KEY = "AIzaSyCa54X3pUQV7zuUMZyLoYIUmZLrBQQgDgQ";

// autenticacion con el api (como iniciar sesion y el api es nuestra unica credencial)
const genAI = new GoogleGenerativeAI(API_KEY);

/* Obtenemos el nombre del usuario mediante los label que los obtienen con php desde la session*/
const nombreusuario = document.getElementById('nombreusuario').textContent;


/* Se aplica ingenieria de Propmt que configura a la IA y pone en contexto con que usuario tiene con la misma info del usuario*/
/* Configuracion usuario */
const rolusuario = "Soy un estudiante de nivel basico, generalmente comprendido entre los 6 y 12 años de edad, estudio e una escuela primaria llamada venustiano carranza. y ahora tengo acceso a una nueva herremienta ia, que sera mi apoyo para crever academica y perosnal mente y asi desarrollarme de la mejor manera";

/* configuracion de Gemini (IA) */
const especialidad = "especialidad: psicología";
const locacion = "Estamos en: México";
const idioma = "siempre hablar en: español";
const enfoque = "enfoque: niños de primaria";
const rolgemini = "ROL: Este solo es un prompt de funcionalidad (no espero respuesta de este): IMPORTANTE, siempre hablar en español Mexico, siempre, siempre sin excusas, se conciso y eficaz, si preguntan algo que no esta en tu especialidad reitera tu especialidad para que sepan. Seras un experto en psicologia, que solo seras un consejero en cosas blandas o que estes especializado en identificar problemas psicologicos: abarcando solo casos especificos que te indique dando una respuesta de posibles casos que podria ser o posibles sintomas. Los casos especificos son: Depresion, TDAH, Ansiedad, Problemas para socializar, baja autoestima asi como ayudar a mejorar personalmente. Si te preguntan de cualquier otra cosa que no tenga que ver con esto, deberas decirle que no estas capacitado para eso, se muy estricto en ese tema de no tener sesgos Utiliza un lenguaje formal y educado en tus respuestas. Siempre menciona el nombre: " + nombreusuario + "al inicio de cada respuesta (de manera conversacional fluida como si fuera tu amigo pequeño y siempre verifica el nombre del usuario para evitar errores de nombrarlo). Tambien si te piden cosas que no, avisales pidiendo una disculpa antes";

/* (aun no cumple todo su cometido) sirve para que la ia vaya entendiendo la historia del chat, lo que le escriben y lo que va contestando*/
const historialgemini = [];

historialgemini.push(especialidad);
historialgemini.push(enfoque);
historialgemini.push(locacion);
historialgemini.push(idioma);
historialgemini.push(rolgemini);

/* (aun no cumple todo su cometido) sirve para que la ia vaya entendiendo la historia del chat, lo que le escriben y lo que va contestando*/
const historialusuario = [];/* en la doc oficial de la api se hace de otra forma, pero esta es la solucion propia de me Christian G, para poder ir guardando todo en un array e irlo mandando (Por ahora aun no sale al 100) */
historialusuario.push(rolusuario); /* Le metemos a gemini la memoria/historial del usuario su primer prompt*/

/* guardamos/conectamos el textarea con una varianble para ir 'innerhtmleando' jaja todo lo que vaya escribiendo el usuario y lo que regrese la IA */
const textarea = document.getElementById('textareapsicologia');

/* Metodo importado/obtenido de la API Gemini (Aqui se hace la magia con la api) */
async function gemini(geminipromp) {
    // Este es el meodo que solo acepta texto, pero hay otro de imagen y texto
    const model = genAI.getGenerativeModel({ model: "gemini-pro" }); /* conectamos con el modelo generativo (IA/Gemini) */

    /* En chat se ira guardando la historia del usuario y la ia (el contexto que tendra) ademas de su configuracion de como genmerar texto*/
    const chat = model.startChat({
        history: [
            {
                role: "user", /* Historial/memoria que tiene de las preguntas del usuario*/
                parts: [{ text: historialusuario.join(".") }],
                parts: [{ text: historialgemini.join(".") }],
            },
            {
                role: "model", /* Historial/memoria que tiene de las preguntas de ella misma*/
                parts: [{ text: "Psicologo con años de experiencia, que aqui solo se dedica a dar consejos funcionales mas no intrusivos" }],
            },
        ],
        generationConfig: { /* configuracion de como va a generar respuestas (tipo de respuestas que dara)*/
            maxOutputTokens: 250, /* Maximo numero de letras */
            stopSequences: ["Violencia", "Suicidio", "Autolesión", "Drogas", "Medicamentos"], /* Filtro de temas (si ella piensa en generar cosas que tengan que ver con esto, pausa/bloquea la generacion) */
            temperature: 0.8, /* Calidad de respuestas (largas/complejas) */
            topP: 0.2, /* Que tan diversas son las respuestas (0.1 - 1) */
            topK: 50, /* Que tan conservadoras son las respuestas */
        },
    });

    const msg = geminipromp;
    console.log(msg);

    // Use streaming with multi-turn conversations (like chat)
    const result = await chat.sendMessageStream(msg);
    let text = '';
    textarea.innerHTML += "<h1 class='alinear-left text-c'>" + " 🧠 PsicologIA: </h1>";
    for await (const chunk of result.stream) {
        const chunkText = chunk.text();

        /*Filtor de palabras Detecta los ** y el * del texto que regresa la api de gemini
         y aplicar formato a negritas (*) y cursivas(*):*/
        const textoformato = chunkText
            .replace(/\*\*/g, "<b>") // negritas
            .replace(/\*/g, "<i>") // cursiva
            .replace(/\n\n/g, "<br>"); // Line breaks

        textarea.innerHTML += textoformato;
        textarea.scrollTop = textarea.scrollHeight;
    }
}

const btnpreguntar = document.getElementById('btnpreguntar');

btnpreguntar.addEventListener('click', function () {
    const inputpromp = document.getElementById('inputpsicologia');

    const promp = inputpromp.value;
    console.log("Promp obtenido: ", promp);
    inputpromp.value = ""; /* Ressetea la entrada del input */

    gemini(promp);
    const prompmandado = nombreusuario + ": " + promp;
    textarea.style.height = "100vh";
    textarea.innerHTML += "<h1 class='alinear-right text-m espacio-top-c'>" + prompmandado + "</h1>";
    textarea.scrollTop = textarea.scrollHeight;
});