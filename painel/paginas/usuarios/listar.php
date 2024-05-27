<?php
$tabela = 'usuarios';
require_once('../../../conexao.php');

$query = $pdo->query("SELECT * FROM $tabela order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($res);
if ($linhas > 0) {
    echo <<<HTML
<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
	<th>Nome</th>	
	<th class="esc">Telefone</th>	
	<th class="esc">Email</th>	
	<th class="esc">Nível</th>	
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;
}

for ($i = 0; $i < $linhas; $i++) {
    $id = $res[$i]['id'];
    $nome = $res[$i]['nome'];
    $telefone = $res[$i]['telefone'];
    $email = $res[$i]['email'];
    $nivel = $res[$i]['nivel'];
    $senha = $res[$i]['senha'];
    $ativo = $res[$i]['ativo'];
    $foto = $res[$i]['foto'];
    $endereco = $res[$i]['endereco'];
    $data = $res[$i]['data'];

    $dataF = implode('/', array_reverse(explode('-', $data)));

    if ($ativo == 'Sim') {
        $icone = 'fa-check-square';
        $titulo_link = 'Desativar Item';
        $acao = 'Não';
        $classe_ativo = '';
    } else {
        $icone = 'fa-square-o';
        $titulo_link = 'Ativar Usuário';
        $acao = 'Sim';
        $classe_ativo = '#c4c4c4';
    }

    if ($nivel == 'Administrador') {
        $senha = '********';
    }


    echo <<<HTML
<tr style="color:{$classe_ativo}">
<td>{$nome}</td>
<td class="esc">{$telefone}</td>
<td class="esc">{$email}</td>
<td class="esc">{$nivel}</td>
<td>

<big><a href="#" onclick="editar('{$id}','{$nome}','{$email}','{$telefone}','{$endereco}','{$nivel}')" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>
<li class="dropdown head-dpdn2" style="display: inline-block;">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

		<ul class="dropdown-menu" style="margin-left:-230px;">
		<li>
		<div class="notification_desc2">
		<p>Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')"><span class="text-danger">Sim</span></a></p>
		</div>
		</li>										
		</ul>
</li>

<big><a href="#" onclick="mostrar('{$nome}','{$email}','{$telefone}','{$endereco}','{$ativo}','{$dataF}', '{$senha}', '{$nivel}')" title="Mostrar Dados"><i class="fa fa-info-circle text-primary"></i></a></big>


<big><a href="#" onclick="ativar('{$id}', '{$acao}')" title="{$titulo_link}"><i class="fa {$icone} text-success"></i></a></big>

</td>
</tr> 
HTML;
}

echo <<<HTML
</tbody>
<small><div align="center" id="mensagem-excluir"></div></small>
</table>
HTML;
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabela').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json"
            },
            "ordering": false,
            "stateSave": true,
        });
    });
</script>

<script type='text/javascript'>
    function editar(id, nome, email, telefone, endereco, nivel) {
        $('#mensagem').html('');
        $('#titulo_inserir').html('Editar Usuário');

        $('#id').val(id);
        $('#nome').val(nome);
        $('#email').val(email);
        $('#telefone').val(telefone);
        $('#endereco').val(endereco);
        $('#nivel').val(nivel).change();

        $('#modalForm').modal('show');
    }

    function limparCampos() {
        $('#id').val('');
        $('#nome').val('');
        $('#email').val('');
        $('#telefone').val('');
        $('#endereco').val('');
        $('#nivel').val('Administrador').change();
    }
</script>