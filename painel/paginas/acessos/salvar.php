<?php
$tabela = 'acessos';
require_once('../../../conexao.php');

$nome = $_POST['nome'];
$chave = normalizarTexto($_POST['chave']);
$grupo = $_POST['grupo'];
$id = $_POST['id'];

//Validação de nome
$query = $pdo->query("SELECT * FROM $tabela where nome = '$nome'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id != $id_reg) {
    echo 'Nome já Cadastrado';
    exit();
}


if ($id == '') {
    $query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, chave = :chave, grupo = :grupo");
} else {
    $query = $pdo->prepare("UPDATE $tabela SET nome = :nome,chave = :chave,grupo = :grupo WHERE id = '$id'");
}
$query->bindValue(':nome', $nome);
$query->bindValue(':chave', $chave);
$query->bindValue(':grupo', $grupo);
$query->execute();

echo 'Salvo com Sucesso';


function normalizarTexto($texto)
{
    $texto = iconv('UTF-8', 'ASCII//TRANSLIT', $texto);
    $texto = preg_replace('/[^a-zA-Z0-9_ ]/', '', $texto);
    $texto = str_replace(' ', '_', $texto);
    $texto = strtolower($texto);
    return $texto;
}
