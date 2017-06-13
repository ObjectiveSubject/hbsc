<?php
/**
 * General page template
 */
get_header();

$Event = new Event();
$postId = null;
?>
    <div class="site-content">
        <?php
            while ( have_posts() )
            {
                the_post();
            
                if( null !== $post->ID && null === $postId )
                {
                    $postId = $post->ID;
                }

                include HBSC_PATH . '/partials/events/details-section.php';
            }

            // DISCUSSION LEADERS
            include HBSC_PATH . '/partials/events/discussion-leaders-section.php';

            // ONLINE DISCUSSION
            include HBSC_PATH . '/partials/events/online-discussion-section.php';

            // UPCOMING SALONS
            $upcomingEventsSectionConfig = array(
                'classes' => 'u-bg-white',
                'direction' => 'inline'
            );

            include HBSC_PATH . '/partials/events/upcoming-section.php';
        ?>
    </div>
<?php get_footer(); ?>