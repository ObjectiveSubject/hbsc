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
                        <h1 class="section-title">Harriet Beecher Stowe's Life</h1>
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
                            ?>
                            <li class="anchor preface-button">
                                <a href="#module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="button">
                                    <?php echo $title; ?>
                                </a>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </footer>
                </div>
            </section>
            
            <section class="module module--hero" style="background-image: url('../wp-content/themes/hbsc/assets/images/sample/large.jpg')">
                <div class="module__content u-flex-justify-end u-container">
                    <div class="card-positioner">
                        <div class="card u-bg-red js-slide-in">
                            <div class="card-content">
                                <div class="h4 u-font-miller-italic">"There is more done with pens than with swords."</div>
                                <div class="h6 u-caps u-mt-3"><span class="u-font-size-sm">Harriet Beecher Stowe</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

		<?php endwhile; ?>
		
		<?php if( have_rows('module') ): ?>

            <?php get_template_part( 'partials/page', 'modules' ); ?>

        <?php endif; ?>

	</div>

<?php get_footer(); ?>
