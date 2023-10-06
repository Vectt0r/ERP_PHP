<?php
require 'config.php';

$sql = $pdo->query("SELECT COUNT(*) as total FROM produtos");
$resultado = $sql->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    $quantidadeProdutosCadastrados = $resultado['total'];
} else {
    $quantidadeProdutosCadastrados = 0;
}

$sql = $pdo->query("SELECT COUNT(*) as total FROM usuarios");
$resultado = $sql->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    $quantidadeUsuariosCadastrados = $resultado['total'];
} else {
    $quantidadeUsuariosCadastrados = 0;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP - PHP</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .chart-container {
            width: 1200px;
            height: 600px;
            margin: 10px auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .chart-buttons {
            float: right;
            margin-right: 20px;
            margin-left: -80px;
            margin-top: 10px;
        }

        .chart-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .chart-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .chart-container-small {
            width: 600px;
            height: 400px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="navbar" style="position:fixed";>
        <ul class="align-items-start">
            <li><a href="index.php"><i class="material-icons">home</i></a></li>
            <li><a href="usuarios_cadastrados.php"><i class="material-icons">person</i></a></li>
            <li><a href="produtos_cadastrados.php"><i class="material-icons">shopping_cart</i></a></li>
            <li><a href="graficos.php"><i class="material-icons">bar_chart</i></a></li>
            <li><a href=""><i class="material-icons">attach_money</i></a></li>
            <li><a href=""><i class="material-icons">sell</i></a></li>
            <li><a href="#"><i class="material-icons">settings</i></a></li>
            <li><a href="login.php"><i class="material-icons">exit_to_app</i></a></li>
        </ul>
    </div>
    <div class="content">
        <div class="chart-buttons">
            <button class="btn btn-primary"><i class="material-icons">refresh</i></button>
            <button class="btn btn-primary"><i class="material-icons">settings</i></button>
        </div>
        <h3 class="chart-title">Título do Gráfico</h3>
        <div class="chart-container" style= "width: 1200px;">
            <canvas id="myChart"></canvas>
        </div>
        <h3 class="chart-title">Vendas por Vendedor</h3>
        <div class="chart-container" style="margin-top: 50px;">
            <canvas id="salesChart"></canvas>
        </div>
        <div class="chart-wrapper">
            <div class="chart-container-small">
                <canvas id="anotherChart"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx1 = document.getElementById('myChart').getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Produtos Cadastrados','Label','Label','Label','Label','Label',],
                datasets: [{
                    label: 'Quantidade',
                    data: [<?php echo $quantidadeProdutosCadastrados; ?> ,25,12,48,45,30,2],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx2 = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Vendedor A', 'Vendedor B', 'Vendedor C', 'Vendedor D', 'Vendedor E'],
                datasets: [{
                    label: 'Vendas',
                    data: [<?php echo $quantidadeUsuariosCadastrados; ?>,22,30,10,50],
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx3 = document.getElementById('anotherChart').getContext('2d');
        var anotherChart = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: ['Data 1', 'Data 2', 'Data 3', 'Data 4', 'Data 5'],
                datasets: [{
                    label: 'Dados',
                    data: [10, 20, 30, 40, 50],
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>