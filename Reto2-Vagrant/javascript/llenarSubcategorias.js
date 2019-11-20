$(document).ready(function(){
    //Funcion para llenar el combobox de categorias
    $("#categorias").on("change", function() {
        $("#categorias option:selected").each(function () {
            let idCategoria = $(this).val();
            $.post("../Php-actions/llenarCB/llenarCBSubcategorias.php", {idCategoria: idCategoria}, function (data) {
                $("#subcategorias").html(data);
            });
        });
    });
});
