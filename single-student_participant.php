<?php
/**
 * General page template
 */
get_header();
?>
	<div class="site-content">	
<?php 
    while ( have_posts() )
    {
        the_post();

        $participantsSectionConfig = array(
            'posts_per_page' => 1,
            'title' => 'Participant',
            'color' => 'u-bg-white',
            'button_text' => '',
            'button_link' => '',
            'display_title' => true,
            'display_button' => false,
            'post__in' => array( $post->ID )
        );

        include HBSC_PATH . 'partials/participant/participant-section.php';
    }
    wp_reset_postdata();
?>
	</div>
<?php get_footer(); ?>
