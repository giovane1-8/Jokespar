//Sticky Navbar
window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})


var contagem = 0;
function mostarCarta(idClass, id){
    if(contagem >= 5){

    }else{
        contagem= contagem + 1;
        $('#'+idClass).removeClass("display");
        $('#'+idClass).prop('type', 'number');
    }
}
