$(document).ready(function () {

    var open = false;
    $("#formFiltro").css("visibility", "hidden");



    $(".abrirFiltros").on("click",function () {
        if (open == false) {
            $("#buscador").css("height", "12%");
            $("#formFiltro").css("visibility", "visible");
            open = true;
        }
        else {
            $("#buscador").css("height", "4%");
            $("#formFiltro").css("visibility", "hidden");
            open = false;
        }
    })


})
