$(document).on("click", ".btnEliminar", function () {
  let id_item = $(this).data("id");
  let modulo = $(this).data("modulo");

  let titulo = "Está seguro de eliminar el " + modulo + "?";
  let confirmar = "Si, eliminar " + modulo;

  if (modulo == "especialidades") {
    titulo = "Está seguro de eliminar la especialidad?";
    confirmar = "Si, eliminar especialidad";
  }
  Swal.fire({
    title: titulo,
    text: "Sino lo está puede cancelar la acción",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: confirmar,
  }).then(function (result) {
    if (result.isConfirmed) {
      window.location =
        "index.php?pagina=" + modulo + "&id_" + modulo + "+" + id_item;
    }
  });
});
