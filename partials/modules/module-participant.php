<?php
    $participantsSectionConfig = array(
        'posts_per_page' => -1,
        'title' => $title,
        'color' => $color,
        'button_text' => $button_text,
        'button_link' => $button_link,
        'display_title' => $display_title,
        'display_button' => $display_button,
        'post__in' => get_sub_field('participant_list')
    );

    include HBSC_PATH . 'partials/participant/participant-section.php';
?>