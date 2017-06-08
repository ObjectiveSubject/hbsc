<?php
/* Template Name: Calendar */
get_header();

    $args = array(
        'name' => 'event',
    );

    $terms = 'salon-at-stowe,school-educators,tour';

    if( array_key_exists('terms',$_GET))
    {
        if( !empty( $_GET[ 'terms' ] ) )
        {
            $terms = $_GET[ 'terms' ];
        }
    }

    $termsList = explode( ',', $terms );

    $loop = new WP_Query( array( 
        'post_type'      => 'event',
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'meta_key'		 => 'event_date',
        'orderby'        => 'meta_value',
        'order'          => 'DESC',
        'tax_query'      => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'event-type',
                'field'    => 'slug',
                'terms'    => $termsList,
            )
        )        
    ));
?>
<div class="site-content">
    <section class="module u-bg-white">
        <div class="module__content u-container">
            <header class="module__header">
                <div class="module-title">
                    Calendar
                </div>
            </header>
            
            <div class="module__body">
                <div id="events-calendar"></div>

                <div>
                    <?php 
                        $termsType = get_terms( 'event-type', array(
                            'hide_empty' => true,
                        ) );

                        foreach($termsType as $term)
                        {
                            $termChecked = in_array( $term->slug, $termsList );
                ?>
                            <div><input type="checkbox" name="events_categories" id="events_categories" value="<?php echo $term->slug; ?>" <?php echo $termChecked ? 'checked="checked"' : ''; ?>>  <?php echo $term->slug;?></div>
                <?php
                        }
                    ?>
                </div>

                <div class="calendar--events-list">
<?php 
    $calendarData = array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $Event = new Event();
        $taxonomies = wp_get_post_terms($post->ID, 'event-type', array(
                'hide_empty' => true,
                'fields' => 'names'
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
                            <div class="event--title"><?php echo the_title();?></div>
                            <div class="event--taxonomies"><?php echo implode(', ', $taxonomies);?></div>
                            <div class="event--details"><?php echo $Event->getField('event_doors_open') . ', ' . $Event->getField('event_location');?></div>
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
<script type='text/javascript' src='/wp-content/themes/hbsc/assets/js/vendor/zabuto_calendar.js?ver=0.1.0'></script>
<script type="application/javascript">
    var dataCalendar = <?php echo json_encode($calendarData); ?>;
    var calendarOptions = {
        year: <?php echo date('Y'); ?>,
        show_previous: true,
        show_next: true,
        language: 'en',
        cell_border: true,
        today: true,
        show_days: false,
        weekstartson: 0,
        nav_icon: {
            prev: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
            next: '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
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
            console.log(date);
            console.log(jQuery("#" + id).data());
        }
    }

    jQuery(document).ready(function()
    {
        jQuery("#events-calendar").zabuto_calendar(calendarOptions);
    });
</script>