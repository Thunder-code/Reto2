$(document).ready(function () {


    //Funcion para mostrar los detalles de un anuncio al hacer click
    $('.Anuncio').on("click",function () {

        $(this).find(".oculto").addClass("visible")
        $(this).find(".oculto").removeClass('oculto');
           $(this).css("background-color","white");
           $(this).css("position","fixed");
           $(this).css("width","50%");
          $(this).css("transition","all 0.3s ease-out")
          $(".cortinaGris").css("display","block");




    })
    //Funcion para mostrar la cortina gris de un anuncio al hacer click
    $('.cortinaGris').on("click",function () {
        $(".Anuncio").css("background-color"," rgba(252, 181, 0, 0.1)");
        $(".Anuncio").css("position","static");
        $(".Anuncio").css("width","20%");
        $(".Anuncio").css("height","auto");
        $(".Anuncio").css("transition","all 0s ease-out")
        $(".Anuncio").find(".visible").addClass('oculto');
        $(".cortinaGris").css("display","none");


    })


})
