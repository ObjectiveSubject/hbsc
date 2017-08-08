<?php
/**
 * General page template
 */
get_header(); 

?>
<div class="site-content">
	<?php while ( have_posts() ) : the_post(); ?>
	<?php
		$title = $post->post_title;
	?>
		<section id="module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="module module--basic <?php echo (get_the_post_thumbnail_url() ? 'has-image' : ''); ?>">
			<?php if( get_the_post_thumbnail_url() ) : ?>
			<div class="module__image" <?php echo "style='background-image: url(" . get_the_post_thumbnail_url() . ")'"; ?>></div>
			<?php endif; ?>
			<div class="module__content u-container">

				<header class="module__header">
					<div class="module-title">
						<?php echo $title; ?>
					</div>
				</header>

				<div class="module__body">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
	<?php 
		endwhile;
		wp_reset_postdata();
	?>
</div>
<?php get_footer(); ?>