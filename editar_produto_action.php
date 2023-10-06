<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$nome_produto = filter_input(INPUT_POST, 'nome_produto');
$codigo = filter_input(INPUT_POST, 'codigo');
$tipo = filter_input(INPUT_POST, 'tipo');
$marca = filter_input(INPUT_POST, 'marca');
$quantidade = filter_input(INPUT_POST, 'quantidade');
$data_entrada = filter_input(INPUT_POST, 'data_entrada');

if ($nome_produto && $codigo && $quantidade) {
    $sql = $pdo->prepare("UPDATE produtos SET nome_produto = :nome_produto, codigo = :codigo, tipo = :tipo, marca = :marca, quantidade = :quantidade, data_entrada = :data_entrada WHERE id = :id");
    $sql->bindValue(':nome_produto', $nome_produto);
    $sql->bindValue(':codigo', $codigo);
    $sql->bindValue(':tipo', $tipo); 
    $sql->bindValue(':marca', $marca); 
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':data_entrada', $data_entrada);
    $sql->bindValue(':id', $id);
    
    $sql->execute();

    header("Location: produtos_cadastrados.php");
    exit;
} else {
    header("Location: adicionar_produto.php");
    exit;
}
?>
