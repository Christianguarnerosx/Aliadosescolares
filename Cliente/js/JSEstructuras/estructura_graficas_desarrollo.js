const nombreusuario = document.getElementById('nombreusuariodesarollo').textContent;

const grafica1 = document.getElementById('graficaia1');

// Se usara Obtener un array de las claves (nombres de los tipos de IA)
var tiposIA;

// Definir la variable en un ámbito global
var datosIA = {};

function graficopeticionesia() {
    console.log("Haciendo la llamada Ajax...");
    $.ajax({
        type: "GET",
        url: "../../Servidor/ajax_php/ajax_peticiones_ia.php",
        dataType: 'json',
        success: function (response) {
            console.log("Respuesta recibida:", response);
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
            console.log(datosIA["Entrenador"]); // Mover el console.log aquí
            console.log("" + tiposIA[0]); // Mover el console.log aquí
        }
    });
}

graficopeticionesia();