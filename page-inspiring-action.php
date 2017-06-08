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
                    <header class="module__header">
                        <div class="module-title">
                            Educational Age Group Visits
                        </div>
                    </header>
                    <div class="module__body">
                        <div class="module-row">
                            <div class="module-column u-text-center">30K</div>
                            <div class="module-column u-text-center">40K</div>
                            <div class="module-column u-text-center">65K</div>
                            <div class="module-column u-text-center">10K</div>
                        </div>
                        <div class="module-row">
                            <div class="module-column u-text-center">
                                <div class="module-title">Stowe Prize Entrants</div>
                                <div>GRAPH</div>
                            </div>
                            <div class="module-column u-text-center">
                                <div class="module-title">Student Stowe Prize Entrants</div>
                                <div>GRAPH</div>
                            </div>
                        </div>
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
            
            <section class="module module--hero has-background" style="background-image: url()">
                <div class="module__content u-container">
                    <div class="card-positioner">
                        <div class="card <?php echo $card_color; ?> js-slide-in">
                            <div class="card-content">
                                <blockquote>
                                    "Since 2008, Salons at Stowe consequatur hic aliquam est fugit quaerat numquam vel rerum. Laborum, amet eaque ad."
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="module module--basic">
                <div class="module__content u-container">
                    <header class="module__header">
                        <div class="module-title">
                            Most Engaged and Discussed Salons Topics<br>Through Salons at Stowe
                        </div>
                    </header>
                    <div class="module__body">
                        <div class="module-row">
                            <div class="module-column">Post 1</div>
                            <div class="module-column">Post 2</div>
                            <div class="module-column">Post 3</div>
                        </div>
                    </div>
                </div>
            </section>
            
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
                                    <div class="module-column">Stat 1</div>
                                    <div class="module-column">Stat 2</div>
                                </div>
                                <div class="module-row">
                                    <div class="module-column">Stat 3</div>
                                    <div class="module-column">Stat 4</div>
                                </div>
                            </div>
                            <div class="module-column">IMAGE</div>
                        </div>
                    </div>
                </div>
            </section>

		<?php endwhile; ?>

	</div>

<?php get_footer(); ?>
