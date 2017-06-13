(function(window, jQuery, _){
    var StaffMember = function()
    {

    };

    StaffMember.prototype.init = function()
    {
        this.bindHoverEvents();
        this.bindScrollEvents();
    };

    StaffMember.prototype.bindScrollEvents = function()
    {
        var _this = this;

        jQuery(window).on('scroll', _.throttle(function()
        {
            _this.resizeItems();
            _this.setItemsInactive();
        }, 
        150, {
            'leading': true,
            'trailing': true
        } ));
    };

    StaffMember.prototype.bindResizeEvents = function()
    {
        var _this = this;

        jQuery(window).on('resize', _.throttle(function()
        {
            _this.resizeItems();
        }, 
        150, {
            'leading': true,
            'trailing': true
        } ));
    };

    StaffMember.prototype.getElementBounds = function( elm )
    {
        var offset = jQuery(elm).offset();
        var height = jQuery(elm).height();
        var width = jQuery(elm).width();
        var scrollTop = jQuery(window).scrollTop();
        var paddingBottom = jQuery(elm).css('paddingBottom');
        paddingBottom = paddingBottom.replace('px', '');

        var props = {
            top    : offset.top,
            bottom : ( offset.top + height ),
            left   : offset.left,
            right  : ( offset.left + width )
        };

        return props;
    }   

    StaffMember.prototype.setItemPosition = function(elm)
    {
        var parentWidth = jQuery(elm).parent().width();
        var parentOffsetLeft = jQuery(elm).parent().offset().left;
        var offset = jQuery(elm).offset().top;
        var scrollTop = jQuery(window).scrollTop();

        var nameTitleHeight = jQuery(elm).parent().find('.staff-member--name-title:first' ).height();

        var sectionBounds = this.getElementBounds( jQuery(elm).closest('.staff-member--item') );

        //offset = (offset - scrollTop);
        //offset = offset - ( ( parentWidth / 100 ) * 15 ) - ( nameTitleHeight * 0.5 );
        //offset = (offset < 0 ? 0 : offset);

        var itemProps = {
            top : offset,
            width: ( ( parentWidth / 100 ) * 50 ),
            height: ( ( parentWidth / 100 ) * 30 ),
            marginTop: ( ( parentWidth / 100 ) * 15 ) - ( nameTitleHeight * 0.5 )
        };


        var maxTopPos = ( sectionBounds.bottom -  itemProps.height ) ;
        var minTopPos = ( sectionBounds.top );
        /*console.log('******');
        console.log(sectionBounds, itemProps.top, minTopPos, maxTopPos);


        else
        if( itemProps.top + itemProps.height > maxTopPos  )
        {
            itemProps.top = ( maxTopPos - itemProps.height );
            console.log( 'Item top too high', itemProps.top, maxTopPos );
        } */       

        //var iTop = (itemProps.top < minTopPos ) ? minTopPos : itemProps.top;
        //itemProps.top = (itemProps.top > maxTopPos ) ? (maxTopPos - itemProps.height ) : iTop;
console.log('******');

        /*if( itemProps.top < minTopPos )
        {
            console.log( 'Item top too looow', itemProps.top, minTopPos );
            itemProps.top = minTopPos;
            
        }
        else*/
        /*if( offset > maxTopPos && offset > minTopPos )
        {
            itemProps.top = maxTopPos;
            console.log( 'Item top too high', itemProps.top, maxTopPos );
        }*/
        
        if( ( itemProps.top - itemProps.marginTop )  <= minTopPos )
        {
            console.log( 'Item top too looow', itemProps.top, minTopPos );
            itemProps.top = minTopPos;
        }
        else
        if( ( itemProps.top - itemProps.marginTop ) >= maxTopPos )
        {
            itemProps.top = maxTopPos;
        }



        var styles = {
            'top': ( itemProps.top - scrollTop ) + 'px',
            'width' :  itemProps.width+ 'px',
            'height' : itemProps.height + 'px',
            'marginTop' : -itemProps.marginTop + 'px'
        };
        //console.log(sectionBounds, styles, minTopPos, maxTopPos, offset);
        var img = jQuery(elm).parent().find('.image--positionner:first');
        var leftRight = (jQuery(img).hasClass('image--positionner-right') ? 'right' : 'left');
        styles[leftRight] = (parentOffsetLeft + 'px');
        
        jQuery(img).css(styles);
    };

    StaffMember.prototype.resizeItems = function()
    { 
        var _this = this;
        var list = jQuery( '.staff-member--item-active' );

        _.forEach(list, function(elm, i)
        {
            _this.setItemPosition(jQuery(elm));
        });
    };

    StaffMember.prototype.handleWindowScroll = function(evt)
    { 
        this.setItemsInactive();       
    };

    StaffMember.prototype.setItemsInactive = function()
    {

        //jQuery( '.staff-member--item' ).removeClass('staff-member--item-active');
    };

    StaffMember.prototype.setItemActive = function(elm)
    {
        if( !jQuery(elm).parent().hasClass('staff-member--item-active') )
        {

            this.setItemPosition(jQuery(elm));
            
            jQuery(elm).parent().addClass('staff-member--item-active');
        }
    };


    StaffMember.prototype.setItemInactive = function(elm)
    {
        if( jQuery(elm).parent().hasClass('staff-member--item-active') )
        {
            jQuery(elm).parent().removeClass('staff-member--item-active');
        }
    };   

    StaffMember.prototype.bindHoverEvents = function()
    {
        var _this = this;

        jQuery( '.staff-member--name-title' ).on('mouseenter', function(evt)
        {
            var elm = jQuery(this);
            _this.setItemActive(elm);
        });

        jQuery( '.staff-member--name-title' ).on('mouseleave', function(evt)
        {
            var elm = jQuery(this);
            _this.setItemInactive(elm);
        });
    };

    window.StaffMember = StaffMember;

})(window, jQuery, _);