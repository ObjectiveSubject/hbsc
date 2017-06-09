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
                        <h1 class="section-title">Collections</h1>
                    </header>
                    <div class="section__body">
                        <div class="preface-text">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <footer class="section__footer">
                        <ul class="anchors u-display-flex u-flex-justify-center u-flex-wrap">
                            <li class="anchor preface-button">
                                <a href="#section-library-collection" class="button">
                                    Library Collection
                                </a>
                            </li>
                            <li class="anchor preface-button">
                                <a href="#section-artifact-collection" class="button">
                                    Artifact Collection
                                </a>
                            </li>
                        </ul>
                    </footer>
                </div>
            </section>

	</div>

<?php get_footer(); ?>
