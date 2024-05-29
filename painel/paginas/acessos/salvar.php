<?php
$tabela = 'acessos';
require_once('../../../conexao.php');

$nome = $_POST['nome'];
$id = $_POST['id'];

//Validação de nome
$query = $pdo->query("SELECT * FROM $tabela where nome = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id != $id_reg) {
    echo 'Nome já Cadastrado';
    exit();
}


if ($id == '') {
    $query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome");
} else {
    $query = $pdo->prepare("UPDATE $tabela SET nome = :nome WHERE id = '$id'");
}
$query->bindValue(':nome', $nome);
$query->execute();

echo 'Salvo com Sucesso';
