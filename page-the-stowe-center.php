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
                        <h1 class="section-title"><?php the_title(); ?></h1>
                    </header>
                    <div class="section__body">
                        <?php the_content(); ?>
                    </div>
                </div>
            </section>
            
            <section class="module module--entry has-image">
                <div class="module__image" <?php echo "style='background-image: url(" . $image . ")'"; ?>></div>
                <div class="module__content u-container">
                    <header class="module__header">
                        <div class="module-title">
                            Hours &amp; Tickets
                        </div>
                    </header>
                    <aside class="module__sidebar">
                        CLOSED ON<br>
                        Easter Sunday, Independence Day, Thanksgiving Day
                    </aside>
                    <div class="module__body">
                        <h5>Open Today</h5>
                        <div class="u-font-miller-italic u-font-size-xl">
                            <?php hbsc_opening_hours_today(); ?>
                        </div>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="u-caps">Monday</td>
                                    <td class="u-text-right"><?php echo get_option('hbsc_hours_monday'); ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Tuesday</td>
                                    <td class="u-text-right"><?php echo get_option('hbsc_hours_tuesday'); ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Wednesday</td>
                                    <td class="u-text-right"><?php echo get_option('hbsc_hours_wednesday'); ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Thursday</td>
                                    <td class="u-text-right"><?php echo get_option('hbsc_hours_thursday'); ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Friday</td>
                                    <td class="u-text-right"><?php echo get_option('hbsc_hours_friday'); ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Saturday</td>
                                    <td class="u-text-right"><?php echo get_option('hbsc_hours_saturday'); ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Sunday</td>
                                    <td class="u-text-right"><?php echo get_option('hbsc_hours_sunday'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

		<?php endwhile; ?>

	</div>

<?php get_footer(); ?>
