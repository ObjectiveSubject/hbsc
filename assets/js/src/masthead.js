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
            //jQuery('body').addClass('menu--no-current-page-item');
        }

        // Force section breadcrumb highlight

        forceSectionBreadcrumb();
    });

    function forceSectionBreadcrumb() {
        var pathname = window.location.pathname;

        jQuery('.header-menu .sub-menu a').each(function(i, elm) {
            var url = jQuery(elm).attr('href').replace(window.location.origin, '');
            console.log(jQuery(elm).attr('href').replace(window.location.origin, ''), pathname, pathname.indexOf(url));

            if (pathname.indexOf(url) !== -1) {

                var mainItem = jQuery(elm).parents('.menu-item-has-children');

                if (!jQuery(elm).parent().hasClass('current-menu-item')) {
                    jQuery(elm).parent().addClass('current-menu-item');
                    jQuery(elm).css('color', '#e74949');
                }

                if (!jQuery(elm).parent().hasClass('current_page_item')) {
                    jQuery(elm).parent().addClass('current_page_item');
                    jQuery(elm).css('color', '#e74949');
                }

                if (!jQuery(mainItem).hasClass('current-menu-parent')) {
                    jQuery(mainItem).addClass('current-menu-parent');
                }
                if (!jQuery(mainItem).hasClass('current-menu-ancestor')) {
                    jQuery(mainItem).addClass('current-menu-ancestor');
                }
            }
        });
    }

    $(window).scroll(function() {
        Masthead.logoOffset();
    });


    var headerMenu = ( jQuery('.header-menu').length > 1 ? jQuery('.header-menu:eq('+ 1 +')') : jQuery('.header-menu:eq(0)') );
    jQuery(headerMenu).find('.menu-item.menu-item-has-children').on('click', function(e) {

        /*jQuery('.site-menu.is-expanded .menu-item' ).each(function(i, elm)
        {
            jQuery(elm).css('height')
            jQuery(elm).
        });*/


        var idx = $(this).index() - 1;
        var elm = $(this);
        var wasExpanded = $(this).hasClass('sub-menu-item-expanded');
        var wasSubmenuExpanded = $(this).find('.sub-menu').hasClass('is-expanded');
        //jQuery('.sub-menu.is-expanded').toggleClass('is-expanded');

        if (!wasExpanded) {
            $(elm).addClass('sub-menu-item-expanded');     
            window.setTimeout(function() {
                    $(elm).find('.sub-menu').addClass('is-expanded');
            }, 150);            
        }
        else
        {
            $(elm).find('.sub-menu').removeClass('is-expanded');
            window.setTimeout(function() {
                    if( !$(elm).hasClass('current_page_parent') )
                    {
                        $(elm).removeClass('sub-menu-item-expanded');   
                    }                    
            }, 375);
        }

        /*
        if( !wasExpanded )
        {
            window.setTimeout(function() {
                if (!wasSubmenuExpanded && !wasExpanded) {
                    $(elm).find('.sub-menu').addClass('is-expanded');
                    $(elm).addClass('sub-menu-item-expanded');
                }
            }, 150);            
        }
        else
        {
            window.setTimeout(function() {
                $(elm).find('.sub-menu').removeClass('is-expanded');
            }, 150);            
        }*/

       /* window.setTimeout(function() {
            console.log('index',jQuery('header-menu > .menu-item.menu-item-has-children'));
            $(headerMenu).find('.menu-item.menu-item-has-children').each(function(i, _elm) {
                if (i != idx) {
                    console.log('index - 2',i, idx, $(this).index(),$(_elm).index());
                    $(elm).find('.sub-menu').removeClass('is-expanded');
                    $(elm).removeClass('sub-menu-item-expanded');
                    //$(_elm).removeClass('sub-menu-item-expanded');
                }
                else
                {
                    console.log('Here');
                }
            });
        }, 400);*/
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
            jQuery('.sub-menu-item-expanded').find('.is-expanded').removeClass('is-expanded');
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
            var dist = (jQuery('.card').offset().top - jQuery(window).scrollTop());
            var distBtn = (jQuery('.card-event-register').offset().top - jQuery(window).scrollTop());
            if (0 > dist || 0 > distBtn) {
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