<?php
$usuario = "admin"; 
$senha = "12345"; 

$usuario_digitado = $_POST['username'];
$senha_digitada = $_POST['password'];

if ($usuario_digitado === $usuario && $senha_digitada === $senha) {
    header("Location: index.php");
    exit;
} else {
    header("Location: login.php");
    exit;
}
?>