<?php 
	get_header();
	global $wp_query;
	$total_results = $wp_query->found_posts;
?>
    <div class="site-content">
        <section class="module u-bg-light-gray">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title">Search</div>
                </header>
                <div class="module__body">
					<h5><?php printf( '(%d) Results for: "%s"', $total_results, get_search_query() ); ?></h5>
					<?php 
						if( have_posts() )
						{
							while ( have_posts() )
							{
								the_post();
								get_template_part( 'content', 'search' );
							}

							the_posts_pagination( array(
								'prev_text'          => 'Previous page',
								'next_text'          => 'Next page',
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . 'Page' . ' </span>',
							) );
						}
						else
						{
							get_template_part( 'content', 'none' );
						}
					?>
                </div>
            </div>
        </section>
	</div>
<?php get_footer(); ?>