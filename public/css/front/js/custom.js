/* Theme Name: Sellkey - Creative and Multipurpose Template
   Author: SevenStock
   Version : 1.0
*/
// preloader
    $(document).ready(function() {
        preloaderFadeOutTime = 500;

        function hidePreloader() {
            var preloader = $('.spinner-wrapper');
            preloader.fadeOut(preloaderFadeOutTime);
        }
        hidePreloader();
    });

// sticky navbar
$(document).ready(function() {
    $("#sticker").sticky({
        topSpacing: 0
    });
});

// scroll up button
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollUpButton').fadeIn();
        } else {
            $('.scrollUpButton').fadeOut();
        }
    });
    $('.scrollUpButton').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 500);
        return false;
    });
});
