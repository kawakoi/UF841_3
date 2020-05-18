$(document).ready(function(){
    
    var visible = false;
    function iniciar() {
        var elemento = document.getElementById("menu-img");
        elemento.addEventListener("click", mostrarMenu);
        }
    function mostrarMenu() {
        var elemento = document.getElementById("menuprincipal");
        if (!visible) {
            elemento.style.display = "flex";
            visible = true;
        } else {
            elemento.style.display = "none";
            visible = false;
            }
        }       
window.addEventListener("load", iniciar);

});