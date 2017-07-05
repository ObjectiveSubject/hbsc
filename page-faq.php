<?php
/**
 * General page template
 */

get_header(); ?>

	<div class="site-content">

		<?php while ( have_posts() ) : the_post(); ?>
		
		    <?php get_template_part('partials/page', 'preface'); ?>

		<?php endwhile; ?>
		
		<?php if( have_rows('faq_module') ): ?>
            
            <?php while( have_rows('faq_module') ): the_row(); ?>

            <section class="module module--basic module--faq u-bg-light-gray">
                <div class="module__content u-container">
                    <header class="module__header">
                        <div class="module-title">
                            <?php the_sub_field('faq_module_title'); ?>
                        </div>
                    </header>
                    <div class="module__body">
                        <?php if( have_rows('faq_item') ): ?>
            
                            <?php while( have_rows('faq_item') ): the_row(); ?>
                            
                            <div class="dropdown">
                                <div class="dropdown__title js-slide-toggle" data-target=".dropdown__content" data-parent=".dropdown">
                                    <h5><?php the_sub_field('question'); ?></h5>
                                    <span class="dropdown__icon"></span>
                                </div>
                                <div class="dropdown__content">
                                    <?php the_sub_field('answer'); ?>
                                </div>
                            </div>
                            
                            <?php endwhile; ?>
                        
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            
            <?php 
                endwhile; 
                wp_reset_postdata();
            ?>

        <?php endif; ?>

	</div>

<?php get_footer(); ?>
