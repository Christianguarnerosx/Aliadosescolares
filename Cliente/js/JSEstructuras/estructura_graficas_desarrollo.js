const nombreusuario = document.getElementById('nombreusuariodesarollo').textContent;

const grafica1 = document.getElementById('graficaia1');
const graficarepor = document.getElementById('graficareportes');
const graficacalif = document.getElementById('graficacalificacion');

// Se usara Obtener un array de las claves (nombres de los tipos de IA)
var tiposIA;
var tiposreportes;
var tiposmaterias;

// Definir la variable en un ámbito global
var datosIA = {};
var datosreportes = {};
var datoscalificaciones = {};

function graficopeticionesia() {
    console.log("Entrando a peticionesia");
    $.ajax({
        type: "GET",
        url: "../../Servidor/ajax_php/ajax_peticiones_ia.php",
        dataType: 'json',
        success: function (response) {
            //console.log("Entramos al ajax de peticionesia");
            //console.log("Respuesta recibida:", response);
            // Procesar los datos recibidos
            response.forEach(function (item) {
                var nombre_ia = item.nombreia;
                var total_peticiones = item.numeropeticiones;

                datosIA[nombre_ia] = total_peticiones;

                // Obtener en un arraylas claves (nombres de los tipos de IA)
                tiposIA = Object.keys(datosIA);

            });

            const data = {
                labels: [
                    tiposIA[0],
                    tiposIA[1],
                    tiposIA[2],
                    tiposIA[3],
                ],
                datasets: [{
                    label: nombreusuario,
                    data: [datosIA[tiposIA[0]], datosIA[tiposIA[1]], datosIA[tiposIA[2]], datosIA[tiposIA[3]]],
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)'
                }, {
                    label: 'Usuario promedio',
                    data: [1, 0, 2, 2],
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)'
                }]
            };

            const config = {
                type: 'radar',
                data: data,
                options: {
                    elements: {
                        line: {
                            borderWidth: 3
                        }
                    }
                },
            };

            new Chart(grafica1, config);
            //console.log(datosIA["Entrenador"]); // Mover el console.log aquí
            //console.log("" + tiposIA[0]); // Mover el console.log aquí
        }
    });
}

graficopeticionesia();

/* Grafica de reportes */
function graficarreportes() {
    console.log("Entramos a reportes");
    $.ajax({
        type: "GET",
        url: "../../Servidor/ajax_php/ajax_reportes_usuario.php",
        dataType: "json",
        success: function (response) {
            console.log("Entramos al ajax de reportes");

            response.forEach(function (item) {
                var tiporeporte = item.nombrereporte;
                var numreportes = item.numeroreportes;

                datosreportes[tiporeporte] = numreportes;

                tiposreportes = Object.keys(datosreportes);
            });

            const data2 = {
                labels: [
                    tiposreportes[0],
                    tiposreportes[1],
                    tiposreportes[2]
                ],
                datasets: [{
                    label: 'Reportes',
                    data: [datosreportes[tiposreportes[0]], datosreportes[tiposreportes[1]], datosreportes[tiposreportes[2]]],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                        'rgb(54, 162, 235)'
                    ]
                }]
            };

            const config2 = {
                type: 'polarArea',
                data: data2,
                options: {}
            };

            new Chart(graficarepor, config2);

        }

    });

}

graficarreportes();

/* Grafica de calificaciones */
function graficocalificaciones() {
    const labels = "numero de reportes";
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First Dataset',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };

    const config3 = {
        type: 'line',
        data: data,
    };

    new Chart(graficacalif, config3);
}

graficocalificaciones();