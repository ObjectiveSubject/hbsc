<section id="module-<?php echo $post->ID;?>" class="module module--hero has-background" <?php echo 'style="background-image: url(' . get_field('event_picture') . ')"'; ?>>
    <div class="module__content u-container">
        <div class="card-positioner">
            <div class="card u-bg-dark-gray js-slide-in">
                <div class="card-title">
                    SALONS AT STOWE
                </div>
                <?php
                    if( get_field('event_registration_open') == 1 && !isDateOlderThanNow(get_field('event_start_date')) )
                    {
                ?>
                        <div class="card-event-register">
                            <a href="#" class="button module-button">Register</a>
                        </div>
                <?php
                    }
                ?>
                <p>&nbsp;</p>
                <div class="card-event-title">
                    <h2><?php echo get_field('event_title'); ?></h2>
                    <?php
                    if(!empty(get_field('event_subtitle')))
                    {
                    ?>
                        <h3><?php echo get_field('event_subtitle'); ?></h3>
                    <?php
                        }
                    ?>
                </div>

                <div class="card-date">
                    <?php echo humanizeDate(get_field('event_start_date'));?>
                </div>

                <div class="card-content">
                    <?php echo the_content(); ?>
                </div>

                <div class="card-event-details">
                    <div class=""><?php echo get_field('event_location');?></div>
                    <div class=""><?php echo get_field('event_doors_open');?></div>
                    <div class=""><?php echo get_field('event_program');?></div>
                </div>                

                <div class="card-button">
                <?php
                    if( get_field('event_display_discussions') == 1 )
                    {
                ?>                
                        <a href="#join_the_discussion" class="button module-button">Join the discussion</a>
                <?php
                    }
                ?>
                    <a href="" class="button module-button">Share</a>
                </div>

            </div>
        </div>
    </div>
</section>