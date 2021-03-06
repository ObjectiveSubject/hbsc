<?php
/* Template Name: The Stowe Center */
get_header(); ?>

	<div class="site-content">

		<?php while ( have_posts() ) : the_post(); ?>
		
		    <section class="preface section <?php the_field('preface_background_color'); ?>">
                <div class="section__content u-container">
                    <header class="section__header">
                        <h1 class="section-title"><?php the_title(); ?></h1>
                    </header>
                    <div class="section__body">
                        <?php the_content(); ?>
                    </div>
                </div>
            </section>
            
            <section class="module module--entry <?php echo ( get_the_post_thumbnail_url() ) ? 'has-image' : '' ; ?>">
                <?php if( get_the_post_thumbnail_url() ) : ?>
                <div class="module__image" <?php echo "style='background-image: url(" . get_the_post_thumbnail_url() . "')"; ?>></div>
                <?php endif; ?>
                <div class="module__content u-container">
                    <header class="module__header">
                        <div class="module-title">
                            Hours
                        </div>
                    </header>
                    <aside class="module__sidebar">
                        <?php if( get_option('hbsc_holiday_open') || get_option('hbsc_holiday_closed') ) : ?>
                        <div class="sidebar">
                            <?php if( get_option('hbsc_holiday_open') ) : ?>
                            <p class="u-caps"><b>Open</b></p>
                            <p><?php echo get_option('hbsc_holiday_open'); ?></p>
                            <?php endif; ?>
                            <?php if( get_option('hbsc_holiday_closed') ) : ?>
                            <p class="u-caps"><b>Closed</b></p>
                            <p><?php echo get_option('hbsc_holiday_closed'); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </aside>
                    <div class="module__body">
                        <?php
                        $today = get_option('hbsc_hours_'.strtolower(date('l')));
                        if( get_option('hbsc_closed_today') || empty($today) ) : ?>
                        <h5>Closed Today</h5>
                        <?php else : ?>
                        <h5>Open Today</h5>
                        <div class="u-font-miller-italic u-font-size-xl">
                            <?php hbsc_opening_hours_today(); ?>
                        </div>
                        <?php endif; ?>
                        <p><?php echo get_option( 'hbsc_hours_desc' ); ?></p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="u-caps">Sunday</td>
                                    <td><?php echo ( !empty(get_option('hbsc_hours_sunday')) ) ? get_option('hbsc_hours_sunday') : 'CLOSED'; ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Monday</td>
                                    <td><?php echo ( !empty(get_option('hbsc_hours_monday')) ) ? get_option('hbsc_hours_monday') : 'CLOSED'; ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Tuesday</td>
                                    <td><?php echo ( !empty(get_option('hbsc_hours_tuesday')) ) ? get_option('hbsc_hours_tuesday') : 'CLOSED'; ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Wednesday</td>
                                    <td><?php echo ( !empty(get_option('hbsc_hours_wednesday')) ) ? get_option('hbsc_hours_wednesday') : 'CLOSED'; ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Thursday</td>
                                    <td><?php echo ( !empty(get_option('hbsc_hours_thursday')) ) ? get_option('hbsc_hours_thursday') : 'CLOSED'; ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Friday</td>
                                    <td><?php echo ( !empty(get_option('hbsc_hours_friday')) ) ? get_option('hbsc_hours_friday') : 'CLOSED'; ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Saturday</td>
                                    <td><?php echo ( !empty(get_option('hbsc_hours_saturday')) ) ? get_option('hbsc_hours_saturday') : 'CLOSED'; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

		<?php 
            endwhile;
            wp_reset_postdata();
        ?>
		
		<?php if( have_rows('module') ): ?>

            <?php get_template_part( 'partials/page', 'modules' ); ?>

        <?php endif; ?>

	</div>

<?php get_footer(); ?>
