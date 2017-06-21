<?php
/**
 * General page template
 */
get_header(); ?>

	<div class="site-content">

		<?php while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?>>

				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
<?php
			if ( comments_open() || get_comments_number() )
			{
				//comments_template();
			}
?>
			</article>

		<?php endwhile; ?>

	</div>

<?php get_footer(); ?>