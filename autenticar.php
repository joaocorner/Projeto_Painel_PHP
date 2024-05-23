<?php
require_once 'conexao.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// sempre que for puxar algo do bd utiliza-se esse mesmo trecho abaixo, modificando-se a forma que filtra e tabela por exemplo
$query = $pdo->query("SELECT * FROM usuarios where email = '$usuario' AND senha = '$senha'"); //'query' não é recomendado nesse caso, pois é vulnerável a sql injection. deve-se utilizar 'prepare' quando for realizar busca por entrada do usuário
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($res); // conta quantas linhas foram retornadas
echo $linhas;
