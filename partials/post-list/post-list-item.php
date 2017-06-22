<div class="event--past-salon-item">
    <div class="event--past-salon__content">
        
        <?php if( !empty($Event->getDateMonth()) || !empty($Event->getDateDay()) ): ?>
        <div class="badge-positioner">
            <div class="badge">
                <?php
                    $dt = \DateTime::createFromFormat( 'Y-m-d', get_field('event_start_date') );
                ?>
                <span><?php echo $dt->format('F j, Y'); ?> <?php echo get_field('views_count');?></a></span>
            </div>
        </div>
        <?php endif; ?>
        <?php 
            $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
            $imgSrc = (isset($img[0]) ? $img[0] : '');
        ?>
        <?php if( !empty($imgSrc)) : ?>
        <div class="image-positioner">
            <div class="image image--grayscale" <?php echo 'style="background-image: url(\'' . $imgSrc . '\');"'; ?>></div>
        </div>
        <?php endif;?>

        <div class="card-positioner">
            <div class="card u-bg-light-gray">
                
                <div class="1card-title">
                    <h8><a href="<?php echo the_permalink(); ?>"><?php echo get_field('event_title'); ?></a></h8>
                    <?php
                        if(!empty(get_field('event_subtitle')))
                        {
                    ?>
                        <h8><a href="<?php echo the_permalink(); ?>"><?php echo get_field('event_subtitle'); ?></a></h8>
                    <?php
                        }
                    ?>
                </div>

            </div>           
        </div>

    </div>    
</div>