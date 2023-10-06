<?php
require 'config.php';

$nome_produto = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_STRING);
$codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);
$data_entrada = filter_input(INPUT_POST, 'data_entrada', FILTER_SANITIZE_STRING);

if ($nome_produto && $quantidade !== false && $tipo) {
    $sql = $pdo->prepare("INSERT INTO produtos (nome_produto, codigo, tipo, marca, quantidade, data_entrada) VALUES (:nome_produto, :codigo, :tipo, :marca, :quantidade, :data_entrada)");
    $sql->bindValue(':nome_produto', $nome_produto);
    $sql->bindValue(':codigo', $codigo);
    $sql->bindValue(':tipo', $tipo);
    $sql->bindValue(':marca', $marca);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':data_entrada', $data_entrada);
    
    $cont = 0;

    if ($sql->execute()) {
        $cont++;
        header("Location: produtos_cadastrados.php");
        exit;
    } else {
        // Ocorreu algum erro ao inserir os dados no banco de dados
        echo "Erro ao cadastrar o produto.";
    }
} else {
    // Algum campo obrigatório não foi preenchido corretamente
    header("Location: adicionar_produto.php");
    exit;
}
?>