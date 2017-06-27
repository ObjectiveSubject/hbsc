<?php
/**
 * General page template
 */
get_header();
?>
    <div class="site-content">
        <?php
            $participantsSctionConfig = array(
                'posts_per_page' => -1
            );

            $participantsSctionConfig = array(
                'posts_per_page' => -1,
                'title' => 'Participants',
                'color' => 'u-bg-white',
                'button_text' => '',
                'button_link' => '',
                'display_title' => true,
                'display_button' => false,
                'participants_list' => get_sub_field('participant_list')
            );
            
            include HBSC_PATH . 'partials/participant/participant-section.php';
        ?>
    </div>
<?php get_footer(); ?>