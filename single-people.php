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
                        <?php 
                            if( $role )
                            {
                                foreach ($role as $r) { echo $r->name . ' Members'; } 
                            }
                        ?>
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
        
        <?php
            // PAST SALONS
            $pastSalonsSectionConfig = array(
                'classes' => 'module--past-salons u-bg-white',
                'title'   => 'Salons lead by ' . get_field('person_first_name'),
                'display_button' => true,
                'button_text' => 'Salons at Stowe',
                'button_href' => '/salons-at-stowe/'
            );

        $pastSalonsLoop = new WP_Query( array( 
            'post_type'      => 'event',
            'posts_per_page' => 4,
            'order'          => 'ASC',
            'meta_key'		 => 'event_start_date',
            'meta_query' => array(
                array(
                    'key' => 'event_start_date',
                    'value' => get_field('event_end_date'),
                    'compare' => '>=',
                    'type' => 'DATE'
                ),
                array(
                    'key' => 'event_discussion_leaders',
                    'value' => '"' . $post->ID . '"',
                    'compare' => 'LIKE'
                )                
            ),
            'orderby'        => 'meta_value',
            'post__not_in'  => array($post->ID)
        ));

            include HBSC_PATH . 'partials/events/past-salons-section.php';
        ?>
	</div>

<?php get_footer(); ?>
