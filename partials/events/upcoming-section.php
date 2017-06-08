<?php
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
<section class="module module--basic u-bg-white">
    <div class="module__content u-container">
        <header class="module__header">
            <div class="module-title">
                UPCOMING SALONS
            </div>
        </header>
        <div class="module__body">
        <?php
            while ( $upcomingEventsLoop->have_posts() )
            {
                $upcomingEventsLoop->the_post();
                $Event = new Event();
     
                include HBSC_PATH . '/partials/events/upcoming-item.php';
            }
        ?>
        </div>
    </div>
</section>
<?php
    }
?>