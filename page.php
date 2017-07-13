<?php
/**
 * General page template
 */

get_header(); ?>

	<div class="site-content">

		<?php while ( have_posts() ) : the_post(); ?>
		
		    <?php get_template_part('partials/page', 'preface'); ?>

		<?php if( have_rows('module') ): ?>

            <?php get_template_part( 'partials/page', 'modules' ); ?>

        <?php endif; ?>		
<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
?>
				<section class="module">
					<div class="comments--thread">
<?php
					comments_template();
?>
					</div>
				</section>
				
<?php
			}
?>

		<?php endwhile; ?>

	</div>

<?php get_footer(); ?>
