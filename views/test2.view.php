<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Getting Started with Chart JS with www.chartjs3.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .chartMenu {
            width: 100vw;
            height: 40px;
            background: #1A1A1A;
            color: rgba(54, 162, 235, 1);
        }

        .chartMenu p {
            padding: 10px;
            font-size: 20px;
        }

        .chartCard {
            width: 100vw;
            height: calc(100vh - 40px);
            background: rgba(54, 162, 235, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chartBox {
            width: 700px;
            padding: 20px;
            border-radius: 20px;
            border: solid 3px rgba(54, 162, 235, 1);
            background: white;
        }
    </style> -->
</head>

<body>
    <div class='h-96 w-96 bg-emerald-900'>
        <canvas id="myChart"></canvas>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

    <script>
        // setup 
        const data = {
            labels: [
                'Red',
                'Blue',
                'Yellow'
            ],
            datasets: [{
                // label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };

        // config 
        const config = {
            type: 'doughnut',
            data: data,
            options: {
                resposive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#FFFFFF',
                            font: {
                                size: 14
                            },
                        }
                    }
                }
            }
        };

        // render init block
        const myChart = new Chart(document.getElementById('myChart'), config);
    </script>

</body>

</html>