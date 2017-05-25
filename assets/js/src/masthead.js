/*!
 * Masthead
 * Site header dynamics
 */

(function($, window){

	window.Masthead = {};
    var masthead  = $('#masthead'),
        mastheadHeight = masthead.height();

	$(document).ready(function(){
		Masthead.modulePaddingTop();
	});

	$(window).scroll(function(){
        Masthead.logoOffset();
	});

	/* Logo Offset on Scroll
	 * ------------------- */
	Masthead.logoOffset = function() {
        var scrollTop = $(window).scrollTop();
        if( scrollTop > 0 ) {
            masthead.addClass('masthead--collapsed');
        } else {
            masthead.removeClass('masthead--collapsed');
        }
		return this;
	};

	/* First Module Padding Top
	 * ------------------- */
	Masthead.modulePaddingTop = function() {
        if ( !$('body').hasClass('home') ) {
            $('section').first().css({ 'padding-top': mastheadHeight + 'px' });
        }
		return this;
	};


})(jQuery, this);
