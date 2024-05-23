<?php
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
// echo $linhas;

if($linhas > 0){
    echo 'Logado com sucesso';
} else {
    echo 'Usuário ou senha incorretos';
}