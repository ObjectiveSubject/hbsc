<?php
    $OtherSalonsLoop = new WP_Query( array( 
        'post_type'      => 'event',
        'posts_per_page' => 2,
        'order'          => 'DESC',
        'meta_key'		 => 'event_start_date',
        'meta_query' => array(
            array(
                'key' => 'event_discussion_leaders',
                'value' => '"' . $postId . '"',
                'compare' => 'LIKE'
            )
        ),
        'orderby'        => 'meta_value'
    ));

    if($OtherSalonsLoop->have_posts())
    {
?>
<section class="module module--basic u-bg-white">
    <div class="module__content u-container">
        <header class="module__header">
            <div class="module-title">
                SALONS LEAD BY <?php echo get_field('people_first_name'); ?>
            </div>
        </header>
        <div class="module__body">
        <?php
            while ( $OtherSalonsLoop->have_posts() )
            {
                $OtherSalonsLoop->the_post();
                $Event = new Event();
     
                include HBSC_PATH . '/partials/people/other-salons-item.php';
            }
        ?>
        </div>

        <div class="card-button">
            <a href="" title="" class="button js-hover-toggle">Salons at Stowe</a>
        </div>

    </div>
</section>
<?php
    }
?>