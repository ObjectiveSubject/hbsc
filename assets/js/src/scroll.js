/*
 * Scroll
 * All effects on window scroll
 */

(function($, window){

	window.ScrollEffects = {};
    $element   = $('.js-slide-in');
    viewHeight = $(window).height();

	/* Make elements below fold invisible
	 * ------------------- */
	ScrollEffects.addClasses = function() {
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
	ScrollEffects.slideIn = function() {
        var viewTop = $(window).scrollTop(),
            viewBottom = viewTop + $(window).height();
        $element.each(function () {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).height();
            if ((elementBottom <= viewBottom) && (elementTop >= viewTop)) {
                $(this).css('transform', 'translateY(0)').css('opacity', '1');
            }
        });
	};

	$(document).ready(function(){
        ScrollEffects.addClasses();
	});

	$(window).scroll(function(){
        ScrollEffects.slideIn();
	});

})(jQuery, this);
