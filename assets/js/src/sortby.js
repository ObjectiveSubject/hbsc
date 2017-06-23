(function(window, jQuery, _){
    var SortBy = function(options)
    {
        this.options = options;
        this.sortByKeys = options.sortByKeys;
        this.defaultSortByKey = options.defaultSortByKey;
        this.onUpdateSortByCallback = options.onUpdateSortByCallback;
        this.init();
    }

    SortBy.prototype.init = function()
    {
        this.bindButtons();
        this.setDefaultSortBy();
    }

    SortBy.prototype.setDefaultSortBy = function()
    {        
        this.updateSortBy(this.defaultSortByKey);
    }

    SortBy.prototype.bindButtons = function()
    {
        var _this = this;
        jQuery( '.btn--sortby' ).on( 'click', function( evt )
        {
            evt.preventDefault();

            var sortKey = jQuery( this ).data( 'sortby-key' );            
            _this.updateSortBy( sortKey );
        } );
    }

    SortBy.prototype.updateSortBy = function(sortByKey)
    {
        jQuery( '.btn--sortby-active' ).removeClass( 'btn--sortby-active' );
        jQuery('[data-sortby-key="' + sortByKey + '"]').addClass( 'btn--sortby-active' );       
        jQuery( '.item--sortby-active' ).removeClass( 'item--sortby-active' );
        jQuery( '.item--sortby-' + sortByKey ).addClass( 'item--sortby-active' );

        console.log('typeof this.onUpdateSortByCallback', typeof this.onUpdateSortByCallback);
        if( typeof this.onUpdateSortByCallback == 'function' )
        {
            console.log('onUpdateSortByCallback');
            this.onUpdateSortByCallback();
        }        
    }    

    window.SortBy = SortBy;

})(window, jQuery, _);

