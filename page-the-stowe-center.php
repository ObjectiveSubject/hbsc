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
            
            <section class="module module--entry <?php echo ( get_the_post_thumbnail_url() ) ? 'has-image' : '' ; ?>">
                <?php if( get_the_post_thumbnail_url() ) : ?>
                <div class="module__image" <?php echo "style='background-image: url(" . get_the_post_thumbnail_url() . "')"; ?>></div>
                <?php endif; ?>
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
                                    <td><?php echo get_option('hbsc_hours_monday'); ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Tuesday</td>
                                    <td><?php echo get_option('hbsc_hours_tuesday'); ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Wednesday</td>
                                    <td><?php echo get_option('hbsc_hours_wednesday'); ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Thursday</td>
                                    <td><?php echo get_option('hbsc_hours_thursday'); ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Friday</td>
                                    <td><?php echo get_option('hbsc_hours_friday'); ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Saturday</td>
                                    <td><?php echo get_option('hbsc_hours_saturday'); ?></td>
                                </tr>
                                <tr>
                                    <td class="u-caps">Sunday</td>
                                    <td><?php echo get_option('hbsc_hours_sunday'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <h5>House Tour Tickets</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum dolores magni minima, voluptas quaerat corporis, provident cum veritatis illum, perferendis sint cupiditate! Saepe, dicta, ea! A iure quod dolorum beatae.</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Adults</td>
                                    <td>$10</td>
                                </tr>
                                <tr>
                                    <td>Students and Seniors (65+)</td>
                                    <td>$9</td>
                                </tr>
                                <tr>
                                    <td>Children (5-16)</td>
                                    <td>$7</td>
                                </tr>
                                <tr>
                                    <td>Children under 5</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Hartford Residents (with ID)</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Military (Memorial Day through Labor Day)</td>
                                    <td>Free</td>
                                </tr>
                            </tbody>
                        </table>
                        <h5>The Stowe-Twain Experience</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum dolores magni minima, voluptas quaerat corporis, provident cum veritatis illum, perferendis sint cupiditate! Saepe, dicta, ea! A iure quod dolorum beatae.</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Adults</td>
                                    <td>$26</td>
                                </tr>
                                <tr>
                                    <td>Students and Seniors (65+)</td>
                                    <td>$23</td>
                                </tr>
                                <tr>
                                    <td>Children (5-16)</td>
                                    <td>$16</td>
                                </tr>
                                <tr>
                                    <td>Children under 5</td>
                                    <td>Free</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            
            <section class="module module--basic">
                <div class="module__content u-container">
                    <header class="module__header">
                        <div class="module-title">
                            Tours
                        </div>
                    </header>
                    <div class="module__body">
                        <div class="module-row">
                            <div class="module-column">Accordion</div>
                            <div class="module-column">Image</div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="module module--basic">
                <div class="module__content u-container">
                    <header class="module__header">
                        <div class="module-title">
                            Directions
                        </div>
                    </header>
                    <div class="module__body">
                        <h5>Harriet Beecher Stowe Center</h5>
                        <p>
                            <?php
                            echo get_option('hbsc_address') . '<br>';
                            echo get_option('hbsc_phone') . '<br>';
                            echo get_option('hbsc_email');
                            ?>
                        </p>
                        <p>MAP</p>
                        <div class="module-row">
                            <div class="module-column">
                                <p>
                                    <b>From the North</b><br>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolorum blanditiis mollitia ad.
                                </p>
                                <p>
                                    <b>From the South</b><br>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolorum blanditiis mollitia ad.
                                </p>
                            </div>
                            <div class="module-column">
                                <p>
                                    <b>From the East</b><br>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolorum blanditiis mollitia ad.
                                </p>
                                <p>
                                    <b>From the West</b><br>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolorum blanditiis mollitia ad.
                                </p>
                            </div>
                        </div>
                        <h5>Free Parking</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates distinctio nemo quasi quod consequatur nobis ullam dolorem a id minima, vero ad, sint excepturi saepe, omnis odit blanditiis accusamus et.</p>
                    </div>
                </div>
            </section>
            
            <section class="module module--basic">
                <div class="module__content u-container">
                    <header class="module__header">
                        <div class="module-title">
                            Store
                        </div>
                    </header>
                    <div class="module__body">
                        <div class="module-row">
                            <div class="module-column">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto repellendus, a tempora dolor adipisci quidem aspernatur quisquam necessitatibus corporis rerum? Recusandae non itaque minima distinctio incidunt, esse eveniet totam numquam.
                                <p class="u-font-size-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, consectetur.</p>
                                <a href="#" class="button u-mt-2">Online Store</a>
                            </div>
                            <div class="module-column">Image</div>
                        </div>
                    </div>
                </div>
            </section>

		<?php endwhile; ?>

	</div>

<?php get_footer(); ?>
