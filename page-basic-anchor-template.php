<?php
/* Template Name: Basic Anchor Template */
get_header(); ?>

	<div class="site-content">

		<?php while ( have_posts() ) : the_post(); ?>
		
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
                            $module_anchor_button_title = get_sub_field('module_anchor_button_title');
                            $anchorButtonTitle = (!empty($module_anchor_button_title) ? $module_anchor_button_title : $title);
                            $moduleId = preg_replace('/\W+/', '-', strtolower($title));
                            ?>
                            <li class="anchor preface-button">
                                <a href="#module-<?php echo $moduleId; ?>" class="button">
                                    <?php echo $anchorButtonTitle; ?>
                                </a>
                            </li>
                            <?php 
                                    wp_reset_postdata();
                                endwhile;
                            ?>
                        </ul>
                    </footer>
                </div>
            </section>

		<?php 
                wp_reset_postdata();
            endwhile;
        ?>
		
		<?php if( have_rows('module') ): ?>

            <?php get_template_part( 'partials/page', 'modules' ); ?>

        <?php endif; ?>

	</div>

<?php get_footer(); ?>