/*!
 * Carousels
 * Initializes the slick slides library on elements with the .js-carousel-slide class.
 */

(function($, window){

    var Carousels = {

        init: function(){

            $('.js-carousel').each(function(){
                var $this = $(this);

                settings = {
                    prevArrow: '<button type="button" data-role="none" class="slick-prev slick-controls ui-button icon icon-chevron-left" aria-label="Previous" tabindex="0" role="button"></button>',
                    nextArrow: '<button type="button" data-role="none" class="slick-next slick-controls ui-button icon icon-chevron-right" aria-label="Next" tabindex="0" role="button"></button>',
                    mobileFirst: true,
                    dots: true,
                    displayDots: "hide-lg",
                    autoplay: false, // reset to true when OK
                    autoplaySpeed: 4000
                };

                $this.slick(settings);
            });   
        }
    };

    $(document).ready(function(){
        window.Carousels = Carousels;
        Carousels.init();
    });

})( jQuery, this );
