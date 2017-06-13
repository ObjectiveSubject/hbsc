<?php
    if( !isset($pastSalonsSectionConfig) )
    {
        $pastSalonsSectionConfig = array(
            'classes' => 'module--events-upcoming-inline u-bg-white',
            'direction' => 'inline'
        );
    }

    $pastSalonsItemCardPos = '';

    $pastSalonsLoop = new WP_Query( array( 
        'post_type'      => 'event',
        'posts_per_page' => -1,
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

    if($pastSalonsLoop->have_posts())
    {
?>
<section class="module module--basic module--past-salons u-bg-white">

    <div class="module__content u-container">
        <header class="module__header">
            <div class="module-title">
                PAST SALONS
            </div>
        </header>

        <div class="module__body">
        <?php
            $cnt = 0;
            while ( $pastSalonsLoop->have_posts() )
            {
                $pastSalonsLoop->the_post();
                $Event = new Event();
                
                $cnt++;

                include HBSC_PATH . 'partials/events/past-salons-item.php';
            }
        ?>
        </div>

    </div>
</section>
<?php
    }
?>