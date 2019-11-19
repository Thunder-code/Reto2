$(document).ready(function() {

//Funcion para darle el efecto del blur al haver hover en el formulario de inicio de sesion
    $("#cFormulario").on("mouseover", function () {
        $("#wallpaper").css("transition","all 0.6s ease-in-out");
        $("#cFormulario").css("transition","all 0.6s ease-in-out");
        $("#wallpaper").css("filter", "blur(8px)");
        $("#wallpaper").css("transform", "scale(1.2");

    })
    $("#cFormulario").on("mouseout", function () {
        $("#wallpaper").css("filter", "blur(4px)");
        $("#wallpaper").css("transform", "scale(1");

    })
});

