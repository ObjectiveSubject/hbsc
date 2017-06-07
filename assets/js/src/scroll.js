/*
 * Scroll
 * All effects on window scroll
 */

(function ($, window) {

    window.ScrollEffects = {};

    /* Enable smooth scrolling
     * Borrowed from CSS-Tricks
     * https://css-tricks.com/snippets/jquery/smooth-scrolling/
     * ------------------- */
    ScrollEffects.smoothScroll = function () {
        $('a[href*="#"]')
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(e) {
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname
            ) {
                var target = $(this.hash);
                console.log(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function () {
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) {
                            return false;
                        } else {
                            $target.attr('tabindex', '-1');
                            $target.focus();
                        }
                    });
                }
            }
        });
    };

    /* Make elements below fold invisible
     * ------------------- */
    ScrollEffects.addClasses = function () {
        var $element = $('.js-slide-in'),
            viewHeight = $(window).height();
        $element.each(function () {
            var elementTop = $(this).offset().top;
            if (elementTop >= viewHeight) {
                $(this).css('transform', 'translateY(50%)').css('opacity', '0');
                $(this).addClass('u-transition-500');
            }
        });
    };

    /* Elements appear & slide in when fully above fold
     * ------------------- */
    ScrollEffects.slideIn = function () {
        var $element = $('.js-slide-in'),
            viewTop = $(window).scrollTop(),
            viewBottom = viewTop + $(window).height();
        $element.each(function () {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).height();
            if ((elementBottom <= viewBottom) && (elementTop >= viewTop)) {
                $(this).css('transform', 'translateY(0)').css('opacity', '1');
            }
        });
    };

    $(document).ready(function () {
        ScrollEffects.smoothScroll();
        ScrollEffects.addClasses();
    });

    $(window).scroll(function () {
        ScrollEffects.slideIn();
    });

})(jQuery, this);
