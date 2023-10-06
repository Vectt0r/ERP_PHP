<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_POST, 'idade');
$cpf = filter_input(INPUT_POST, 'cpf');
$cidade = filter_input(INPUT_POST, 'cidade');


if($nome && $email && $idade){
    $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, idade = :idade, cpf = :cpf, cidade = :cidade WHERE id = :id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':idade', $idade);
    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':cidade', $cidade);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header("Location: usuarios_cadastrados.php");
    exit;
}else{
    header("Location: adicionar.php");
    exit;
}
?>