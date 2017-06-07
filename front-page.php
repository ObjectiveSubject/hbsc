<?php
/**
 * General page template
 */
get_header(); ?>

    <div class="site-content">
       
        <?php while ( have_posts() ) : the_post(); ?>
        
        <section class="preface section <?php the_field('preface_background_color'); ?>">
            <div class="section__content u-container">
                <div class="section__body">
                    <div class="preface-text">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="module module--hero has-background <?php the_field('module_background_color'); ?>" style="background-image: url(<?php the_field('module_image'); ?>)">
            <div class="module__content <?php the_field('card_position'); ?> u-container">
                <div class="card-positioner">
                    <div class="card <?php the_field('card_background_color'); ?> js-slide-in">
                       
                        <div class="card-title">
                            <?php the_field('card_title'); ?>
                        </div>

                        <div class="card-content">
                            <?php the_field('card_content'); ?>
                        </div>

                        <div class="card-button">
                            <a href="<?php the_field('card_button_link'); ?>" class="button module-button"><?php the_field('card_button_text'); ?></a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Events/Salons at Stowe (3) -->
        <section class="module module--carousel u-bg-dark-gray">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title">Salons at Stowe</div>
                </header>
                <div class="module__body">
                    <ul class="carousel js-carousel">
                        <?php for ($i = 0 ; $i < 4; $i++) { ?>
                        <li class="carousel-slide">
                            <div class="carousel-slide__content">
                                <div class="badge-positioner">
                                    <div class="badge">
                                        <span class="u-caps">Dec</span>
                                        <span class="h2 u-font-miller" style="letter-spacing: -.05em">2<?php echo $i; ?></span>
                                    </div>
                                </div>
                                <div class="card-positioner">
                                    <div class="card u-bg-tan">
                                        <div class="card-content">
                                            <h2>Policing the Police:</h2>
                                            <h3>How can communities transform law enforcement?</h3>
                                        </div>
                                        <div class="card-button">
                                            <a href="#" class="button js-hover-toggle" data-target="#image-<?php echo $i; ?>" data-class="image--grayscale">View Event</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-positioner">
                                    <div id="image-<?php echo $i; ?>" class="image image--grayscale" <?php echo 'style="background-image: url(' .  get_template_directory_uri() . '/assets/images/sample/medium.jpg)"'; ?>></div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <footer class="module__footer">
                    <a href="#" class="button">Learn More</a>
                </footer>
            </div>
        </section>
        
        <!-- Links to Life section -->
        <section class="module module--basic u-bg-tan">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title">Harriet Beecher Stowe</div>
                </header>
                <div class="module__body">
                    <ul style="width: 100%;" class="u-text-center">
                        <li>
                            <a href="#"><span class="h2">Harriet Beecher</span><span class="h3">Stowe's Life</span></a>
                        </li>
                        <li class="u-mt-4">
                            <a href="#"><span class="h2">Uncle Tom's</span><span class="h3">Cabin</span></a>
                        </li>
                        <li class="u-mt-4">
                            <a href="#"><span class="h2">Family</span></a>
                        </li>
                    </ul>
                </div>
                <footer class="module__footer">
                    <a href="#" class="button">Learn More</a>
                </footer>
            </div>
        </section>
        
        <?php endwhile; ?>
		
		<?php if( have_rows('module') ): ?>

            <?php get_template_part( 'partials/page', 'modules' ); ?>

        <?php endif; ?>

    </div>

    <?php get_footer();
