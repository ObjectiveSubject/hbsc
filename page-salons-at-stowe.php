<?php
get_header();

$Event = null;
$postId = null;

    $eventNextSalonAtStoweLoop = new WP_Query( array( 
        'post_type'      => 'event',
        'posts_per_page' => 1,
        'order'          => 'ASC',
        'meta_key'		 => 'event_start_date',
        'meta_query' => array(
            array(
                'key' => 'event_start_date',
                'value' => date('Y-m-d'),
                'compare' => '>=',
                'type' => 'DATE'
            )
        ),        
        'tax_query'      => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'event-type',
                'field'    => 'slug',
                'terms'    => array('salon-at-stowe'),
            )
        ),
        'orderby' => 'meta_value'
    ));
?>
    <div class="site-content">
        <?php 
            while ( $eventNextSalonAtStoweLoop->have_posts() )
            {
                $eventNextSalonAtStoweLoop->the_post();
            
                if( null !== $post->ID && null === $postId )
                {
                    $postId = $post->ID;
                    $Event = new Event();
                }

                include HBSC_PATH . '/partials/events/details-section.php';
            }

            // DISCUSSION LEADERS
            include HBSC_PATH . '/partials/events/discussion-leaders-section.php';

            // ONLINE DISCUSSION
            include HBSC_PATH . '/partials/events/online-discussion-section.php';

            // UPCOMING SALONS
            $upcomingEventsDirection = 'inline';
            include HBSC_PATH . '/partials/events/upcoming-section.php';
        ?>
    </div>
<?php get_footer(); ?>