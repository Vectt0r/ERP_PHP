<?php
require 'config.php';
$info = [];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if ($id) {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
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
            <form class="form" action="editar_action.php" method="POST">
                <input type="hidden" name="id" value="<?= $info['id']; ?>">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="nome" value="<?= $info['nome']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?= $info['email']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Idade</label>
                    <input type="text" class="form-control col-md-8" id="idade" name="idade" placeholder="idade" value="<?= $info['idade']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">CPF</label>
                    <input type="text" class="form-control col-md-8" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx" value="<?= $info['cpf']; ?>" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Cidade</label>
                        <select class="form-control" id="cidade" name="cidade" readonly>
                            <option selected><?= $info['cidade']; ?></option>
                            <option value="Santo Antonio da Patrulha">Santo Antonio da Patrulha</option>
                            <option value="Osorio">Osorio</option>
                            <option value="Tramandai">Tramandai</option>
                            <option value="Gravatai">Gravatai</option>
                            <!-- Adicione mais opções de cidade conforme necessário -->
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" disabled>Salvar</button>
                <button type="button" class="btn btn-primary" onclick="location.href='usuarios_cadastrados.php'">Voltar</button>
            </form>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>