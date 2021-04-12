function getYear() {
    // for add year
    $('.year').each(function () {
	    $(this).text(new Date().getFullYear());
    });
}

// $(document).ready(function () {        
//     var width = $('.g-recaptcha').parent().width();
//     if (width < 302) {
//         var scale = width / 302;
//         $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
//         $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
//         $('.g-recaptcha').css('transform-origin', '0 0');
//         $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
//     }
// }); 