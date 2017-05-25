<?php
/**
 * General page template
 */
get_header(); ?>

    <div class="site-content">

        <section class="section home-introduction u-bg-tan">
            <div class="section__content u-container">
                <div class="introduction-text" style="margin-left: 20rem;">We preserve and interpret Stowe's <i>Hartford home</i> and the center's historic collections, promote <i>vibrant discussion</i> of her life and work, and inspire commitment to social justice and positive change.</div>
            </div>
        </section>
        
        <section class="module module--feature has-background u-bg-red" style="background-image: url('wp-content/themes/hbsc/assets/images/sample/large.jpg');">
            <div class="module__content u-flex-justify-start u-container">
                <div class="card u-bg-red js-slide-in">
                    <div class="card-title">
                        News
                    </div>
                    <div class="card-content h3">
                        Stowe Prize Winner
                        <span class="alt-font">Ta-Nahesi Coates</span>
                    </div>
                    <div class="card-button">
                        <a href="#" class="button">Watch Speech</a>
                    </div>
                </div>
            </div>
        </section>
        
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
                                    <div class="badge badge--date">
                                        <span>Dec</span>
                                        <span>30</span>
                                    </div>
                                </div>
                                <div class="card-positioner">
                                    <div class="card u-bg-tan">
                                        <div class="h4 card-content">
                                            Policing the Police:
                                            <span>How can communities transform law enforcement?</span>
                                        </div>
                                        <div class="card-button">
                                            <a href="#" class="button js-hover-toggle" data-target="#image-<?php echo $i; ?>" data-class="image--grayscale">View Event</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-positioner">
                                    <div id="image-<?php echo $i; ?>" class="image image--grayscale"></div>
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

        <section class="section u-bg-tan">
            <div class="section__content u-container">
                <header class="section__header">
                    <div class="section-title">Salons at Stowe</div>
                </header>
                <div class="section__body u-text-center">
                    <ul>
                        <li>Harriet Beecher Stowe's Life</li>
                        <li>Uncle Tom's Cabin</li>
                        <li>Family</li>
                    </ul>
                </div>
                <footer class="section__footer">
                    <a href="#" class="button">Learn More</a>
                </footer>
            </div>
        </section>
        
        <?php get_template_part( 'content', 'modules' ); ?>
        <?php get_template_part( 'content', 'components' ); ?>

    </div>

    <?php get_footer();
