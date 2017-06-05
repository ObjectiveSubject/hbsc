/*!
 * Toggles
 * Toggles for all the things
 */

(function($, window){

	window.Toggles = {};

	$(document).ready(function(){
		Toggles.classToggles();
		Toggles.hoverToggles();
		Toggles.subMenuToggles();
	});

	/* Class Toggle
	 * ------------------- */
	Toggles.classToggles = function() {

		$('body').on( 'click', '.class-toggle', function(e){
			e.preventDefault();
			var ctClass = $(this).data('class'),
				ctTarget = $(this).data('target'),
				ctFocus = $(this).data('focus');

			if ( $(ctTarget).hasClass(ctClass) ) {
				$(ctTarget).removeClass(ctClass);
				$(ctFocus).blur();
			} else {
				$(ctTarget).addClass(ctClass);
				$(ctFocus).focus();
			}
		});

		return this;
	};

	/* Hover Toggle
	 * ------------------- */
	Toggles.hoverToggles = function() {
        
        $('body').on({
            mouseenter: function() {
                var htClass = $(this).data('class'),
				    htTarget = $(this).data('target');
                $(htTarget).removeClass(htClass);
            },
            mouseleave: function() {
                var htClass = $(this).data('class'),
				    htTarget = $(this).data('target');
                $(htTarget).addClass(htClass);
            }
        }, ".js-hover-toggle");

		return this;
	};

	/* Sub Menu Toggle
	 * ------------------- */
	Toggles.subMenuToggles = function() {

		$('#site-menu').on( 'click', '.menu-item-has-children>a', function(e){
            e.preventDefault();
            var $target = $(this).next('.sub-menu');
            $target.toggleClass('is-expanded');
		});

		return this;
	};


})(jQuery, this);
