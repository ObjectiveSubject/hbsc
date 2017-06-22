<?php
/**
 * General page template
 */
$postId = null;
get_header();
$eventStartDate = null;
?>
	<div class="site-content">
		<?php 
            while ( have_posts() ) :
                the_post(); 

                if( null !== $post->ID && null === $postId )
                {
                    $postId = $post->ID;
                }

                if( null !== get_field('event_start_date') && null === $eventStartDate )
                {
                    $eventStartDate = get_field('event_start_date');
                }
        ?>
		    <section class="preface section <?php the_field('preface_background_color'); ?>">
                <div class="section__content u-container">
                    <header class="section__header">
                        <h1 class="section-title">Salons at stowe</h1>
                    </header>
                    <div class="section__body">
                        <div class="preface-text">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>
		<?php 
            endwhile; 
            wp_reset_postdata();
        ?>

		<?php if( have_rows('module') ): ?>

            <?php get_template_part( 'partials/page', 'modules' ); ?>

        <?php endif; ?>

        <!-- Upcoming section -->
        <?php
            // UPCOMING SALONS            
            $upcomingEventsSectionConfig = array(
                'classes' => 'module--events-upcoming-list u-bg-light-gray',
                'direction' => 'list',
                'start_date' => $eventStartDate
            );

            include HBSC_PATH . 'partials/events/upcoming-section.php';
        ?>     

        <!-- Shows section -->
        <?php
            // PAST SALONS
            $pastSalonsSectionConfig = array(
                'classes' => 'module--past-salons u-bg-white',
                'title'   => 'PAST SALONS',
                'display_button' => false
            );

            include HBSC_PATH . 'partials/events/past-salons-section.php';
        ?>      
	</div>
<?php get_footer(); ?>
<script>
    var sortByPastEvents;

    var sortByOptions = {
        'defaultSortByKey' : 'recent',
        'sortByKeys'       : ['recent', 'most_viewed', 'most_discussed'],
    };    

    jQuery( document ).ready(function()
    {
        sortByPastEvents = new SortBy( sortByOptions );
    });
</script>