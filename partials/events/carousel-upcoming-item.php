<li class="carousel-slide">
    <div class="carousel-slide__content">
        <div class="badge-positioner">
            <div class="badge">
                <span class="u-caps"><?php echo $Event->getDateMonth();?></span>
                <span class="h2 u-font-miller" style="letter-spacing: -.05em"><?php echo $Event->getDateDay();?></span>
            </div>
        </div>
        <div class="card-positioner">
            <div class="card u-bg-tan">
                <div class="card-content">
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
                <div class="card-button">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="button js-hover-toggle" data-target="#image-<?php echo $post->ID; ?>" data-class="image--grayscale">View Event</a>
                </div>
            </div>
        </div>
        <div class="image-positioner">
            <div id="image-<?php echo $post->ID; ?>" class="image image--grayscale" <?php echo 'style="background-image: url(' .  get_field('event_picture') . ')"'; ?>></div>
        </div>
    </div>
</li>