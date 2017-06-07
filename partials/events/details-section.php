<section id="module-<?php echo $post->ID;?>" class="module module--hero has-background" <?php echo 'style="background-image: url(' . get_field('event_picture') . ')"'; ?>>
    <div class="module__content u-container">
        <div class="card-positioner">
            <div class="card u-bg-dark-gray js-slide-in">
                <div class="card-title">
                    SALONS AT STOWE
                </div>

                <div class="card-event-title">
                    <?php echo the_title(); ?>
                </div>

                <div class="card-date">
                    <?php echo $Event->getEventDateFormatted(); ?>
                </div>

                <div class="card-content">
                    <?php echo the_content(); ?>
                </div>

                <div class="card-event-details">
                    <div class=""><?php echo $Event->getField('event_location');?></div>
                    <div class=""><?php echo $Event->getField('event_doors_open');?></div>
                    <div class=""><?php echo $Event->getField('event_program');?></div>
                </div>                

                <div class="card-button">
                <?php
                    if( $Event->getField('event_display_discussions') == 1 )
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