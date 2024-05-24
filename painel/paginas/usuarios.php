<?php
$pag = 'usuarios';
?>
<a type="button" class="btn btn-primary">
    <span class="fa fa-plus"></span> Usuário</a>

<div class="bs-example widget-shadow" style="padding:15px" id="listar">

</div>

<!-- chamada em ajax para não precisar repetir o código em todas as páginas -->
<script type='text/javascript'>
    var pag = '<?= $pag ?>' /* passando variavel de php para javascript */
</script>
<script src='js/ajax.js'></script>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#tabela').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
            }
        });
    });
</script>