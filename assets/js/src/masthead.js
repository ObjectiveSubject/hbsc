/*!
 * Masthead
 * Site header dynamics
 */

(function($, window) {

    window.Masthead = {};
    var masthead = $('#masthead'),
        mastheadHeight = masthead.height();

    $(document).ready(function() {
        //Masthead.modulePaddingTop();
        if (document.querySelectorAll('.current_page_item').length === 0) {
            jQuery('body').addClass('menu--no-current-page-item');
        }
    });

    $(window).scroll(function() {
        Masthead.logoOffset();
    });

    $('.menu-item.menu-item-has-children').on('click', function(e) {
        //e.preventDefault();
        var idx = $(this).index();
        var elm = $(this);
        var wasExpanded = $(this).hasClass('sub-menu-item-expanded');
        var wasSubmenuExpanded = $(this).find('.sub-menu').hasClass('is-expanded');
        jQuery('.sub-menu.is-expanded').removeClass('is-expanded');
        $(elm).toggleClass('sub-menu-item-expanded');

        window.setTimeout(function() {
            if (!wasSubmenuExpanded && $(elm).hasClass('sub-menu-item-expanded')) {
                $(elm).find('.sub-menu').addClass('is-expanded');
            }

            if (!$(elm).hasClass('sub-menu-item-expanded')) {
                $(elm).find('.sub-menu').removeClass('is-expanded');
            }
        }, 150);

        window.setTimeout(function() {
            jQuery('.menu-item.menu-item-has-children').each(function(i, _elm) {
                if (i != idx) {
                    $(_elm).removeClass('sub-menu-item-expanded');
                }
            });
        }, 500);
    });

    $('#site-menu-toggle, #site-mobile-menu-toggle').on('click', function(evt) {
        evt.preventDefault();
        if (!$('#site-menu').hasClass('is-expanded')) {
            $('#site-menu').addClass('is-expanded');
            var menu = jQuery('.site-menu.is-expanded .menu-item.current-menu-parent.menu-item-has-children');
            if (!$(menu).hasClass('sub-menu-item-expanded')) {
                $(menu).addClass('sub-menu-item-expanded');
            }
            var submenu = jQuery('.site-menu.is-expanded .menu-item.current-menu-parent.menu-item-has-children.sub-menu-item-expanded .sub-menu');
            if (!$(submenu).hasClass('is-expanded')) {
                $(submenu).addClass('is-expanded')
            }
        } else {
            $('#site-menu').removeClass('is-expanded');
            jQuery('.sub-menu-item-expanded').removeClass('sub-menu-item-expanded');
            window.setTimeout(function() {
                jQuery('.sub-menu-item-expanded').removeClass('sub-menu-item-expanded');
            }, 400);
        }
    });

    /* Logo Offset on Scroll
     * ------------------- */
    Masthead.logoOffset = function() {
        var scrollTop = $(window).scrollTop();

        if ($('body').hasClass('home')) {
            if (scrollTop > 500) {
                masthead.addClass('masthead--collapsed');
                $('#site-menu').removeClass('is-expanded');
            } else {
                masthead.removeClass('masthead--collapsed');
                if (!$('#site-menu').hasClass('is-expanded')) {
                    $('#site-menu').addClass('is-expanded');
                }
            }
        } else {
            if (scrollTop > 275) {
                masthead.addClass('masthead--collapsed');
            } else {
                masthead.removeClass('masthead--collapsed');
            }
        }

        if (document.querySelectorAll('.card-event-register').length > 0) {
            var dist = (jQuery('.card-positioner').offset().top - jQuery(window).scrollTop()) + 8;
            if (0 > dist) {
                if (!jQuery('.card-event-register').hasClass('item--scrolled')) {
                    jQuery('.card-event-register').addClass('item--scrolled');
                }
            } else {
                jQuery('.card-event-register').removeClass('item--scrolled');
            }
        }
        return this;
    };

    /* First Module Padding Top
     * ------------------- */
    Masthead.modulePaddingTop = function() {
        if (!$('body').hasClass('home')) {
            $('section').first().css({ 'padding-top': mastheadHeight + 'px' });
        }
        return this;
    };


})(jQuery, this);