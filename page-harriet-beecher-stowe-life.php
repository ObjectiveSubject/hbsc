<?php
/* Template Name: Life */
get_header(); ?>

	<div class="site-content">

		<?php while ( have_posts() ) : the_post();?>
		
		    <section class="preface section <?php the_field('preface_background_color'); ?>">
                <div class="section__content u-container">
                    <header class="section__header">
                        <h1 class="section-title"><?php the_title(); ?></h1>
                    </header>
                    <div class="section__body">
                        <div class="preface-text">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    
                    <footer class="section__footer">
                        <ul class="anchors u-display-flex u-flex-justify-center u-flex-wrap">
                            <?php while( have_rows('module') ): the_row();                            
                                $title = get_sub_field('module_title');

                                if( !empty(trim($title) ) )
                                {                                
                            ?>
                            <li class="anchor preface-button">
                                <a href="#module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="button">
                                    <span><?php echo $title; ?></span>
                                </a>
                            </li>
                            <?php
                                } 
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        </ul>
                    </footer>
                </div>
            </section>
            
            <section class="module module--hero" <?php echo "style='background-image: url(" . get_the_post_thumbnail_url() . "')"; ?>>
                <div class="module__content u-flex-justify-end u-container">
                    <div class="card-positioner">
                        <div class="card u-bg-red js-slide-in">
                            <div class="card-content">
                                <blockquote>&ldquo;<?php echo get_field('life_quote'); ?>&rdquo;</blockquote>
                                <div class="h6 u-caps u-mt-3">
                                    <?php echo get_field('life_quote_author'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

		<?php 
            endwhile;
            wp_reset_postdata();
        ?>
		
		<?php if( have_rows('module') ): ?>

            <?php get_template_part( 'partials/page', 'modules' ); ?>

        <?php endif; ?>

	</div>

<?php get_footer(); ?>
