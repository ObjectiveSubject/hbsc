<?php
/* Template Name: Calendar */
get_header();

    $termsType = get_terms( 'event-type', array(
        'hide_empty' => true,
    ) );  

    $termsList = get_terms( 'event-type', array(
        'hide_empty' => false,
        'fields'     => 'slugs'
    ) );        

    $loop = new WP_Query( array( 
        'post_type'      => 'event',
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'meta_key'		 => 'event_start_date',
        'orderby'        => 'meta_value',      
    ));
	
	
?>
<style>
.old-event, .hide-event {display:none;}
.event-show {    display: -webkit-box !important;
    display: -moz-box !important;
    display: box !important;
    display: -webkit-flex !important;
    display: -moz-flex !important;
    display: -ms-flexbox !important;
    display: flex !important;}
</style>
<div class="site-content">
    <section class="module module--calendar u-bg-light-gray">
        <div class="module__content u-container">
            <header class="module__header">
                <div class="module-title">
                    <?php echo the_title(); ?>
                </div>
            </header>
            
            <div class="module__body">
                <aside class="events--calendar-aside" style="height: 720px;">
                    <div class="events--aside-calendar-terms">
                        <div id="events-calendar"></div>

                        <div class="events--calendar-terms">
                            <?php 
                                foreach($termsType as $term)
                                {
                                    $termChecked = in_array( $term->slug, $termsList );
                            ?>
                                    <label class="calendar--term-item <?php echo $termChecked ? 'calendar--term-checked' : ''; ?>">
                                        <input type="checkbox" name="events_categories" value="<?php echo $term->name; ?>" <?php echo $termChecked ? 'checked="checked"' : ''; ?>>  <span><?php echo $term->name;?></span>
                                    </label>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </aside>

                <div class="calendar--events-list">
<?php 
    $calendarData = array();
    $lastYear = null;
    $lastMonth = null;

    while ( $loop->have_posts() ) : $loop->the_post();
        $Event = new Event();
        $taxonomies = wp_get_post_terms($post->ID, 'event-type', array(
                'hide_empty' => true,
                'fields' => 'names'
        ) );

        $taxonomiesSlugs = wp_get_post_terms($post->ID, 'event-type', array(
                'hide_empty' => true,
                'fields' => 'slugs'
        ) );        

		if ((get_field('event_start_date') == get_field('event_end_date')) 
			&& get_field('event_end_date') != '') {
			$calendarData[] = array(
				'date'  => get_field('event_start_date'),
				'date_start'  => get_field('event_start_date'),
				'date_end'  => get_field('event_end_date'),
				'title' => get_the_title(),
				'badge' => false
			);	
		} else {
			$arr_range= $Event->getRangeDates();
			for($i=0; $i < count($arr_range); $i++) {
				$calendarData[] = array(
				'date'  => $arr_range[$i],
				'date_start'  => get_field('event_start_date'),
				'date_end'  => get_field('event_end_date'),
				'title' => get_the_title(),
				'badge' => false
				);	
			}
		}

        $evtStartDtSplit = explode('-',get_field('event_start_date'));
        $evtClass = '';

        if( $lastMonth != $evtStartDtSplit[1] )
        {            
            if( $lastMonth != null )
            {
                $evtClass = 'event--firstofmonth';
            }

            $lastMonth = $evtStartDtSplit[1];
        }
		
		
?>
			<div  class="calendar--event-item  <?php echo $evtClass;?> <?php echo $evtStartDtSplit[0]."-".$evtStartDtSplit[1]; ?>" id="calendar-event<?php echo $post->ID; ?>" data-event-date="<?php echo get_field('event_start_date'); ?>"
			<?php echo (($Event->isOldEvent()) ? 'style="display:none"' : "")?>
			>
				<div class="event--date">
					<span class="u-caps"><?php echo $Event->getDateMonth();?></span>
					<span class="h2 u-font-miller"><?php echo $Event->getDateDay();?></span>
				</div>
				<div class="event--content">
					<div class="event--title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title();?></a></div>
					<div class="event--taxonomies"><?php echo implode(', ', $taxonomies);?></div>
					<div class="event--details"><?php echo get_field('event_program') . ', ' . get_field('event_location');?></div>
				</div>
			</div>
<?php 
    endwhile;
    wp_reset_postdata();
?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
<script>window.$ = jQuery;</script>

<script type="application/javascript">
    
    var cal = $('.events--aside-calendar-terms');
    var aside = $('.events--calendar-aside');
    var calHeight = cal.height();
    var asideHeight = aside.height();
    
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var distance = ( asideHeight - calHeight ) - scroll;
        if ( aside.hasClass('calendar--aside-scrolled') ) {
            if( distance <= -112 ) {
                cal.addClass('at-bottom');
            } else {
                cal.removeClass('at-bottom');
            }
        } else {
            if( distance <= 0 ) {
                cal.addClass('at-bottom');
            } else {
                cal.removeClass('at-bottom');
            }
        }
    })
    
    var currentMonthYear;
    var calEvents;
    var dataCalendar    = <?php echo json_encode($calendarData); ?>;
    var calendarOptions = {
        year: <?php echo date('Y'); ?>,
        show_previous: true,
        show_next: true,
        language: 'en',
        cell_border: false,
        today: true,
        show_days: false,
        weekstartson: 0,
        nav_icon: {
            prev: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            next: '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        },        
        data: dataCalendar,
        action : function()
        {
            return calendarNav(this.id, false);
        },
		action_nav: function() { calendarNavMonth(this.id); }
    };

    function calendarNav(id, modal)
    {
		var date_start = $("#" + id).attr("date_start");
        var date     = $("#" + id).data("date");
        var hasEvent = $("#" + id).data("hasEvent");

		
		console.log($("#" + id));
        if( hasEvent )
        {
            calEvents.scrollToEvent( date_start );
        }
    }
	
	function twoDigit(number) {
		var twodigit = number >= 10 ? number : "0"+number.toString();
		return twodigit;
	}
	
	function calendarNavMonth(id) {
		var to = $("#" + id).data("to");
		var data_month= to["year"]+"-"+twoDigit(to["month"]);
		$('.calendar--event-item').css('display', 'none');;
		$('.calendar--event-item').removeClass("event-show");
		$('.calendar--event-item.'+data_month).css('display', '');
		$('.calendar--event-item.'+data_month).addClass("event-show");
		
	}

    jQuery(document).ready(function()
    {
        calEvents = new CalendarEvents({
            'checkboxesName'       : 'events_categories',
            'selectorItems'        : '.calendar--event-item',
            'selectorItemTaxonomy' : '.event--taxonomies',
        });

        jQuery("#events-calendar").zabuto_calendar(calendarOptions);

        $('input[name="events_categories"]').on( 'change', function()
        {
            if( $(this).prop('checked') )
            {
                $(this).parent().addClass('calendar--term-checked');
            }
            else
            {
                $(this).parent().removeClass('calendar--term-checked');
            }

            calEvents.filterEventsOnTerms();
        } );

        $(window).on( 'scroll', handleOnScroll);

        function handleOnScroll()
        {
            var scrollTop = $(window).scrollTop();
            calendarAsidePosition( scrollTop );
            eventsScroll( scrollTop );
        }

        function eventsScroll( scrollTop )
        {
            var events = $('.calendar--event-item' );

            $('.calendar--event-item' ).each(function(i, elm)
            {
                var positionTop = $( elm ).offset().top - scrollTop;

                if(positionTop > 270 && positionTop < 325)
                {
                    var date = $(elm).data('event-date');
                    var dtSplit = date.split('-');
                    calendarOptions.year = dtSplit[0];
                    calendarOptions.month = dtSplit[1];
                    jQuery('.zabuto_calendar').parent().remove();
                    jQuery('.events--aside-calendar-terms').prepend('<div id="events-calendar"></div>');
                    jQuery("#events-calendar").zabuto_calendar(calendarOptions);
                }
            });            
        }

        function calendarAsidePosition( scrollTop )
        {
            if (scrollTop > 300)
            {
                $('.events--calendar-aside').addClass('calendar--aside-scrolled');
            } else {
                $('.events--calendar-aside').removeClass('calendar--aside-scrolled');
            }
        }

        $('.calendar--event-item:eq(1)' ).offset().top - $(window).scrollTop()

        //calEvents.filterEventsOnTerms();
    });
</script>