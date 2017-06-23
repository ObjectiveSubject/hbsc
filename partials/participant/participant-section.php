<?php

if( !isset($color) )
{
    $color = 'u-bg-white';    
}

if( !isset($title) )
{
    $title = get_field('participant_first_name') . ' ' . get_field('participant_last_name' );
}

if( !isset($display_button) )
{
    $display_button = false;
}

if( !isset($display_title) )
{
    $display_title = true;
}

if( !isset($button_link) )
{
    $button_link = '';
}

if( !isset($button_text) )
{
    $button_text = '';
}

//$participantsSectionConfig
$participantsList = get_sub_field('participant_list');

if(!$participantsList)
{
    $participantsList = array( $post->ID );
}

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
        <?php if( $display_title && !empty($title) ) : ?>
        <header class="module__header">
            <div class="module-title">
                <?php echo $title; ?>
            </div>
        </header>
        <?php endif; ?>

        <div class="module__body u-pt-2">            
<?php            
            while( $participantsLoop->have_posts() )
            {
                $participantsLoop->the_post();

                include HBSC_PATH . 'partials/participant/participant-item.php';
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