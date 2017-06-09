(function(window, $){
    var CalendarEvents = function(options)
    {
        this.options = options;
        this.selectorItems = options.selectorItems;
        this.checkboxesName = options.checkboxesName;
        this.selectorItemTaxonomy = options.selectorItemTaxonomy;
    };

    CalendarEvents.prototype.getCheckedTerms = function()
    {
        var list = $('input[name="' + this.checkboxesName + '"]:checked');
        var checkedValues = [];

        _.forEach( list, function( elm, idx )
        {
            checkedValues.push( $( elm ).val() );
        } );

        return checkedValues;  
    };

    CalendarEvents.prototype.filterEventsOnTerms = function()
    {
        var _this = this;
        var terms = this.getCheckedTerms();

        var list = $(this.selectorItems);

        _.forEach( list, function( elm, idx )
        {
            var hasTerm = false;
            _.forEach(terms, function(term, i)
            {
                if( $(elm).find(_this.selectorItemTaxonomy).text().indexOf(term) !== -1 )
                {
                    hasTerm = true;
                }
            });

            if( hasTerm )
            {
                $(elm).show();                
            }
            else
            {
                $(elm).hide();
            }
        } );    
    };

    CalendarEvents.prototype.scrollToEvent = function( dateStr )
    {
        var target = $('[data-event-date="' + dateStr + '"]:first');

        if( target )
        {
            var targetOffset = target.offset();
            var targetHeight = target.height();
            var scrollTop    = ( target.offset().top - target.height() );
            scrollTop        = scrollTop < 0 ? 0 : scrollTop;

            $('html, body').animate({
                scrollTop: scrollTop
            }, 1000 );
        }
    };

    window.CalendarEvents = CalendarEvents;
})(window, jQuery);