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
            
            <section class="module module--basic <?php echo ( get_the_post_thumbnail_url() ) ? 'has-image' : '' ; ?>">
                <?php if( get_the_post_thumbnail_url() ) : ?>
                <div class="module__image" <?php echo "style='background-image: url(" . get_the_post_thumbnail_url() . "')"; ?>></div>
                <?php endif; ?>
                <div class="module__content u-container">
                    <?php if( have_rows('educational_age_groups') ): ?>
                    <header class="module__header">
                        <div class="module-title">
                            Educational Age Group Visits
                        </div>
                    </header>
                    <?php endif; ?>
                    <div class="module__body">
                        <?php if( have_rows('educational_age_groups') ): ?>
                        <div class="module-row">
                            <?php while( have_rows('educational_age_groups') ): the_row(); ?>
                            <div class="module-column u-text-center">
                                <div class="u-font-miller u-color-red u-font-size-max"><?php the_sub_field('educational_age_group_visits'); ?></div>
                                <div class="u-font-miller-bold u-font-size-lg"><?php the_sub_field('educational_age_group_name'); ?></div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                        <?php if( have_rows('stowe_prize_years') || have_rows('student_stowe_prize_years') ): ?>
                        <div class="module-row">
                            <?php if( have_rows('stowe_prize_years') ): ?>
                            <div class="module-column">
                                <div class="module-title">Stowe Prize Entrants</div>
                                <div class="chart">
                                    <?php while( have_rows('stowe_prize_years') ): the_row(); ?>
                                    <div class="chart-data">
                                        <div class="chart-data__value">
                                            <span <?php echo ( get_sub_field('stowe_prize_percentage') ) ? 'style="height:' . get_sub_field('stowe_prize_percentage') . '%"' : '' ; ?>></span>
                                        </div>
                                        <div class="chart-data__key">
                                            <?php the_sub_field('stowe_prize_year'); ?>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <?php endif;
                            if( have_rows('student_stowe_prize_years') ): ?>
                            <div class="module-column">
                                <div class="module-title">Student Stowe Prize Entrants</div>
                                <div class="chart">
                                    <?php while( have_rows('student_stowe_prize_years') ): the_row(); ?>
                                    <div class="chart-data">
                                        <div class="chart-data__value">
                                            <span <?php echo ( get_sub_field('student_stowe_prize_percentage') ) ? 'style="height:' . get_sub_field('student_stowe_prize_percentage') . '%"' : '' ; ?>></span>
                                        </div>
                                        <div class="chart-data__key">
                                            <?php the_sub_field('student_stowe_prize_year'); ?>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            
            <section class="module module--basic">
                <div class="module__content u-container">
                    <header class="module__header">
                        <div class="module-title">
                            2017 Stowe Prize Winners
                        </div>
                    </header>
                    <div class="module__body">
                        <div class="module-row">
                            <div class="module-column u-text-center">NINA SACHS</div>
                            <div class="module-column u-text-center">MARTESE JOHNSON</div>
                        </div>
                    </div>
                </div>
            </section>
            
            <?php if( have_rows('module') ): ?>

                <?php get_template_part( 'partials/page', 'modules' ); ?>

            <?php endif; ?>
            
            <?php if( have_rows('salons_at_stowe') ): ?>
            <section class="module module--basic">
                <div class="module__content u-container">
                    <header class="module__header">
                        <div class="module-title">
                            Most Engaged and Discussed Salons Topics<br>Through Salons at Stowe
                        </div>
                    </header>
                    <div class="module__body">
                        <div class="module-row">
                            <?php while( have_rows('salons_at_stowe') ): the_row(); ?>
                            <?php $event =  get_sub_field('event'); ?>
                            <div class="module-column">
                                <div class="topic">
                                    <div class="topic__header u-clear" style="position: relative;">
                                        <div class="badge-positioner" style="top: 0;">
                                            <div class="badge">
                                                <span class="u-font-size-lg"><?php the_sub_field('engagement'); ?>%</span>
                                                <span>Engagement</span>
                                            </div>
                                        </div>
                                        <div class="u-ml-5 u-pt-5">
                                            <a href="#">
                                                <div class="topic__image" style="width: 100%; height: 0; padding-bottom: 100%; background-size: cover; background-position: center; background-image: url(<?php echo get_the_post_thumbnail_url($event->ID); ?>);"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="topic__body u-pl-5 u-text-center">
                                        <div class="u-font-size-sm u-mt-2">
                                            <?php echo $event->event_start_date; ?>
                                        </div>
                                        <a href="#" class="u-font-miller-bold u-font-size-lg">
                                            <?php echo $event->post_title; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            
            <?php if( have_rows('dogwood_trees_statistics') ): ?>
            <section class="module module--basic">
                <div class="module__content u-container">
                    <header class="module__header">
                        <div class="module-title">
                            Dogwood Trees Planted
                        </div>
                    </header>
                    <div class="module__body">
                        <div class="module-row">
                            <div class="module-column">
                                <div class="module-row">
                                    <?php while( have_rows('dogwood_trees_statistics') ): the_row(); ?>
                                    <div class="module-column u-text-center" style="flex: 1 0 50%">
                                        <span class="u-display-block u-font-size-max u-color-red"><?php the_sub_field('dogwood_trees_statistic_value'); ?></span>
                                        <span class="u-font-miller-bold u-font-size-lg"><?php the_sub_field('dogwood_trees_statistic_key'); ?></span>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <div class="module-column" style="background-size: cover; background-position: center; background-image: url(<?php the_field('dogwood_trees_image'); ?>);"></div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>

		<?php endwhile; ?>

	</div>

<?php get_footer(); ?>
