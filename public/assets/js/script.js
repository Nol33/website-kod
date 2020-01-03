

$(document).ready(function () {

    //Votre code JS et jQuery là dedans  ET PAS AILLEURS
    // When the user scrolls the page, execute myFunction

    window.onscroll = function () {

        myFunction();
    };







    // Get the header
    var menu = document.querySelector("#myHeader");

    // Get the offset position of the navbar
    var sticky = menu.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position

    function myFunction() {

        if (window.pageYOffset > sticky) {

            menu.classList.add("sticky-top");

        } else {

            menu.classList.remove("sticky-top");
        }
    }


    $(window).scroll(function(){
        $(".blanc").css("opacity", 1 - $(window).scrollTop() / sticky);
    });


    $(window).scroll(function(){
        $(".header").css("opacity", 0 + $(window).scrollTop() / sticky);
    });






});