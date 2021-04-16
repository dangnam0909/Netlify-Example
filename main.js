$(function () {
    // for add year
    $('.year').each(function () {
        $(this).text(new Date().getFullYear());
    });

    // capcha
});

// active
var header = document.getElementById("myTopnav");
var btns = header.getElementsByClassName("menu");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active");
        if (current.length > 0) {
            current[0].className = current[0].className.replace(" active", "");
        }
        this.className += " active";
    });
}

// menu reponsive
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "nav_menu") {
        x.className += " responsive";
    } else {
        x.className = "nav_menu";
    }
}

