<div class="event--upcoming-item <?php echo $upcomingItemCardPos; ?> event--hover js-hover-toggle" data-class="event--hover" id="<?php echo ltrim(preg_replace('/\W+/', '-', strtolower(get_field('event_title'))), '-') . $post->ID; ?>" data-target="#<?php echo ltrim(preg_replace('/\W+/', '-', strtolower(get_field('event_title'))), '-') . $post->ID; ?>">
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
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="button">View Event</a>
            </div>            
        </div>
<?php 
    $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
    $imgSrc = (isset($img[0]) ? $img[0] : '');
?>
        <?php if( !empty($imgSrc) && 'inline' !== $upcomingEventsSectionConfig['direction'] ): ?>
        <div class="image-positioner">
            <div class="image image--grayscale" <?php echo 'style="background-image: url(\'' . $imgSrc . '\');"'; ?>></div>
        </div>
        <?php endif;?>
    </div>
</div>