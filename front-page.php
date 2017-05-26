<?php
/**
 * General page template
 */
get_header(); ?>

    <div class="site-content">
        
        <section class="preface section u-bg-tan">
            <div class="section__content u-container">
                <div class="section__body">
                    <div class="preface-text">
                        We preserve and interpret Stowe's <i>Hartford home</i> and the center's historic collections, promote <i>vibrant discussion</i> of her life and work, and inspire commitment to social justice and positive change.
                    </div>
                </div>
            </div>
        </section>
        
        <section class="module module--hero has-background u-bg-red" style="background-image: url('wp-content/themes/hbsc/assets/images/sample/large.jpg');">
            <div class="module__content u-flex-justify-start u-container">
                <div class="card-positioner">
                    <div class="card u-bg-red js-slide-in">
                        <div class="card-title">
                            News
                        </div>
                        <div class="card-content">
                            <span>Stowe Prize Winner</span>
                            <span>Ta-Nehisi Coates</span>
                        </div>
                        <div class="card-button">
                            <a href="#" class="button">Watch Speech</a>
                        </div>
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
                                            <span>Policing the Police:</span>
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
                    <div class="section-title">Harriet Beecher Stowe</div>
                </header>
                <div class="section__body">
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
        
        <section class="module module--hero has-background u-bg-red" style="background-image: url('wp-content/themes/hbsc/assets/images/sample/large.jpg');">
            <div class="module__content u-flex-justify-end u-container">
                <div class="card-positioner">
                    <div class="card u-bg-tan js-slide-in">
                        <div class="card-title">
                            Collections
                        </div>
                        <div class="card-content">
                            <span>Treasures</span>
                            <span>of a Transformative Writer</span>
                        </div>
                        <div class="card-button">
                            <a href="#" class="button">View Collections</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="module module--basic u-bg-blue">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title">2016 Stowe Prize Recipient</div>
                </header>
                <div class="module__body">
                    <div class="module-column">
                        Bryan Stevenson
                    </div>
                    <div class="module-column">
                        To be in the same company as past Stowe Prize winners Ta-Nehisi Coates, Michelle Alexander, Nicholas Kristof and Sheryl WuDunn is an honor.
                    </div>
                </div>
                <footer class="module__footer">
                    <div class="module-button">
                        <a href="#" class="button">Learn More</a>
                    </div>
                </footer>
            </div>
        </section>

    </div>

    <?php get_footer();
