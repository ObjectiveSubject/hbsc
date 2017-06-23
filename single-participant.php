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
        include HBSC_PATH . 'partials/participant/participant-section.php';
    }
?>
	</div>
<?php get_footer(); ?>
