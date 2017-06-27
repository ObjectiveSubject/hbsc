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

if( !isset($participantsSectionConfig) )
{
    $participantsSectionConfig = array(
        'posts_per_page' => 3,
        'title' => get_field('participant_first_name') . ' ' . get_field('participant_last_name' ),
        'color' => 'u-bg-white',
        'button_text' => '',
        'button_link' => '',
        'display_title' => true,
        'display_button' => false,
        'post__in' => get_sub_field('participant_list')
    );
}

$participantsLoop = new WP_Query( array( 
    'post_type'      => 'participant',
    'posts_per_page' => $participantsSectionConfig['posts_per_page'],
    'order'          => 'DESC',
    'meta_key'		 => 'participant_winner',
    'post__in'       => $participantsSectionConfig['post__in'],
    'orderby'        => array(
        'meta_value_num' => 'DESC'
    )
));
?>
<section id="module-<?php echo preg_replace('/\W+/', '-', strtolower($participantsSectionConfig['title'])); ?>" class="module module--participant <?php echo $participantsSectionConfig['color']; ?>">
    <div class="module__content u-container">
        <?php if( $participantsSectionConfig['display_title'] && !empty($participantsSectionConfig['title']) ) : ?>
        <header class="module__header">
            <div class="module-title">
                <?php echo $participantsSectionConfig['title']; ?>
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

        <?php if( $participantsSectionConfig['display_button'] && $participantsSectionConfig['button_link'] && $participantsSectionConfig['button_text'] ) : ?>
        <footer class="module__footer">
            <a href="<?php echo $button_link; ?>" class="button module-button"><?php echo $participantsSectionConfig['button_text']; ?></a>
        </footer>
        <?php endif; ?>
    </div>
</section>