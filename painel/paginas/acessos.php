<?php
$pag = 'acessos';
?>
<a onclick="inserir()" type="button" class="btn btn-primary">
    <span class="fa fa-plus"></span> Acesso</a>



<li class="dropdown head-dpdn2" style="display: inline-block;">
    <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle" id="btn-deletar" style="display: none">
        <span class="fa fa-trash"></span> Deletar</a>
    <ul class="dropdown-menu">
        <li>
            <div class="notification_desc2">
                <p>Excluir selecionados? <a href="#" onclick="excluirSel()"><span class="text-danger">Sim</span></a></p>
            </div>
        </li>
    </ul>
</li>

<div class="bs-example widget-shadow" style="padding:15px" id="listar">

</div>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#tabela').DataTable({
            "language": {
                //"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
            }
        });
    });
</script>

<input type="hidden" id="ids">

<!-- Modal Perfil -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span id="titulo_inserir"></span></h4>
                <button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-3">
                            <label>Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Menu" required>
                        </div>
                        <div class="col-md-3">
                            <label>Chave</label>
                            <input type="text" class="form-control" id="chave" name="chave" placeholder="Chave" required>
                        </div>

                        <div class="col-md-3">
                            <label>Grupo</label>
                            <select class="form-control" id="grupo" name="grupo" required>
                                <option value="0">Sem Grupo</option>
                                <?php
                                $query = $pdo->query("SELECT * FROM grupo_acessos order by id asc");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                $linhas = @count($res);
                                if ($linhas > 0) {
                                    for ($i = 0; $i < $linhas; $i++) {
                                ?>
                                        <option value="<?php echo $res[$i]['id'] ?>"><?php echo  $res[$i]['nome'] ?></option>

                                <?php   }
                                } ?>
                            </select>
                        </div>

                        <div class="col-md-3" style="margin-top: 22px">

                            <button type="submit" class="btn btn-primary">Salvar</button>

                        </div>

                        <input type="hidden" class="form-control" id="id" name="id">

                        <br>
                        <small>
                            <div id="mensagem" align="center"></div>
                        </small>
                    </div>
            </form>
        </div>
    </div>
</div>

<script type='text/javascript'>
    var pag = '<?= $pag ?>'
</script>
<script src='js/ajax.js'></script>