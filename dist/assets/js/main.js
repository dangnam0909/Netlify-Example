$(function () {
    // for add year
    $('.year').each(function () {
        $(this).text(new Date().getFullYear());
    });
});

// menu reponsive
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "nav_menu") {
        x.className += " responsive";
    } else {
        x.className = "nav_menu";
    }
}

