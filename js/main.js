$(function() {

    $('#altocontraste').click(function() {
        $('body').toggleClass('altocontraste');
    });

});


function Responsivo() {
    var x = document.getElementById("menu");
    if (x.className === "menu-principal") {
        x.className += " responsive";
    } else {
        x.className = "menu-principal";
    }
}

$(document).ready(function() {
    $(".menu-item-has-children a").attr("aria-haspopup", "true");
    // $(".menu-item-has-children").attr("aria-expanded", "false");
    // $(".sub-menu").addClass("close");
    $('.carousel').carousel({
        interval: 5000
    })
});

// var timer;

// $(".has-sub").on("mouseover", function() {
//     this.setAttribute('aria-expanded', "true");
//     clearTimeout(timer);
//     openSubmenu(this);
// }).on("mouseleave", function() {
//     //   this.setAttribute('aria-expanded', "false");
//     //   timer = setTimeout(closeSubmenu(this), 3000);
// });

// function openSubmenu(e) {
//     //$(".sub-menu").addClass("open");
//     e.(".sub-menu").removeClass("close");
//     e.(".sub-menu").addClass("open");
// }

// function closeSubmenu(e) {
//     e.(".sub-menu").removeClass("open");
//     e.(".sub-menu").addClass("close");
// }

// $(".sub-menu").on("mouseover", function() {
//     this.removeClass("close");
//     this.addClass("open");
// }).on("mouseleave", function() {

//     timer = setTimeout(closemenu(this), 3000);
// });

// function closemenu(e) {
//     e.removeClass("close");
//     e.addClass("open");
// }