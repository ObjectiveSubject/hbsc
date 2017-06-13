<div class="event--upcoming-item <?php echo $upcomingItemCardPos; ?>">
    <div class="event--upcoming__content">
        
        <?php if( !empty($Event->getDateMonth()) || !empty($Event->getDateDay()) ): ?>
        <div class="badge-positioner">
            <div class="badge">
                <?php if(!empty($Event->getDateMonth())): ?>
                <span class="u-caps"><?php echo $Event->getDateMonth();?></span>
                <?php endif; ?>

                <?php if(!empty($Event->getDateDay())): ?>
                <span class="h2 u-font-miller"><?php echo $Event->getDateDay();?></span>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="card-positioner">
            <div class="card u-bg-dark-gray">
                
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

            <div class="card-button">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="button js-hover-toggle">View Event</a>
            </div>            
        </div>

        <?php if( !empty(get_field('event_picture')) && 'inline' !== $upcomingEventsSectionConfig['direction'] ): ?>
        <div class="image-positioner">
            <div class="image image--grayscale" <?php echo 'style="background-image: url(\'' . get_field('event_picture') . '\');"'; ?>></div>
        </div>
        <?php endif;?>
    </div>
</div>