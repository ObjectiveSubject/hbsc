<?php
    $leadersPosts = get_field('event_discussion_leaders');

    if( is_array($leadersPosts) && count( $leadersPosts ) > 0 )
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
                    foreach( $leadersPosts as $post )
                    {
                        setup_postdata($post);
                        
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