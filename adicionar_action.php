<?php
require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_POST, 'idade');
$cpf = filter_input(INPUT_POST, 'cpf');
$cidade = filter_input(INPUT_POST, 'cidade');

if($nome && $email && $idade){

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute(); 

    if($sql->rowCount() === 0){

        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, idade, cpf, cidade) VALUES (:nome, :email, :idade, :cpf, :cidade)");
        $sql->bindValue(':nome', $nome);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':idade', $idade);
        $sql->bindParam(':cpf', $cpf);
        $sql->bindParam(':cidade', $cidade);
        $sql->execute();

        header("Location: usuarios_cadastrados.php");
        exit;

    } else {
        header("Location: usuarios_cadastrados.php");
        exit;
    }
} else {
    header("Location: adicionar.php");
    exit;
}