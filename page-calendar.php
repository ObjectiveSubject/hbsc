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
        'order'          => 'DESC'       
    ));
?>
<div class="site-content">
    <section class="module module--calendar u-bg-light-gray">
        <div class="module__content u-container">
            <header class="module__header">
                <div class="module-title">
                    <?php echo the_title(); ?>
                </div>
            </header>
            
            <div class="module__body">
                <aside class="events--calendar-aside">
                    <div id="events-calendar"></div>

                    <div class="events--calendar-terms">
                        <?php 
                            foreach($termsType as $term)
                            {
                                $termChecked = in_array( $term->slug, $termsList );
                    ?>
                                <label class="calendar--term-item <?php echo $termChecked ? 'calendar--term-checked' : ''; ?>">
                                    <input type="checkbox" name="events_categories" value="<?php echo $term->name; ?>" <?php echo $termChecked ? 'checked="checked"' : ''; ?>>  <?php echo $term->name;?>
                                </label>
                    <?php
                            }
                        ?>
                    </div>
                </aside>

                <div class="calendar--events-list">
<?php 
    $calendarData = array();

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

        $calendarData[] = array(
            'date'  => get_field('event_start_date'),
            'badge' => false
        );
?>
                    <div  class="calendar--event-item" id="calendar-event<?php echo $post->ID; ?>" data-event-date="<?php echo get_field('event_start_date'); ?>">
                        <div class="event--date">
                            <span class="u-caps"><?php echo $Event->getDateMonth();?></span>
                            <span class="h2 u-font-miller"><?php echo $Event->getDateDay();?></span>
                        </div>
                        <div class="event--content">
                            <div class="event--title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title();?></a></div>
                            <div class="event--taxonomies"><?php echo implode(', ', $taxonomies);?></div>
                            <div class="event--details"><?php echo get_field('event_doors_open') . ', ' . get_field('event_location');?></div>
                        </div>
                    </div>
<?php endwhile;?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
<script>window.$ = jQuery;</script>

<script type="application/javascript">
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
        }
    };

    function calendarNav(id, modal)
    {
        var date     = $("#" + id).data("date");
        var hasEvent = $("#" + id).data("hasEvent");

        if( hasEvent )
        {
            calEvents.scrollToEvent( date );
        }
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
            console.log($(this).prop('checked'));
            calEvents.filterEventsOnTerms();
        } );

        calEvents.filterEventsOnTerms();
    });
</script>