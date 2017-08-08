<?php
/**
 * General page template
 */

get_header();
?>

	<div class="site-content error-404">

		<section class="preface section <?php the_field('preface_background_color'); ?>">
            <div class="section__content u-container">
                <header class="section__header">
                    <h1 class="section-title"><?php esc_html_e( 'That page can&rsquo;t be found.', 'hbsc' ); ?></h1>
                </header>
                <div class="section__body u-text-center">
                    <div class="preface-text">
                        <h2>Oops!</h2>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab eligendi recusandae similique mollitia sunt! Ullam eum, explicabo molestiae quaerat ducimus dolor officia iure, magnam aperiam nobis libero quis nemo repudiandae.
                        </p>
                    </div>
                    <div class="u-mt-3">
                        <?php get_search_form(); ?>
                    </div>
                </div>

                <footer class="section__footer">
                    <ul class="anchors u-display-flex u-flex-justify-center u-flex-wrap">
                        <li class="anchor preface-button">
                            <a href="<?php echo get_home_url(); ?>" class="button">
                                Homepage
                            </a>
                        </li>
                    </ul>
                </footer>
            </div>
        </section>

	</div><!-- .error-404 -->

<?php get_footer(); ?>


