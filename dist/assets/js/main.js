function getYear() {
    // for add year
    $('.year').each(function () {
	    $(this).text(new Date().getFullYear());
    });
}
