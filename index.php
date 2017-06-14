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

    </div>

    <?php get_footer();
