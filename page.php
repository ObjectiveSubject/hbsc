<?php
/**
 * General page template
 */

get_header(); ?>

	<div class="site-content">

		<?php while ( have_posts() ) : the_post(); ?>
            
            <section class="preface section u-bg-dark-gray">
                
                <div class="section__content u-container">

                    <header class="section__header">
                        <h1 class="page-title section-title"><?php the_title(); ?></h1>
                    </header>
                    <div class="section__body">
                        <?php
                        $title = get_field('preface-title');
                        if ( $title ) {
                        $split_title = explode("|", $title);
                        $count = count($split_title);
                        ?>
                        <h2 class="preface-title">
                            <?php for ($i=0; $i<$count; $i++) {
                            echo '<span>' . $split_title[$i] . '</span>';
                            } ?>
                        </h2>
                        <?php } ?>
                        <div class="preface-text">
                            <?php the_content(); ?>
                        </div>
                    </div>
                
                </div>
                
            </section>

		<?php endwhile; ?>

	</div>

<?php get_footer(); ?>
