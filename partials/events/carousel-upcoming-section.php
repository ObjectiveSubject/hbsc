<?php
    if(!isset($carouselUpcomingSectionConfig))
    {
        $carouselUpcomingSectionConfig = array(
            'title'        => 'Salons at Stowe',
            'button_label' => 'Learn More',
            'button_link'  => '#',
            'event-type'   => array(
                'salon-at-stowe'
            ),
            'from_date' => date('Y-m-d')
        );
    }

    $carouselUpcomingSectionLoop = new WP_Query( array( 
        'post_type'      => 'event',
        'posts_per_page' => 3,
        'order'          => 'ASC',
        'meta_key'		 => 'event_start_date',
        'meta_query' => array(
            array(
                'key' => 'event_end_date',
                'value' => $carouselUpcomingSectionConfig['from_date'],
                'compare' => '>=',
                'type' => 'DATE'
            )
        ),
        'tax_query'      => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'event-type',
                'field'    => 'slug',
                'terms'    => $carouselUpcomingSectionConfig['event-type'],
            )
        ),
        'orderby'        => 'meta_value'
    ));

    if($carouselUpcomingSectionLoop->have_posts())
    {
?>
        <section class="module module--carousel u-bg-dark-gray">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title"><?php echo $carouselUpcomingSectionConfig['title']; ?></div>
                </header>
                <div class="module__body">
                    <ul class="carousel js-carousel">

                <?php
                    while ( $carouselUpcomingSectionLoop->have_posts() )
                    {
                        $carouselUpcomingSectionLoop->the_post();
                        $Event = new Event();
            
                        include HBSC_PATH . 'partials/events/carousel-upcoming-item.php';
                    }
                ?>

                    </ul>
                </div>
                <footer class="module__footer">
                    <a href="<?php echo $carouselUpcomingSectionConfig['button_link']; ?>" class="button"><?php echo $carouselUpcomingSectionConfig['button_label']; ?></a>
                </footer>
            </div>
        </section>
<?php
    }
?>