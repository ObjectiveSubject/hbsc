<?php
                $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                $imgSrc = (isset($img[0]) ? $img[0] : '');
?>
                <div class="participant--item">
                    <div class="participant--name u-text-center">
                        <a href="<?php echo the_permalink($post->ID);?>" class="u-display-inline-block">
                            <span class="h2"><?php echo get_field('participant_first_name'); ?></span>
                            <span class="h2"><?php echo get_field('participant_last_name'); ?></span>
                        </a>
                    </div>
                    <div class="participant--image" style="background-image:url('<?php echo $imgSrc;?>');"></div>
<?php
                if( get_field('participant_winner') == 1 )
                {
?>                                    
                    <div class="participant--winner">WINNER</div>
<?php
                }
?>
                    <div class="participant--text">
                        <div class="topic">Topic</div>
                        <div class="entry--title"><?php echo get_field('participant_entry_title'); ?></div>
                        <div class="school--name"><?php echo get_field('participant_academic_institution'); ?></div>
                    </div>
                </div>