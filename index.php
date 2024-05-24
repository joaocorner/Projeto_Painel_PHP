<?php
require_once 'conexao.php';
$query = $pdo->query("SELECT * FROM usuarios");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($res);
$senha = '123';
$senha_crip = md5($senha);
if ($linhas == 0) {
    $pdo->query("INSERT INTO usuarios SET nome = '$nome_sistema', email = '$email_sistema', senha = '$senha',senha_crip = '$senha_crip', nivel = 'Administrador', ativo = 'Sim', foto = 'sem-foto.jpg'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título do Painel</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--  Necessário para o funcionamento de forma responsiva  -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icone.png">


</head>

<body>
    <div class='login'>
        <div class='form'>
            <img src="img/logo.png" alt="" srcset="" class="imagem">
            <form method="post" action="autenticar.php">
                <input type="email" name="usuario" placeholder="Digite seu E-mail">
                <input type="password" name="senha" placeholder="Digite sua Senha">
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>