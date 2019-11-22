
//Menu dinamico del header
[].slice.call(document.querySelectorAll('.dropdown .nav-link')).forEach(function(el){
    el.addEventListener('click', onClick, false);
});

function onClick(e){
    e.preventDefault();
    var el = this.parentNode;
    el.classList.contains('show-submenu') ? hideSubMenu(el) : showSubMenu(el);
}

function showSubMenu(el){
    el.classList.add('show-submenu');
    document.addEventListener('click', function onDocClick(e){
        e.preventDefault();
        if(el.contains(e.target)){
            return;
        }
        document.removeEventListener('click', onDocClick);
        hideSubMenu(el);
    });
}

function hideSubMenu(el){
    el.classList.remove('show-submenu');
}

function cambiarVentana() {
    window.close();
    window.open("../html/login.php")


}
function cambiaraAnuncio() {
    window.close();
    window.open("../html/registroAnuncio.php")
}

function cambiaraMisAnuncios() {
    window.close();
    window.open("../html/misAnuncios.php")
}
function cambiaraEmpresa() {
    window.close();
    window.open("../html/registroEmpresa.php")
}

function cambiaraMiPerfil() {
    window.close();
    window.open("../html/datosUsuario.php")
}
