$(document).ready(function () {
  listar();
});

function listar() {
  $.ajax({
    url: "paginas/" + pag + "/listar.php",
    method: "POST",
    data: {},
    dataType: "html",

    success: function (result) {
      $("#listar").html(result);
      $("#mensagem-excluir").text("");
    },
  });
}
