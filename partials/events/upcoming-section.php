<?php
    if( !isset($upcomingEventsSectionConfig) )
    {
        $upcomingEventsSectionConfig = array(
            'classes' => 'module--events-upcoming-inline u-bg-white',
            'direction' => 'inline'
        );
    }

    $upcomingItemCardPos = '';

    $upcomingEventsLoop = new WP_Query( array( 
        'post_type'      => 'event',
        'posts_per_page' => 3,
        'order'          => 'ASC',
        'meta_key'		 => 'event_start_date',
        'meta_query' => array(
            array(
                'key' => 'event_end_date',
                'value' => get_field('event_end_date'),
                'compare' => '>=',
                'type' => 'DATE'
            )
        ),
        'orderby'        => 'meta_value',
        'post__not_in'  => array($postId)
    ));

    if($upcomingEventsLoop->have_posts())
    {
?>
<section class="module module--basic <?php echo $upcomingEventsSectionConfig['classes']; ?>">
    <div class="module__content u-container">
        <header class="module__header">
            <div class="module-title">
                UPCOMING SALONS
            </div>
        </header>
        <div class="module__body">
        <?php
            $cnt = 0;
            while ( $upcomingEventsLoop->have_posts() )
            {
                $upcomingEventsLoop->the_post();
                $Event = new Event();

                if( $upcomingEventsSectionConfig['direction'] == 'list' )
                {
                    $upcomingItemCardPos = 'event--upcoming-item-left';

                    if( ( $cnt % 2 ) )
                    {
                        $upcomingItemCardPos = 'event--upcoming-item-right';
                    }
                }
                
                $cnt++;

                include HBSC_PATH . 'partials/events/upcoming-item.php';
            }
        ?>
        </div>
    </div>
</section>
<?php
    }
?>