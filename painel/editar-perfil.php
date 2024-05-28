<?php
$tabela = 'usuarios';
require_once('../conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$conf_senha = $_POST['conf_senha'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);
$id = $_POST['id_usuario'];

if ($conf_senha != $senha) {
    echo 'Senhas não conferem';
    exit();
}

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

$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, email = :email, telefone = :telefone, senha = :senha, senha_crip = '$senha_crip', endereco = :endereco WHERE id = '$id'");

$query->bindValue(':nome', $nome);
$query->bindValue(':email', $email);
$query->bindValue(':telefone', $telefone);
$query->bindValue(':endereco', $endereco);
$query->bindValue(':senha', $senha);
$query->execute();

echo 'Editado com Sucesso';
