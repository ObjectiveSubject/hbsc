<?php
/**
 * General page template
 */

$role = get_the_terms( get_the_ID(), 'role' );

get_header(); ?>

	<div class="site-content">
	
	    <?php while ( have_posts() ) : the_post(); ?>
		
        <section class="module module--entry u-bg-light-gray">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title">
                        <!-- Temporary -->
                        <?php foreach ($role as $r) { echo $r->name . ' Members'; } ?>
                    </div>
                    <div class="u-text-center u-mt-3">
                        <div class="h2"><?php the_title(); ?></div>
                        <div class="h3"><?php the_field('person_title'); ?></div>
                    </div>
                </header>
                <aside class="module__sidebar">
                    <b>CONTACT</b><br>
                    <a href="mailto:<?php the_field('person_contact_email'); ?>"><?php the_field('person_contact_email'); ?></a><br>
                    <a href="tel:<?php the_field('person_contact_phone'); ?>"><?php the_field('person_contact_phone'); ?></a>
                </aside>
                <div class="module__body" style="padding-left: 12rem; padding-right: 1rem;">
                    <?php the_post_thumbnail(); ?>
                    <p><?php the_content(); ?></p>
                </div>
            </div>
        </section>
        
        <?php endwhile; ?>
        
        <section class="module module--basic">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title">
                        Salons lead by <?php the_field('person_first_name'); ?>
                    </div>
                </header>
                <div class="module__body">
                    <div class="module-row">
                        <div class="module-column">
                            Salon 1
                        </div>
                        <div class="module-column">
                            Salon 2
                        </div>
                    </div>
                </div>
                <footer class="module__footer">
                    <a href="#" class="button module-button">Salons at Stowe</a>
                </footer>
            </div>
        </section>

	</div>

<?php get_footer(); ?>
