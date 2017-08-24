<?php
/**
 * General page template
 */
get_header(); ?>
    <div class="site-content">
        <section class="module u-bg-light-gray module--posts">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title">News & Annoncements</div>
                </header>
                <div class="module__body">
					<?php 
						if( have_posts() )
						{
							while ( have_posts() )
							{
								the_post();
								get_template_part( 'content', 'post' );
							}
                            wp_reset_postdata();

							the_posts_pagination( array(
								'prev_text'          => 'Previous&nbsp;',
								'next_text'          => '&nbsp;Next',
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