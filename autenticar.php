<?php
session_start();
require_once 'conexao.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// sempre que for puxar algo do bd utiliza-se esse mesmo trecho abaixo, modificando-se a forma que filtra e tabela por exemplo
$query = $pdo->prepare("SELECT * FROM usuarios where email = :email AND senha = :senha");
$query->bindValue(':email', $usuario);
$query->bindValue(':senha', $senha);
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($res);

if ($linhas > 0) {
    $_SESSION['nome'] = $res[0]['nome'];
    $_SESSION['id'] = $res[0]['id'];
    $_SESSION['nivel'] = $res[0]['nivel'];

    echo '<script>window.location="painel"</script>';
} else {
    echo '<script>window.alert("Dados Incorretos")</script>';
    echo '<script>window.location="index.php"</script>';
}
