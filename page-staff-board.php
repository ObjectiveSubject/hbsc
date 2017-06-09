<?php
/**
 * General page template
 */

$roles = get_terms( 'role' );

get_header(); ?>

	<div class="site-content">
		
        <?php
        foreach ( $roles as $role ) :
        ?>
        <section class="section u-bg-light-gray">
            <div class="section__content u-container">
                <header class="section__header">
                    <h1 class="section-title"><?php echo $role->name; ?></h1>
                </header>
                <div class="section__body u-text-center">
                    <?php
                    $args = array(
                        'post_type' => 'people',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'role',
                                'field' => 'slug',
                                'terms' => $role->slug,
                            )
                        )
                    );
                    $people = new WP_Query($args);
                    if ( $people->have_posts() ) : ?>
                      <ul>
                      <?php while ( $people->have_posts() ) : $people->the_post(); ?>
                        <li class="u-mt-3">
                            <a href="<?php the_permalink(); ?>" class="u-display-inline-block">
                                <span class="h2"><?php the_title(); ?></span>
                                <span class="h3"><?php echo get_field('person_title'); ?></span>
                            </a>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endforeach; ?>

	</div>

<?php get_footer(); ?>
