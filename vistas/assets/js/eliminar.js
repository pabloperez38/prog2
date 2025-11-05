/*=============================================
ELIMINAR 
=============================================*/
$(document).on("click", ".btnEliminar", function () {
 
  let producto = $(this).attr("producto");

  Swal.fire({
    title: "¿Está seguro de eliminar el producto?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar producto",
  }).then(function (result) {
    if (result.value) {
      window.location =
        $("#url").val() +
        "index.php?pagina=productos&id_producto_eliminar=" +
        producto;
    }
  });
});
