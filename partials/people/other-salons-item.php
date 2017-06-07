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
                    <?php echo the_title(); ?>
                </div>

            </div>
        </div>

    </div>
</div>