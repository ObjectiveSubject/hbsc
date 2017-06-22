<?php
$participantsList = get_sub_field('participant_list');
$participantsLoop = new WP_Query( array( 
    'post_type'      => 'participant',
    'posts_per_page' => 3,
    'order'          => 'DESC',
    'meta_key'		 => 'participant_winner',
    'post__in'       => $participantsList,
    'orderby'        => array(
        'meta_value_num' => 'DESC'
    )
));
?>
<section id="module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="module module--participant <?php echo $color; ?>">
    <div class="module__content u-container">
        <?php if( $display_title ) : ?>
        <header class="module__header">
            <div class="module-title">
                <?php echo $title; ?>
            </div>
        </header>
        <?php endif; ?>

        <div class="module__body">            
<?php            
            while( $participantsLoop->have_posts() )
            {
                $participantsLoop->the_post();

                $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                $imgSrc = (isset($img[0]) ? $img[0] : '');
?>
                <div class="participant--item">
                    <div class="participant--name u-text-center">
                        <a href="<?php echo the_permalink($post->ID);?>" class="u-display-inline-block">
                            <span class="h2"><?php echo get_field('participant_first_name'); ?></span>
                            <span class="h2"><?php echo get_field('participant_last_name'); ?></span>
                        </a>
                    </div>
                    <div class="participant--image" style="background-image:url('<?php echo $imgSrc;?>');"></div>
<?php
                if( get_field('participant_winner') == 1 )
                {
?>                                    
                    <div class="participant--winner">WINNER</div>
<?php
                }
?>
                    <div class="participant--text">
                        <div class="topic">Topic</div>
                        <div class="entry--title"><?php echo get_field('participant_entry_title'); ?></div>
                        <div class="school--name"><?php echo get_field('participant_academic_institution'); ?></div>
                    </div>
                </div>
<?php
            }
            wp_reset_postdata();
?>
        </div>

        <?php if( $display_button && $button_link && $button_text ) : ?>
        <footer class="module__footer">
            <a href="<?php echo $button_link; ?>" class="button module-button"><?php echo $button_text; ?></a>
        </footer>
        <?php endif; ?>
    </div>
</section>