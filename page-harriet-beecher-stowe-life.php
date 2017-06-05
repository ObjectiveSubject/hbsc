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
                            <li class="anchor preface-button">
                                <a href="#section-childhood-and-education" class="button">
                                    Childhood &amp; Education
                                </a>
                            </li>
                        </ul>
                    </footer>
                </div>
            </section>
            
            <section class="section module--hero">
                <div class="section__content u-flex-justify-end u-container">
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
            
            <section id="section-childhood-and-education" class="section module--basic u-bg-white has-sidebar">
                <div class="section__content u-container">
                    <header class="section__header">
                        <div class="section-title">
                            Childhood &amp; Education
                        </div>
                    </header>
                    <div class="section__body">
                        This is the module content
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
