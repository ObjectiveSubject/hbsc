/*!
 * Toggles
 * Toggles for all the things
 */

(function($, window){

	window.Toggles = {};

	$(document).ready(function(){
		Toggles.slideToggles();
		Toggles.classToggles();
		Toggles.hoverToggles();
		Toggles.subMenuToggles();
	});
    
    /* Slide Toggle
	 * ------------------- */
	Toggles.slideToggles = function() {

		$('body').on( 'click', '.js-slide-toggle', function(e){
			e.preventDefault();
			var $this = $(this),
				$target = getTargetObject( this, $this.data('target') ),
				parent = $this.data('parent');
				$parent = ( parent ) ? $this.parents( $this.data('parent') ) : $this.parent();

			if ( !$target.length ) {
				return this;
			}

			// if no parent is specified, just use slideToggle on the target
			if ( ! parent ) {

				if ( $target.css( 'display' ) == 'none' ) {
					openTarget( $this, $target );
				} else {
					closeTarget( $this, $target );
				}

			} else {

				if ( $parent.hasClass('is-open') ) {
					closeTarget( $this, $target );
					$parent.removeClass('is-open');
				} else {
					openTarget( $this, $target );
					$parent.addClass('is-open');
				}

			}
		});

		function openTarget( $context, $target ) {
			$target.slideDown( 300, function() {
                $target.animate({ opacity: 1, duration: 300 });
            });
			$context.addClass('is-active');
			$context.removeClass('is-inactive');
		}

		function closeTarget( $context, $target ) {
			$target.animate({ opacity: 0, duration: 300 });
			$target.slideUp(300);
			$context.removeClass('is-active');
			$context.addClass('is-inactive');
		}

		// Processes a string to determine the target jQuery object
		// The string can use directory style targeting. e.g. '../.target-class'
		// Allows traversing DOM tree to find element(s)
		// returns jQuery
		function getTargetObject( context, targetStr ) {
			if ( ! context || ! targetStr ) {
				return $();
            }

			var trgtArray = targetStr.split('/'),
				$target = $(context);

			if ( trgtArray.length === 1 ) {
				return $(context).siblings( trgtArray[0] );
			}

			trgtArray.forEach( function( item, i ) {
				if ( ! item ) {
					return;
                }
				if ( '..' == item ) {
					$target = $target.parent();
				}
				if ( i == ( trgtArray.length - 1 ) ) {
					$target = $target.siblings( item );
				}
			} );

			return $target;
		}

		return this;
	};

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
                    htImage = $(this).data('image'),
				    htTarget = $(this).data('target');
                if ( htImage ==  null ) {
                    $(htTarget).removeClass(htClass);
                } else {
                    $(htTarget).css('background-image', 'url('+htImage+')');
                }
            },
            mouseleave: function() {
                var htClass = $(this).data('class'),
                    htImage = $(this).data('image'),
				    htTarget = $(this).data('target');
                if ( htImage ==  null ) {
                    $(htTarget).addClass(htClass);
                } else {
                    $(htTarget).css('background-image', 'none');
                }
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
