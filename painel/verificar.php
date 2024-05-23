<?php
@session_start();
//verifica se a sessão está vazia, se sim, redireciona para a página de login
if (@$_SESSION['id'] == '') {
    echo '<script>window.location="../"</script>';
    // exit é utilizado nesse caso para parar a execução do código e não exibir nada na tela
    exit();
}
