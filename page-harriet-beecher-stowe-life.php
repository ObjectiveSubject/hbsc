<?php
/**
 * General page template
 */

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
                    <!--<?php if( have_rows('module') && get_field('display_module_anchors') ) : ?>
                    <footer class="section__footer">
                        <ul class="anchors u-display-flex u-flex-justify-center u-flex-wrap">
                            <?php while( have_rows('module') ): the_row();
                            $title = get_sub_field('module_title');
                            ?>
                            <li class="anchor preface-button">
                                <a href="#module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="button">
                                    <?php echo $title; ?>
                                </a>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </footer>
                    <?php endif; ?>-->
                </div>
            </section>
            
            <section class="module module--hero">
                <div class="module__content u-flex-justify-end u-container">
                    <div class="card-positioner">
                        <div class="card u-bg-red js-slide-in">
                            <div class="card-content">
                                <div class="h4"><i>"There is more done with pens than with words."</i></div>
                                <div class="h6 u-caps">Harriet Beecher Stowe</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

		<?php endwhile; ?>

	</div>

<?php get_footer(); ?>
