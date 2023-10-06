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
            <li><a href="#"><i class="material-icons">exit_to_app</i></a></li>
        </ul>
    </div>
    <div class="content">
        <div class="form-container" style="margin-left: 350px; margin-top: 80px;">
        <form class="form" action="adicionar_produto_action.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="nome_produto">Nome do Produto</label>
                    <input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="nome_produto">
                </div>
                <div class="form-group col-md-2">
                    <label for="tipo">Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="tipo">
                </div>
                <div class="form-group col-md-2">
                    <label for="codigo">Codigo</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="codigo">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca">
                </div>
                <div class="form-group col-md-2">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
                </div>
                <div class="form-group col-md-2">
                    <label for="data_entrada">Data de Entrada</label>
                    <input type="date" class="form-control" id="data_entrada" name="data_entrada" placeholder="__/__/__">
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <!-- <input class="form-check-input" type="checkbox" id="gridCheck"> -->
                    <!-- <label class="form-check-label" for="gridCheck">
                        Clique em mim
                    </label> -->
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <button type="button" class="btn btn-primary" onclick="location.href='produtos_cadastrados.php'">Voltar</button>
        </form>
    </div>
</body>
</html>
