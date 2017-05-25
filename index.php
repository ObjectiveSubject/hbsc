<?php
/**
 * General page template
 */
get_header(); ?>

    <div class="site-content">

        <?php while ( have_posts() ) : the_post(); ?>

        <article <?php post_class(); ?>>
                
        </article>

        <?php endwhile; ?>
        
        <?php get_template_part( 'content', 'modules' ); ?>
        <?php get_template_part( 'content', 'components' ); ?>

    </div>

    <?php get_footer();
