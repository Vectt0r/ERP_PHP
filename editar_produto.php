<?php
require 'config.php';
$info = [];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if ($id) {
    $sql = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    }
} else {
    header("location: index.php");
    exit;
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
        <div class="form-container" style="margin-left: 350px; margin-top: 80px;">
        <form class="form" action="editar_produto_action.php" method="POST">
        <input type="hidden" name="id" value="<?= $info['id']; ?>">
            <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Nome do Produto</label>
                        <input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="nome" value="<?= $info['nome_produto']; ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">Tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="nome" value="<?= $info['tipo']; ?>">
                    </div> <div class="form-group col-md-2">
                        <label for="inputPassword4">Codigo</label>
                        <input type="number" class="form-control" id="codigo" name="codigo" placeholder="codigo" value="<?= $info['codigo']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" placeholder="marca" value="<?= $info['marca']; ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" value="<?= $info['quantidade']; ?>">
                    </div> <div class="form-group col-md-2">
                        <label for="inputPassword4">Data de Entrada</label>
                        <input type="date" class="form-control" id="data_entrada" name="data_entrada" placeholder="data_entrada" value="<?= date('Y-m-d', strtotime($info['data_entrada'])); ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-primary" onclick="location.href='produtos_cadastrados.php'">Voltar</button>
            </form>
        </div>
    </div>
</body>
</html>



