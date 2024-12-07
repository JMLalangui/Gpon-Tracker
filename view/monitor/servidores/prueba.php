<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Tráfico en Tiempo Real</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<canvas id="myChart" width="400" height="200"></canvas>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');

    var dataTx = [];
    var dataRx = [];
    var labels = [];

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Tx (bps)',
                    data: dataTx,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    fill: false
                },
                {
                    label: 'Rx (bps)',
                    data: dataRx,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    fill: false
                }
            ]
        },
        options: {
            scales: {
                x: {
                    type: 'realtime', // Se puede usar para datos en tiempo real
                    realtime: {
                        delay: 2000,  // Retraso en la actualización de 2 segundos
                        refresh: 1000, // Refrescar cada segundo
                        onRefresh: function(chart) {
                            // Se llama cada vez que se refresca el gráfico
                            actualizarGrafico(chart);
                        }
                    }
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function actualizarGrafico(chart) {
        // Realizamos la solicitud AJAX para obtener los datos en tiempo real
        fetch('obtener_trafico.php')
            .then(response => response.json())
            .then(data => {
                // Agregamos los nuevos datos al gráfico
                const now = new Date();

                chart.data.labels.push(now.toLocaleTimeString());
                chart.data.datasets[0].data.push(data.tx);  // Tx
                chart.data.datasets[1].data.push(data.rx);  // Rx

                // Limitar la cantidad de puntos mostrados para evitar que el gráfico sea muy largo
                if (chart.data.labels.length > 20) {
                    chart.data.labels.shift();
                    chart.data.datasets[0].data.shift();
                    chart.data.datasets[1].data.shift();
                }

                chart.update('quiet');
            })
            .catch(error => {
                console.error('Error al obtener el tráfico:', error);
            });
    }

    // Llamada inicial para empezar el gráfico
    actualizarGrafico(myChart);
</script>

</body>
</html>
