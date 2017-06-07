<div class="upcoming-event upcoming-event-<?php echo $upcomingEventsDirection; ?>">
    <div class="upcoming-event__content">
        
        <?php if( !empty($Event->getDateMonth()) || !empty($Event->getDateDay()) ): ?>
        <div class="badge-positioner">
            <div class="badge">
                <?php if(!empty($Event->getDateMonth())): ?>
                <span><?php echo $Event->getDateMonth();?></span>
                <?php endif; ?>

                <?php if(!empty($Event->getDateDay())): ?>
                <span><?php echo $Event->getDateDay();?></span>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="card-positioner">
            <div class="card <?php echo $color; ?>">
                
                <div class="card-title">
                    <?php echo the_title(); ?>
                </div>

                <div class="card-button">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="button js-hover-toggle">View Event</a>
                </div>                

            </div>
        </div>

        <?php if( !empty($Event->getField('event_picture')) && 'inline' !== '$upcomingEventsDirection' ): ?>
        <div class="image-positioner">
            <div class="image image--grayscale" <?php echo "style='background-image: url(" . $Event->getField('event_picture') . "')"; ?>></div>
        </div>
        <?php endif;?>
    </div>
</div>