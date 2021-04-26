
$('#applyForm input').blur(function() {
    if ($(this).val()) {
        $(this).parent().addClass("focused");
    } else{
        $(this).parent().removeClass("focused");
    }
});
$('#applyForm input').focus(function() {
    $(this).parent().addClass("focused");
});
$('#applyForm textarea').focus(function() {
    $(this).parent().addClass("focused");
});
$('#applyForm textarea').blur(function() {
    if ($(this).val()) {
        $(this).parent().addClass("focused");
    } else{
        $(this).parent().removeClass("focused");
    }
});

$(document).ready(function () {
    $('#applyForm').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            $(".sub_loading").addClass("active");
        }
    })
})
$(document).ready(function () {
    $("input").keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});

$(document).ready(function () {
  $("a.scrollLink").click(function (event) {
      event.preventDefault();
      $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top }, 500);
  })
  return false;
});

jQuery(document).ready(function(e) {
    var t = e("#backtotop");
    e(window).scroll(function() {
        e(this).scrollTop() >= 800 ? t.show(10).animate({
            opacity: "1"
        }, 10) : t.animate({
            opacity: "0"
        }, 10)
    });
    t.click(function(t) {
        t.preventDefault();
        e("html,body").animate({
            scrollTop: 0
        }, 400)
    })
  })

  var lastScrollTop = 0;
  // element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
  window.addEventListener("scroll", function(){ // or window.addEventListener("scroll"....
     var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
     if (st > lastScrollTop){
        // downscroll code
        $('.header-contact').addClass('visible');
     } else {
        // upscroll code
        $('.header-contact').removeClass('visible');
     }
     lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
  }, false);
  $(window).scroll(function(){
    if ($(window).scrollTop() >= 350) {
        $('.header-contact').addClass('fixed');
    }
    else {
        $('.header-contact').removeClass('fixed');
    }
  });