<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] === '1') {
    $id = $_GET['id'];

    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        header("Location: usuarios_cadastrados.php");
        exit;
    }

    $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id, PDO::PARAM_INT);

    if ($sql->execute()) {
        header("Location: usuarios_cadastrados.php");
        exit;
    } else {
        echo "Erro ao excluir o usuário.";
    }
} else {
    header("Location: usuarios_cadastrados.php");
    exit;
}
?>