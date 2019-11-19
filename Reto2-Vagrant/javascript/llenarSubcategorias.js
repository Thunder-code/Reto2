$(document).ready(function(){
    $("#categorias").on("change", function() {
        $("#categorias option:selected").each(function () {
            let idCategoria = $(this).val();
            console.log(idCategoria);
            $.post("../Php-actions/llenarCB/llenarCBSubcategorias.php", {idCategoria: idCategoria}, function (data) {
                console.log(data);
                $("#subcategorias").html(data);
            });
        });
    });
});
