<?php

//definir fuso horário
date_default_timezone_set('America/Sao_Paulo');

// Conexão com o banco de dados
$servidor = 'localhost';
$banco = 'projeto';
$usuario = 'root';
$senha = '';

try {
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
    echo 'Erro ao conectar com ao banco de dados! <br>';
    echo $e;
}
