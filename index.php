<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coca-Cola Stock Visualization</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/vinibiavatti1/TuiCss@1.0.0/dist/tui.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            padding: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header">Coca-Cola Stock Data Visualization</h1>
        <div class="tui-card">
            <canvas id="stockChart"></canvas>
        </div>
    </div>

    <script>
        <?php
        $jsonData = file_get_contents('data.json');
        echo "const stockData = $jsonData;";
        ?>

        const ctx = document.getElementById('stockChart').getContext('2d');
        const dates = stockData.map(data => data.date);
        const closePrices = stockData.map(data => data.close);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Closing Prices',
                    data: closePrices,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        type: 'category',
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Price (USD)'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
