<div class="other-salon">
    <div class="other-salon__content">

        <div class="card-positioner">
            <div class="card <?php echo $color; ?>">
                <div class="card-date">
                    <?php echo $Event->getEventDateFormatted(); ?>
                </div>

                <div class="image-positioner">
                    <img src="<?php echo get_field('event_picture'); ?>" />
                </div>

                <div class="card-title">
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

            </div>
        </div>

    </div>
</div>