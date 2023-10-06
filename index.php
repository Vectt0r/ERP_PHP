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
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 25px;
            margin-left: 40px;
            margin-bottom: 85px;
        }
        
        .card {
            width: 300px;
            height: 200px;
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s, transform 0.3s;
        }
        
        .card:nth-child(1) {
            background-color: #e74c3c;
        }
        
        .card:nth-child(2) {
            background-color: #3498db;
        }
        
        .card:nth-child(3) {
            background-color: #16a085;
        }
        
        .card:nth-child(4) {
            background-color: #f1c40f;
        }
        
        .card:nth-child(5) {
            background-color: #9b59b6;
        }
        
        .card:nth-child(6) {
            background-color: #e67e22;
        }
        
        .card:nth-child(7) {
            background-color: #2ecc71;
        }
        
        .card:nth-child(8) {
            background-color: #95a5a6;
        }
        
        .card i {
            font-size: 64px;
            margin-bottom: 10px;
        }
        
        .card a {
            display: block;
            color: #fff;
            text-decoration: none;
        }
        
        .card:hover {
            background-color: #f39c12;
            transform: scale(1.05);
        }

        .card-title {
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="navbar" style="">
        <ul class="align-items-start">
        <li><a href="index.php"><i class="material-icons" title="Home">home</i></a></li>
            <li><a href="usuarios_cadastrados.php"><i class="material-icons" title="Clientes">person</i></a></li>
            <li><a href="produtos_cadastrados.php"><i class="material-icons" title="Produtos">shopping_cart</i></a></li>
            <li><a href="graficos.php"><i class="material-icons" title="Graficos">bar_chart</i></a></li>
            <li><a href=""><i class="material-icons">attach_money</i></a></li>
            <li><a href=""><i class="material-icons">sell</i></a></li>
            <li><a href="#"><i class="material-icons">settings</i></a></li>
            <li><a href="login.php"><i class="material-icons">exit_to_app</i></a></li>
        </ul>
    </div>
  
    <div class="card-container">
        <div class="card">
            <a href="adicionar.php">
                <i class="material-icons">person_add</i>
                <span class="card-title">Adicionar Cliente</span>
            </a>
        </div>
        <div class="card">
            <a href="adicionar_produto.php">
                <i class="material-icons">add_shopping_cart</i>
                <span class="card-title">Adicionar Produto</span>
            </a>
        </div>
        <div class="card">
            <a href="usuarios_cadastrados.php">
                <i class="material-icons">person</i>
                <span class="card-title">Clientes Cadastrados</span>
            </a>
        </div>
        <div class="card">
            <a href="produtos_cadastrados.php">
                <i class="material-icons">shopping_cart</i>
                <span class="card-title">Produtos</span>
            </a>
        </div>
        <div class="card">
            <a href="graficos.php">
                <i class="material-icons">bar_chart</i>
                <span class="card-title">Gráficos</span>
            </a>
        </div>
        <div class="card">
            <a href="#">
                <i class="material-icons">attach_money</i>
                <span class="card-title">Financeiro</span>
            </a>
        </div>
        <div class="card">
            <a href="#">
                <i class="material-icons">sell</i>
                <span class="card-title">Vendas</span>
            </a>
        </div>
        <div class="card">
            <a href="#">
                <i class="material-icons">settings</i>
                <span class="card-title">Configurações</span>
            </a>
        </div>
    </div>
</body>
</html>
