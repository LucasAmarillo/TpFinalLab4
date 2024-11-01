$(document).on("click", ".btnEliminarPlan", function () {
  let id_plan = $(this).attr("id_plan");

  console.log(id_plan);

  Swal.fire({
    title: "Está seguro de eliminar el plan?",
    text: "Sino lo está puede cancelar la acción",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar plan",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?pagina=planes&id_plan_eliminar=" + id_plan; // Redirigir con el ID
    }
  });
});
