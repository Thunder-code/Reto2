$(document).ready(function () {
    function deshabilitarFunciones() {
        alert("hola");
        $('#gear').css("display", "none");
    }


    $(anuncio).on("click",function () {

        var $this = jQuery(this);
        $this.removeClass('.hidden');
        $(this).css("background-color","white");
        $(this).css("position","fixed");
        $(this).css("width","70%");



    })


})
