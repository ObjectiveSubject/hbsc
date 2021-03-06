<?php
/**
 * General page template
 */
get_header();

$Event = new Event();
$postId = null;
$eventDisplayDiscussion = null;
$eventStartDate = null;
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

                if( null !== get_field('event_display_discussions') && null === $eventDisplayDiscussion )
                {
                    $eventDisplayDiscussion = get_field('event_display_discussions');
                }

                include HBSC_PATH . 'partials/events/details-section.php';

                // DISCUSSION LEADERS
                include HBSC_PATH . 'partials/events/discussion-leaders-section.php';

                // ONLINE DISCUSSION
                include HBSC_PATH . 'partials/events/online-discussion-section.php';
            }

            // UPCOMING SALONS
            $upcomingEventsSectionConfig = array(
                'classes' => 'module--events-upcoming-inline u-bg-white',
                'direction' => 'inline',
                // Looking for upcoming events, based on today's date
                'start_date' => date('Y-m-d') . ' 00:00:00'
            );

            include HBSC_PATH . 'partials/events/upcoming-section.php';
        ?>
    </div>
<?php get_footer(); ?>