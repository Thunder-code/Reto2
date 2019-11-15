$(document).ready(function(){
    $("#categorias").on("change", function() {
        $("#categorias option:selected").each(function () {
            let idCategoria = $(this).val();
            console.log(idCategoria);
            $.post("../Php-actions/llenarCBSubcategorias.php", {idCategoria: idCategoria}, function (data) {
                $("#subcategorias").html(data);
            });
        });
    });
});
