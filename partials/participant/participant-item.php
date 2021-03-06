<?php
                $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                $imgSrc = (isset($img[0]) ? $img[0] : '');
                $title = get_field('participant_first_name').' ' . get_field('participant_last_name');
?>
                <div class="participant--item gray--hover js-hover-toggle" data-class="event--hover" id="<?php echo ltrim(preg_replace('/\W+/', '-', strtolower($title)), '-') . $post->ID; ?>" data-target="#<?php echo ltrim(preg_replace('/\W+/', '-', strtolower($title)), '-') . $post->ID; ?>">
                    <div class="participant--name u-text-center">
                        <a href="<?php echo the_permalink($post->ID);?>" class="u-display-inline-block">
                            <span class="h2"><?php echo get_field('participant_first_name'); ?></span>
                            <span class="h3"><?php echo get_field('participant_last_name'); ?></span>
                        </a>
                    </div>
                    <div class="participant--image fx-grayscale item--image" style="background-image:url('<?php echo $imgSrc;?>');"></div>
<?php
                if( get_field('participant_winner') == 1 )
                {
?>
                    <div class="participant--winner"><?php echo get_the_terms($post, 'participant-type')[0]->name? get_the_terms($post, 'participant-type')[0]->name : ""  ; ?> WINNER</div>
<?php
                }
?>
                    <div class="participant--text">
<?php
                if( get_field('participant_entry_type') == 'student' )
                {
?>
                        <div class="topic">Topic</div>
<?php
                }
?>
                        <div class="entry--title"><?php echo get_field('participant_entry_title'); ?></div>
                        <div class="school--name"><?php echo get_field('participant_academic_institution'); ?></div>
                    </div>

<?php
                if( is_single() )
                {
                    the_content();
                }
?>
                </div>
