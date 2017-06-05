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
            
            <section id="section-childhood-and-education" class="section module--basic u-bg-white has-sidebar">
                <div class="section__content u-container">
                    <div class="section__body">
                        <div class="module-row">
                            <div class="section-title">Library Collection</div>
                            <div class="section-button">
                                <a href="#" class="button">View Collection</a>
                            </div>
                        </div>
                        <div class="module-row">
                            <div class="section-title">Artifact Collection</div>
                            <div class="section-button">
                                <a href="#" class="button">View Collection</a>
                            </div>
                        </div>
                    </div>
                    <aside class="section__sidebar">
                        <div class="u-pa-1">
                        <div class="h6">Family Tree</div>
                        <div class="u-font-size-sm">Discover more information on the Beecher family <a href="#">here</a>, and visit the Newman Baruch library at CUNY.</div>
                        </div>
                    </aside>
                </div>
            </section>

		<?php endwhile; ?>

	</div>

<?php get_footer(); ?>
