<?php
/*
Template Name: Archives
*/

get_header(); ?>

	<div class="site-content">
        <section class="preface section">
            <div class="section__content u-container">
                <header class="section__header">
                    <h1 class="section-title"><?php the_title(); ?></h1>
                </header>
            </div>
        </section>
        
        <?php while ( have_posts() ) : the_post(); ?>
        
            <?php echo $post->type; ?> ***
        <?php endwhile; ?>

    </div>
<?php get_footer(); ?>
