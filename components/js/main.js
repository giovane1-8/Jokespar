//Sticky Navbar
window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})

//Parceiros/Jogos Suporte videos Hover
$('.video-hover').mouseover(function () {
    $(this).get(0).play();
}).mouseout(function () {
    $(this).get(0).pause();
})