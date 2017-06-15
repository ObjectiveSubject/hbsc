<?php
    $leadersIds = get_field('event_discussion_leaders', false, false);

    $leadersPosts = new WP_Query(array(
        'post_type'      	=> 'people',
        'posts_per_page'	=> -1,
        'post__in'			=> $leadersIds
    ));

    if( $leadersPosts->have_posts() )
    {
?>
        <section class="module u-bg-light-gray">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title">
                        <?php echo get_field('event_title_discussion_leaders'); ?>
                    </div>
                </header>
                <div class="module__body event--discussion-leaders">
                <?php
                    while( $leadersPosts->have_posts() )
                    {
                        $leadersPosts->the_post();

                        include HBSC_PATH . 'partials/events/discussion-leaders-item.php';
                    }
                ?>
                </div>
            </div>
        </section>
<?php
        wp_reset_postdata();
    }
?>