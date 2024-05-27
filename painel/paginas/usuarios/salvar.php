<?php
$tabela = 'usuarios';
require_once('../../../conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nivel = $_POST['nivel'];
$endereco = $_POST['endereco'];
$senha = '123';
$senha_crip = md5($senha);
$id = $_POST['id'];

//verificar se email já existe
$query = $pdo->query("SELECT * FROM $tabela where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id != $id_reg) {
    echo 'Email já Cadastrado';
    exit();
}

//verificar se telefone já existe
$query = $pdo->query("SELECT * FROM $tabela where telefone = '$telefone'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id != $id_reg) {
    echo 'Telefone já Cadastrado';
    exit();
}

if ($id == '') {
    $query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, email = :email, telefone = :telefone, nivel = '$nivel', endereco = :endereco, senha = '$senha', senha_crip = '$senha_crip', ativo = 'Sim', data = curDate(), foto = 'sem-foto.jpg'");
} else {
    $query = $pdo->prepare("UPDATE $tabela SET nome = :nome, email = :email, telefone = :telefone, nivel = '$nivel', endereco = :endereco WHERE id = '$id'");
}
$query->bindValue(':nome', $nome);
$query->bindValue(':email', $email);
$query->bindValue(':telefone', $telefone);
$query->bindValue(':endereco', $endereco);
$query->execute();

echo 'Salvo com Sucesso';
