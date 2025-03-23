if (document.getElementById('selectgradosinfo')) {
    const selectgrados = document.getElementById('selectgradosinfo');

    selectgrados.addEventListener('change', function () {
        const gradoseleccionado = selectgrados.value;
        console.log("Se selecciono: " + gradoseleccionado);

        var datagrafico = { gradoseleccionado };

        $.ajax({
            type: "GET",
            url: "../../Servidor/ajax_php/ajax_peticiones_grado.php",
            data: datagrafico,
            dataType: "json",
            success: function (response) {

                const gradopeticiontitulo = document.getElementById('gradopeticioniainfo');
                const gradoreportetitulo = document.getElementById('gradoreporteiainfo');

                gradopeticiontitulo.textContent = "Peticiones de " + gradoseleccionado + " grados";
                gradoreportetitulo.textContent = "Reportes de " + gradoseleccionado + " grados";

                if (response && response.length > 0) {
                    var numeropeticiones = [];
                    var nombre_grupo = [];

                    // Iterar sobre cada objeto en la respuesta
                    response.forEach(function (item) {
                        // Guardar los datos en los arrays correspondientes
                        numeropeticiones.push(item.numeropeticiones);
                        nombre_grupo.push(item.nombre_grupo);
                    });

                    // Ahora tienes los datos separados en los arrays numeropeticiones y nombre_grupo
                    console.log(numeropeticiones[1]);
                    console.log(nombre_grupo[1]);


                    const labels = [nombre_grupo[0], nombre_grupo[1], nombre_grupo[2]];
                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'Numero peticiones IA',
                            data: [numeropeticiones[0], numeropeticiones[1], numeropeticiones[2]],
                            backgroundColor: [
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                                'rgb(153, 102, 255)',
                                'rgb(75, 192, 192)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(54, 162, 235)',
                                'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }]
                    };

                    const config = {
                        type: 'bar',
                        data: data,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                legend: {
                                    labels: {
                                        // Cambia el color de los labels aquí
                                        color: 'aliceblue'
                                    }
                                }
                            }
                        },
                    };

                    // Obtener el contexto del canvas
                    const ctx = document.getElementById('graficainfoia').getContext('2d');

                    // Si ya hay un gráfico existente, destrúyelo
                    if (window.myChart) {
                        window.myChart.destroy();
                    }

                    // Crear el nuevo gráfico
                    const myChart = new Chart(ctx, config);
                    window.myChart = myChart; // Guardar una referencia al gráfico para futuras manipulaciones
                } else {
                    // Si ya hay un gráfico existente, destrúyelo
                    if (window.myChart) {
                        window.myChart.destroy();
                    }
                }
            }
        });

        $.ajax({
            type: "GET",
            url: "../../Servidor/ajax_php/ajax_reportes_grado.php",
            data: datagrafico,
            dataType: "json",
            success: function (response) {
                if (response && response.length > 0) {
                    let numeroreportes = [];
                    let nombre_grupo = [];

                    // Iterar sobre cada objeto en la respuesta
                    response.forEach(function (item) {
                        // Guardar los datos en los arrays correspondientes
                        numeroreportes.push(item.numeroreportes);
                        nombre_grupo.push(item.nombre_grupo);
                    });

                    // Ahora tienes los datos separados en los arrays numeropeticiones y nombre_grupo
                    console.log(numeroreportes);
                    console.log(nombre_grupo);

                    const labels2 = [nombre_grupo[0], nombre_grupo[1], nombre_grupo[2]];
                    const data2 = {
                        labels: labels2,
                        datasets: [{
                            label: 'Numero de reportes',
                            data: [numeroreportes[0], numeroreportes[1], numeroreportes[2]],
                            backgroundColor: [
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                                'rgb(153, 102, 255)',
                                'rgb(75, 192, 192)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(54, 162, 235)',
                                'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }]
                    };

                    const config2 = {
                        type: 'bar',
                        data: data2,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                legend: {
                                    labels: {
                                        // Cambia el color de los labels aquí
                                        color: 'aliceblue'
                                    }
                                }
                            }
                        },
                    };

                    // Obtener el contexto del canvas
                    const ctx2 = document.getElementById('graficainforeportes').getContext('2d');

                    // Si ya hay un gráfico existente, destrúyelo
                    if (window.myChart2) {
                        window.myChart2.destroy();
                    }

                    // Crear el nuevo gráfico
                    const myChart2 = new Chart(ctx2, config2);
                    window.myChart2 = myChart2; // Guardar una referencia al gráfico para futuras manipulaciones
                } else {
                    // Si ya hay un gráfico existente, destrúyelo
                    if (window.myChart2) {
                        window.myChart2.destroy();
                    }
                }
            }
        });
    });

    $.ajax({
        type: "GET",
        url: "../../Servidor/ajax_php/ajax_general_peticiones.php",
        dataType: "json",
        success: function (response) {

            if (response && response.length > 0) {
                console.log(response);

                let numeropeticionesia = [];
                let nombretipoia = [];

                response.forEach(function (item) {
                    // Guardar los datos en los arrays correspondientes
                    numeropeticionesia.push(item.contadorpeticionesia);
                    nombretipoia.push(item.tipo_ia);
                });
                console.log(numeropeticionesia);
                console.log(nombretipoia);

                const data3 = {
                    labels: [
                        nombretipoia[0],
                        nombretipoia[1],
                        nombretipoia[2],
                        nombretipoia[3]
                    ],
                    datasets: [{
                        label: 'Peticiones',
                        data: [numeropeticionesia[0], numeropeticionesia[1], numeropeticionesia[2], numeropeticionesia[2]],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgba(58, 255, 145, 0.8)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                    }]
                };

                const config3 = {
                    type: 'pie',
                    data: data3,
                    options: {
                        plugins: {
                            legend: {
                                labels: {
                                    // Cambia el color de los labels aquí
                                    color: 'aliceblue'
                                }
                            }
                        }
                    }
                };

                // Obtener el contexto del canvas
                const ctx3 = document.getElementById('herramientapeticionia').getContext('2d');

                // Si ya hay un gráfico existente, destrúyelo
                if (window.myChart3) {
                    window.myChart3.destroy();
                }

                // Crear el nuevo gráfico
                const myChart3 = new Chart(ctx3, config3);
                window.myChart3 = myChart3; // Guardar una referencia al gráfico para futuras manipulaciones
            } else {
                // Si ya hay un gráfico existente, destrúyelo
                if (window.myChart3) {
                    window.myChart3.destroy();
                }
            }
        }
    });

    $.ajax({
        type: "GET",
        url: "../../Servidor/ajax_php/ajax_general_reportes.php",
        dataType: "json",
        success: function (response) {

            if (response && response.length > 0) {
                console.log(response);

                let numeroreportes = [];
                let nombretiporeporte = [];

                response.forEach(function (item) {
                    // Guardar los datos en los arrays correspondientes
                    numeroreportes.push(item.contadorreportes);
                    nombretiporeporte.push(item.tipo_reporte);
                });
                console.log(numeroreportes);
                console.log(nombretiporeporte);

                const data4 = {
                    labels: [
                        nombretiporeporte[0],
                        nombretiporeporte[1],
                        nombretiporeporte[2]
                    ],
                    datasets: [{
                        label: 'Reportes',
                        data: [numeroreportes[0], numeroreportes[1], numeroreportes[2]],
                        backgroundColor: [
                            'rgba(58, 255, 145, 0.8)',
                            'rgba(78, 40, 255, 0.8)',
                            'rgba(255, 0, 66, 0.81)'
                        ],
                        hoverOffset: 4
                    }]
                };

                const config4 = {
                    type: 'pie',
                    data: data4,
                    options: {
                        plugins: {
                            legend: {
                                labels: {
                                    // Cambia el color de los labels aquí
                                    color: 'aliceblue'
                                }
                            }
                        }
                    }
                };

                // Obtener el contexto del canvas
                const ctx4 = document.getElementById('herramientareportes').getContext('2d');

                // Si ya hay un gráfico existente, destrúyelo
                if (window.myChart4) {
                    window.myChart4.destroy();
                }

                // Crear el nuevo gráfico
                const myChart4 = new Chart(ctx4, config4);
                window.myChart4 = myChart4; // Guardar una referencia al gráfico para futuras manipulaciones
            } else {
                // Si ya hay un gráfico existente, destrúyelo
                if (window.myChart4) {
                    window.myChart4.destroy();
                }
            }
        }
    });
}