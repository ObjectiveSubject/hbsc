/*!
 * Masthead
 * Site header dynamics
 */

(function( window, $ ) {

    window.Masthead = {};

    var $window = $(window),
        $masthead = $('#masthead'),
        $siteMenu = $('#site-menu'),
        mastheadHeight = $masthead.height();

    $(document).ready(function() {
        
        // Force section breadcrumb highlight
        forceSectionBreadcrumb();

        $('.header-menu').each(function(i,nav) {
            setupMainNav( $(nav) );
        });
    });

    function addCurrentClass(elm) {
        var $elm = $(elm),
            $elmParent = $elm.parent(),
            $mainItem = $elm.parents('.menu-item-has-children');

		if ( ! $elmParent.hasClass('current-menu-item') ) {
			$elmParent.addClass('current-menu-item');
			$elm.css('color', '#e74949');
		}

		if ( ! $elmParent.hasClass('current_page_item') ) {
			$elmParent.addClass('current_page_item');
			$elm.css('color', '#e74949');
		}

		if ( ! $mainItem.hasClass('current-menu-parent') ) {
			$mainItem.addClass('current-menu-parent');
		}
		if ( ! $mainItem.hasClass('current-menu-ancestor') ) {
			$mainItem.addClass('current-menu-ancestor');
		}
	}

    function forceSectionBreadcrumb() {
        var pathname = window.location.pathname;

        $('.header-menu .sub-menu a').each(function(i, elm) {
            var $elm = $(elm),
                url = $elm.attr('href').replace(window.location.origin, ''),
                $eventCatName = $('.event_cat_name');

			if ( $eventCatName.length > 0 && $eventCatName.val() != "salons at stowe" ) {
				if ( $elm.html() == 'Calendar' ) {
					addCurrentClass(elm);
				}
			} else if ( pathname.indexOf(url) !== -1 ) {
                addCurrentClass(elm);
            }
        });
    }

    $window.scroll(function() {
        Masthead.logoOffset();
        if ( $siteMenu.hasClass('is-expanded') ) {
            Masthead.collapseMenu();
        }
    });


    function setupMainNav( nav ) {

        var $nav = $(nav);

        $nav.find('.menu-item.menu-item-has-children').on('click', function(e) {
            var idx = $(this).index();
            var elm = $(this);
            var wasExpanded = $(this).hasClass('sub-menu-item-expanded');
            var wasSubmenuExpanded = $(this).find('.sub-menu').hasClass('is-expanded');

            $nav.find('.sub-menu.is-expanded').removeClass('is-expanded');

            if ( ! wasExpanded ) {
                $(elm).addClass('sub-menu-item-expanded');
            }

            window.setTimeout(function() {
                if ( ! wasSubmenuExpanded && ! wasExpanded ) {
                    $(elm).find('.sub-menu').addClass('is-expanded');
                }
                if ( wasExpanded ) {
                    $(elm).find('.sub-menu').removeClass('is-expanded');
                }
            }, 150);

            window.setTimeout(function() {
                $nav.find('.menu-item.menu-item-has-children').each(function(i, _elm) {
                    if (i != idx) {
                        $(_elm).removeClass('sub-menu-item-expanded');
                    }
                });

                if (wasExpanded) {
                    $(elm).removeClass('sub-menu-item-expanded');
                }
            }, 400);
        });
    }

    $('#site-menu-toggle, #site-mobile-menu-toggle').on('click', function(evt) {
        evt.preventDefault();
        if ( ! $siteMenu.hasClass('is-expanded') ) {
            Masthead.expandMenu();
        } else {
            Masthead.collapseMenu();
        }
    });

    // Collapse Menu
    // -------------------
    Masthead.collapseMenu = function(){
        var $subMenuItemExpanded = $('.sub-menu-item-expanded');
        $siteMenu.removeClass('is-expanded');
        $subMenuItemExpanded.find('.is-expanded').removeClass('is-expanded');
        window.setTimeout(function() {
            $subMenuItemExpanded.removeClass('sub-menu-item-expanded');
        }, 400);
    };

    // Expand Menu
    // -------------------
    Masthead.expandMenu = function(){
        var $menu = $('.site-menu.is-expanded .menu-item.current-menu-parent.menu-item-has-children'),
            $submenu = $('.site-menu.is-expanded .menu-item.current-menu-parent.menu-item-has-children.sub-menu-item-expanded .sub-menu');

        $siteMenu.addClass('is-expanded');

        if ( ! $menu.hasClass('sub-menu-item-expanded') ) {
            $menu.addClass('sub-menu-item-expanded');
        }
        
        if ( ! $submenu.hasClass('is-expanded') ) {
            $submenu.addClass('is-expanded')
        }
    };

    /* Logo Offset on Scroll
     * ------------------- */
    Masthead.logoOffset = function() {
        var scrollTop = $window.scrollTop(),
            $cardEventRegister = $('.card-event-register');

        if ( $('body').hasClass('home') ) {
            if (scrollTop > 500) {
                $masthead.addClass('masthead--collapsed');
                $siteMenu.removeClass('is-expanded');
            } else {
                $masthead.removeClass('masthead--collapsed');
                if ( ! $siteMenu.hasClass('is-expanded') ) {
                    $siteMenu.addClass('is-expanded');
                }
            }
        } else {
            if (scrollTop > 275) {
                $masthead.addClass('masthead--collapsed');
            } else {
                $masthead.removeClass('masthead--collapsed');
            }
        }

        if ( $cardEventRegister.length > 0) {
            var dist = ($('.card').offset().top - $window.scrollTop());
            var distBtn = ($cardEventRegister.offset().top - $window.scrollTop());

            if (0 > dist || 0 > distBtn) {
                if ( ! $cardEventRegister.hasClass('item--scrolled') ) {
                    $cardEventRegister.addClass('item--scrolled');
                }
            } else {
                $('.card-event-register').removeClass('item--scrolled');
            }
        }
        return this;
    };

    /* First Module Padding Top
     * ------------------- */
    Masthead.modulePaddingTop = function() {
        if ( ! $('body').hasClass('home') ) {
            $('section').first().css({ 'padding-top': mastheadHeight + 'px' });
        }
        return this;
    };


})( this, jQuery );
